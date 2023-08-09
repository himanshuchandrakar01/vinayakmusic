<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
     #icon_wrapper {
    position: fixed;
    top: 50%;
    left: 0px;
    z-index: 99999;
    }
    
.social_media{
    width: 50px;
    height: 50px
}


</style>

<div id="icon_wrapper">
    <a style="" target="_blank" class="fuse_social_icons_links" data-nonce="5483288f72" data-title="facebook" href="https://www.facebook.com/vinayakmusicworld/">
        <img class="social_media" src="{{ static_asset('assets/img/vinayak_fb.png') }}"></a><br>
        <a target="_blank" class="fuse_social_icons_links" data-nonce="5483288f72" data-title="twitter" href="https://www.instagram.com/vinayakmusicworld/">
           <img class="social_media" src="{{ static_asset('assets/img/vinayak_insta.png') }}"></a><br>
               <a target="_blank" class="fuse_social_icons_links" data-nonce="5483288f72" data-title="instagram" href="https://youtube.com/channel/UCEpKAiRfM5apwn6sHlA7r9Q">
                   <img class="social_media" src="{{ static_asset('assets/img/vinayak_youtube.png') }}"></a></div>

@php
if(auth()->user() != null) {
    $user_id = Auth::user()->id;
    $cart = \App\Models\Cart::where('user_id', $user_id)->get();
} else {
    $temp_user_id = Session()->get('temp_user_id');
    if($temp_user_id) {
        $cart = \App\Models\Cart::where('temp_user_id', $temp_user_id)->get();
    }
}

@endphp
<a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown" data-display="static">
    <i class="la la-shopping-cart la-2x"></i>
    <span class="flex-grow-1 ml-1">
        @if(isset($cart) && count($cart) > 0)
            <span class="badge badge-primary badge-inline badge-pill cart-count">
                {{ count($cart)}}
            </span>
        @else
            <span class="badge badge-primary badge-inline badge-pill cart-count">0</span>
        @endif
        <span class="nav-box-text d-none d-xl-block">{{translate('Cart')}}</span>
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
                    $product = \App\Models\Product::find($cartItem['product_id']);
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
                                    <!-- <span class="">Tax - {{ single_price($cartItem['tax']) }}</span> -->
                                </span>
                            </a>
                            <span class="">
                                    <button class="btn btn-sm btn-icon stop-propagation" onclick="removeFromCart({{ $cartItem['id'] }})">
                                    <i class="la la-close"></i>
                                </button>
                            </span>
                        </span>
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="px-3 py-2 fs-15 border-top d-flex justify-content-between">
            <span class="opacity-60 fs-15">{{translate('Subtotal')}}</span>
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
