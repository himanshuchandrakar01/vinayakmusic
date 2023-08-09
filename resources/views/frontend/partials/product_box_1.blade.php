<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    @if(discount_in_percentage($product) > 0)
        <span class="badge-custom">{{ translate('OFF') }}<span class="box ml-1">&nbsp;{{discount_in_percentage($product)}}%</span></span>
    @endif
    
   
    <?php 
            $qty = 0;
            foreach ($product->stocks as $key => $stock) {
                $qty += $stock->qty;
            } 
            if($qty < 1 )
            {
                
                echo 
                '<span class="badge-custom" style="margin-top:65px; background: #950b0b;">
                <span>
                <span class="text-white">SOLD OUT</span>
                  </span>
                  </span>';
            }
        ?>
       
  
    <div class="position-relative">
        <a href="{{ route('product', $product->slug) }}" class="d-block">
            <img class="img-fit lazyload mx-auto h-140px h-md-210px"
                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                alt="{{  $product->getTranslation('name')  }}"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
        </a>
        @if ($product->wholesale_product)
            <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
                {{ translate('Wholesale') }}
            </span>
        @endif
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
            <a href="javascript:void(0)" onclick="showQuickViewModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Quick view') }}" data-placement="left">
                <i class='fa fa-eye'></i>
            </a>
            
            
              
        </div>
    </div>
    <div class="p-md-3 p-2 text-left">
        <div class="fs-15">
            @if(home_base_price($product) != home_discounted_base_price($product))
                <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product) }}</del>
            @endif
            <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
        </div>
        <!--<div class="rating rating-sm mt-1">-->
        <!--    {{ renderStarRating($product->rating) }}-->
        <!--</div>-->
        
        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
            <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
        </h3>
        @if (addon_is_activated('club_point'))
            <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                {{ translate('Club Point') }}:
                <span class="fw-700 float-right">{{ $product->earn_point }}</span>
            </div>
        @endif
    </div>
</div>

<script>
    $(window).ready(function (){
  
  var init = function(){
    popup();
    readProductData();
  };
  
  var isDone = true;
  
    var popup = function(){
        var $items = $('.mini-carousel ul');
        var $linkClick = $('.mini-carousel ul li a');
        $('.video-player').hide();
        $('.btn-view').on('click', function(){
            $('#quick-view-pop-up').fadeToggle();
            $('#quick-view-pop-up').css({"top":"34px", "left":"314px"});
            $('.mask').fadeToggle();
        });
        $('.mask').on('click', function(){
            $('.mask').fadeOut();
            $('#quick-view-pop-up').fadeOut();
        });
        $('.quick-view-close').on('click', function(){
            $('.mask').fadeOut();
            $('#quick-view-pop-up').fadeOut();
        });
    
        $('.prev').on('click', function(){
                //animate on UL element of small image on the left
            if(!isDone) return;
            if($items.position().top === 0){
                $items.css({'top':'-125px'});
                $items.children('li').last().prependTo($items);
            }
            isDone = false;
            $('.mini-carousel ul').animate({
                top: "+=125px"
            }, 200 ,  function(){
                isDone = true;
            });
            $('.image-large ul li').last().prependTo($('.image-large ul'));
        });

        $('.next').on('click', function(){
                //animate on UL element of class 'mini-carousel'
            if(!isDone) return;
            
            if($items.position().top === 0){
                $items.css({'top': '125px'});
                $items.children('li').first().appendTo($items);
            }           
            isDone = false;
            $('.mini-carousel ul').animate({
                top: "-=125px"
            }, 300 ,  function(){
                isDone = true;
            }); 
            $('.image-large ul li').first().appendTo($('.image-large ul'));
        });
        $('.quick-view-video').on('click', function(){
            $('.video-player').toggle();
            $('.image-large ul').toggle();
        });
    };
    var readProductData = function(){
        // $.getJSON("winners.json", function(result){
        //     $.each(result, function(val){
        //         console.log(val.key);
        //     });
        // });
    };
    init();
});

</script>
<script>
    function showQuickViewModal(id){
            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('https://vinayakmusic.com/cart/show-cart-modal', {_token: AIZ.data.csrf, id:id}, function(data){
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }
</script>