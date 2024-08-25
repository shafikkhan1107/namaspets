@extends('frontend.layouts.app')

@section('content')
{{-- Categories , Sliders . Today's deal --}}
<!--<div class="home-banner-area mb-4 pt-3">
	<div class="container-fluid">
	<div class="row gutters-10 position-relative">
	<div class="col-lg-3 position-static d-none d-lg-block">
	@include('frontend.partials.category_menu')
	</div> 
	
	@php
	$num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 ))->get());
	$featured_categories = \App\Category::where('featured', 1)->get();
	@endphp
	
	<div class="@if($num_todays_deal > 0) col-lg-7 @else col-lg-9 @endif">
	@if (get_setting('home_slider_images') != null)
	<div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true" data-infinite="true">
	@php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
	@foreach ($slider_images as $key => $value)
	<div class="carousel-box">
	<a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
	<img
	class="d-block mw-100 img-fit rounded shadow-sm"
	src="{{ uploaded_asset($slider_images[$key]) }}"
	alt="{{ env('APP_NAME')}} promo"
	@if(count($featured_categories) == 0)
	height="457"
	@else
	height="315"
	@endif
	onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
	>
	</a>
	</div>
	@endforeach
	</div>
	@endif
	@if (count($featured_categories) > 0)
	<ul class="list-unstyled mb-0 row gutters-5">
	@foreach ($featured_categories as $key => $category)
	<li class="minw-0 col-4 col-md mt-3">
	<a href="{{ route('products.category', $category->slug) }}" class="d-block rounded bg-white p-2 text-reset shadow-sm">
	<img
	src="{{ static_asset('assets/img/placeholder.jpg') }}"
	data-src="{{ uploaded_asset($category->banner) }}"
	alt="{{ $category->getTranslation('name') }}"
	class="lazyload img-fit"
	height="78"
	onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
	>
	<div class="text-truncate fs-12 fw-600 mt-2 opacity-70">{{ $category->getTranslation('name') }}</div>
	</a>
	</li>
	@endforeach
	</ul>
	@endif
	</div> 
	
	@if($num_todays_deal > 0)
	<div class="col-lg-2 order-3 mt-3 mt-lg-0">
	<div class="bg-white rounded shadow-sm">
	<div class="bg-soft-primary rounded-top p-3 d-flex align-items-center justify-content-center">
	<span class="fw-600 fs-16 mr-2 text-truncate">
	{{ translate('Todays Deal') }}
	</span>
	<span class="badge badge-primary badge-inline">{{ translate('Hot') }}</span>
	</div>
	<div class="c-scrollbar-light overflow-auto h-lg-400px p-2 bg-primary rounded-bottom">
	<div class="gutters-5 lg-no-gutters row row-cols-2 row-cols-lg-1">
	@foreach (filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->get() as $key => $product)
	@if ($product != null)
	<div class="col mb-2">
	<a href="{{ route('product', $product->slug) }}" class="d-block p-2 text-reset bg-white h-100 rounded">
	<div class="row gutters-5 align-items-center">
	<div class="col-xxl">
	<div class="img">
	<img
	class="lazyload img-fit h-140px h-lg-80px"
	src="{{ static_asset('assets/img/placeholder.jpg') }}"
	data-src="{{ uploaded_asset($product->thumbnail_img) }}"
	alt="{{ $product->getTranslation('name') }}"
	onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
	>
	</div>
	</div>
	<div class="col-xxl">
	<div class="fs-16">
	<span class="d-block text-primary fw-600">{{ home_discounted_base_price($product->id) }}</span>
	@if(home_base_price($product->id) != home_discounted_base_price($product->id))
	<del class="d-block opacity-70">{{ home_base_price($product->id) }}</del>
	@endif
	</div>
	</div>
	</div>
	</a>
	</div>
	@endif
	@endforeach
	</div>
	</div>
	</div>
	</div> 
	@endif
	
	</div>
	</div>      
</div>-->

<!-- BANNER SECTION START -->

