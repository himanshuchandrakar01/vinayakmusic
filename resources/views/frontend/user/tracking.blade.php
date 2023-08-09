@extends('frontend.layouts.user_panel')

@section('panel_content')

<div class="card">
    <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Track Your Order') }}</h5>
        </div>
        
        
      
    <div class="card-body">
        <p>AWB Number:  <?=$order->awb_number?></p>
        <p>Tracking link: <a href="<?=$order->tracking_link ?>" target="_blank"><?=$order->tracking_link ?></a></p>
        <p>Image:<img style="width: 130px;" src="<?=URL::to($order->image_upload);?>"></p>
    </div>
    
    
</div>

@endsection