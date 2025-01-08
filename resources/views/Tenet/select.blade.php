<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Схема склада</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(107, 227, 124, 0.92);
        }

        .warehouse-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .warehouse-header img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }

        .warehouse-container {
            border: 2px solid #000;
            padding: 20px;
            background-color: #fff;
            margin: 20px auto;
            max-width: 90%;
            position: relative;
        }

        .warehouse-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
            position: relative;
        }

        .warehouse-slot {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Roboto, sans-serif;
            height: 100px;
            width: 100px;
            position: relative;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            padding: 5px;
            border-radius: 5px;
            border: 3px solid #000;
        }

        .warehouse-slot.warehouse-free {
            background-color: #e0e0e0; /* Серый для свободных */
            color: #000;
        }

        .warehouse-slot.warehouse-booked {
            background-color: #dc3545; /* Красный для занятых */
            color: #fff;
            cursor: not-allowed;
        }

        .warehouse-slot.warehouse-selected {
            background-color: #27a838ea; /* Зеленый для выбранных */
            color: #fff;
        }

        .warehouse-slot.warehouse-user {
            background-color: #007bff;
            color: #fff;
            cursor: not-allowed;
        }

        .warehouse-slot .gate {
            width: 100%;
            height: 3px;
            background-color: #000;
            position: absolute;
            bottom: 0;
        }

        .gate-top {
            width: 100%;
            height: 3px;
            background-color: #000;
            position: absolute;
            top: -2px;
            left: 50%;
            transform: translateX(-50%);
        }

        .gate-bottom {
            width: 100%;
            height: 3px;
            background-color: #000;
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
        }

        .road {
            width: 100%;
            height: 20px;
            background-color: #a39f9f;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .vertical-road {
            width: 40px;
            height: 100px;
            left: 25%;
            background-color: #a39f9f;
        }

        .warehouse-entry {
            display: block;
            width: 30px;
            height: 25px;
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: #ffc107;
            text-align: center;
            line-height: 50px;
            font-weight: bold;
            border-radius: 5px;
        }

        .gate-top::after,
        .gate-bottom::after {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 25px;
            height: 4px;
            background-color: #fff;
        }

        .legend {
            width: 30%;
            display: inline-block;
            vertical-align: top;
            margin-left: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .legend-item span {
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 2px solid #000;
            margin-right: 10px;
            border-radius: 5px;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .form-container {
            text-align: center;
            margin-bottom: 30px;
        }

</style>
</head>
<body>
<div class="container">

    <!-- Header -->
    <div class="warehouse-header">
        <h1>{{ $warehouse->name }}</h1>
        <h3>{{ $warehouse->description }}</h3>
        <img src="{{ asset('sourceimg/post/' . $warehouse->img_numb) }}">
    </div>

    <div class="form-container">
        <form>
            <h3>Выберите даты для брони помещения</h3>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <label for="startDate">Дата начала:</label>
                    <input type="date" id="startDate" name="start_date" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="endDate">Дата окончания:</label>
                    <input type="date" id="endDate" name="end_date" class="form-control" required>
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="button" id="filterButton" class="btn btn-primary mt-3">Фильтр по датам</button>
                </div>
            </div>
        </form>
        <form action="{{ route('reserve') }}" method="POST">

            @csrf
            <input type="hidden" name="slots" id="selectedSlots">
            <input type="hidden" name="start_date" id="hiddenStartDate">
            <input type="hidden" name="end_date" id="hiddenEndDate">

            <div class="btn-container">
                <button type="submit" id="bookButton" class="btn btn-success mt-3" disabled>Забронировать</button>
            </div>
        </form>
    </div>

    <div style="display: flex; flex-direction: row; gap: 30px;">

        <!-- Legend -->
        <div class="legend">
            <h4>Легенда:</h4>
            <div class="legend-item">
                <span style="background-color: #e0e0e0;"></span> Свободно
            </div>
            <div class="legend-item">
                <span style="background-color: #dc3545;"></span> Занято
            </div>
            <div class="legend-item">
                <span style="background-color: #27a838ea;"></span> Выбрано
            </div>
            <div class="legend-item">
                <span style="background-color: #007bff;"></span> Бронь
            </div>
            <div class="legend-item">
                <span style="background-color: #ffc107;"></span> Входы
            </div>
        </div>

        <div class="warehouse-container">

            <div class="warehouse-entry"></div>

            @foreach($slots->groupBy('row')->sortKeys() as $row => $slotsInRow)
                @if($row % 2 == 0 && $row > 0)
                    <div class="road"></div>
                @endif

                <div class="warehouse-row">

                    <div class="vertical-road"></div>

                    @foreach($slotsInRow as $slot)
                        <div
                            class="warehouse-slot
                            {{ $slot->status == 'free' ? 'warehouse-free' : (in_array($slot->id, $userBookedSlots)  ? 'warehouse-user' : ($slot->status == 'booked' ? 'warehouse-booked' : 'warehouse-free')) }}"
                            id="slot-{{ $slot->id }}"
                            data-slot-id="{{ $slot->id }}">
                            <span>C-{{ $slot->row }}-{{ $slot->column }}</span>
                            <div class="{{ $row % 2 == 0 ? 'gate-top' : 'gate-bottom' }}"></div>
                        </div>
                    @endforeach

                    <div class="vertical-road"></div>
                </div>
            @endforeach

            <div class="warehouse-entry"></div>

        </div>

    </div>

</div>


<script>
    let selectedSlots = [];
    // Получаем текущую дату в формате YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];

    // Устанавливаем минимальную дату для поля "startDate" и "endDate"
    document.getElementById('startDate').setAttribute('min', today);
    document.getElementById('endDate').setAttribute('min', today);


    document.querySelectorAll('.warehouse-slot').forEach(slot => {
        slot.addEventListener('click', function () {
            // Получаем текущие выбранные даты
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            // Проверка, что слот не забронирован
            if (slot.classList.contains('warehouse-booked')) return; // Забронированные слоты нельзя выбирать

            let slotId = slot.getAttribute('data-slot-id');

            // Изменяем статус слота
            if (slot.classList.contains('warehouse-free')) {
                slot.classList.remove('warehouse-free');
                slot.classList.add('warehouse-selected');
                selectedSlots.push(slotId);
            } else if (slot.classList.contains('warehouse-selected')) {
                slot.classList.remove('warehouse-selected');
                slot.classList.add('warehouse-free');
                selectedSlots = selectedSlots.filter(id => id !== slotId);
            }

            // Обновляем состояние кнопки "Забронировать"
            document.getElementById('bookButton').disabled = selectedSlots.length === 0;
            document.getElementById('selectedSlots').value = selectedSlots.join(',');
        });
    });

    // Обработчик кнопки "Забронировать"
    document.getElementById('bookButton').addEventListener('click', function (e) {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        // Проверка, что выбраны обе даты
        if (!startDate || !endDate) {
            e.preventDefault(); // Предотвращаем отправку формы
            alert('Пожалуйста, выберите даты перед бронированием!');
            return;
        }

        // Если даты выбраны, скрытые поля с датами обновляются
        document.getElementById('hiddenStartDate').value = startDate;
        document.getElementById('hiddenEndDate').value = endDate;

        // Далее можно продолжить обработку формы (например, отправить данные на сервер)
        console.log("Слоты для бронирования:", selectedSlots);
        console.log("Дата начала:", startDate);
        console.log("Дата окончания:", endDate);
    });

    document.getElementById('filterButton').addEventListener('click', function () {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        if (!startDate || !endDate) {
            alert('Пожалуйста, выберите даты!');
            return;
        }

        fetch('{{ route('filter-slots') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ start_date: startDate, end_date: endDate })
        })
            .then(response => response.json())
            .then(data => updateSlots(data))
            .catch(error => console.error('Ошибка:', error));
    });

    function updateSlots(slots) {
        document.querySelectorAll('.warehouse-slot').forEach(slot => {
            const slotId = slot.getAttribute('data-slot-id');
            const updatedSlot = slots.find(s => s.id == slotId);

            if (updatedSlot) {
                slot.classList.remove('warehouse-free', 'warehouse-booked', 'warehouse-selected');

                if (updatedSlot.status === 'booked') {
                    slot.classList.add('warehouse-booked');
                } else {
                    slot.classList.add('warehouse-free');
                }
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