<section id="banner-sec">
    <div class="container">
        <div class="banner-content text-light text-center">
            <h1><strong>We are a family run business, who believe in providing top quality customer service and value for money.</strong></h1>
            <div class="button-group">
			<a href="{{url('todays-deal')}}" class="btn btn-primary" role="button" data-bss-hover-animate="tada">SHOP NOW</a>
			<a href="{{url('About')}}" class="btn btn-light" role="button" data-bss-hover-animate="tada">LEARN MORE</a></div>
		</div>
		</div>
		<!-- <video width="100%" loop autoplay>
			<source src="{{static_asset('namas-pet/NP-HTML/assets/video/video.mp4')}}" type="video/mp4">
			</source>
			Your browser does not support HTML video.
		</video> -->
</section>


<!-- BANNER SECTION END -->


<section id="special-sec">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="caro-heading">
						<h2 data-bss-hover-animate="shake"><strong>BEST SELLING CATEGORIES</strong></h2>
					</div>
					<div class="carousel-box">
						<div >
							@if (get_setting('best_selling') == 1)
							<div id="special-offer" class="row">
								@foreach (filter_products(\App\Product::where('todays_deal', 1)->orderBy('num_of_sale', 'desc'))->limit(4)->get() as $key => $product)
								<div class="col-md-3">
								<a href="{{ route('product', $product->slug) }}" class="d-block">
										<div class="inner-items">
											<div class="product-img"><img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="Owl Image"/></div>
											<h6>{{  $product->getTranslation('name')  }}</h6>
											<p>{{ home_discounted_base_price($product->id) }}</p>
										</div> 
								</a></div>
								@endforeach
							</div>
							@endif
						</div>
					</div>
					<div class="text-center"><a href="{{url('todays-deal')}}" class="btn btn-primary" data-bss-hover-animate="tada" type="button">View All</a></div>
				</div>
				</div>
			</div>
	</section>
	
    <!-- Special SECTION END -->



{{-- Banner section 1 --}}
@if (get_setting('home_banner1_images') != null)
<!-- <div class="mb-4">
	<div class="container">
	<div class="row gutters-10">
	@php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
	@foreach ($banner_1_imags as $key => $value)
	<div class="col-xl col-md-6">
	<div class="mb-3 mb-lg-0">
	<a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset">
	<img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_1_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
	</a>
	</div>
	</div>
	@endforeach
	</div>
	</div>
</div> -->
@endif


