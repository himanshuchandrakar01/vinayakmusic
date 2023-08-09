<?php Session::put('order_id',$order->id); ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{  translate('INVOICE') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
	<style media="all">
        @page {
			margin: 0;
			padding:0;
		}
		body{
			font-size: 0.875rem;
            font-family: '<?php echo  $font_family ?>';
            font-weight: normal;
            direction: <?php echo  $direction ?>;
            text-align: <?php echo  $text_align ?>;
			padding:0;
			margin:0; 
		}
		.gry-color *,
		.gry-color{
			color:#000;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .25rem .7rem;
		}
		table.padding td{
			padding: .25rem .7rem;
		}
		table.sm-padding td{
			padding: .1rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:<?php echo  $text_align ?>;
		}
		.text-right{
			text-align:<?php echo  $not_text_align ?>;
		}
	</style>
</head>
<body>
	<div>

		@php
			$logo = get_setting('header_logo');
		@endphp

		<div style="background: #eceff4;padding: 1rem;">
			<table>
				<tr>
				    <td style="font-size: 1.9rem;" class="strong"><b>{{  translate('INVOICE') }}</b></td>
					<td class="text-right">
						@if($logo != null)
							<img src="{{ uploaded_asset($logo) }}" height="70" width="130" style="display:inline-block;">
						@else
							<img src="{{ static_asset('assets/img/logo.png') }}" height="70" width="130" style="display:inline-block;">
						@endif
					</td>
					
				</tr>
			</table>
			<table>
				<!--<tr>-->
				<!--	<td style="font-size: 1rem;" class="strong">{{ get_setting('site_name') }}</td>-->
				<!--	<td class="text-right"></td>-->
				<!--</tr>-->
				<tr>
					<td class="gry-color small"><b style="font-size: 20px;">Vinayak Sales</b><br>
					Vinayak Villa, Deopuri-Amlidhi Road<br>
                            Near Bajrang Loha Bada Shop & Puja Plastic Factory, <br>
                            Deopuri, Raipur, Chhattisgarh-492015<br>
                                 Phone: 9630098332<br>
                                 Email: vinayaksalesrpr@gmail.com <br>
                                 GST Number : 22AGOPR9703M1ZT<br>
                                 State Code : 22<br></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<!--<td class="gry-color small">{{  translate('Email') }}: {{ get_setting('contact_email') }}</td>-->
					<td class="gry-color small"><span class="gry-color small">{{  translate('Order No.') }}:</span> <span class="strong">{{ $order->code }}</span></span></td>
					<td class="text-right"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>
				</tr>
				<!--<tr>-->
				<!--	<td class="gry-color small">{{  translate('Phone') }}: {{ get_setting('contact_phone') }}</td>-->
				<!--	<td class="text-right small"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>-->
				<!--</tr>-->
				
				<tr>
				    <td class="gry-color small">{{ translate('Invoice No.')}}:  {{$order->id}} </span></td>
				    <td class="text-right">{{ translate('Invoice Date')}}: <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>
                    <!--<td class="w-50 fw-600">{{ translate('GSTIN Number')}}:</td>-->
                    <!--<td class="w-50 fw-600">{{ translate('Registered Company Name')}}:</td>-->
				</tr>
			</table>

		</div>

    <div class="row">
        <?php if($order->payment_type == 'bank_transfer') { ?>
        <!--<table class="padding">-->
        <!--    <tr><td>Thank you for your order <br></td></tr>-->
        <!--    <tr><td>Hi <strong>{{ json_decode($order->billing_address)->name }}</strong>, <br><br></td></tr>-->
        <!--    <tr><td>Thanks for your order. It’s on-hold until we confirm that payment has been received. In the meantime, here’s a reminder of what you ordered:</td></tr>-->
        <!--    <tr><td><br><br><strong>Our Bank Details : </strong></td></tr>-->
        <!--    <tr>-->
        <!--        <td>-->
        <!--            <table class="padding">-->
        <!--                <tr>-->
        <!--                    <td>-->
        <!--                        Bank: State Bank of India<br>-->
        <!--                        Account number: 35099794963<br>-->
        <!--                        IFSC: SBIN0017731<br>-->
        <!--                        Swift Code: SBININBB646<br>-->
        <!--                    </td>-->
        <!--                </tr>-->
        <!--            </table>-->
        <!--        </td>-->
        <!--    </tr>-->
        <!--</table>-->
        <?php } ?>
        <table class="padding">
            <tr>
                <td>
                    <table>
                        <?php if($order->billing_address) { ?>
        				@php
        					$billing_address = json_decode($order->billing_address);
        				@endphp
        				<tr><td class="strong small gry-color">{{ translate('Bill to') }}:</td></tr>
        				<tr><td class="strong">{{ $billing_address->name }}</td></tr>
        				<tr><td  width="50%" class="gry-color small">{{ $billing_address->address }}, {{ $billing_address->city }}, {{ $billing_address->postal_code }}, {{ $billing_address->country }}</td></tr>
        				<tr><td class="gry-color small">{{ translate('Email') }}: {{ $billing_address->email }}</td></tr>
        				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $billing_address->phone }}</td></tr>
        				
        				<?php }else{ ?>
        				@php
        					$shipping_address = json_decode($order->shipping_address);
        				@endphp
        				<tr><td class="strong small gry-color">{{ translate('Ship to') }}:</td></tr>
        				<tr><td class="strong">{{ $shipping_address->name }}</td></tr>
        				<tr><td  width="50%" class="gry-color small">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->postal_code }}, {{ $shipping_address->country }}</td></tr>
        				<tr><td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email }}</td></tr>
        				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
        				
        				<?php } ?>
        				
        				<?php if($order->gst_registration_number != "N/A"){ ?>
        				<tr><td class="gry-color small">{{ translate('Company Name') }}: {{ $order->registered_company }}</td></tr>
        				<tr><td class="gry-color small">{{ translate('GST NO') }}: {{ $order->gst_registration_number }}</td></tr>
        				<?php } ?>
        			</table>
                </td>
                <td style="text-align:right">
                    <table>
        				@php
        					$shipping_address = json_decode($order->shipping_address);
        				@endphp
        				<tr><td class="strong small gry-color">{{ translate('Ship to') }}:</td></tr>
        				<tr><td class="strong">{{ $shipping_address->name }}</td></tr>
        				<tr><td  width="50%" class="gry-color small">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->postal_code }}, {{ $shipping_address->country }}</td></tr>
        				<tr><td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email }}</td></tr>
        				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
        			</table>
                </td>
            </tr>
        </table>   
		

	    <div style="padding: 1rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%" class="text-left">{{ translate('Product Name') }}</th>
	                    <th width="35%" class="text-left">{{ translate('HSN Code') }}</th>
						<!--<th width="15%" class="text-left">{{ translate('Delivery Type') }}</th>-->
	                    <th width="10%" class="text-left">{{ translate('Qty') }}</th>
	                    <th width="10%" class="text-left">{{ translate('Unit Price') }}</th>
	                    <?php if($order->orderDetails->sum('discount')>0) { ?>
	                    <th width="15%" class="text-left">{{ translate('Discount Price') }}</th>
	                    <?php } ?>
	                    <?php if(($billing_address->country??$shipping_address->country) == 'India') { ?>
	                    <th width="10%" class="text-left">GST</th>
	                    <?php } ?>
	                    <th width="10%" class="text-left">{{ translate('Tax') }}</th>
	                    <th width="15%" class="text-right">{{ translate('Total') }}</th>
	                </tr>
				</thead>
				<tbody class="strong">
	                @foreach ($order->orderDetails as $key => $orderDetail)
		                @if ($orderDetail->product != null)
							<tr class="">
								<td>{{ $orderDetail->product->name }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif
								<p>Sku: {{ $orderDetail->sku }}</p>
								<p>Weight:{{ $orderDetail->product->product_weight }}gm</p>
								
								</td>
								<td>{{ $orderDetail->product->hsn_code }}</td>
								
								<td class="">{{ $orderDetail->quantity }} </td>
								<td class="currency">{{ single_price(($orderDetail->price + $orderDetail->discount)/$orderDetail->quantity) }}</td>
								<?php if($order->orderDetails->sum('discount')>0) { ?>
								<td class="currency">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
							    <?php } ?>
								<?php if(($billing_address->country??$shipping_address->country) == 'India') { ?>
								<td class="">{{$orderDetail->product->gst_percent??18}}%</td>
								<?php } ?>
								<td class="currency">{{ single_price($orderDetail->tax/$orderDetail->quantity) }}</td>
			                    <td class="text-right currency">{{ single_price($orderDetail->price+$orderDetail->tax) }}</td>
							</tr>
		                @endif
					@endforeach
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 1.5rem;">
	        <table class="text-right sm-padding small strong">
	        	<thead>
	        		<tr>
	        			<th width="60%"></th>
	        			<th width="40%"></th>
	        		</tr>
	        	</thead>
		        <tbody>
			        <tr>
			            <td class="text-left">
			                <?php if($order->customer_remark !="N/A") { ?>
			                <p><u>Customer Remarks</u></b> <br><br>
			                <small><?=$order->customer_remark ?></small>
			                <?php } ?>
			            </td>
			            <td>
					        <table class="text-right sm-padding small strong">
						        <tbody>
							        <tr>
							            <th class="gry-color text-left">{{ translate('Sub Total') }}</th>
							            <td class="currency">{{ single_price($order->orderDetails->sum('price')) }}</td>
							        </tr>
							        
							        
							        <?php 
							        $totalTax=0;
							        if(($billing_address->country??$shipping_address->country) == 'India') {
							        
							         $isCGST = (($billing_address->state??$shipping_address->state)=='Chhattisgarh');
							         $totalTax =  $order->orderDetails->sum('shipping_cost')/1.18;
							         
							         $taxPercents[18] = (object) ['amount' => ($order->orderDetails->sum('shipping_cost') - $totalTax)];
							         foreach ($order->orderDetails as $key => $orderDetail){
                		                if ($orderDetail->product != null){
                		                  //  if (!in_array($orderDetail->product->gst_percent, $taxPercents['percent']))
                		                    if (!isset($taxPercents[$orderDetail->product->gst_percent])) 
                		                    {
                		                        
                		                        $taxPercents[$orderDetail->product->gst_percent] = 
                		                            (object) ['amount' => ($orderDetail->tax)];
                		                          //  (object) ['amount' => ($orderDetail->tax/$orderDetail->quantity)];
                		                    }else{
                		                        $amount = $taxPercents[$orderDetail->product->gst_percent]->amount;
                		                        $amount += ($orderDetail->tax);
                		                      //  $amount += ($orderDetail->tax/$orderDetail->quantity);
                		                        $taxPercents[$orderDetail->product->gst_percent] = 
                		                            (object) ['amount' => ($amount)];
                		                    }
                		                
							         }
							         
							         }
							        ?>
							        
							        <tr>
							            <th class="gry-color text-left">{{ translate('Shipping Cost') }}</th>
							            <td class="currency">{{ single_price($order->orderDetails->sum('shipping_cost')/1.18) }}</td>
							        </tr>
							        
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
                					
                					<?php }else{ ?>
                					<tr>
							            <th class="gry-color text-left">{{ translate('Shipping Cost') }}</th>
							            <td class="currency">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</td>
							        </tr>
							        <tr class="border-bottom">
							            <th class="gry-color text-left">Custom Clearance</th>
							            <td class="currency"><?=single_price($order->custom_clearance) ?></td>
							        </tr>
                					<?php } ?>
               <!-- 					<tr class="border-bottom">-->
							        <!--    <th class="gry-color text-left">{{ translate('Total Tax') }}</th>-->
							        <!--    <td class="currency">{{ single_price($order->orderDetails->sum('tax') + ($totalTax)) }}</td>-->
							        <!--</tr>-->
				                    <tr class="border-bottom">
							            <th class="gry-color text-left">{{ translate('Coupon Discount') }}</th>
							            <td class="currency">{{ single_price($order->coupon_discount) }}</td>
							        </tr>
							        <tr>
							            <th class="text-left strong">{{ translate('Grand Total') }}</th>
							            <td class="currency">{{ single_price($order->grand_total ) }}</td>
							        </tr>
						        </tbody>
						    </table>
			            </td>
			        </tr>
		        </tbody>
		    </table>
	    </div>

	</div>
	
	<hr>
	<footer>
    	<p style="color: grey; text-align:center">SUBJECT TO RAIPUR JURISDICTION<br>
    	This is a Computer Generated Invoice</p>
	</footer>

</body>
</html>
<?php Session::forget('order_id'); ?>