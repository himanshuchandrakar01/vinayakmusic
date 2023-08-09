<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<style>
    .image_fix{
        padding-left: 35px;
    }
@media only screen and (max-width: 600px) {
 .image_fix{
        padding-left: 72px !important;
    }
}

    .float_whatsapp{
    position:fixed;
    width:60px;
    height:60px;
    bottom:80px;
    right:40px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
  font-size:30px;
    box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
    margin-top:16px;
}

.shop_on_the_go{
    padding-left:28px;
}
@media only screen and (max-width: 600px) {
.shop_on_the_go{
    padding-left: 87px;
    } 
}

</style>
<a href="https://api.whatsapp.com/send?phone=+919630098332&text=Hello." class="float_whatsapp" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<section class="border-top mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img class="image_fix" height="200" src="{{static_asset('assets/img/precaution/save_money.png') }}">
                        <br>
                        <div style="text-align: center;" class="d-block text-reset text-truncate mt-2"> <b>Save Money</b></div>
                        <br>
                        <p style="text-align: center;">Save Money Buying the best quality and authentic products at the most discounted price.</p>
               
             </div>
            <div class="col-sm-3">
                <img class="image_fix" height="200" src="{{static_asset('assets/img/precaution/buyer_protection.png') }}">
                        <br>
                        <div style="text-align: center;" class="d-block text-reset text-truncate mt-2"><b> Buyer Protection</b> </div>
                        <br>
                        <p style="text-align: center;">All Buyers data is protected with us with most advanced security payment services.</p>
               
            </div>
            <div class="col-sm-3">
                <img class="image_fix" height="200" src="{{static_asset('assets/img/precaution/fast_shipping.png') }}">
                        <br>
                        <div style="text-align: center;" class="d-block text-reset text-truncate mt-2"><b> Fast Shipping</b></div>
                         <br>
                        <p style="text-align: center;">We deliver to you with Fast Shipping so that you don't have to stay away from your loved product.</p>
            </div>
            <div class="col-sm-3">
                <img height="200" class="shop_on_the_go" src="{{static_asset('assets/img/precaution/mobile2.png') }}">
                        <br>
                        <div style="text-align: center;" class="d-block text-reset text-truncate mt-2"><b>Shop-On-The-Go</b></div>
                         <br>
                        <p style="text-align: center;">Buy your loved products on the go use your device and only a few clicks you are with your order.</p>
                
            </div>
        </div>
    </div>
</section>

