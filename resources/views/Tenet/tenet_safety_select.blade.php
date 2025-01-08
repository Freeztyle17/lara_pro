@php use App\Models\Warehouse; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Безопасность</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .safe-card {
    cursor: pointer;
    border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .safe-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .safe-card.selected {
    background-color: #28a745; /* Зеленый фон */
            color: white;
        }

        .safe-card.selected .card-body {
    background-color: #1e7e34;
        }

        .safe-card.selected .card-title {
    font-weight: bold;
        }

        .safe-card.selected .card-text {
    font-style: italic;
        }

        .slot-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            border: 5px solid #333;
            border-radius: 10px;
            width: 400px;
            height: 500px;
            margin: 20px auto;
            background-color: #f5f5f5;
            position: relative;
        }

        .slot-wall {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
            background-color: #ccc;
            font-weight: bold;
            text-align: center;
            width: 100%; /* Растягиваем на всю ширину */
            box-sizing: border-box; /* Учитываем padding внутри ширины */
            border-bottom: 4px solid #333;
            position: relative;
        }

        .slot-wall.bottom {
            position: relative;
            height: 60px;
        }

        .slot-wall.bottom::before {
            content: "Вход";
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100%;
            background-color: #f5f5f5;
            border: none;
            z-index: 1;
        }

        .slot-position-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            flex-grow: 1;
            padding: 10px;
        }

        .position-row {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .position-col {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .position-btn-ver {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 125px;
            margin: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            background-color: #fff;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .position-btn-ver:hover {
            background-color: #e0e0e0;
        }

        .position-btn-hor.selected,
        .position-btn-ver.selected {
            background-color: #28a745; /* Синий фон для выделения */
            color: #fff; /* Белый текст */
            border-color: rgba(22, 103, 32, 0.92); /* Тёмно-синий контур */
        }

        .position-btn-hor {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 130px;
            height: 50px;
            margin: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            background-color: #fff;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .position-btn-hor:hover {
            background-color: #e0e0e0;
        }

        .slot-wall-label {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
        }

    </style>

</head>
<body>
<section id="sidebar">
    <div class="white-label" style="background-color: black;">
    </div>
    <div id="sidebar-nav" style="background-color: black;">
        <div class="col-md-12" style="margin-top:30px; padding-bottom:30px;">
            <div class="profileimg">
                <img  title="Profile Image" style="    width: 120px; height:100px; margin-bottom: 20px; margin-left:22px;" src="sourceimg/profile/man.jpg" alt="">
                <br>
                <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->first_name}}</span>
                <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->last_name}}</span>
            </div>
        </div>
        <ul>
            <li><a href="{{route('tenet_dashboard_view')}}"><i class="fa fa-database"></i> Склады</a></li>
            <li class="active"><a href="{{route('tenet_safety_select_view')}}"><i class="fa fa-user-secret"></i> Безопасность</a></li>
            <li><a href="{{route('tenet_transport_view')}}"><i class="fa fa-truck"></i> Транспортировка</a></li>
            <li><a href="{{route('tenet_user_services_view')}}"><i class="fa fa-home"></i> Мои услуги</a></li>
            <li><a href="{{route('tenet_profile')}}"><i class="fa fa-user"></i> Профиль</a></li>
            {{--      <li><a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}})}}"><i class="fa fa-comments"></i> Conversation</a></li>--}}
            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Выйти</a></li>
        </ul>
    </div>
