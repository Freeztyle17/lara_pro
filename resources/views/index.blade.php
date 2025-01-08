<!DOCTYPE html>
<html lang="en">
<head>
<title>World Warehouse Leader</title>
	<meta charset="UTF-8">
	<meta name="description" content="WWL Landing Page Template">
	<meta name="keywords" content="WWL, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="img/icon.ico" rel="shortcut icon"/>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>


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
							<a href="#" id="registerbutton"><i class="fa fa-user-circle-o"></i>Регистрация</a>
							<a href="#" id="logbutton"><i class="fa fa-sign-in"></i>Вход</a>
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


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container hero-text text-white">
			<h2>Необходимо хорошее хранилище? Мы поможем!</h2>
			<p>Арендуйте складские помещения в вашем городе при посреднечестве WorldWarehouseLeader.ru®.
                <br>Подберите нужное вам хранилище на нашем сайте!.</p>
			<a href="{{route('postpage')}}" class="site-btn text-white">Хранилища</a>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Filter form section -->
	<div class="filter-search" style="background-color: blue">
		<div class="container" style="background-color: black">
			<form class="filter-form" action="{{route('search_property')}}" method="post">
			@csrf
{{--				<input style="width:29%;" type="text" name="rent" placeholder="">--}}
                <select style="width:35%" name="type">
                    <option value="">Тип услуги</option>
                    <option value="Quartal">Квартал</option>
                    <option value="Zone">Зона</option>
                    <option value="Warehouse">Хранилище</option>
                    <option value="Slot">Ячейки</option>
                </select>
{{--				<input style="width:29%;" type="text" name="c_name" placeholder="Город">--}}
                <select style="width:35%" name="city">
                    <option value="">Город</option>
                    <option value="Moscow">Москва</option>
                    <option value="Saratov">Саратов</option>
                    <option value="Volgograd">Волгоград</option>
                    <option value="Penza">Пенза</option>
                </select>
{{--				<select name="state">--}}
{{--				<option value="">-</option>--}}
{{--					<option value="Punjab">Kabankalan</option>--}}
{{--					<option value="Sindh">Bacolod</option>--}}
{{--					<option value="Kpk">Binalbagan</option>--}}
{{--					<option value="Blochistan">Hinigaran</option>--}}
{{--				</select>--}}
				<button type="submit" class="site-btn fs-submit">ПОИСК</button>
			</form>
		</div>
	</div>
	<!-- Filter form section end -->

	<!-- feature category section -->
	<section class="feature-category-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Необходимая площадь</h3>
				<p>Какой тип площади вам необходим? Выбирайте из списка ниже!</p>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/1.jpg" alt="">
					<h5>Складские кварталы</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/2.jpg" alt="">
					<h5>Складские зоны</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/3.jpg" alt="">
					<h5>Хранилища</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/4.jpg" alt="">
					<h5>Ячейки</h5>
				</div>
			</div>
		</div>
	</section>
	<!-- feature category section end-->

	<!-- Services section -->
	<section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="img/service.jpg" alt="">
				</div>
				<div class="col-lg-5 offset-lg-1 pl-lg-0">
					<div class="section-title text-white">
						<h3>НАШИ УСЛУГИ</h3>
						<p>Мы предоставляем следующие качественные услуги:</p>
					</div>
					<div class="services">
						<div class="service-item">
							<i class="fa fa-car"></i>
							<div class="service-text">
								<h5>Логистические услуги</h5>
								<p>Услуги по упаковке, сортировке и распределению товаров, обеспечивая эффективную
                                    доставку и обработку товаров для клиентов. Решение вопросов, связаных с
                                    оптимизацией рабочих процессов и проектов компании и дают представление о том, как
                                    сделать работу лучше.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-database"></i>
							<div class="service-text">
								<h5>Услуги по хранению и консолидации товаров</h5>
								<p>
                                    Услуги хранения товаров на складе, включая
                                    консолидацию, подготовку заказов и инвентаризацию. Это может быть полезно для
                                    бизнеса, которым нужно организовать хранение и управление запасами.
                                    Также предоставляются услуги по регулярной инвентаризации, отслеживанию сроков
                                    годности товаров, поддержанию оптимальных уровней запасов и автоматизации процессов
                                    управления складом. Это помогает бизнесам контролировать запасы,
                                    предотвращать излишки или нехватку товаров и упрощает процессы выполнения заказов.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-lock"></i>
							<div class="service-text">
								<h5>Безопасность</h5>
								<p> услуги по обеспечению безопасности объектов. Это включает установку систем
                                    видеонаблюдения, охрану территории, системы контроля доступа и сигнализации, а также
                                    соблюдение стандартов безопасности для защиты товаров от краж, повреждений или утрат.
                                    В некоторых случаях арендаторы могут обеспечить круглосуточное присутствие охраны или
                                    даже внедрить системы мониторинга с использованием современных технологий (например,
                                    датчиков движения или беспилотных летательных аппаратов для контроля на больших
                                    складах). </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->

	<!-- Gallery section -->
	<section class="gallery-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Города где мы работаем</h3>
				<p>В будущем планируем появиться и в других городах! Следите за нашими новостями в соцсетях!</p>
			</div>
			<div class="gallery">
				<div class="grid-sizer"></div>
				<a href="#" class="gallery-item grid-long set-bg" data-setbg="img/gallery/1.jpg">
					<div class="gi-info">
						<h3>Саратов</h3>
						<p>3 Склада</p>
					</div>
				</a>
				<a href="#" class="gallery-item grid-wide set-bg" data-setbg="img/gallery/2.jpg">
					<div class="gi-info">
						<h3>Москва</h3>
						<p>4 Склада</p>
					</div>
				</a>
				<a href="#" class="gallery-item set-bg" data-setbg="img/gallery/3.jpg">
					<div class="gi-info">
						<h3>Волгоград</h3>
						<p>3 Склада</p>
					</div>
				</a>
				<a href="#" class="gallery-item set-bg" data-setbg="img/gallery/4.jpg">
					<div class="gi-info">
						<h3>Пенза</h3>
						<p>2 Склада</p>
					</div>
				</a>
			</div>
		</div>
	</section>
	<!-- Gallery section end -->

	<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>ПОСЛЕДНИЕ НОВОСТИ</h3>
				<p>Здесь мы рассказываем о развитии нашей компании и новых услугах!</p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 blog-item">
					<img src="img/blog/1.jpg" alt="">
					<h5><a href="single-blog.html">В Пензе открылся склад №2 при поддержке Губернатора области!</a></h5>
					<div class="blog-meta">
						<span><i class="fa fa-user"></i>Alexey Fedorov</span>
						<span><i class="fa fa-clock-o"></i>01 Декабрь 2024</span>
					</div>
					<p>Снабжаем город свободным местом...</p>
				</div>
				<div class="col-lg-4 col-md-6 blog-item">
					<img src="img/blog/2.jpg" alt="">
					<h5><a href="single-blog.html">Бизнес-конференция в офисе Московского отдела</a></h5>
					<div class="blog-meta">
						<span><i class="fa fa-user"></i>Paul Ryasnov</span>
						<span><i class="fa fa-clock-o"></i>28 Ноября 2024</span>
					</div>
					<p>Встреча с инвесторами и многое другое!</p>
				</div>
				<div class="col-lg-4 col-md-6 blog-item">
					<img src="img/blog/3.jpg" alt="">
					<h5><a href="single-blog.html">Саратовский отдел празднует 5-летие со дня основания!</a></h5>
					<div class="blog-meta">
						<span><i class="fa fa-user"></i>Artem Farafonov</span>
						<span><i class="fa fa-clock-o"></i>24 Ноября 2024</span>
					</div>
					<p>Все только начинается!</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->

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
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<!-- smodel script -->
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
	@if(Session::has('msg'))
		 <script>
		 $('#login').modal('show');
		 </script>
	@endif


</body>
</html>