<br>
<section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('terms') }}">
                    <i class="la la-file-text la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Terms & conditions') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('returnpolicy') }}">
                    <i class="la la-mail-reply la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Return Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('supportpolicy') }}">
                    <i class="la la-support la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Support Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="{{ route('privacypolicy') }}">
                    <i class="las la-exclamation-circle la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Privacy Policy') }}</h4>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-light footer-widget" style="background: black;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-4 text-center text-md-left">
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="d-block">
                        @if(get_setting('footer_logo') != null)
                            <img class="lazyload" style="width: 246px; height: 128px;" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset(get_setting('footer_logo')) }}" alt="{{ env('APP_NAME') }}" height="44">
                        @else
                            <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                        @endif
                    </a>
                    <br>
                    <!-- <div class="my-3">
                        {!! get_setting('about_us_description',null,App::getLocale()) !!}
                    </div> -->
                    <div class="d-inline-block d-md-block mb-4">
                        <form class="form-inline" method="POST" action="{{ route('subscribers.store') }}">
                            @csrf
                            <div class="form-group mb-0">
                                <input type="email" class="form-control" placeholder="{{ translate('Your Email Address') }}" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ translate('Subscribe') }}
                            </button>
                        </form>
                    </div>
                    <div class="w-300px mw-100 mx-auto mx-md-0">
                        @if(get_setting('play_store_link') != null)
                            <a href="{{ get_setting('play_store_link') }}" target="_blank" class="d-inline-block mr-3 ml-0">
                                <img src="{{ static_asset('assets/img/play.png') }}" class="mx-100 h-40px">
                            </a>
                        @endif
                        @if(get_setting('app_store_link') != null)
                            <a href="{{ get_setting('app_store_link') }}" target="_blank" class="d-inline-block">
                                <img src="{{ static_asset('assets/img/app.png') }}" class="mx-100 h-40px">
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-2 ml-xl-auto col-md-5 mr-0">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        {{ translate('Information') }}
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-white">About Us</a></li>
                        <li class="mb-2"><a href="{{ route('grading') }}" class="text-white">Grading</a></li>
                        <li class="mb-2"><a href="{{ route('purchase') }}" class="text-white">Purchases</a></li>
                        <li class="mb-2"><a target="_blank" href="https://www.youtube.com/watch?v=Yh-KQVVFJI4" class="text-white">User Guide</a></li>

                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-2">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        {{ translate('Categories') }}
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/vinyl-records-0ib9b" class="text-white">Vinyl Record</a></li>
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/78-RPM-RECORDS-QU9tt" class="text-white">78RPM Records</a></li>
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/audio-cd-7bx8l" class="text-white">Audio CD</a></li>
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/AUDIO-CASSETTES-hfm2r" class="text-white">Audio Cassettes</a></li>
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/VINTAGE-AUDIO-SYSTEM-822F4" class="text-white">Vintage Audio Systems</a></li>
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/AUDIO-SYSTEM-RNKr7" class="text-white">Audio System</a></li>
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/audio-accessories-kvnog" class="text-white">Audio Accessories</a></li>
                        <li class="mb-2"><a href="https://vinayakmusic.com/category/SPEAKERS-EO4Nu" class="text-white">Speakers</a></li>
                        <!--<li class="mb-2"><a href="#" class="text-white">Collectibles</a></li>-->
                    </ul>
                   
                </div>
                <!-- @if (get_setting('vendor_system_activation') == 1)
                    <div class="text-center text-md-left mt-4">
                        <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                            {{ translate('Be a Seller') }}
                        </h4>
                        <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm shadow-md">
                            {{ translate('Apply Now') }}
                        </a>
                    </div>
                @endif -->
            </div>
            <div class="col-lg-2 ml-xl-auto col-md-3 mr-0">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        {{ translate('Contact Info') }}
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                           <span class="d-block text-white">{{ translate('Address') }}:</span>
                           <span class="d-block text-white">{{ get_setting('contact_address',null,App::getLocale()) }}</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block text-white">{{translate('Phone')}}:</span>
                           <span class="d-block text-white">{{ get_setting('contact_phone') }}</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block text-white">{{translate('Email')}}:</span>
                           <span class="d-block text-white">
                               <a href="mailto:{{ get_setting('contact_email') }}" class="text-reset">{{ get_setting('contact_email')  }}</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        {{ get_setting('widget_one',null,App::getLocale()) }}
                    </h4>
                    <ul class="list-unstyled">
                        @if ( get_setting('widget_one_labels',null,App::getLocale()) !=  null )
                            @foreach (json_decode( get_setting('widget_one_labels',null,App::getLocale()), true) as $key => $value)
                            <li class="mb-2">
                                <a href="{{ json_decode( get_setting('widget_one_links'), true)[$key] }}" class="text-white">
                                    {{ $value }}
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="text-center text-md-left" current-verison="{{get_setting("current_version")}}">
                    {!! get_setting('frontend_copyright_text',null,App::getLocale()) !!}
                </div>
            </div>
            <div class="col-lg-3">
                @if ( get_setting('show_social_links') )
                <ul class="list-inline my-3 my-md-0 social colored text-center">
                    @if ( get_setting('facebook_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('twitter_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('instagram_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('youtube_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('linkedin_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                    </li>
                    @endif
                </ul>
                @endif
            </div>
            <div class="col-lg-5">
                <!--<div class="text-center text-md-right">-->
                <!--    <ul class="list-inline mb-0">-->
                <!--        @if ( get_setting('payment_method_images') !=  null )-->
                <!--            @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)-->
                <!--                <li class="list-inline-item">-->
                <!--                    <img src="{{ uploaded_asset($value) }}" height="30" class="mw-100 h-auto" style="max-height: 30px">-->
                <!--                </li>-->
                <!--            @endforeach-->
                <!--        @endif-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</footer>


<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="row align-items-center gutters-5">
        <div class="col">
            <a href="{{ route('home') }}" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-home fs-20 opacity-60 {{ areActiveRoutes(['home'],'opacity-100 text-primary')}}"></i>
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['home'],'opacity-100 fw-600')}}">{{ translate('Home') }}</span>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('categories.all') }}" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-list-ul fs-20 opacity-60 {{ areActiveRoutes(['categories.all'],'opacity-100 text-primary')}}"></i>
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['categories.all'],'opacity-100 fw-600')}}">{{ translate('Categories') }}</span>
            </a>
        </div>
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
        <div class="col-auto">
            <a href="{{ route('cart') }}" class="text-reset d-block text-center pb-2 pt-3">
                <span class="align-items-center bg-primary border border-white border-width-4 d-flex justify-content-center position-relative rounded-circle size-50px" style="margin-top: -33px;box-shadow: 0px -5px 10px rgb(0 0 0 / 15%);border-color: #fff !important;">
                    <i class="las la-shopping-bag la-2x text-white"></i>
                </span>
                <span class="d-block mt-1 fs-10 fw-600 opacity-60 {{ areActiveRoutes(['cart'],'opacity-100 fw-600')}}">
                    {{ translate('Cart') }}
                    @php
                        $count = (isset($cart) && count($cart)) ? count($cart) : 0;
                    @endphp
                    (<span class="cart-count">{{$count}}</span>)
                </span>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('all-notifications') }}" class="text-reset d-block text-center pb-2 pt-3">
                <span class="d-inline-block position-relative px-2">
                    <i class="las la-bell fs-20 opacity-60 {{ areActiveRoutes(['all-notifications'],'opacity-100 text-primary')}}"></i>
                    @if(Auth::check() && count(Auth::user()->unreadNotifications) > 0)
                        <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right" style="right: 7px;top: -2px;"></span>
                    @endif
                </span>
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['all-notifications'],'opacity-100 fw-600')}}">{{ translate('Notifications') }}</span>
            </a>
        </div>
        <div class="col">
        @if (Auth::check())
            @if(isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="text-reset d-block text-center pb-2 pt-3">
                    <span class="d-block mx-auto">
                        @if(Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}" class="rounded-circle size-20px">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                        @endif
                    </span>
                    <span class="d-block fs-10 fw-600 opacity-60">{{ translate('Account') }}</span>
                </a>
            @else
                <a href="javascript:void(0)" class="text-reset d-block text-center pb-2 pt-3 mobile-side-nav-thumb" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
                    <span class="d-block mx-auto">
                        @if(Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}" class="rounded-circle size-20px">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                        @endif
                    </span>
                    <span class="d-block fs-10 fw-600 opacity-60">{{ translate('Account') }}</span>
                </a>
            @endif
        @else
            <a href="{{ route('user.login') }}" class="text-reset d-block text-center pb-2 pt-3">
                <span class="d-block mx-auto">
                    <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                </span>
                <span class="d-block fs-10 fw-600 opacity-60">{{ translate('Account') }}</span>
            </a>
        @endif
        </div>
    </div>
</div>
@if (Auth::check() && !isAdmin())
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            @include('frontend.inc.user_side_nav')
        </div>
    </div>
@endif