{{-- Flash Deal --}}
@php
$flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();
@endphp
@if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <!-- <section class="mb-4">
        <div class="container">
		<div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
		
		<div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
		<h3 class="h5 fw-700 mb-0">
		<span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Flash Sale') }}</span>
		</h3>
		<div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
		<a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>
		</div>
		
		<div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
		@foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
		@php
		$product = \App\Product::find($flash_deal_product->product_id);
		@endphp
		@if ($product != null && $product->published != 0)
		<div class="carousel-box">
		<div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
		<div class="position-relative">
		<a href="{{ route('product', $product->slug) }}" class="d-block">
		<img
		class="img-fit lazyload mx-auto h-140px h-md-210px"
		src="{{ static_asset('assets/img/placeholder.jpg') }}"
		data-src="{{ uploaded_asset($product->thumbnail_img) }}"
		alt="{{  $product->getTranslation('name')  }}"
		onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
		>
		</a>
		<div class="absolute-top-right aiz-p-hov-icon">
		<a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
		<i class="la la-heart-o"></i>
		</a>
		<a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
		<i class="las la-sync"></i>
		</a>
		<a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
		<i class="las la-shopping-cart"></i>
		</a>
		</div>
		</div>
		<div class="p-md-3 p-2 text-left">
		<div class="fs-15">
		@if(home_base_price($product->id) != home_discounted_base_price($product->id))
		<del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
		@endif
		<span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
		</div>
		<div class="rating rating-sm mt-1">
		{{ renderStarRating($product->rating) }}
		</div>
		<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
		<a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
		</h3>
		@if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
		<div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
		{{ translate('Club Point') }}:
		<span class="fw-700 float-right">{{ $product->earn_point }}</span>
		</div>
		@endif
		</div>
		</div>
		</div>
		@endif
		@endforeach
		</div>
		</div> 
		
		
        </div>
	</section> -->
    @endif
	
	
    {{-- Featured Section --}}
    <!-- <div id="section_featured">            
		
	</div> -->
	
    <!-- ABOUT SECTION START -->
	
    <!-- <section id="about">
		<div class="container">
			<div class="about">
				<div class="row">
					<div class="col-lg-12">
						<a href="#">
							<div class="about-logo"><img data-bss-hover-animate="swing" src="{{static_asset('namas-pet/NP-HTML/assets/img/logo.png')}}" /></div>
						</a>
						<div data-aos="slide-up" class="about-para">
							<p class="p1"><strong>Welcome to Namas Pets, your one stop Pet Store catering to all your pet&#39;s needs. Namas Pets offers you great value on pet supplies and quality pet care products.</strong><strong>Explore our page to find the best products suited for your pets. We have a large range of Bird Supplies including Bird Cages, Bird Toys, Parrot Toys, Dog Toys, Frozen Dog</strong><strong>Food and much more!</strong><br /></p>
							
							
							<p class="p2">At Namas Pets, we love our animal friends and are committed to matching owners with the right pet and providing customers with unsurpassed advice, service andselection of products. This is our way of ensuring our animals have the best possible start in their new home with you.</p>
						</div>
						<a href="{{url('About')}}" class="btn btn-primary mt-4" data-bss-hover-animate="tada" type="button">About Us</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	
    <!-- ABOUT SECTION END -->
	
	
	
    <!-- MEAT SECTION START -->
	
    <section id="meat-banner">
		<div class="container">
			<div class="main-box">
				<div class="row">
					<div class="col-lg-4">
						<div data-aos="slide-right" class="meat-block"><img class="img-fluid meat-img" src="{{static_asset('namas-pet/NP-HTML/assets/img/meat.jpg')}}" style="filter: brightness(100%);" /></div>
					</div>
					<div class="col-lg-8">
						<div data-aos="slide-left" class="text-block">
							<h2><strong>ABOUT US</strong></h2>
							<p>SuperishkaShop.hr is owned by: Noob Club doo, Slipper 6, 10000 Zagreb, ID number 06915824315, company registered in Croatia.</p>
							<a href="{{url('category/frozen-raw-food')}}"> <button class="btn btn-primary" data-bss-hover-animate="tada" type="button">Shop now</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- MEAT SECTION END -->
	
	
    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner2_images') != null)
    <!-- <div class="mb-4">
        <div class="container">
		<div class="row gutters-10">
		@php $banner_2_imags = json_decode(get_setting('home_banner2_images')); @endphp
		@foreach ($banner_2_imags as $key => $value)
		<div class="col-xl col-md-6">
		<div class="mb-3 mb-lg-0">
		<a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}" class="d-block text-reset">
		<img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_2_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
		</a>
		</div>
		</div>
		@endforeach
		</div>
        </div>
	</div> -->
	
   
	
    @endif
	
    {{-- Category wise Products --}}
    <!-- <div id="section_home_categories">
		
	</div> -->
	
    <!-- CAROUSAL SECTION START
		{{-- Best Selling  --}}
		<div id="section_best_selling">
		
	</div>   -->
    <section id="carousal-sec">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="caro-heading">
						<h2 data-bss-hover-animate="shake"><strong>Best Selling Products</strong></h2>
					</div>
					<div class="carousel-box">
						<div >
							@if (get_setting('best_selling') == 1)
							<div id="owl-demo">
								@foreach (filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(12)->get() as $key => $product)
								<a href="{{ route('product', $product->slug) }}" class="d-block">
									<div class="item"> 
										<div class="inner-items">
											<div class="product-img"><img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="Owl Image"/></div>
											<h6>{{  $product->getTranslation('name')  }}</h6>
											<p>{{ home_discounted_base_price($product->id) }}</p>
										</div> 
									</div>
								</a>
								@endforeach
							</div>
							@endif
						</div>
					</div>
					<a href="{{url('search')}}" class="btn btn-outline-primary" data-bss-hover-animate="tada" type="button">View All</a>
				</div>
				</div>
			</div>
	</section>

    
	
    <!-- {{-- Classified Product --}}
		@if(get_setting('classified_product') == 1)
        @php
		$classified_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        @endphp
		@if (count($classified_products) > 0)
		<section class="mb-4">
		<div class="container">
		<div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
		<div class="d-flex mb-3 align-items-baseline border-bottom">
		<h3 class="h5 fw-700 mb-0">
		<span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Classified Ads') }}</span>
		</h3>
		<a href="{{ route('customer.products') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
		</div>
		<div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
		@foreach ($classified_products as $key => $classified_product)
		<div class="carousel-box">
		<div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
		<div class="position-relative">
		<a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block">
		<img
		class="img-fit lazyload mx-auto h-140px h-md-210px"
		src="{{ static_asset('assets/img/placeholder.jpg') }}"
		data-src="{{ uploaded_asset($classified_product->thumbnail_img) }}"
		alt="{{ $classified_product->getTranslation('name') }}"
		onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
		>
		</a>
		<div class="absolute-top-left pt-2 pl-2">
		@if($classified_product->conditon == 'new')
		<span class="badge badge-inline badge-success">{{translate('new')}}</span>
		@elseif($classified_product->conditon == 'used')
		<span class="badge badge-inline badge-danger">{{translate('Used')}}</span>
		@endif
		</div>
		</div>
		<div class="p-md-3 p-2 text-left">
		<div class="fs-15 mb-1">
		<span class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
		</div>
		<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
		<a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block text-reset">{{ $classified_product->getTranslation('name') }}</a>
		</h3>
		</div>
		</div>
		</div>
		@endforeach
		</div>
		</div>
		</div>
		</section>
		@endif
	@endif -->
	
    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner3_images') != null)
    <!-- <div class="mb-4">
        <div class="container">
		<div class="row gutters-10">
		@php $banner_3_imags = json_decode(get_setting('home_banner3_images')); @endphp
		@foreach ($banner_3_imags as $key => $value)
		<div class="col-xl col-md-6">
		<div class="mb-3 mb-lg-0">
		<a href="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}" class="d-block text-reset">
		<img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_3_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
		</a>
		</div>
		</div>
		@endforeach
		</div>
        </div>
	</div> -->
	
    <!-- BENEFITIS SECTION END -->
	
    <!-- MEAT SECTION START -->
	
    <section id="delivery-banner">
		<div class="container">
						<div class="banner-content text-light text-center">
							<h2><strong>FAST DELIVERY</strong></h2>
							<p>Our packages are delivered by Paket24. <br> We can boast of excellent package insurance and the best customer security.</p>
							<a href="{{url('category/frozen-raw-food')}}"> <button class="btn btn-primary" data-bss-hover-animate="tada" type="button">Shop now</button>
							</a>
						</div>
					
		</div>
	</section>
	
    <!-- MEAT SECTION END -->
	
    <section id="benefits-sec">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="caro-heading">
						<h2 data-bss-hover-animate="shake"><strong>Benefits for you</strong></h2>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="bene-main">
						<div class="row">
							<div class="col-lg-4">
								<div data-bss-hover-animate="shake" class="check-icon"><img class="check" src="{{static_asset('namas-pet/NP-HTML/assets/img/Checkmark.png')}}" />
									<h5><strong>Glossier Coat</strong></h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div data-bss-hover-animate="shake" class="check-icon"><img class="check" src="{{static_asset('namas-pet/NP-HTML/assets/img/Checkmark.png')}}" />
									<h5><strong>Improved Digestion</strong></h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div data-bss-hover-animate="shake" class="check-icon"><img class="check" src="{{static_asset('namas-pet/NP-HTML/assets/img/Checkmark.png')}}" />
									<h5><strong>Smaller Firmer Poo</strong></h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div data-bss-hover-animate="shake" class="check-icon"><img class="check" src="{{static_asset('namas-pet/NP-HTML/assets/img/Checkmark.png')}}" />
									<h5><strong>Balanced Energy Level</strong></h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div data-bss-hover-animate="shake" class="check-icon"><img class="check" src="{{static_asset('namas-pet/NP-HTML/assets/img/Checkmark.png')}}" />
									<h5><strong>Fresher Breath</strong></h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div data-bss-hover-animate="shake" class="check-icon"><img class="check" src="{{static_asset('namas-pet/NP-HTML/assets/img/Checkmark.png')}}" />
									<h5><strong>Less Wind</strong></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="animal">
					<img data-bss-hover-animate="pulse" src="{{static_asset('namas-pet/NP-HTML/assets/img/animals.png')}}" class="animated pulse" /></div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- BENEFITIS SECTION START -->
	
    @endif
	
    {{-- Best Seller --}}
    @if (get_setting('vendor_system_activation') == 1)
    <!-- <div id="section_best_sellers">
		
	</div> -->
	
	
    @endif
	
    {{-- Top 10 categories and Brands --}}
    <!-- <section class="mb-4">
        <div class="container-fluid">
		<div class="row gutters-10">
		@if (get_setting('top10_categories') != null)
		<div class="col-lg-6">
		<div class="d-flex mb-3 align-items-baseline border-bottom">
		<h3 class="h5 fw-700 mb-0">
		<span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top 10 Categories') }}</span>
		</h3>
		<a href="{{ route('categories.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View All Categories') }}</a>
		</div>
		<div class="row gutters-5">
		@php $top10_categories = json_decode(get_setting('top10_categories')); @endphp
		@foreach ($top10_categories as $key => $value)
		@php $category = \App\Category::find($value); @endphp
		@if ($category != null)
		<div class="col-sm-6">
		<a href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
		<div class="row align-items-center no-gutters">
		<div class="col-3 text-center">
		<img
		src="{{ static_asset('assets/img/placeholder.jpg') }}"
		data-src="{{ uploaded_asset($category->banner) }}"
		alt="{{ $category->getTranslation('name') }}"
		class="img-fluid img lazyload h-60px"
		onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
		>
		</div>
		<div class="col-7">
		<div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ $category->getTranslation('name') }}</div>
		</div>
		<div class="col-2 text-center">
		<i class="la la-angle-right text-primary"></i>
		</div>
		</div>
		</a>
		</div>
		@endif
		@endforeach
		</div>
		</div> 
		@endif
		@if (get_setting('top10_categories') != null)
		<div class="col-lg-6">
		<div class="d-flex mb-3 align-items-baseline border-bottom">
		<h3 class="h5 fw-700 mb-0">
		<span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top 10 Brands') }}</span>
		</h3>
		<a href="{{ route('brands.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View All Brands') }}</a>
		</div>
		<div class="row gutters-5">
		@php $top10_brands = json_decode(get_setting('top10_brands')); @endphp
		@foreach ($top10_brands as $key => $value)
		@php $brand = \App\Brand::find($value); @endphp
		@if ($brand != null)
		<div class="col-sm-6">
		<a href="{{ route('products.brand', $brand->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
		<div class="row align-items-center no-gutters">
		<div class="col-4 text-center">
		<img
		src="{{ static_asset('assets/img/placeholder.jpg') }}"
		data-src="{{ uploaded_asset($brand->logo) }}"
		alt="{{ $brand->getTranslation('name') }}"
		class="img-fluid img lazyload h-60px"
		onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
		>
		</div>
		<div class="col-6">
		<div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">{{ $brand->getTranslation('name') }}</div>
		</div>
		<div class="col-2 text-center">
		<i class="la la-angle-right text-primary"></i>
		</div>
		</div>
		</a>
		</div>
		@endif
		@endforeach
		</div>
		</div> 
		
		@endif
		</div>
        </div>
	</section> -->
	
    <!-- WORK SECTION START -->
	
    <section id="work-sec">
		<div class="">
			<div class="row">
				<div class="col-lg-12">
					<div class="caro-heading">
						<h2 data-bss-hover-animate="shake"><strong>How It Works</strong></h2>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="work-box">
						<div class="work-box1"><img data-bss-hover-animate="swing" class="dog-jump" src="{{static_asset('namas-pet/NP-HTML/assets/img/Dog-Jump.png')}}" />
							<h5 data-bss-hover-animate="shake" class="heading5"><strong>You tell us about your pet. </strong></h5>
						</div>
						<div class="work-box1"><img data-bss-hover-animate="swing" class="dog-jump" src="{{static_asset('namas-pet/NP-HTML/assets/img/dog-bowl1.png')}}" />
							<h5 data-bss-hover-animate="shake" class="heading5"><strong>We Offer the Best Food for Your Pet.</strong><br /></h5>
						</div>
						<div class="work-box1"><img data-bss-hover-animate="swing" class="dog-jump" src="{{static_asset('namas-pet/NP-HTML/assets/img/contact-details.png')}}" />
							<h5 data-bss-hover-animate="shake" class="heading5"><strong>Our Pets are Our Family.</strong><br /></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- WORK SECTION END -->

	 <!-- WHY SECTION START -->
	
	 <section id="why-section">
		<div class="container">
			<div>
				<div class="row">
					<div class="col-lg-12">
						<div data-aos="zoom-in" class="dog-box"><img class="img-fluid dog-img" src="{{static_asset('namas-pet/NP-HTML/assets/img/dog-1.png')}}" /></div>
					</div>
					<div class="col">
						<div class="caro-heading">
							<h2 data-bss-hover-animate="shake"><strong>WHY SUPERISHKA SHOP?</strong></h2>
						</div>
						<div class="bot-box">
							<div class="meat-bx">
								<div data-bss-hover-animate="rubberBand" class="meat-box"><img src="{{static_asset('namas-pet/NP-HTML/assets/img/meat.png')}}" /></div>
								<h5 data-aos="slide-up"><strong>Expert Workmanship</strong></h5>
							</div>
							<div class="meat-bx">
								<div data-bss-hover-animate="rubberBand" class="meat-box"><img src="{{static_asset('namas-pet/NP-HTML/assets/img/spa_flower.png')}}" /></div>
								<h5 data-aos="slide-up"><strong>Free Pickup & Drop</strong><br /></h5>
							</div>
							<div class="meat-bx">
								<div data-bss-hover-animate="rubberBand" class="meat-box"><img src="{{static_asset('namas-pet/NP-HTML/assets/img/money_pound.png')}}" /></div>
								<h5 data-aos="slide-up"><strong>Affordable Price</strong><br /></h5>
							</div>
							<div class="meat-bx">
								<div data-bss-hover-animate="rubberBand" class="meat-box"><img src="{{static_asset('namas-pet/NP-HTML/assets/img/protect.png')}}" /></div>
								<h5 data-aos="slide-up"><strong>Most Trusted</strong><br /></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- WHY SECTION END -->
	
	
    <!-- OUR SECTION START -->
	
    <section id="our-sec">
		<div class="container">
			<div>
				<div class="row">
					<div class="col-lg-12">
						<div class="caro-heading">
							<h2 data-bss-hover-animate="shake"><strong>Our Happy Customers</strong></h2>
						</div>
					</div>
					<div class="col">
						<div class="custom-box"><i class="fa fa-quote-right"></i>
							<p class="para">
							The Superishka Store is absolutely AMAZING! I love this store because they offer beautiful, high quality products that I can't find anywhere else. 
							</p>
							<h5><strong>Janie</strong></h5>
							<h6 class="heading6">Zagreb HR</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- OUR SECTION END -->
	
	
	
	
	
	
    <!-- CONTACT SECTION START -->
	
    <section id="contact-sec">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="office-box">
						<div class="row">
							<div class="col-lg-12">
								<div class="mar-left">
									<h5><strong>Office Hours</strong></h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div>
									<h6><strong>Monday - Saturday</strong></h6>
									<p>09:00 AM - 06:30 PM<br /></p>
								</div>
							</div>
							<div class="col-lg-6">
								<div>
									<h6><strong>Sunday</strong><br /></h6>
									<p>09:00 AM - 02:30 PM<br /></p>
								</div>
							</div>
							<div class="col-lg-12">
								<div>
									<h6 class="head-6"><strong>Free Local Delivery</strong></h6>
								</div>
							</div>
							<div class="col-lg-12">
								<p>Card payment is accepted at your doorstep!</p>
							</div>
							<div class="col-lg-4">
								<div>
									<a href="#"> 
										<img class="img-fluid paytm-img" src="{{static_asset('namas-pet/NP-HTML/assets/img/paypal.png')}}" />
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="map-box"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.2270575416915!2d16.037034015511285!3d45.82673627910692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d76a74f72dab%3A0x78149ae8cbe2eb59!2sSuperishka%20Shop!5e0!3m2!1sen!2sin!4v1664976152265!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
				</div>
				<div class="col-lg-12">
					<div class="pay-method">
						<span>Safe and secure payment</span>
						<a href="#">
							<img data-bss-hover-animate="shake" src="{{static_asset('namas-pet/NP-HTML/assets/img/Layer-10.png')}}" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- CONTACT SECTION END -->
	
	@endsection
	
	@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
			});
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
			});
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
			});
			
            @if (get_setting('vendor_system_activation') == 1)
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
			});
            @endif
		});
	</script>
	@endsection
