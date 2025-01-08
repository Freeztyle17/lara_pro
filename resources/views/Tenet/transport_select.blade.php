<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online House Rental</title>
    <!-- Stylesheets -->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <style>
        html, body {
            font-family: 'Open Sans', sans-serif;
            height: 100%;
        }

        body {
            background: rgba(99, 211, 113, 0.92);
            height: 100%;
        }

        .rate-card {
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .rate-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .rate-card.selected {
            background-color: #007bff;  /* Фон карточки при выборе */
        }

        .rate-card.selected .card-body {
            background-color: #0056b3;  /* Темный фон для текста */

        }

        .rate-card.selected .card-title {
            font-weight: bold;
            color: white;
        }

        .rate-card.selected .card-text {
            font-style: italic;
            color: white;
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
            <li><a href="{{route('tenet_safety_select_view')}}"><i class="fa fa-user-secret"></i> Безопасность</a></li>
            <li class="active"><a href="{{route('tenet_transport_view')}}"><i class="fa fa-truck"></i> Транспортировка</a></li>
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
    <div class="content">
        <div class="container mt-5">
            <h2 class="mb-4">Выбор тарифа транспортировки</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('transport.ship') }}" method="POST">
                @csrf
                <!-- Выбор слота -->
                <div class="mb-3">
                    <label for="slot" class="form-label">Выберите слот для транспортировки:</label>
                    <select class="form-select" id="slot" name="slot_id" required>
                        <option value="">-- Выберите слот --</option>
                        @foreach($userBookedSlots as $booking)
                            <!-- Здесь передаем только ID слота -->
                            <option value="{{ $booking->slot->id }}">
                                Слот: C-{{ $booking->slot->row }}-{{ $booking->slot->column }} Склад: {{ $booking->slot->warehouse->name }} {{$booking->slot->warehouse->city}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Адрес назначения -->
                <div class="mb-3">
                    <label for="destination" class="form-label">Адрес назначения:</label>
                    <input type="text" class="form-control" id="destination" name="destination" placeholder="Введите адрес" required>
                </div>

                <!-- Выбор тарифа -->
                <div class="mb-3">
                    <label class="form-label">Выберите тариф:</label>
                    <div class="row">
                        <!-- Карточка для тарифа по городу -->
                        <div class="col-md-4 mb-3">
                            <div class="card rate-card" id="cardCity">
                                <img src="sourceimg/maps/gorod.jpg" class="card-img-top" alt="По городу" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">По городу</h5>
                                    <p class="card-text">Тариф для перемещения внутри города. Стоимость: 1000 ₽</p>
                                    <input class="form-check-input" type="radio" name="rate_type" id="rateCity" value="city" style="display: none;" required>
                                </div>
                            </div>
                        </div>

                        <!-- Карточка для тарифа по области -->
                        <div class="col-md-4 mb-3">
                            <div class="card rate-card" id="cardRegion">
                                <img src="sourceimg/maps/oblast.jpg" class="card-img-top" alt="По области" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">По области</h5>
                                    <p class="card-text">Тариф для перемещения по области. Стоимость: 5000 ₽</p>
                                    <input class="form-check-input" type="radio" name="rate_type" id="rateRegion" value="region" style="display: none;">
                                </div>
                            </div>
                        </div>

                        <!-- Карточка для тарифа по стране -->
                        <div class="col-md-4 mb-3">
                            <div class="card rate-card" id="cardCountry">
                                <img src="sourceimg/maps/strana.jpg" class="card-img-top" alt="По стране" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">По стране</h5>
                                    <p class="card-text">Тариф для перемещения по всей стране. Стоимость: 15000 ₽</p>
                                    <input class="form-check-input" type="radio" name="rate_type" id="rateCountry" value="country" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100">Оформить транспортировку</button>
            </form>
    </div>

<!-- Подключение Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Обработчик изменения значения в select для установки значения в скрытое поле
    document.getElementById('slot').addEventListener('change', function() {
        // Устанавливаем ID выбранного слота в скрытое поле
        var selectedSlotId = this.value;
        document.getElementById('slot_id').value = selectedSlotId;
    });

    $(document).ready(function(){
        // Когда пользователь кликает на карточку, радиокнопка становится выбранной
        $(".rate-card").click(function(){
            // Убираем класс "selected" с всех карточек
            $(".rate-card").removeClass("selected");

            // Добавляем класс "selected" для выбранной карточки
            $(this).addClass("selected");

            // Получаем id выбранной карточки
            var cardId = $(this).attr("id");

            // Ищем радиокнопку внутри выбранной карточки и выбираем её
            var radioButton = $("#" + cardId + " input[type=radio]");
            radioButton.prop("checked", true);
        });
    });
</script>
</body>
</html>
