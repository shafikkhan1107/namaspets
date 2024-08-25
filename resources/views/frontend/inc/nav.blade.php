<!--<div class="top-navbar bg-white border-bottom border-soft-secondary z-1035">
    <div class="container">
	<div class="row">
	<div class="col-lg-7 col">
	<ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">
	@if(get_setting('show_language_switcher') == 'on')
	<li class="list-inline-item dropdown mr-3" id="lang-change">
	@php
	if(Session::has('locale')){
	$locale = Session::get('locale', Config::get('app.locale'));
	}
	else{
	$locale = 'en';
	}
	@endphp
	<a href="javascript:void(0)" class="dropdown-toggle text-reset py-2" data-toggle="dropdown" data-display="static">
	<img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/flags/'.$locale.'.png') }}" class="mr-2 lazyload" alt="{{ \App\Language::where('code', $locale)->first()->name }}" height="11">
	<span class="opacity-60">{{ \App\Language::where('code', $locale)->first()->name }}</span>
	</a>
	<ul class="dropdown-menu dropdown-menu-left">
	@foreach (\App\Language::all() as $key => $language)
	<li>
	<a href="javascript:void(0)" data-flag="{{ $language->code }}" class="dropdown-item @if($locale == $language) active @endif">
	<img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" class="mr-1 lazyload" alt="{{ $language->name }}" height="11">
	<span class="language">{{ $language->name }}</span>
	</a>
	</li>
	@endforeach
	</ul>
	</li>
	@endif
	
	@if(get_setting('show_currency_switcher') == 'on')
	<li class="list-inline-item dropdown" id="currency-change">
	@php
	if(Session::has('currency_code')){
	$currency_code = Session::get('currency_code');
	}
	else{
	$currency_code = \App\Currency::findOrFail(get_setting('system_default_currency'))->code;
	}
	@endphp
	<a href="javascript:void(0)" class="dropdown-toggle text-reset py-2 opacity-60" data-toggle="dropdown" data-display="static">
	{{ \App\Currency::where('code', $currency_code)->first()->name }} {{ (\App\Currency::where('code', $currency_code)->first()->symbol) }}
	</a>
	<ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
	@foreach (\App\Currency::where('status', 1)->get() as $key => $currency)
	<li>
	<a class="dropdown-item @if($currency_code == $currency->code) active @endif" href="javascript:void(0)" data-currency="{{ $currency->code }}">{{ $currency->name }} ({{ $currency->symbol }})</a>
	</li>
	@endforeach
	</ul>
	</li>
	@endif
	</ul>
	</div>
	
	<div class="col-5 text-right d-none d-lg-block">
	<ul class="list-inline mb-0">
	@auth
	@if(isAdmin())
	<li class="list-inline-item mr-3">
	<a href="{{ route('admin.dashboard') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
	</li>
	@else
	<li class="list-inline-item mr-3">
	<a href="{{ route('dashboard') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
	</li>
	@endif
	<li class="list-inline-item">
	<a href="{{ route('logout') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Logout')}}</a>
	</li>
	@else
	<li class="list-inline-item mr-3">
	<a href="{{ route('user.login') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Login')}}</a>
	</li>
	<li class="list-inline-item">
	<a href="{{ route('user.registration') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Registration')}}</a>
	</li>
	@endauth
	</ul>
	</div>
	</div>
	</div>
	</div> 
	
	<header class="@if(get_setting('header_stikcy') == 'on') sticky-top @endif z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area z-1 bg-warning">
	<div class="container-fluid">
	<div class="d-flex align-items-center">
	
	<div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
	<a class="d-block py-20px mr-3 ml-0" href="{{ route('home') }}">
	@php
	$header_logo = get_setting('header_logo');
	@endphp
	@if($header_logo != null)
	<img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40">
	@else
	<img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40">
	
	
	@endif
	</a>
	
	@if(Route::currentRouteName() != 'home')
	<div class="d-none d-xl-block align-self-stretch category-menu-icon-box ml-auto mr-0">
	<div class="h-100 d-flex align-items-center" id="category-menu-icon">
	<div class="dropdown-toggle navbar-light bg-light h-40px w-50px pl-2 rounded border c-pointer">
	<span class="navbar-toggler-icon"></span>
	</div>
	</div>
	</div>
	@endif    
	
	</div>
	
	<div class="col-lg-2">
	<div class="logo-img">
	<a href="#"><img class="img-fluid logo" src="/public/namas-pet/assets/img/logo.png" /></a>
	</div>
	</div> 
	
	<div class="d-lg-none ml-auto mr-0">
	<a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
	<i class="las la-search la-flip-horizontal la-2x"></i>
	</a>
	</div>  
	
	<div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
	<div class="position-relative flex-grow-1">
	<form action="{{ route('search') }}" method="GET" class="stop-propagation">
	<div class="d-flex position-relative align-items-center">
	<div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
	<button class="btn px-2" type="button"><i class="la la-2x la-long-arrow-left"></i></button>
	</div>
	<div class="input-group">
	<input type="text" class="border-0 border-lg form-control" id="search" name="q" placeholder="{{translate('I am shopping for...')}}" autocomplete="off">
	<div class="input-group-append d-none d-lg-block">
	<button class="btn btn-primary" type="submit">
	<i class="la la-search la-flip-horizontal fs-18"></i>
	</button>
	</div>
	</div>
	</div>
	</form>
	<div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px">
	<div class="search-preloader absolute-top-center">
	<div class="dot-loader"><div></div><div></div><div></div></div>
	</div>
	<div class="search-nothing d-none p-3 text-center fs-16">
	
	</div>
	<div id="search-content" class="text-left">
	
	</div>
	</div>
	</div>
	</div> 
	
	<div class="col-lg-6">  
	<div class="animal-box">
	<div class="top-icon">
	<div class="d-flex social-icon"><a class="icon" href="#">
	<div><svg viewBox="0 0 24 24">
	<path d="M17.525,9H14V7c0-1.032,0.084-1.682,1.563-1.682h1.868v-3.18C16.522,2.044,15.608,1.998,14.693,2C11.98,2,10,3.657,10,6.699V9H7v4l3-0.001V22h4v-9.003l3.066-0.001L17.525,9z"></path>
	</svg></div>
	</a><a class="icon" href="#">
	<div><svg viewBox="0 0 48 48">
	<path d="M44.719,10.305C44.424,10,43.97,9.913,43.583,10.091l-0.164,0.075c-0.139,0.064-0.278,0.128-0.418,0.191c0.407-0.649,0.73-1.343,0.953-2.061c0.124-0.396-0.011-0.829-0.339-1.085c-0.328-0.256-0.78-0.283-1.135-0.066c-1.141,0.693-2.237,1.192-3.37,1.54C37.4,7.026,35.071,6,32.5,6c-5.247,0-9.5,4.253-9.5,9.5c0,0.005,0,0.203,0,0.5l-0.999-0.08c-9.723-1.15-12.491-7.69-12.606-7.972c-0.186-0.47-0.596-0.813-1.091-0.916C7.81,6.927,7.297,7.082,6.939,7.439C6.741,7.638,5,9.48,5,13c0,2.508,1.118,4.542,2.565,6.124c-0.674-0.411-1.067-0.744-1.077-0.753c-0.461-0.402-1.121-0.486-1.669-0.208c-0.546,0.279-0.868,0.862-0.813,1.473c0.019,0.211,0.445,4.213,5.068,7.235l-0.843,0.153c-0.511,0.093-0.938,0.444-1.128,0.928C6.914,28.437,6.988,28.984,7.3,29.4c0.105,0.141,2.058,2.68,6.299,4.14C11.334,34.295,8.222,35,4.5,35c-0.588,0-1.123,0.344-1.366,0.88c-0.244,0.536-0.151,1.165,0.237,1.607C3.532,37.672,7.435,42,17.5,42C34.213,42,42,26.485,42,16v-0.5c0-0.148-0.016-0.293-0.022-0.439c2.092-2.022,2.879-3.539,2.917-3.614C45.084,11.067,45.014,10.609,44.719,10.305z"></path>
	</svg></div>
	</a><a class="icon" href="#">
	<div><svg viewBox="0 0 50 50">
	<path d="M16 3C8.83 3 3 8.83 3 16L3 34C3 41.17 8.83 47 16 47L34 47C41.17 47 47 41.17 47 34L47 16C47 8.83 41.17 3 34 3L16 3 z M 37 11C38.1 11 39 11.9 39 13C39 14.1 38.1 15 37 15C35.9 15 35 14.1 35 13C35 11.9 35.9 11 37 11 z M 25 14C31.07 14 36 18.93 36 25C36 31.07 31.07 36 25 36C18.93 36 14 31.07 14 25C14 18.93 18.93 14 25 14 z M 25 16C20.04 16 16 20.04 16 25C16 29.96 20.04 34 25 34C29.96 34 34 29.96 34 25C34 20.04 29.96 16 25 16 z"></path>
	</svg></div>
	</a></div>
	<div class="animal-div"><img class="img-fluid" src="/public/namas-pet/assets/img/animal1.png" /></div>
	</div>
	<div class="search"><input type="search" placeholder="Insert keyword to search" style="/*padding-top: 0.5rem;*//*padding-bottom: 0.5rem;*//*padding-left: 1rem;*/" /></div>
	</div>
	<div class="input-group">
	<input type="text" class="border-0 border-lg form-control" id="search" name="q" placeholder="I am shopping for..." autocomplete="off">
	<div class="input-group-append d-none d-lg-block">
	<button class="btn btn-primary" type="submit">
	<i class="la la-search la-flip-horizontal fs-18"></i>
	</button>
	</div>
	</div> 
	</div> 
	
	<div class="d-none d-lg-none ml-3 mr-0">
	<div class="nav-search-box">
	<a href="#" class="nav-box-link">
	<i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
	</a>
	</div>
	</div>
	
	<div class="d-none d-lg-block ml-3 mr-0">
	<div class="" id="compare">
	@include('frontend.partials.compare')
	</div>
	</div>
	
	<div class="d-none d-lg-block ml-3 mr-0">
	<div class="" id="wishlist">
	@include('frontend.partials.wishlist')
	</div>
	</div>
	
	<div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">
	<div class="nav-cart-box dropdown h-100" id="cart_items">
	@include('frontend.partials.cart')
	</div>
	</div> 
	
	
	
	
	</div>
	</div>
	
	@if(Route::currentRouteName() != 'home')
	<div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 d-none z-3" id="hover-category-menu">
	<div class="container">
	<div class="row gutters-10 position-relative">
	<div class="col-lg-3 position-static">
	@include('frontend.partials.category_menu')
	</div>
	</div>
	</div>
	</div>
	@endif
	</div>
    @if ( get_setting('header_menu_labels') !=  null )
	<div class=" bg-info">
	<div class="container-fluid ">
	<ul class="list-inline mb-0 pl-0 mobile-hor-swipe text-center">
	@foreach (json_decode( get_setting('header_menu_labels'), true) as $key => $value)
	<li class="list-inline-item mr-0">
	<a href="{{ json_decode( get_setting('header_menu_links'), true)[$key] }}" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
	{{ translate($value) }}
	</a>
	</li>
	@endforeach
	</ul> 
	
	<div class="row">
	<div class="col-lg-2">
	<div class="fixed-logo"><img src="/public/namas-pet/assets/img/logo.png" /></div> 
	</div>
	<div class="col-lg-10">
	<nav class="navbar navbar-light navbar-expand-md">
	<div class="container-fluid">
	<button
	data-bs-toggle="collapse"
	class="navbar-toggler"
	data-bs-target="#navcol-1"
	>
	<span class="visually-hidden">Toggle navigation</span
	><span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse nav-top" id="navcol-1">
	<ul class="navbar-nav">
	<li class="nav-item">
	<a class="nav-link active" href="#">HOME</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="#">PET FOOD</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="#">FROZEN RAW FOOD</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="#">NATURAL DRY TREATS</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="#">ANIMALS TOYS</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="#">MORE</a>
	</li>
	</ul>
	</div>
	</div>
	</nav>
	</div>
	</div>
	
	</div>
	</div>
    @endif
