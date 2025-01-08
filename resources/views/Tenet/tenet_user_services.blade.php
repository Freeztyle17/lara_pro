@php use App\Booking;use App\Models\Warehouse; @endphp
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
    </style>

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
            <li><a href="{{route('tenet_transport_view')}}"><i class="fa fa-truck"></i> Транспортировка</a></li>
            <li class="active"><a href="{{route('tenet_user_services_view')}}"><i class="fa fa-home"></i> Мои услуги</a></li>
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
            <div class="nav">
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
    <div class="container">
        <h1>Мои склады</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Склад</th>
                    <th>Слот</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Адрес склада</th>
                    <th>Город</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userBookings as $booking)
                    <tr>
                        <td>{{ $booking->warehouse->name }}</td>
                        <td>C-{{ $booking->slot->row }}-{{ $booking->slot->column }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->warehouse->address }}</td>
                        <td>{{ $booking->warehouse->city }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $userBookings->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButton = document.getElementById('applyFilter');
            const cityFilter = document.getElementById('city');
            const warehousesContainer = document.getElementById('warehousesContainer');

            // Функция для фильтрации складов
            function filterWarehouses() {
                const selectedCity = cityFilter.value.toLowerCase(); // получаем выбранный город
                const warehouseItems = warehousesContainer.querySelectorAll('.warehouse-item');

                warehouseItems.forEach(item => {
                    const itemCity = item.getAttribute('data-city').toLowerCase(); // получаем город из атрибута
                    if (selectedCity === "" || itemCity === selectedCity) {
                        item.style.display = ''; // Показываем элемент
                    } else {
                        item.style.display = 'none'; // Прячем элемент
                    }
                });
            }

            // Событие при нажатии на кнопку фильтра
            filterButton.addEventListener('click', filterWarehouses);

            // Также применяем фильтрацию при изменении значения в select
            cityFilter.addEventListener('change', filterWarehouses);
        });
    </script>

</body>
</html>

