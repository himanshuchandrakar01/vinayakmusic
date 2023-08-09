@extends('backend.layouts.app')

@section('content')

<div class="card">
    
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Tracking List')}}</h5>
    </div>

            	<div class="card-body pt-4 p-3">
            		
                <table class="table">
                	<thead>
                		<th class="text-center">S.no</th>
                		<th class="text-center">AWB Number</th>
                        <th class="text-center">Tracking Link</th>
                        <th class="text-center">Image</th>    
                		<th class="text-center">Action</th>
                	</thead>

                	<tbody>
                		<?php $sl=1; foreach (DB::table('tracking_order')->get() as $track) { ?>
                		<tr>
                			<td class="text-center"><?=$sl++; ?></td>
                			<td class="text-center"><?=$track->awb_number ?></td>
                            <td class="text-center"><?=$track->tracking_link ?></td>
                            <td class="text-center"><img style="width: 130px;" src="<?=URL::to($track->image_upload); ?>"></td>
                			<td class="text-center"><a href='tracking-list/destroy/{{ $track->tid }}'>Delete</a></td>
                		</tr>
                	<?php } ?>
                	</tbody>

                </table>
            </div>
        </div>
        
@endsection