</header>  -->

<header>
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
					
                    <a href="{{url('/')}}">
						<div class="logo-img"> 
							@php
							$header_logo = get_setting('header_logo');
							@endphp
							@if($header_logo != null) 
							<img class="img-fluid logo" data-bss-hover-animate="swing" alt="{{ env('APP_NAME') }}" src="{{ uploaded_asset($header_logo) }}" />
							@else
							<img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40"> 
							@endif
						</div>
					</a>
				</div>
                <div class="col-lg-6"> 
                    <div class="animal-box">
                        <div class="top-icon">
                            <div class="d-flex social-icon"><a data-bss-hover-animate="bounce" class="icon" target="_blank" href="{{ get_setting('facebook_link') }}">
								<div><svg viewBox="0 0 24 24">
									<path d="M17.525,9H14V7c0-1.032,0.084-1.682,1.563-1.682h1.868v-3.18C16.522,2.044,15.608,1.998,14.693,2C11.98,2,10,3.657,10,6.699V9H7v4l3-0.001V22h4v-9.003l3.066-0.001L17.525,9z"></path>
								</svg></div>
                                </a><a data-bss-hover-animate="bounce" class="icon" target="_blank" href="{{ get_setting('twitter_link') }}">
								<div><svg viewBox="0 0 48 48">
									<path d="M44.719,10.305C44.424,10,43.97,9.913,43.583,10.091l-0.164,0.075c-0.139,0.064-0.278,0.128-0.418,0.191c0.407-0.649,0.73-1.343,0.953-2.061c0.124-0.396-0.011-0.829-0.339-1.085c-0.328-0.256-0.78-0.283-1.135-0.066c-1.141,0.693-2.237,1.192-3.37,1.54C37.4,7.026,35.071,6,32.5,6c-5.247,0-9.5,4.253-9.5,9.5c0,0.005,0,0.203,0,0.5l-0.999-0.08c-9.723-1.15-12.491-7.69-12.606-7.972c-0.186-0.47-0.596-0.813-1.091-0.916C7.81,6.927,7.297,7.082,6.939,7.439C6.741,7.638,5,9.48,5,13c0,2.508,1.118,4.542,2.565,6.124c-0.674-0.411-1.067-0.744-1.077-0.753c-0.461-0.402-1.121-0.486-1.669-0.208c-0.546,0.279-0.868,0.862-0.813,1.473c0.019,0.211,0.445,4.213,5.068,7.235l-0.843,0.153c-0.511,0.093-0.938,0.444-1.128,0.928C6.914,28.437,6.988,28.984,7.3,29.4c0.105,0.141,2.058,2.68,6.299,4.14C11.334,34.295,8.222,35,4.5,35c-0.588,0-1.123,0.344-1.366,0.88c-0.244,0.536-0.151,1.165,0.237,1.607C3.532,37.672,7.435,42,17.5,42C34.213,42,42,26.485,42,16v-0.5c0-0.148-0.016-0.293-0.022-0.439c2.092-2.022,2.879-3.539,2.917-3.614C45.084,11.067,45.014,10.609,44.719,10.305z"></path>
								</svg></div>
                                </a><a data-bss-hover-animate="bounce" class="icon" target="_blank" href="{{ get_setting('instagram_link') }}">
								<div><svg viewBox="0 0 50 50">
									<path d="M16 3C8.83 3 3 8.83 3 16L3 34C3 41.17 8.83 47 16 47L34 47C41.17 47 47 41.17 47 34L47 16C47 8.83 41.17 3 34 3L16 3 z M 37 11C38.1 11 39 11.9 39 13C39 14.1 38.1 15 37 15C35.9 15 35 14.1 35 13C35 11.9 35.9 11 37 11 z M 25 14C31.07 14 36 18.93 36 25C36 31.07 31.07 36 25 36C18.93 36 14 31.07 14 25C14 18.93 18.93 14 25 14 z M 25 16C20.04 16 16 20.04 16 25C16 29.96 20.04 34 25 34C29.96 34 34 29.96 34 25C34 20.04 29.96 16 25 16 z"></path>
								</svg></div>
							</a></div>
                            <div class="animal-div"><img class="img-fluid" src="{{static_asset('namas-pet/NP-HTML/assets/img/animal1.png')}}" /></div>
						</div>
                        <div class="search"><input type="text" id="search" name="q" placeholder="I am shopping for..." autocomplete="off" style="/*padding-top: 0.5rem;*//*padding-bottom: 0.5rem;*//*padding-left: 1rem;*/" />
						</div>
					</div>
					<div id="search-content" class="text-left text-left-edit"></div>
				</div>
                <div class="col-lg-4">
                    <div class="d-flex flex-column top-end">
                        <div class="head-btn">
                            <div class="contact-icon">
								<div> <a href="https://wa.me/+385916147765" target='_blank'  data-bss-hover-animate="tada" >
								<!-- <img class="img-fluid icon" src="/public/namas-pet/NP-HTML/assets/img/whatsapp-icon.png"/>  -->
								<img src="{{ static_asset('assets/img/whatsapp-icon.png') }}" alt="Whatspp"> 
									<span> +385 916147765</span></a> </div>
							</div>
                            <div> <a href="{{url('category/birds-for-sale')}}" class="btn btn-primary"  data-bss-hover-animate="tada" type="button">Shop Now</a> </div>
                            
						</div>
                        <div class="cart">
						@auth
						<a data-bss-hover-animate="tada" class="user icon-svg" href="{{ route('logout') }}">
							<div><svg viewBox="0 0 24 24">
								<path d="M12 3 A 4 4 0 0 0 8 7 A 4 4 0 0 0 12 11 A 4 4 0 0 0 16 7 A 4 4 0 0 0 12 3 z M 12 14C8.996 14 3 15.508 3 18.5L3 21L21 21L21 18.5C21 15.508 15.004 14 12 14 z"></path>
							</svg></div>
						</a>
						@else
						<a data-bss-hover-animate="tada" class="user icon-svg" href="{{ route('user.login') }}">
							<div><svg viewBox="0 0 24 24">
								<path d="M12 3 A 4 4 0 0 0 8 7 A 4 4 0 0 0 12 11 A 4 4 0 0 0 16 7 A 4 4 0 0 0 12 3 z M 12 14C8.996 14 3 15.508 3 18.5L3 21L21 21L21 18.5C21 15.508 15.004 14 12 14 z"></path>
							</svg></div>
						</a>
						@endauth 
							@auth
								<a href="{{ route('logout') }}" class="mar-left"><span class="shopping-box">{{ translate('Logout')}}</span></a>
							@else
								<a href="{{ route('user.login') }}" class="mar-left"><span class="shopping-box">Login</span></a>
							@endauth 
						<a data-bss-hover-animate="tada" class="heart icon-svg" href="{{ route('wishlists.index') }}">
							<div><svg viewBox="0 0 16 16">
								<path d="M5 2C2.972656 2 1.304688 3.527344 1.054688 5.484375C1.019531 5.644531 1 5.8125 1 6C1 8.285156 2.746094 10.347656 4.414063 11.878906C6.078125 13.414063 7.742188 14.425781 7.742188 14.425781L8 14.585938L8.257813 14.425781C8.257813 14.425781 9.921875 13.414063 11.589844 11.878906C13.253906 10.347656 15 8.285156 15 6C15 5.8125 14.980469 5.648438 14.949219 5.492188C14.695313 3.527344 13.03125 2 11 2C9.757813 2 8.730469 2.648438 8 3.539063C7.269531 2.648438 6.242188 2 5 2 Z M 5 3C6.101563 3 7.046875 3.59375 7.570313 4.476563L8 5.203125L8.429688 4.476563C8.953125 3.59375 9.898438 3 11 3C12.535156 3 13.777344 4.144531 13.960938 5.632813L13.96875 5.671875C13.988281 5.765625 14 5.871094 14 6C14 7.75 12.496094 9.6875 10.910156 11.144531C9.457031 12.484375 8.230469 13.230469 8 13.375C7.769531 13.230469 6.542969 12.484375 5.085938 11.144531C3.503906 9.6875 2 7.75 2 6C2 5.867188 2.011719 5.761719 2.03125 5.671875L2.039063 5.648438L2.039063 5.625C2.226563 4.144531 3.464844 3 5 3Z"></path>
							</svg></div>
							<div id="wishlist">
								@include('frontend.partials.wishlist')
							</div>
						</a>
						
							
							<div id="cart_items">
								@include('frontend.partials.cart') 
							</div>
						</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="header-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="fixed-logo d-none d-md-block">
						<a href="{{url('/')}}">
							@php
							$header_logo = get_setting('header_logo');
							@endphp
							@if($header_logo != null) 
							<img class="img-fluid logo" alt="{{ env('APP_NAME') }}" src="{{ uploaded_asset($header_logo) }}" />
							@else
							<img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40"> 
							@endif
						</a> 
					</div>
				</div>
				<?php 
					$categories = App\Category::where('level', 0)->orderBy('order_level', 'desc')->get();
					
				?>
                <div class="col-lg-9">
					<div class="nav-mobile">
						<div class="fixed-logo1 d-block d-md-none">
							<a href="{{url('/')}}">
								@php
								$header_logo = get_setting('header_logo');
								@endphp
								@if($header_logo != null) 
								<img class="img-fluid logo" alt="{{ env('APP_NAME') }}" src="{{ uploaded_asset($header_logo) }}" />
								@else
								<img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40"> 
								@endif
							</a> 
						</div>

						<div class="cart cart12 d-flex d-md-none">
								<a data-bss-hover-animate="tada" class="user icon-svg" href="#">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" fill="#5B5B5B">
											<path d="M12 3 A 4 4 0 0 0 8 7 A 4 4 0 0 0 12 11 A 4 4 0 0 0 16 7 A 4 4 0 0 0 12 3 z M 12 14C8.996 14 3 15.508 3 18.5L3 21L21 21L21 18.5C21 15.508 15.004 14 12 14 z" fill="#5B5B5B" />
										</svg>
									</div>
										<span class="shopping-box">Login</span>
								</a>
								<a data-bss-hover-animate="tada" class="sho-cart icon-svg" href="#">
									<div>						
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" fill="#ffffff">
											<path d="M13 4C9.7777778 4 7.5273646 5.0968583 6.125 6.21875C4.7226354 7.3406417 4.1054688 8.5527344 4.1054688 8.5527344 A 1.0001163 1.0001163 0 1 0 5.8945312 9.4472656C5.8945312 9.4472656 6.2773646 8.6593583 7.375 7.78125C8.3708525 6.984568 10.011154 6.2481799 12.361328 6.1035156L25.070312 38.367188 A 1.0001 1.0001 0 0 0 26.345703 38.9375L45.345703 31.9375 A 1.0001 1.0001 0 1 0 44.654297 30.0625L26.572266 36.722656L13.929688 4.6328125 A 1.0001 1.0001 0 0 0 13 4 z M 39.169922 10 A 1.0001 1.0001 0 0 0 38.828125 10.0625L21.654297 16.388672 A 1.0001 1.0001 0 0 0 21.070312 17.693359L27.244141 33.367188 A 1.0001 1.0001 0 0 0 28.519531 33.9375L45.693359 27.611328 A 1.0001 1.0001 0 0 0 46.279297 26.306641L40.103516 10.632812 A 1.0001 1.0001 0 0 0 39.169922 10 z M 38.601562 12.277344L44.042969 26.087891L28.746094 31.722656L23.304688 17.912109L38.601562 12.277344 z M 35.015625 17.416016 A 1.0001 1.0001 0 0 0 34.654297 17.482422L29.480469 19.388672 A 1.0001243 1.0001243 0 1 0 30.171875 21.265625L35.345703 19.359375 A 1.0001 1.0001 0 0 0 35.015625 17.416016 z M 19 34C17.416667 34 16.101892 34.629756 15.251953 35.585938C14.402014 36.542119 14 37.777778 14 39C14 40.222222 14.402014 41.457881 15.251953 42.414062C16.101892 43.370244 17.416667 44 19 44C20.583333 44 21.898108 43.370245 22.748047 42.414062C23.597986 41.457881 24 40.222222 24 39C24 37.777778 23.597986 36.542119 22.748047 35.585938C21.898108 34.629756 20.583333 34 19 34 z M 19 44L5 44 A 1.0001 1.0001 0 1 0 5 46L45 46 A 1.0001 1.0001 0 1 0 45 44L19 44 z M 19 36C20.083333 36 20.768559 36.370244 21.251953 36.914062C21.735347 37.457881 22 38.222222 22 39C22 39.777778 21.735347 40.542119 21.251953 41.085938C20.768559 41.629756 20.083333 42 19 42C17.916667 42 17.231441 41.629756 16.748047 41.085938C16.264653 40.542119 16 39.777778 16 39C16 38.222222 16.264653 37.457881 16.748047 36.914062C17.231441 36.370244 17.916667 36 19 36 z" fill="#ffffff" />
										</svg>						
									</div>
									<span class="shopping-box">Cart</span>
								</a>
						</div>
						
						<nav class="navbar navbar1 navbar-light navbar-expand-md">
							<div class="container-fluid header-container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
								<div class="collapse navbar-collapse nav-top" id="navcol-1">
									
									<ul class="navbar-nav">
										<li class="nav-item"><a class="nav-link active" data-bss-hover-animate="jello" href="{{url('/')}}">HOME</a></li>
										
										@foreach ($categories as $key => $category)
										@php
										$child = ""; 
										$aria = ""; 
										$toggle = ""; 
										@endphp
										@if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
										@php
										$child = "dropdown-toggle"; 
										$aria = "false"; 
										$toggle = "dropdown"; 
										@endphp
										@endif
										<?php
											// echo $category->getTranslation('name');
											if($category->getTranslation('name') != "Birds for Sale"){
										?>
										<li class="nav-item"><a class="{{$child}} nav-link active" data-bss-hover-animate="jello" aria-expanded="{{$aria}}" data-bs-toggle="{{$toggle}}" href="{{ route('products.category', $category->slug) }}">
											{{  strtoupper($category->getTranslation('name')) }}</a> 				  
											@if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
											<div class="dropdown-menu">
												@foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $key => $first_level_id)
												<?php
													$sub_cat = \App\Category::find($first_level_id)->getTranslation('name');
													if($sub_cat != "Thistle Raw"){
												?>
												<a class="dropdown-item" href="{{ route('products.category', \App\Category::find($first_level_id)->slug) }}">{{ \App\Category::find($first_level_id)->getTranslation('name') }}</a>  
												<?php
													}
												?>
												@endforeach 
											</div>
											@endif
										</li>
										<?php
											}
										?> 
										@endforeach
									</ul>
									
								</div>
							</div>
						</nav>
					</div>
				</div>
                <div class="col-lg-1">
                    	<div class="cart cart12 d-none d-md-flex">
								<a data-bss-hover-animate="tada" class="user icon-svg" href="#">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" fill="#5B5B5B">
											<path d="M12 3 A 4 4 0 0 0 8 7 A 4 4 0 0 0 12 11 A 4 4 0 0 0 16 7 A 4 4 0 0 0 12 3 z M 12 14C8.996 14 3 15.508 3 18.5L3 21L21 21L21 18.5C21 15.508 15.004 14 12 14 z" fill="#5B5B5B" />
										</svg>
									</div>
										<span class="shopping-box">Login</span>
								</a>
								<a data-bss-hover-animate="tada" class="sho-cart icon-svg" href="#">
									<div>						
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" fill="#ffffff">
											<path d="M13 4C9.7777778 4 7.5273646 5.0968583 6.125 6.21875C4.7226354 7.3406417 4.1054688 8.5527344 4.1054688 8.5527344 A 1.0001163 1.0001163 0 1 0 5.8945312 9.4472656C5.8945312 9.4472656 6.2773646 8.6593583 7.375 7.78125C8.3708525 6.984568 10.011154 6.2481799 12.361328 6.1035156L25.070312 38.367188 A 1.0001 1.0001 0 0 0 26.345703 38.9375L45.345703 31.9375 A 1.0001 1.0001 0 1 0 44.654297 30.0625L26.572266 36.722656L13.929688 4.6328125 A 1.0001 1.0001 0 0 0 13 4 z M 39.169922 10 A 1.0001 1.0001 0 0 0 38.828125 10.0625L21.654297 16.388672 A 1.0001 1.0001 0 0 0 21.070312 17.693359L27.244141 33.367188 A 1.0001 1.0001 0 0 0 28.519531 33.9375L45.693359 27.611328 A 1.0001 1.0001 0 0 0 46.279297 26.306641L40.103516 10.632812 A 1.0001 1.0001 0 0 0 39.169922 10 z M 38.601562 12.277344L44.042969 26.087891L28.746094 31.722656L23.304688 17.912109L38.601562 12.277344 z M 35.015625 17.416016 A 1.0001 1.0001 0 0 0 34.654297 17.482422L29.480469 19.388672 A 1.0001243 1.0001243 0 1 0 30.171875 21.265625L35.345703 19.359375 A 1.0001 1.0001 0 0 0 35.015625 17.416016 z M 19 34C17.416667 34 16.101892 34.629756 15.251953 35.585938C14.402014 36.542119 14 37.777778 14 39C14 40.222222 14.402014 41.457881 15.251953 42.414062C16.101892 43.370244 17.416667 44 19 44C20.583333 44 21.898108 43.370245 22.748047 42.414062C23.597986 41.457881 24 40.222222 24 39C24 37.777778 23.597986 36.542119 22.748047 35.585938C21.898108 34.629756 20.583333 34 19 34 z M 19 44L5 44 A 1.0001 1.0001 0 1 0 5 46L45 46 A 1.0001 1.0001 0 1 0 45 44L19 44 z M 19 36C20.083333 36 20.768559 36.370244 21.251953 36.914062C21.735347 37.457881 22 38.222222 22 39C22 39.777778 21.735347 40.542119 21.251953 41.085938C20.768559 41.629756 20.083333 42 19 42C17.916667 42 17.231441 41.629756 16.748047 41.085938C16.264653 40.542119 16 39.777778 16 39C16 38.222222 16.264653 37.457881 16.748047 36.914062C17.231441 36.370244 17.916667 36 19 36 z" fill="#ffffff" />
										</svg>						
									</div>
									<span class="shopping-box">Cart</span>
								</a>
						</div>
				</div>
			</div>
		</div>
	</div>
</header>






