<!DOCTYPE html>
<html lang="en">
<head>
	<title>House Rental System</title>
	<meta charset="UTF-8">
	<meta name="description" content="WWL Landing Page Template">
	<meta name="keywords" content="WWL, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/icon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

<!-- Header section -->
<header class="header-section">
		<div class="header-top" style="background-color: green;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
                            +7 (917) 123-45-67 (Александр)
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
                            WorldWarehouseLeader@mail.ru
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
                            <a href=""><i class="fa fa-vk"></i></a>
                            <a href=""><i class="fa fa-telegram"></i></a>
                            <a href=""><i class="fa fa-odnoklassniki"></i></a>

                            <a href=""><i class="fa fa-whatsapp"></i></a>
						</div>
						<div class="user-panel">
							<a href="#" id="registerbutton"><i class="fa fa-user-circle-o"></i> Регистрация</a>
							<a href="#" id="logbutton"><i class="fa fa-sign-in"></i> Вход</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img style="margin-top: -40px; opacity: 70%;" src="img/logo.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
                            <li><a href="{{route('index')}}">Главная</a></li>
                            <li><a href="{{route('about')}}">О Нас</a></li>
                            <li><a href="{{route('postpage')}}">Склады</a></li>
                            <li><a href="{{route('blog')}}">Новости</a></li>
                            <li><a href="{{route('contact')}}">Контакты</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/bg.jpg">
		<div class="container text-white">
			<h2>Контактная информация</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="{{route('index')}}"><i class="fa fa-home"></i>Главная</a>
			<span><i class="fa fa-angle-right"></i>Контакты</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">
			<div id="map-canvas">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A603b80c230edf5e10a00ed1f7cdf3974bb2a88fcb3d0628f05bd5c8da5550ca4&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
            </div>
			<div class="contact-info-warp">
				<p><i class="fa fa-map-marker"></i>Россия, г. Саратов, БЦ "Ковчег", Ул. Вавилова 38</p>
				<p><i class="fa fa-envelope"></i>WorldWarehouseLeader@mail.ru</p>
				<p><i class="fa fa-phone"></i>+7 (917) 123-45-67 (Александр)</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<img src="img/contact.jpg" alt="">
				</div>
				<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Свяжитесь с нами</h3>
							<p>Если у вас возникли какие-нибудь вопросы, можете задать их по почте или телефону!</p>
						</div>
						<form class="contact-form">
							<div class="row">
								<div class="col-md-6">
									<input type="text" placeholder="Ваше имя">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Ваш email">
								</div>
								<div class="col-md-12">
									<textarea  placeholder="Ваше сообщение"></textarea>
									<button class="site-btn">Отправить</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- page end -->


	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel" style="background-color: blue">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->


<!-- Footer section -->
    <footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-widget">
                    <img src="img/logo.png" alt="">
                    <p>Обычно фиксированный периодический возврат, осуществляемый арендатором или занимающим его лицом
                        имущества владельцу за владение и пользование им, в частности: согласованная сумма,
                        выплачиваемая арендатором арендодателю через определенные промежутки времени</p>
                    <div class="social">
                        <a href=""><i class="fa fa-vk"></i></a>
                        <a href=""><i class="fa fa-telegram"></i></a>
                        <a href=""><i class="fa fa-odnoklassniki"></i></a>
                        <a href=""><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-widget">
                    <div class="contact-widget">
                        <h5 class="fw-title">СВЯЖИТЕСЬ С НАМИ</h5>
                        <p><i class="fa fa-map-marker"></i>Россия, г. Саратов, БЦ "Ковчег", Ул. Вавилова 38</p>
                        <p><i class="fa fa-envelope"></i>WorldWarehouseLeader@mail.ru</p>
                        <p><i class="fa fa-phone"></i>+7 (917) 123-45-67 (Александр)</p>
                        <p><i class="fa fa-clock-o"></i>Понедельник - Пятница, 09:00 - 18:00</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-widget">
                    <div class="double-menu-widget">
                        <h5 class="fw-title">ГОРОДА С НАМИ</h5>
                        <ul>
                            <li><a href="">Саратов</a></li>
                            <li><a href="">Волгоград</a></li>
                            <li><a href="">Москва</a></li>
                            <li><a href="">Пенза</a></li>
                        </ul>

                    </div>
                </div>

            </div>
            <div class="footer-bottom">
                <div class="footer-nav">
                    <ul>
                        <li><a href="{{route('index')}}">Главная</a></li>
                        <li><a href="{{route('blog')}}">О Нас</a></li>
                        <li><a href="{{route('postpage')}}">Склады</a></li>
                        <li><a href="{{route('blog')}}">Блог</a></li>
                        <li><a href="{{route('contact')}}">Контакты</a></li>
                    </ul>
                </div>
                <span style="color:white">Арендация складских хранилищ. Все права защищены.</span>
            </div>
        </div>
    </footer>
	<!-- Footer section end -->

<!-- Modal for Button-->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <div class="modal-content card card-image" style="background-image: url('img/login.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Регистрация</strong> </h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Закрыть">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->

          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <a href="{{route('signupadvisor')}} "><button type="button" class="btn btn-success btn-block btn-rounded z-depth-1">Юридическое лицо</button></a>
            </div>
            <!--Grid column-->
          </div>
		  <!--Grid row-->
		    <!--Grid row-->
			<div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <a href="{{route('signuptenet')}} "><button type="button" class="btn btn-success btn-block btn-rounded z-depth-1">Физическое лицо</button></a>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-md-12">
              <p  class="font-small white-text d-flex justify-content-end">Если аккаунт? <a href="#" id="loginform" class="green-text ml-1 font-weight-bold">
                  Войти</a></p>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->

        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal for Button -->
<!-- Modal Login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
	<!--Content-->
	@if(Session::has('msg'))
			<span style="background-color:black; padding:10px; color:white; font-weight:bold; border-radius=10px;">{{Session('msg')}}</span>
	@endif
    <div class="modal-content card card-image" style="background-image: url('img/login.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Войти</strong> </h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Закрыть">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
		  <form action="{{route('login')}}" method="post" autocomplete="off">
		  @csrf
		@if ($errors->any())
			<div class="alert alert-danger alert-dismissable">
				<a class="panel-close close" data-dismiss="alert">×</a>
				@foreach ($errors->all() as $error)
					<div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
					<br />
				@endforeach
			</div>
		@endif
          <div class="md-form mb-5">
            <input type="email" name="email" id="Form-email5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-email5">Ваш email</label>
          </div>
          <div class="md-form pb-3">
            <input type="password" name="pass"  id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Ваш пароль</label>
          </div>
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1">Войти</button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
		  </form>
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-md-12">
              <p  class="font-small white-text d-flex justify-content-end">Нет аккаунта? <a href="#" id="createsignup" class="green-text ml-1 font-weight-bold">
                  Зарегистрироваться</a></p>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal for signin-->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	<!-- load for map -->

{{--	<script src="js/map.js"></script>--}}


	<script>
		$('#registerbutton').on('click', function() {
    //  alert("hello");
     $('#register').modal('show');
 });
 $('#logbutton').on('click', function() {
    //  alert("hello");
     $('#login').modal('show');
 });
 $('#createsignup').on('click', function() {
	//  alert("hello");
	$('#login').modal('hide');
     $('#register').modal('show');
 });
 $('#loginform').on('click', function() {
	//  alert("hello");
	$('#register').modal('hide');
     $('#login').modal('show');
 });
	</script>

</body>
</html>
