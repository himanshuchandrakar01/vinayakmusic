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
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('1. My Cart')}}</h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('2. Shipping info')}}</h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('3. Delivery info')}}</h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('4. Payment')}}</h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('5. Confirmation')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container text-left">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    @php
                        $first_order = $combined_order->orders->first()
                    @endphp
                    <div class="text-center py-4 mb-4">
                        <i class="la la-check-circle la-3x text-success mb-3"></i>
                        <h1 class="h3 mb-3 fw-600">{{ translate('Thank You for Your Order!')}}</h1>
                        <p class="opacity-70 font-italic">{{  translate('A copy or your order summary has been sent to') }} {{ json_decode($first_order->shipping_address)->email }}</p>
                    </div>
                    <?php if($first_order->payment_type == 'bank_transfer') { ?>
                    <div class="mb-4 bg-white p-4 rounded shadow-sm">
                        <table class="padding">
                            <!--<tr><td class="h6 text-center text-success">Thank you for your order <br></td></tr>-->
                            <tr><td>Hi <strong>{{ json_decode($first_order->billing_address)->name }}</strong>,<br><br></td></tr>
                            <tr><td>Thanks for your order. It’s on-hold until we confirm that payment has been received. In the meantime, here’s a reminder of what you ordered:</td></tr>
                            <tr><td><br><br><strong>Our Bank Details : </strong></td></tr>
                            <tr>
                                <td>
                                    <table class="padding">
                                        <tr>
                                            <td>
                                                Bank: State Bank of India<br>
                                                Account number: 35099794963<br>
                                                IFSC: SBIN0017731<br>
                                                Swift Code: SBININBB646<br>
                                            </td>
                                        </tr>
                                        <tr><td><b>If payment is not received within 24 hours of placing the order, it will be cancelled.</b></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php } ?>
                      <!--<p> If payment is not received within 24 hours of placing the order it will be cancelled.</p>  -->
                    <div class="mb-4 bg-white p-4 rounded shadow-sm">
                        <h4 class="fw-600 mb-3 fs-17 pb-2">{{ translate('Order Summary')}}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                <img style="width: 328px; height: 127px;" src="{{ static_asset('assets/img/header_logo.jpg') }}">
                                <!--<table class="table">-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Order date')}}:</td>-->
                                <!--        <td>{{ date('d-m-Y H:i A', $first_order->date) }}</td>-->
                                <!--    </tr>-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Name')}}:</td>-->
                                <!--        <td>{{ json_decode($first_order->shipping_address)->name }}</td>-->
                                <!--    </tr>-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Email')}}:</td>-->
                                <!--        <td>{{ json_decode($first_order->shipping_address)->email }}</td>-->
                                <!--    </tr>-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Shipping address')}}:</td>-->
                                <!--        <td>{{ json_decode($first_order->shipping_address)->address }}, {{ json_decode($first_order->shipping_address)->city }}, {{ json_decode($first_order->shipping_address)->country }}</td>-->
                                <!--    </tr>-->
                                <!--</table>-->
                            </div>
                            <div class="col-md-6">
                                <br>
                                <p>Vinayak Sales</p>
                                 <p>Flat no. 102, ground floor,</p>
                                 <p>Abhijat Apartment,</p>
                                 <p>Near PG Umathe, Kanya Shala,</p>
                                 <p>Shanti Nagar, Raipur, Chhattisgarh, PIN –</p> 
                                 <p>492001</p>
                                 <p>Phone: 9630098332</p>
                                 <p>Email: vinayaksalesrpr@gmail.com </p>
                                 <p>GST Number : 22AGOPR9703M1ZT</p>
                                 <p>State Code : 22</p>
                                <!--<table class="table">-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Order status')}}:</td>-->
                                <!--        <td>{{ translate(ucfirst(str_replace('_', ' ', $first_order->delivery_status))) }}</td>-->
                                <!--    </tr>-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Total order amount')}}:</td>-->
                                <!--        <td>{{ single_price($combined_order->grand_total) }}</td>-->
                                <!--    </tr>-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Shipping')}}:</td>-->
                                <!--        <td>{{ translate('Flat shipping rate')}}</td>-->
                                <!--    </tr>-->
                                <!--    <tr>-->
                                <!--        <td class="w-50 fw-600">{{ translate('Payment method')}}:</td>-->
                                <!--        <td>{{ ucfirst(str_replace('_', ' ', $first_order->payment_type)) }}</td>-->
                                <!--    </tr>-->
                                <!--</table>-->
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <table class="table">
                                    @php
                    					$shipping_address = json_decode($first_order->shipping_address);
                    					$billing_address = json_decode($first_order->billing_address);
                    				@endphp
                                    <br>
                                    <br>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Order date')}}:</td>
                                        <td>{{ date('d-m-Y H:i A', $first_order->date) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Name')}}:</td>
                                        <td>{{ json_decode($first_order->shipping_address)->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Email')}}:</td>
                                        <td>{{ json_decode($first_order->shipping_address)->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Shipping address')}}:</td>
                                        <td>{{ json_decode($first_order->shipping_address)->address }}, {{ json_decode($first_order->shipping_address)->city }}, {{ json_decode($first_order->shipping_address)->country }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('GSTIN Number')}}:</td>
                                        <td>{{ $first_order->gst_registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Customer Remark')}}:</td>
                                        <td>{{ $first_order->customer_remark }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <br>
                                <br>
                                <table class="table">
                                    <!--<?php $invoice= 1441; ?>-->
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Order status')}}:</td>
                                        <td>{{ translate(ucfirst(str_replace('_', ' ', $first_order->delivery_status))) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Invoice No.')}} :</td>
                                        <td>{{$first_order->id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Total order amount')}}:</td>
                                        <td>{{ single_price($combined_order->grand_total) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Shipping')}}:</td>
                                        <td>{{ translate('Flat shipping rate')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Payment method')}}:</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $first_order->payment_type)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Registered Company Name')}}:</td>
                                        <td>{{ $first_order->registered_company }}</td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                    @foreach ($combined_order->orders as $order)
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body">
                                <div class="text-center py-4 mb-4">
                                    <h2 class="h5">{{ translate('Order Code:')}} <span class="fw-700 text-primary">{{ $order->code }}</span></h2>
                                </div>
                                <div>
                                    <h5 class="fw-600 mb-3 fs-17 pb-2">{{ translate('Order Details')}}</h5>
                                    <div>
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="30%">{{ translate('Product')}}</th>
                                                    <th class="text-center">{{ translate('HSN Code')}}</th>
                                                    <th class="text-center">{{ translate('Quantity')}}</th>
                                                    <!-- <th>{{ translate('Delivery Type')}}</th> -->
                                                    <th class="text-center">{{ translate('Unit Price')}}</th>
                                                     <?php if($order->orderDetails->sum('discount')>0) { ?>
                            	                    <th width="15%" class="text-left">{{ translate('Discount Price') }}</th>
                            	                    <?php } ?>
                                                    <?php if($shipping_address->country == 'India') { ?>
                            	                    <th class="text-center">GST</th>
                            	                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $pstock = new App\Models\ProductStock(); ?>
                                                @foreach ($order->orderDetails as $key => $orderDetail)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            @if ($orderDetail->product != null)
                                                                <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank" class="text-reset">
                                                                    {{ $orderDetail->product->getTranslation('name') }}
                                                                    @php
                                                                        if($orderDetail->combo_id != null) {
                                                                            $combo = \App\ComboProduct::findOrFail($orderDetail->combo_id);

                                                                            echo '('.$combo->combo_title.')';
                                                                        }
                                                                    @endphp
                                                                </a>
                                                                
                                                                <p>Sku: {{ $orderDetail->sku }} </p>
                                                                 <p>Weight: <a href="{{ route('product', $orderDetail->product->product_weight) }}" target="_blank" class="text-reset">
                                                                    {{ $orderDetail->product->getTranslation('product_weight') }}
                                                                    @php
                                                                        if($orderDetail->combo_id != null) {
                                                                            $combo = \App\ComboProduct::findOrFail($orderDetail->combo_id);

                                                                            echo '('.$combo->combo_title.')';
                                                                        }
                                                                    @endphp
                                                                </a>gm</p>
                                                            @else
                                                                <strong>{{  translate('Product Unavailable') }}</strong>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank" class="text-reset">
                                                                    {{ $orderDetail->product->hsn_code }}
                                                                    @php
                                                                        if($orderDetail->combo_id != null) {
                                                                            $combo = \App\ComboProduct::findOrFail($orderDetail->combo_id);

                                                                            echo '('.$combo->combo_title.')';
                                                                        }
                                                                    @endphp
                                                                </a>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $orderDetail->quantity }}
                                                        </td>
                                                        <td class="currency">{{ single_price(($orderDetail->price + $orderDetail->discount)/$orderDetail->quantity) }}</td>
                                                        <!-- <td>
                                                            @if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
                                                                {{  translate('Home Delivery') }}
                                                            @elseif ($orderDetail->shipping_type == 'pickup_point')
                                                                @if ($orderDetail->pickup_point != null)
                                                                    {{ $orderDetail->pickup_point->getTranslation('name') }} ({{ translate('Pickip Point') }})
                                                                @endif
                                                            @endif
                                                        </td> -->
                                                        <?php if($order->orderDetails->sum('discount')>0) { ?>
                            							<td class="currency">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
                            							   <?php } ?>
                                                        <?php if($shipping_address->country == 'India') { ?>
                        								<td class="">{{$orderDetail->product->gst_percent??18}}%</td>
                        								<?php } ?>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-5 col-md-6 ml-auto mr-0">
                                            <table class="table ">
                                                <tbody>
                                                    <tr>
                                                        <th>{{ translate('Subtotal')}}</th>
                                                        <td class="text-right">
                                                            <span class="fw-600">{{ single_price($order->orderDetails->sum('price')) }}</span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php 
                                                    $totalTax=0;
                							        if($billing_address->country == 'India') {
                							        
                							         $isCGST = ($billing_address->state=='Chhattisgarh');
                							         $totalTax = ( $order->orderDetails->sum('shipping_cost')) /1.18;
                							         
                							         $taxPercents[18] = (object) ['amount' => ($order->orderDetails->sum('shipping_cost') - $totalTax)];
                							         foreach ($order->orderDetails as $key => $orderDetail){
                                		                if ($orderDetail->product != null){
                                		                  //  if (!in_array($orderDetail->product->gst_percent, $taxPercents['percent']))
                                		                    if (!isset($taxPercents[$orderDetail->product->gst_percent])) 
                                		                    {
                                		                        
                                		                        $taxPercents[$orderDetail->product->gst_percent] = 
                                		                            (object) ['amount' => ($orderDetail->tax)];
                                		                    }else{
                                		                        $amount = $taxPercents[$orderDetail->product->gst_percent]->amount;
                                		                        $amount += ($orderDetail->tax);
                                		                        $taxPercents[$orderDetail->product->gst_percent] = 
                                		                            (object) ['amount' => ($amount)];
                                		                    }
                                		                
                							         }
                							         
                							         }
                							        ?>
                							        
                							        <tr>
                                                        <th>{{ translate('Shipping')}}</th>
                                                        <td class="text-right">
                                                            <span class="font-italic">{{ single_price($order->orderDetails->sum('shipping_cost')/1.18) }}</span>
                                                        </td>
                                                    </tr>
                							        
                							        @foreach($taxPercents as $key => $value)
                							        
                                		             <?php  if($isCGST) { ?>
                                		            <tr class="text-right">
                							            <th class="gry-color text-left">CGST (<?=$key/2 ?>%)</th>
                							            <td class="text-right font-italic"><?=single_price(floatval($value->amount/2)) ?></td>
                							        </tr>
                							        <tr class="text-right">
                							            <th class="gry-color text-left">SGST (<?=$key/2 ?>%)</th>
                							            <td class="text-right font-italic"><?=single_price(floatval($value->amount/2)) ?></td>
                							        </tr>
                							        
                							        <?php }else{ ?>
                							        <tr class="text-right">
                							            <th class="gry-color text-left">IGST (<?=$key ?>%)</th>
                							            <td class="text-right font-italic"><?=single_price(floatval($value->amount)) ?></td>
                							        </tr>
                							        <?php } ?>
                                		                    
                                		                   
                                							
                                		               
                                					@endforeach
                                					
                                					<?php } else{ ?>
                                					<tr>
                                                        <th>{{ translate('Shipping')}}</th>
                                                        <td class="text-right">
                                                            <span class="font-italic">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</span>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    
                                                    
                                					<?php if($order->custom_clearance){ ?>
                                					<tr class="cart-shipping">
                                                        <th>{{translate('Custom Clearace Charges')}}</th>
                                                        <td class="text-right">
                                                            <span class="font-italic">{{ single_price($order->custom_clearance) }}</span>
                                                        </td>
                                                    </tr>
                                					<?php } ?>
                                					
                                                    <!--<tr>-->
                                                    <!--    <th>{{ translate('Tax')}}</th>-->
                                                    <!--    <td class="text-right">-->
                                                    <!--        <span class="font-italic">{{ single_price($order->orderDetails->sum('tax')) }}</span>-->
                                                    <!--    </td>-->
                                                    <!--</tr>-->
                                                    <tr>
                                                        <th>{{ translate('Coupon Discount')}}</th>
                                                        <td class="text-right">
                                                            <span class="font-italic">{{ single_price($order->coupon_discount) }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="fw-600">{{ translate('Total')}}</span></th>
                                                        <td class="text-right">
                                                            <strong><span>{{ single_price($order->grand_total) }}</span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
