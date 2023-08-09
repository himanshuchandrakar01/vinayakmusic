<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{  translate('PACKING SLIP') }}</title>
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
				    <td style="font-size: 1.9rem;" class="strong">PACKING SLIP</td>
					<td class="text-right">
						@if($logo != null)
							<img src="{{ uploaded_asset($logo) }}" height="70" width="130" style="display:inline-block;">
						@else
							<img src="{{ static_asset('assets/img/logo.png') }}" height="70" width="130" style="display:inline-block;">
						@endif
					</td>
					
				</tr>
			</table>
			<center style="font-size: 25px; color: red;">Fragile Handle With Care</center>
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
					<td class="gry-color small"><span class="gry-color small">{{  translate('Order No.') }}:</span> <span class="strong">{{ $order->code }}    {{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></span></td>
					<!--<td class="gry-color small"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>-->
				</tr>
				<!--<tr>-->
				<!--	<td class="gry-color small">{{  translate('Phone') }}: {{ get_setting('contact_phone') }}</td>-->
				<!--	<td class="text-right small"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>-->
				<!--</tr>-->
			</table>

		</div>

		<div style="padding: 1rem;padding-bottom: 0">
		    <h4>PACKING SLIP</h4>
            <table>
				@php
					$shipping_address = json_decode($order->shipping_address);
				@endphp
				<tr><td class="strong small gry-color">{{ translate('Ship To') }}:</td></tr>
				<tr><td class="strong">{{ $shipping_address->name }}</td></tr>
				<tr><td class="gry-color small">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->postal_code }}, {{ $shipping_address->country }}</td></tr>
				<tr><td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email }}</td></tr>
				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
			</table>
		</div>

	    <div style="padding: 1rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%" class="text-left">{{ translate('Product Name') }}</th>
	                    <!--<th width="35%" class="text-left">{{ translate('HSN Code') }}</th>-->
						<!--<th width="15%" class="text-left">{{ translate('Delivery Type') }}</th>-->
	                    <th width="10%" class="text-left">{{ translate('Qty') }}</th>
	                    <!--<th width="15%" class="text-left">{{ translate('Unit Price') }}</th>-->
	                    <!--<th width="10%" class="text-left">{{ translate('Tax') }}</th>-->
	                    <!--<th width="15%" class="text-right">{{ translate('Total') }}</th>-->
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
								<!--<td>{{ $orderDetail->product->hsn_code }}</td>-->
								<!--<td>-->
								<!--	@if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')-->
								<!--		{{ translate('Home Delivery') }}-->
								<!--	@elseif ($orderDetail->shipping_type == 'pickup_point')-->
								<!--		@if ($orderDetail->pickup_point != null)-->
								<!--			{{ $orderDetail->pickup_point->getTranslation('name') }} ({{ translate('Pickip Point') }})-->
								<!--		@endif-->
								<!--	@endif-->
								<!--</td>-->
								<td class="">{{ $orderDetail->quantity }}</td>
								<!--<td class="currency">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>-->
								<!--<td class="currency">{{ single_price($orderDetail->tax/$orderDetail->quantity) }}</td>-->
			                    <!--<td class="text-right currency">{{ single_price($orderDetail->price+$orderDetail->tax) }}</td>-->
							</tr>
		                @endif
					@endforeach
	            </tbody>
			</table>
		</div>

	   

	</div>
</body>
</html>
