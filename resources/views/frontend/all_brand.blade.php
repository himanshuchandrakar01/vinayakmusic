@extends('frontend.layouts.app')
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
           <a target="_blank" class="fuse_social_icons_links" data-nonce="5483288f72" data-title="youtube" href="">
               <img class="social_media" src="{{ static_asset('assets/img/vinayak_twitter.png') }}"></a><br>
               <a target="_blank" class="fuse_social_icons_links" data-nonce="5483288f72" data-title="instagram" href="">
                   <img class="social_media" src="{{ static_asset('assets/img/vinayak_youtube.png') }}"></a></div>
@section('content')

<section class="pt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ translate('All Brands') }}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('brands.all') }}">"{{ translate('All Brands') }}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mb-4">
    <div class="container">
        <div class="bg-white shadow-sm rounded px-3 pt-3">
            <div class="row row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 gutters-10">
                @foreach (\App\Models\Brand::all() as $brand)
                    <div class="col text-center">
                        <a href="{{ route('products.brand', $brand->slug) }}" class="d-block p-3 mb-3 border border-light rounded hov-shadow-md">
                            <img src="{{ uploaded_asset($brand->logo) }}" class="lazyload mx-auto h-70px mw-100" alt="{{ $brand->getTranslation('name') }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
