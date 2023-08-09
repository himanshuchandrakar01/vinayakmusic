<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
	<style media="all">
		@font-face {
            font-family: 'Roboto';
            src: url("{{ static_asset('fonts/Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Roboto';
            color: #333542;
        }
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}
		.small{
			font-size: .85rem;
		}
		.currency{

		}
	</style>
</head>
<body>
	<div>
		@php
			$logo = get_setting('header_logo');
		@endphp
		<div style="background: #eceff4;padding: 1.5rem;">
			<table>
				<tr>
					<td>
						@if($logo != null)
							<img loading="lazy"  src="{{ uploaded_asset($logo) }}" height="40" style="display:inline-block;">
						@else
							<img loading="lazy"  src="{{ static_asset('assets/img/logo.png') }}" height="40" style="display:inline-block;">
						@endif
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="font-size: 1.2rem;" class="strong">{{ get_setting('site_name') }}</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">{{ get_setting('contact_address') }}</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">{{  translate('Email') }}: {{ get_setting('contact_email') }}</td>
					<td class="text-right small"><span class="gry-color small">{{  translate('Order ID') }}:</span> <span class="strong">{{ $order->code }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small">{{  translate('Phone') }}: {{ get_setting('contact_phone') }}</td>
					<td class="text-right small"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>
				</tr>
			</table>

		</div>

		<div style="padding: 1.5rem;padding-bottom: 0">
		    <?php if($order->payment_type == 'bank_transfer') { ?>
            <table>
                <tr><td><br></td></tr>
                <tr><td>Hi <strong>{{ json_decode($order->billing_address)->name }}</strong>, <br><br></td></tr>
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
                        </table>
                    </td>
                </tr>
            </table>
            <p><b> If payment is not received within 24 hours of placing the order, it will be cancelled.</b></p>
            <?php } ?>
		    <table>
		        <tr>
		            <td style="text-align:left; width:50%">
                        <table>
            				@php
            					$billing_address = json_decode($order->billing_address);
            				@endphp
            				<tr><td class="strong small gry-color">{{ translate('Bill to') }}:</td></tr>
            				<tr><td class="strong">{{ $billing_address->name }}</td></tr>
            				<tr><td class="gry-color small">{{ $billing_address->address }}, {{ $billing_address->city }}, {{ $billing_address->country }}</td></tr>
            				<tr><td class="gry-color small">{{ translate('Email') }}: {{ $billing_address->email }}</td></tr>
            				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $billing_address->phone }}</td></tr>
            			</table>
		            </td>
		            <td style="text-align:right;">
                        <table>
            				@php
            					$shipping_address = json_decode($order->shipping_address);
            				@endphp
            				<tr><td class="strong small gry-color">{{ translate('Ship to') }}:</td></tr>
            				<tr><td class="strong">{{ $shipping_address->name }}</td></tr>
            				<tr><td class="gry-color small">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->country }}</td></tr>
            				<tr><td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email }}</td></tr>
            				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
            			</table>
		            </td>
		        </tr>
		    </table>
		</div>

	    <div style="padding: 1.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%">{{ translate('Product Name') }}</th>
						<th width="15%">{{ translate('Delivery Type') }}</th>
	                    <th width="10%">{{ translate('Qty') }}</th>
	                    <th class="text-center">{{ translate('Unit Price')}}</th>
                         <?php if($order->orderDetails->sum('discount')>0) { ?>
                        <th width="15%" class="text-left">{{ translate('Discount Price') }}</th>
                        <?php } ?>
	                    <?php if($shipping_address->country == 'India') { ?>
	                    <th width="10%" class="text-left">GST</th>
	                    <?php } ?>
	                    <th width="10%">{{ translate('Tax') }}</th>
	                    <th width="15%" class="text-right">{{ translate('Total') }}</th>
	                </tr>
				</thead>
				<tbody class="strong">
	                @foreach ($order->orderDetails as $key => $orderDetail)
		                @if ($orderDetail->product != null)
							<tr class="">
								<td>{{ $orderDetail->product->getTranslation('name') }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif</td>
								<td>
									@if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
										{{ translate('Home Delivery') }}
									@elseif ($orderDetail->shipping_type == 'pickup_point')
										@if ($orderDetail->pickup_point != null)
											{{ $orderDetail->pickup_point->getTranslation('name') }} ({{ translate('Pickip Point') }})
										@endif
									@endif
								</td>
								<td class="gry-color">{{ $orderDetail->quantity }}</td>
								<td class="gry-color currency">{{ single_price(($orderDetail->price + $orderDetail->discount)/$orderDetail->quantity) }}</td>
								<?php if($order->orderDetails->sum('discount')>0) { ?>
                            	<td class="currency">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
                            	 <?php } ?>
								<?php if($shipping_address->country == 'India') { ?>
								<td class="">{{$orderDetail->product->gst_percent??18}}%</td>
								<?php } ?>
								<td class="gry-color currency">{{ single_price($orderDetail->tax/$orderDetail->quantity) }}</td>
			                    <td class="text-right currency">{{ single_price($orderDetail->price+$orderDetail->tax) }}</td>
							</tr>
		                @endif
					@endforeach
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 1.5rem;">
	        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
		        <tbody>
			        <tr>
			            <th class="gry-color text-left">{{ translate('Sub Total') }}</th>
			            <td class="currency">{{ single_price($order->orderDetails->sum('price')) }}</td>
			        </tr>
			        
			        <?php 
			        $totalTax=0;
				        if($billing_address->country == 'India') {
				        
				         $isCGST = ($billing_address->state=='Chhattisgarh');
				         $totalTax = ($order->orderDetails->sum('shipping_cost')/1.18);
				         
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
				        
				        @foreach($taxPercents as $key => $value)
    		             <?php  if($isCGST) { ?>
    		            <tr class="border-bottom">
				            <th class="gry-color text-left">CGST (<?=$key/2 ?>%)</th>
				            <td class="currency"><?=single_price($value->amount/2) ?></td>
				        </tr>
				        <tr class="border-bottom">
				            <th class="gry-color text-left">SGST (<?=$key/2 ?>%)</th>
				            <td class="currency"><?=single_price($value->amount/2) ?></td>
				        </tr>
				        
				        <?php }else{ ?>
				        <tr class="border-bottom">
				            <th class="gry-color text-left">IGST (<?=$key ?>%)</th>
				            <td class="currency"><?=single_price($value->amount) ?></td>
				        </tr>
				        <?php } ?>
    		                    
    		                   
    							
    		               
    					@endforeach
    					
    					<?php } ?>
			        <tr>
			            <th class="gry-color text-left">{{ translate('Shipping Cost') }}</th>
			            <td class="currency">{{ single_price($order->orderDetails->sum('shipping_cost')/1.18) }}</td>
			        </tr>
			        
			        <!--<tr class="border-bottom">-->
			        <!--    <th class="gry-color text-left">{{ translate('Total Tax') }}</th>-->
			        <!--    <td class="currency">{{ single_price($order->orderDetails->sum('tax')) }}</td>-->
			        <!--</tr>-->
                    <tr class="border-bottom">
			            <th class="gry-color text-left">{{ translate('Coupon') }}</th>
			            <td class="currency">{{ single_price($order->coupon_discount) }}</td>
			        </tr>
			        <tr>
			            <th class="text-left strong">{{ translate('Grand Total') }}</th>
			            <td class="currency">{{ single_price($order->grand_total) }}</td>
			        </tr>
		        </tbody>
		    </table>
	    </div>

	</div>
</body>
</html>
