@php
if(auth()->user() != null) {
$user_id = Auth::user()->id;
$cart = \App\Cart::where('user_id', $user_id)->get();
} else {
$temp_user_id = Session()->get('temp_user_id');
if($temp_user_id) {
$cart = \App\Cart::where('temp_user_id', $temp_user_id)->get();
}
}

@endphp

<a data-bss-hover-animate="tada" class="sho-cart icon-svg" href="javascript:void(0)" data-toggle="dropdown" data-display="static">
	<div><svg viewBox="0 0 50 50">
		<path d="M13 4C9.7777778 4 7.5273646 5.0968583 6.125 6.21875C4.7226354 7.3406417 4.1054688 8.5527344 4.1054688 8.5527344 A 1.0001163 1.0001163 0 1 0 5.8945312 9.4472656C5.8945312 9.4472656 6.2773646 8.6593583 7.375 7.78125C8.3708525 6.984568 10.011154 6.2481799 12.361328 6.1035156L25.070312 38.367188 A 1.0001 1.0001 0 0 0 26.345703 38.9375L45.345703 31.9375 A 1.0001 1.0001 0 1 0 44.654297 30.0625L26.572266 36.722656L13.929688 4.6328125 A 1.0001 1.0001 0 0 0 13 4 z M 39.169922 10 A 1.0001 1.0001 0 0 0 38.828125 10.0625L21.654297 16.388672 A 1.0001 1.0001 0 0 0 21.070312 17.693359L27.244141 33.367188 A 1.0001 1.0001 0 0 0 28.519531 33.9375L45.693359 27.611328 A 1.0001 1.0001 0 0 0 46.279297 26.306641L40.103516 10.632812 A 1.0001 1.0001 0 0 0 39.169922 10 z M 38.601562 12.277344L44.042969 26.087891L28.746094 31.722656L23.304688 17.912109L38.601562 12.277344 z M 35.015625 17.416016 A 1.0001 1.0001 0 0 0 34.654297 17.482422L29.480469 19.388672 A 1.0001243 1.0001243 0 1 0 30.171875 21.265625L35.345703 19.359375 A 1.0001 1.0001 0 0 0 35.015625 17.416016 z M 19 34C17.416667 34 16.101892 34.629756 15.251953 35.585938C14.402014 36.542119 14 37.777778 14 39C14 40.222222 14.402014 41.457881 15.251953 42.414062C16.101892 43.370244 17.416667 44 19 44C20.583333 44 21.898108 43.370245 22.748047 42.414062C23.597986 41.457881 24 40.222222 24 39C24 37.777778 23.597986 36.542119 22.748047 35.585938C21.898108 34.629756 20.583333 34 19 34 z M 19 44L5 44 A 1.0001 1.0001 0 1 0 5 46L45 46 A 1.0001 1.0001 0 1 0 45 44L19 44 z M 19 36C20.083333 36 20.768559 36.370244 21.251953 36.914062C21.735347 37.457881 22 38.222222 22 39C22 39.777778 21.735347 40.542119 21.251953 41.085938C20.768559 41.629756 20.083333 42 19 42C17.916667 42 17.231441 41.629756 16.748047 41.085938C16.264653 40.542119 16 39.777778 16 39C16 38.222222 16.264653 37.457881 16.748047 36.914062C17.231441 36.370244 17.916667 36 19 36 z"></path>
	</svg></div>
    <span class="flex-grow-1 cart-num">
        @if(isset($cart) && count($cart) > 0)
		<span class="badge badge-primary badge-inline badge-pill">
		{{ count($cart)}}
	</span>
	@else
	<span class="badge badge-primary badge-inline badge-pill">0</span>
	@endif
	<span class="nav-box-text d-none d-md-block ">{{translate('Cart')}}</span>
    </span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation">
    
    @if(isset($cart) && count($cart) > 0)
	<div class="p-3 fs-15 fw-600 p-3 border-bottom">
		{{translate('Cart Items')}}
	</div>
	<ul class="h-250px overflow-auto c-scrollbar-light list-group list-group-flush">
		@php
		$total = 0;
		@endphp
		@foreach($cart as $key => $cartItem)
		@php
		$product = \App\Product::find($cartItem['product_id']);
		$total = $total + $cartItem['price'] * $cartItem['quantity'];
		@endphp
		@if ($product != null)
		<li class="list-group-item">
			<span class="d-flex align-items-center">
				<a href="{{ route('product', $product->slug) }}" class="text-reset d-flex align-items-center flex-grow-1">
					<img
					src="{{ static_asset('assets/img/placeholder.jpg') }}"
					data-src="{{ uploaded_asset($product->thumbnail_img) }}"
					class="img-fit lazyload size-60px rounded"
					alt="{{  $product->getTranslation('name')  }}"
					>
					<span class="minw-0 pl-2 flex-grow-1">
						<span class="fw-600 mb-1 text-truncate-2">
							{{  $product->getTranslation('name')  }}
						</span>
						<span class="">{{ $cartItem['quantity'] }}x</span>
						<span class="">{{ single_price($cartItem['price']) }}</span>
					</span>
				</a>
				<span class="">
					<button onclick="removeFromCart({{ $cartItem['id'] }})" class="btn btn-sm btn-icon stop-propagation">
						<i class="la la-close"></i>
					</button>
				</span>
			</span>
		</li>
		@endif
		@endforeach
	</ul>
	<div class="px-3 py-2 fs-15 border-top d-flex justify-content-between">
		<span class="opacity-60">{{translate('Subtotal')}}</span>
		<span class="fw-600">{{ single_price($total) }}</span>
	</div>
	<div class="px-3 py-2 text-center border-top">
		<ul class="list-inline mb-0">
			<li class="list-inline-item">
				<a href="{{ route('cart') }}" class="btn btn-soft-primary btn-sm">
					{{translate('View cart')}}
				</a>
			</li>
			@if (Auth::check())
			<li class="list-inline-item">
				<a href="{{ route('checkout.shipping_info') }}" class="btn btn-primary btn-sm">
					{{translate('Checkout')}}
				</a>
			</li>
			@endif
		</ul>
	</div>
    @else
	<div class="text-center p-3">
		<i class="las la-frown la-3x opacity-60 mb-3"></i>
		<h3 class="h6 fw-700">{{translate('Your Cart is empty')}}</h3>
	</div>
    @endif
    
</div>
