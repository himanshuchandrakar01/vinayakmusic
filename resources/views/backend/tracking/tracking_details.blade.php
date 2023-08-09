@extends('backend.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Tracking details')}}</h5>
    </div>
    
    
    <div class="card-body">
        <form action="tracking-details" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
        <div class="form-group row">
                <label class="col-md-3 col-from-label">{{translate('AWB Number')}} <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="awb_number" placeholder="{{ translate('AWB Number') }}" required>
                    </div>
        </div>
        
        <div class="form-group row">
                <label class="col-md-3 col-from-label">{{translate('Tracking link')}} <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="tracking_link" placeholder="{{ translate('Tracking link') }}" required>
                    </div>
        </div>
        
        <div class="form-group row">
                <label class="col-md-3 col-from-label">{{translate('Upload Image')}} <span class="text-danger"></span></label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="image_upload" placeholder="{{ translate('Upload Image') }}">
                    </div>
        </div>
        
        <button style="float:right;" type="submit" name="button" value="save" class="btn btn-warning">{{ translate('Save') }}</button>
         </form>
    </div>
   
</div>

@endsection