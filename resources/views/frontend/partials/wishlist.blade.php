<div class="cart-cls" >@if(Auth::check())
<span class="span-cls">{{ count(Auth::user()->wishlists)}}</span>
@else
<span class="span-cls">0</span>
@endif 	 <span class="shopping-box">Wishlist</span></div>