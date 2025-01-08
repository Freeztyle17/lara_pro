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
  <div id="sidebar-nav">
    <div class="col-md-12" style="margin-top:30px; padding-bottom:30px;">
    <div class="profileimg">
{{--      <img  title="Profile Image" style="    width: 120px; height:100px; margin-bottom: 20px; margin-left:22px;" src="{{asset('profile')}}/{{Illuminate\Support\Facades\Auth::user()->profile_img}}" alt="">--}}
      <a href="#" id="profile" style="padding-left: 40px;">Profile img</a>    <br>
      <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->last_name}}</span>
      </div>
    </div>
    <ul>
      <li class="active"><a href="{{route('tenet_dashboard_view')}}"><i class="fa fa-dashboard"></i> Склады</a></li>
      <li><a href="{{route('tenet_dashboard_view')}}"><i class="fa fa-database"></i> Безопасность</a></li>
      <li><a href="{{route('tenet_transport_view')}}"><i class="fa fa-dashboard"></i> Транспортировка</a></li>
      <li><a href="{{route('tenet_dashboard_view')}}"><i class="fa fa-dashboard"></i> Мои услуги</a></li>
      <li><a href="{{route('tenet_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
{{--      <li><a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}})}}"><i class="fa fa-comments"></i> Conversation</a></li>--}}
      <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
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
             $shown = false;
             $total_messages = 0;
             $user_data = array();
             $time = array();
             $ids = array();
             $i = 0;
        @endphp
{{--            <a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}}"><div title="Masseges" class="font-icon"><i class="fa fa-envelope-o"></i><span style="float: left; margin-right: 5px; margin-top: 5px;" class="badge badge-light">{{$total_messages}}</span></div></a>--}}
          </li>
          <li class="nav-calendar">
            <a href="#"><div title="Your Post" class="font-icon"><i class="fa fa-calendar"></i><span style="float: left; margin-right: 5px; margin-top: 6px;" class="badge badge-light">{{\App\AdvisorPost::all()->count()}}</span></div></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
<div class="content">
<div class="content">
  <div class="content-header" style="background-color: rgba(99, 211, 113, 0.92)">
  <section class="page-section categories-page">
  <div class="filter-section">
    <form action="{{ route('warehouses.index') }}" method="GET">
        <div class="form-group">
            <label for="city">Выберите город</label>
            <select name="city" id="city" class="form-control">
                <option value="">Все города</option>
                @foreach(\App\Models\Warehouse::distinct()->pluck('city') as $city)
                    <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Фильтровать</button>
    </form>
  </div>
  <div class="container">
    <div class="row">
        @foreach($warehouses as $postdata)
            <div class="col-lg-4 col-md-6">
                <div class="feature-item border border-secondary rounded shadow-sm">
                    <div class="feature-pic set-bg" style="background-image: url('{{ asset('sourceimg/post/' . $postdata->img_numb) }}');">
                    </div>
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
	<!-- page end -->
  </div>
</div>
</div>



</body>
</html>
