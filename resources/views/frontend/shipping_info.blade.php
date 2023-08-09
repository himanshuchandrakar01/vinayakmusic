@extends('frontend.layouts.app')

@section('content')

<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row aiz-steps arrow-divider">
                    <div class="col done">
                        <div class="text-center text-success">
                            <i class="la-3x mb-2 las la-shopping-cart"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block ">{{ translate('1. My Cart')}}</h3>
                        </div>
                    </div>
                    <div class="col active">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block ">{{ translate('2. Shipping info')}}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 ">{{ translate('3. Delivery info')}}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 ">{{ translate('4. Payment')}}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 ">{{ translate('5. Confirmation')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-4 gry-bg">
    <div class="container">
                <form class="form-default" data-toggle="validator" action="{{ route('checkout.store_shipping_infostore') }}" role="form" method="POST">
                    @csrf
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card p-3">
                    <div class="card-header">
                        <h5>Billing Information</h5>
                        
                    </div>
                    <div class="card-body p-1">
                        
                        <?php $defaultAddress = App\Models\Address::where('user_id', Auth::user()->id)->where('set_default',1)->first(); ?>
                        <div class="p-1">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('Address')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control mb-3" placeholder="{{ translate('Your Address')}}" rows="2" name="billto_address" required><?=$defaultAddress->address??'' ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('Country')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <select class="form-control aiz-selectpicker" data-live-search="true" data-placeholder="{{ translate('Select your country') }}" name="billto_country_id" required>
                                            <option value="">{{ translate('Select your country') }}</option>
                                            @foreach (\App\Models\Country::where('code', Session::get('orig_country_code'))->get() as $key => $country)
                                                <option value="{{ $country->id }}" <?=(($defaultAddress->country_id??'')== $country->id)?'selected':'' ?>>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('State')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="billto_state_id" required>
    
                                    </select>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('City')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="billto_city_id" required>
    
                                    </select>
                                </div>
                            </div>
    
                            @if (get_setting('google_map') == 1)
                                <div class="row">
                                    <input id="searchInput" class="controls" type="text" placeholder="{{translate('Enter a location')}}">
                                    <div id="map"></div>
                                    <ul id="geoData">
                                        <li style="display: none;">Full Address: <span id="location"></span></li>
                                        <li style="display: none;">Postal Code: <span id="postal_code"></span></li>
                                        <li style="display: none;">Country: <span id="country"></span></li>
                                        <li style="display: none;">Latitude: <span id="lat"></span></li>
                                        <li style="display: none;">Longitude: <span id="lon"></span></li>
                                    </ul>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-3" id="">
                                        <label for="exampleInputuname">Longitude</label>
                                    </div>
                                    <div class="col-md-9" id="">
                                        <input type="text" class="form-control mb-3" id="longitude" name="billto_longitude" readonly="" value="<?=$defaultAddress->longitude??'' ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3" id="">
                                        <label for="exampleInputuname">Latitude</label>
                                    </div>
                                    <div class="col-md-9" id="">
                                        <input type="text" class="form-control mb-3" id="latitude" name="billto_latitude" readonly="" value="<?=$defaultAddress->latitude??'' ?>">
                                    </div>
                                </div>
                            @endif
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('Postal code')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control mb-3" placeholder="{{ translate('Your Postal Code')}}" name="billto_postal_code" value="<?=$defaultAddress->postal_code??'' ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('Phone')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control mb-3" placeholder="{{ translate('+91')}}" name="billto_phone" value="<?=$defaultAddress->phone??'' ?>" required>
                                </div>
                            </div>
                            <!--<div class="form-group text-right">-->
                            <!--    <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 mx-auto">
                    @if(Auth::check())
                        <div class="shadow-sm card p-2 rounded mb-4">
                            <div class="card-header">
                                <h5>Shipping Information</h5>
                            </div>
                            <div class="card-body">
                            <div class="row gutters-5">
                                @foreach (Auth::user()->addresses as $key => $address)
                                    <div class="col-md-6 mb-3">
                                        <label class="aiz-megabox d-block bg-white mb-0">
                                            <input type="radio" name="address_id" value="{{ $address->id }}" @if ($address->set_default)
                                                checked
                                            @endif required>
                                            <span class="d-flex p-3 aiz-megabox-elem">
                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                <span class="flex-grow-1 pl-3 text-left">
                                                    <div>
                                                        <span class="opacity-60">{{ translate('Address') }}:</span>
                                                        <span class="fw-600 ml-2">{{ $address->address }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60">{{ translate('Postal Code') }}:</span>
                                                        <span class="fw-600 ml-2">{{ $address->postal_code }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60">{{ translate('City') }}:</span>
                                                        <span class="fw-600 ml-2">{{ optional($address->city)->name }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60">{{ translate('State') }}:</span>
                                                        <span class="fw-600 ml-2">{{ optional($address->state)->name }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60">{{ translate('Country') }}:</span>
                                                        <span class="fw-600 ml-2">{{ optional($address->country)->name }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60">{{ translate('Phone') }}:</span>
                                                        <span class="fw-600 ml-2">{{ $address->phone }}</span>
                                                    </div>
                                                </span>
                                            </span>
                                        </label>
                                        <div class="dropdown position-absolute right-0 top-0">
                                            <button class="btn bg-gray px-2" type="button" data-toggle="dropdown">
                                                <i class="la la-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" onclick="edit_address('{{$address->id}}')">
                                                    {{ translate('Edit') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <input type="hidden" name="checkout_type" value="logged">
                                <div class="col-md-6 mx-auto mb-3" >
                                    <div class="border p-3 rounded mb-3 c-pointer text-center bg-white h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
                                        <i class="las la-plus la-2x mb-3"></i>
                                        <div class="alpha-7">{{ translate('Add New Address') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                            <a href="{{ route('home') }}" class="btn btn-link">
                                <i class="las la-arrow-left"></i>
                                {{ translate('Return to shop')}}
                            </a>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <button type="submit" class="btn btn-primary fw-600">{{ translate('Continue to Delivery Info')}}</a>
                        </div>
                    </div>
            </div>
            
        </div>
                </form>
    </div>
</section>


<script type="text/javascript">

window.onload = function(){
    
    $(document).on('change', '[name=billto_country_id]', function() {
        var country_id = $(this).val();
        get_states_billto(country_id);
    });

    $(document).on('change', '[name=billto_state_id]', function() {
        var state_id = $(this).val();
        get_city_billto(state_id);
    });
    
    
    
    
    
    function get_states_billto(country_id,selectedValue='') {
        $('[name="billto_state"]').html("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://vinayakmusic.com/get-states",
            type: 'POST',
            data: {
                country_id  : country_id,
                selected_value: selectedValue,
            },
            success: function (response) {
                var obj = JSON.parse(response);
                if(obj != '') {
                    $('[name="billto_state_id"]').html(obj);
                    AIZ.plugins.bootstrapSelect('refresh');
                }
            }
        });
    }

    function get_city_billto(state_id,selectedValue='') {
        $('[name="billto_city"]').html("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://vinayakmusic.com/get-cities",
            type: 'POST',
            data: {
                state_id: state_id,
                selected_value: selectedValue,
            },
            success: function (response) {
                var obj = JSON.parse(response);
                if(obj != '') {
                    $('[name="billto_city_id"]').html(obj);
                    AIZ.plugins.bootstrapSelect('refresh');
                }
            }
        });
    }
    
    <?php if($defaultAddress) { ?> get_states_billto('<?=$defaultAddress->country_id ?>','<?=$defaultAddress->state_id ?>'); <?php } ?>
    <?php if($defaultAddress) { ?> get_city_billto('<?=$defaultAddress->state_id ?>','<?=$defaultAddress->city_id ?>'); <?php } ?>
    
}
</script>
@endsection

@section('modal')
    @include('frontend.partials.address_modal')
@endsection