</section>
<section id="content">
    <div id="header">
        <div class="header-nav" style="background-color: black;">
            <div class="menu-button">
                <!-- <i class="fa fa-navicon"></i> -->
            </div>
            <div class="nav" >
                <ul >
                    <li class="nav-mail">
                        @php
                            $u = Illuminate\Support\Facades\Auth::user();
                            $count = App\Booking::all()->where('status','=','pending')->where('user_id','=',$u->getAuthIdentifier())->count();
                        @endphp
                        {{--            <a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}}"><div title="Masseges" class="font-icon"><i class="fa fa-envelope-o"></i><span style="float: left; margin-right: 5px; margin-top: 5px;" class="badge badge-light">{{$total_messages}}</span></div></a>--}}
                    </li>
                    <li class="nav-calendar">
                        <a href="#"><div title="Ваши заявки на проверке" class="font-icon"><i class="fa fa-calendar"></i><span style="float: left; margin-right: 5px; margin-top: 6px;" class="badge badge-light">{{$count}}</span></div></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Выбор сейфа</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('save_safety_select') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Выбор слота -->
                <div class="mb-3">
                    <label for="slot" class="form-label">Выберите слот:</label>
                    <select id="slot" name="slot_id" class="form-select" required onchange="showSlotMap(this.value)">
                        <option value="">-- Выберите слот --</option>
                        @foreach($userBookedSlots as $booking)
                            <!-- Здесь передаем только ID слота -->
                            <option value="{{ $booking->slot->id }}">
                                Слот: C-{{ $booking->slot->row }}-{{ $booking->slot->column }} Склад: {{ $booking->slot->warehouse->name }} {{$booking->slot->warehouse->city}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="slot-changer justify-content-center" id="slotSchema" style="display: none;">
                    <div class="slot-container">
                        <!-- Верхняя стена -->
                        <div class="slot-wall">Задняя стена</div>
                        <div class="position-col justify-content-center">
                            <div class="position-btn-hor" data-position="left-top"></div>
                            <br>
                            <div class="position-btn-hor" data-position="left-bottom"></div>
                        </div>
                        <!-- Позиции внутри слота -->
                        <div class="slot-position-container">

                            <!-- Левая стенка -->
                            <div class="position-row">
                                <div class="slot-wall-label"></div>
                                <div class="position-btn-ver" data-position="left-top"></div>
                                <div class="position-btn-ver" data-position="left-bottom"></div>
                            </div>

                            <!-- Правая стенка -->
                            <div class="position-row">
                                <div class="slot-wall-label"></div>
                                <div class="position-btn-ver" data-position="right-top"></div>
                                <div class="position-btn-ver" data-position="right-bottom"></div>
                            </div>
                        </div>

                        <!-- Нижняя стена (вход) -->
                        <div class="slot-wall bottom">Вход</div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="confirmRandomSlot" name="confirm_random_slot" required>
                        <label class="form-check-label" for="confirmRandomSlot">
                            Я подтверждаю, что в случае отсутствия свободного места в указанном слоте, будет выбрано произвольное свободное место.
                        </label>
                    </div>
                </div>

                <input type="hidden" id="selectedPosition" name="position">

                <div class="row">

                    <!-- Карточка для малого сейфа -->
                    <div class="col-md-4 mb-3">
                        <div class="card safe-card" id="safeSmall">
                            <img src="sourceimg/safes/small.jpg" class="card-img-top" alt="Малый сейф">
                            <div class="card-body">
                                <h5 class="card-title">Малый сейф</h5>
                                <p class="card-text">Идеально подходит для хранения небольших предметов. Цена: 5000 ₽</p>
                                <input type="radio" name="safe_type" value="small" class="form-check-input" style="display: none;" required>
                            </div>
                        </div>
                    </div>

                    <!-- Карточка для среднего сейфа -->
                    <div class="col-md-4 mb-3">
                        <div class="card safe-card" id="safeMedium">
                            <img src="sourceimg/safes/medium.jpg" class="card-img-top" alt="Средний сейф">
                            <div class="card-body">
                                <h5 class="card-title">Средний сейф</h5>
                                <p class="card-text">Универсальное решение для большинства нужд. Цена: 10000 ₽</p>
                                <input type="radio" name="safe_type" value="medium" class="form-check-input" style="display: none;">
                            </div>
                        </div>
                    </div>

                    <!-- Карточка для большого сейфа -->
                    <div class="col-md-4 mb-3">
                        <div class="card safe-card" id="safeLarge">
                            <img src="sourceimg/safes/big.jpg" class="card-img-top" alt="Большой сейф">
                            <div class="card-body">
                                <h5 class="card-title">Большой сейф</h5>
                                <p class="card-text">Максимальная защита и вместимость. Цена: 20000 ₽</p>
                                <input type="radio" name="safe_type" value="large" class="form-check-input" style="display: none;">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <button type="submit" id="submitButton" class="btn btn-success w-100 mt-3" disabled>Оформить выбор</button>
        </form>
    </div>
</section>

<script>
    $(document).ready(function(){
        // Когда пользователь кликает на карточку, выбирается сейф
        $(".safe-card").click(function(){
            $(".safe-card").removeClass("selected");
            $(this).addClass("selected");
            $(this).find("input[type=radio]").prop("checked", true);
        });
    });

    function showSlotMap(slotId) {
        if (slotId) {
            document.getElementById('slotSchema').style.display = 'block';
        } else {
            document.getElementById('slotSchema').style.display = 'none';
        }

        // Очистить позицию
        document.getElementById('position').value = '';
        document.querySelectorAll('.position-btn').forEach(btn => {
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-secondary');
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Слоты
        const slotButtons = document.querySelectorAll('.position-btn-hor, .position-btn-ver');
        const selectedPositionInput = document.getElementById('selectedPosition');
        const confirmCheckbox = document.getElementById('confirmRandomSlot');
        const submitButton = document.getElementById('submitButton');

        // Обновляем состояние кнопки при изменении чекбокса
        confirmCheckbox.addEventListener('change', function () {
            submitButton.disabled = !this.checked; // Включить, если галочка установлена
        });

        // Убираем активный класс у всех кнопок и назначаем его на выбранную
        slotButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Убираем выделение у всех
                slotButtons.forEach(btn => btn.classList.remove('selected'));

                // Выделяем текущую
                this.classList.add('selected');

                // Сохраняем позицию
                selectedPositionInput.value = this.dataset.position;
            });
        });

        // Отображение схемы при выборе слота
        document.getElementById('slot').addEventListener('change', function () {
            const slotSchema = document.getElementById('slotSchema');
            if (this.value) {
                slotSchema.style.display = 'block';
            } else {
                slotSchema.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>

