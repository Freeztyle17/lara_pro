<!DOCTYPE html>
<html lang="en">
<head>
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
            background: #FFFFFF;
            height: 100%;
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
                <img  title="Profile Image" style="    width: 120px; height:100px; margin-bottom: 20px; margin-left:22px;" src={{asset('sourceimg/profile/admin.jpg')}} alt="">
                <br>
                <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->adminrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->adminrelation->last_name}}</span>
            </div>
        </div>
        <ul>
            <li><a href="{{route('admin_dashboard')}}"><i class="fa fa-dashboard"></i>Краткая информация</a></li>
            <li><a href="{{route('tenet_info')}}"><i class="fa fa-info"></i> Все брони</a></li>
            {{--      <li><a href="{{route('advisor_info')}}"><i class="fa fa-info"></i> Advisor Info</a></li>--}}
            <li  class="active"><a href="{{route('advisor_upgrade')}}"><i class="fa fa-bookmark"></i> Работа с бронями </a></li>
            <li><a href="{{route('admin_profile')}}"><i class="fa fa-user"></i> Профиль</a></li>
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
                <ul>
                    <li class="nav-settings">
                        @php
                            $count = App\Booking::all()->where('status','=','pending')->count();
                        @endphp
                        <a href="{{route('advisor_upgrade')}}">
                            <div title="Notification" class="font-icon"><i class="fa fa-bell-o"
                                                                           aria-hidden="true"></i><span
                                    style="float: left; margin-right: 5px; margin-top: 3px;"
                                    class="badge badge-light">{{$count}}</span></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Начало</th>
                <th scope="col">Конец</th>
                <th scope="col">ФИО</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Телефон</th>
                <th scope="col">Склад</th>
{{--      todo          Перевод получше--}}
                <th scope="col">Строка и Колонка</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @php
                $counter = $bookings->firstItem() - 1;
            @endphp
            @foreach($bookings as $booking)
                <tr>
                    <th scope="row">{{ ++$counter }}</th>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->user->email }}</td>
                    @if($booking->user->urrelation != null)
                        <td>{{ $booking->user->urrelation->phone }}</td>
                    @elseif($booking->user->tenatrelation != null)
                        <td>{{ $booking->user->tenatrelation->phone }}</td>
                    @else
                        <td>{{ "Не указан" }}</td>
                    @endif
                    <td>{{ $booking->slot->warehouse->name . ' ' . $booking->slot->warehouse->city }}</td>
                    <td>{{ $booking->slot->row . '/' . $booking->slot->column }}</td>
                    <td>
                        <form action="{{ route('advisor_upgrade_id', $booking->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control" id="status-select-{{$booking->id}}" data-id="{{$booking->id}}">
                                <option value="">Выберите статус</option>
                                <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2" id="status-button-{{$booking->id}}" disabled>
                                Изменить статус
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Пагинация -->
        <div class="d-flex justify-content-center">
            {{ $bookings->links() }}
        </div>
    </div>

    <!--====== Javascripts & Jquery ======-->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- smodel script -->
    <script>
        document.querySelectorAll('select[name="status"]').forEach(select => {
            select.addEventListener('change', function() {
                const bookingId = this.getAttribute('data-id'); // Получаем ID бронирования из data-id
                const button = document.getElementById('status-button-' + bookingId); // Находим кнопку по ID
                button.disabled = this.value === '';  // Если статус не выбран, кнопка отключена
            });
        });
    </script>

</body>

</html>
