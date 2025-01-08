@php use App\Models\Warehouse; @endphp
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
      <li class="active"><a href="{{route('tenet_dashboard_view')}}"><i class="fa fa-database"></i> Склады</a></li>
      <li><a href="{{route('tenet_safety_select_view')}}"><i class="fa fa-user-secret"></i> Безопасность</a></li>
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
<div class="content">
    <div class="content" style="background-color: rgba(99, 211, 113, 0.92);">
        <form id="filterForm" class="mb-4" >
            <div class="row justify-content-center" >
                <div class="col-md-4">
                    <label for="city" class="form-label">Выберите нужный вам город</label>
                    <select id="city" class="form-select">
                        <option value="">Все города</option>
                        @foreach(\App\Models\Warehouse::select('city')->distinct()->get() as $city)
                            <option value="{{ $city->city }}" {{ request('city') == $city->city ? 'selected' : '' }}>
                                {{ $city->city }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="button" class="btn btn-primary mt-4" id="applyFilter" hidden>Применить фильтр</button>
                </div>
            </div>
        </form>
        <div class="content-header" style="background-color: rgba(99, 211, 113, 0.92)">
            <section class="page-section categories-page">
                <div class="container">
                    <div class="row" id="warehousesContainer">
                        @foreach(\App\Models\Warehouse::all() as $postdata)
                            <div class="col-lg-4 col-md-6 warehouse-item" data-city="{{ $postdata->city }}">
                                <div class="feature-item border border-secondary rounded shadow-sm">
                                    <div class="feature-pic set-bg" style="background-image: url('{{ asset('sourceimg/post/' . $postdata->img_numb) }}');"></div>
                                    <div class="feature-text">
                                        <div class="room-info-warp" style="background-color: #FFFFFF">
                                            <div class="room-info">
                                                <div class="rf-left">
                                                    <p><i class="fa fa-th-large"></i>{{ $postdata->name }}</p>
                                                    <p><i class="fa fa-compass"></i>{{ $postdata->address }}</p>
                                                    <p><i class="fa fa-arrow-circle-o-up"></i>{{ $postdata->size }}</p>
                                                </div>
                                            </div>
                                            <div class="room-info">
                                                <div class="rf-left">
                                                    <p><i class="fa fa-map-marker"></i>{{ $postdata->city }}</p>
                                                </div>
                                                <div class="rf-right">
                                                    <p><i class="fa fa-clock-o"></i> {{ $postdata->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm w-100 mt-3 mb-3"
                                                    onclick="window.location.href='{{ route('district.warehouses', $postdata->id) }}'">
                                                Подробнее
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
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
