<?php
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            @foreach ($districts as $district)--}}
{{--                <div class="col-md-4 mb-3">--}}
{{--                    <div class="card">--}}
{{--                        <img src="{{ $district->image_url }}" class="card-img-top" alt="district-image">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{ $district->district_number }} - {{ $district->address }}</h5>--}}
{{--                            <p class="card-text">Площадь: {{ $district->square_number }} м²</p>--}}
{{--                            <button class="btn btn-primary" data-district-id="{{ $district->id }}" data-toggle="modal" data-target="#reserveModal">--}}
{{--                                Посмотреть зоны и зарезервировать склады--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Модальное окно для резервирования складов -->--}}
{{--    <div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="reserveModalLabel">Резервирование складов</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row">--}}
{{--                        <!-- Левая панель: Зоны -->--}}
{{--                        <div class="col-md-4">--}}
{{--                            <h5>Зоны</h5>--}}
{{--                            <ul id="zoneList" class="list-group"></ul>--}}
{{--                        </div>--}}
{{--                        <!-- Правая панель: Схема складов -->--}}
{{--                        <div class="col-md-8">--}}
{{--                            <h5>Схема складов</h5>--}}
{{--                            <div id="warehouseMap" class="d-flex flex-wrap"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>--}}
{{--                    <button type="button" class="btn btn-danger" id="reserveButton">Зарезервировать</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            // При открытии модального окна загружаем данные о квартале--}}
{{--            $('#reserveModal').on('show.bs.modal', function (event) {--}}
{{--                var button = $(event.relatedTarget); // Кнопка, которая вызвала модальное окно--}}
{{--                var districtId = button.data('district-id'); // Получаем id квартала--}}

{{--                $.get('/warehouse-districts/' + districtId, function(data) {--}}
{{--                    // Заполняем список зон--}}
{{--                    var zoneList = $('#zoneList');--}}
{{--                    zoneList.empty();--}}
{{--                    data.warehouse_zones.forEach(function(zone) {--}}
{{--                        zoneList.append('<li class="list-group-item zone" data-zone-id="' + zone.id + '">' + zone.district_number + '</li>');--}}
{{--                    });--}}

{{--                    // Загружаем карту складов для выбранной зоны--}}
{{--                    $('.zone').on('click', function() {--}}
{{--                        var zoneId = $(this).data('zone-id');--}}
{{--                        loadWarehouseMap(zoneId);--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}

{{--            // Загружаем схему складов по выбранной зоне--}}
{{--            function loadWarehouseMap(zoneId) {--}}
{{--                $.get('/zones/' + zoneId + '/warehouses', function(data) {--}}
{{--                    var warehouseMap = $('#warehouseMap');--}}
{{--                    warehouseMap.empty();--}}

{{--                    data.warehouses.forEach(function(warehouse) {--}}
{{--                        var statusClass = warehouse.occupancy_status === 'reserved' ? 'reserved' : 'available';--}}
{{--                        var warehouseElement = $('<div class="warehouse ' + statusClass + '" data-id="' + warehouse.id + '" style="width: 100px; height: 100px; margin: 5px; background-color: ' + (statusClass === 'reserved' ? 'grey' : 'green') + '; border: 1px solid #ddd;"></div>');--}}
{{--                        warehouseMap.append(warehouseElement);--}}
{{--                    });--}}

{{--                    // При клике на склад меняем его статус--}}
{{--                    $('.warehouse').on('click', function() {--}}
{{--                        if (!$(this).hasClass('reserved')) {--}}
{{--                            $(this).toggleClass('selected');--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            }--}}

{{--            // Резервируем выбранные склады--}}
{{--            $('#reserveButton').on('click', function() {--}}
{{--                var selectedWarehouses = [];--}}
{{--                $('.warehouse.selected').each(function() {--}}
{{--                    selectedWarehouses.push($(this).data('id'));--}}
{{--                });--}}

{{--                $.post('/warehouses/reserve', { warehouses: selectedWarehouses }, function(response) {--}}
{{--                    alert(response.message);--}}
{{--                    $('#reserveModal').modal('hide');  // Закрываем модальное окно--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $warehouse->name }}</h1>
        <p>{{ $warehouse->description }}</p>
        <p><strong>Местоположение:</strong> {{ $warehouse->location }}</p>
        <p><strong>Размер:</strong> {{ $warehouse->size }} м²</p>

        <h3>Схема склада</h3>
        <div class="warehouse-map">
            <div class="map-grid">
                @foreach ($slots as $slot)
                    <div
                        class="slot {{ $slot->status == 'available' ? 'available' : 'booked' }}"
                        data-slot-id="{{ $slot->id }}"
                    >
                        {{ $slot->row }}-{{ $slot->column }}
                    </div>
                @endforeach
            </div>
        </div>

        <button id="confirm-selection" class="btn btn-primary mt-3">Забронировать</button>
    </div>
@endsection

@push('styles')
    <style>
        .warehouse-map {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .map-grid {
            display: grid;
            grid-template-columns: repeat(10, 50px); /* 10 колонок */
            gap: 5px;
        }
        .slot {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        .slot.available {
            background-color: #d4edda; /* Зеленый для доступных */
        }
        .slot.booked {
            background-color: #f8d7da; /* Красный для занятых */
            cursor: not-allowed;
        }
        .slot.selected {
            background-color: #cce5ff; /* Синий для выбранных */
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slots = document.querySelectorAll('.slot.available');
            const selectedSlots = new Set();

            slots.forEach(slot => {
                slot.addEventListener('click', () => {
                    const slotId = slot.getAttribute('data-slot-id');
                    if (selectedSlots.has(slotId)) {
                        selectedSlots.delete(slotId);
                        slot.classList.remove('selected');
                    } else {
                        selectedSlots.add(slotId);
                        slot.classList.add('selected');
                    }
                });
            });

            document.getElementById('confirm-selection').addEventListener('click', () => {
                if (selectedSlots.size === 0) {
                    alert('Выберите хотя бы одно место для бронирования.');
                    return;
                }

                // Пример отправки данных на сервер
                fetch('/booking', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ slots: Array.from(selectedSlots) })
                })
                    .then(response => response.json())
                    .then(data => alert(data.message))
                    .catch(error => console.error('Ошибка:', error));
            });
        });
    </script>
@endpush
