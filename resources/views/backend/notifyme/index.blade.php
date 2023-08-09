@extends('backend.layouts.app')

@section('content')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css"> -->


<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class=" align-items-center">
       <h1 class="h3">{{translate('Notify Me')}}</h1>
	</div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            
            <div class="card-body">
                <table class="table table-bordered aiz-table mb-0" id="example">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>{{ translate('Product Name') }}</th>
                            <th>{{ translate('Name') }}</th>
                            <th>{{ translate('Contact No') }}</th>
                            <th>{{ translate('Email') }}</th>
                            <th>{{ translate('Date') }}</th>
                            <th>{{ translate('Action') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $sl=1;
                          foreach (DB::table('notify_me')->get() as $notify_me) { ?>
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $notify_me->product_id }}</td>
                                <td class="text-center">{{ $notify_me->name }}</td>
                                <td class="text-center">{{ $notify_me->contact_no }}</td>
                                <td class="text-center">{{ $notify_me->email }}</td>
                                <td class="text-center">{{ $notify_me->create_at }}</td>
                                <td class="text-center"> <a href="{{route('notify.destroy', $notify_me->nid)}}" class="text-danger"><i class="las la-trash"></i></a></td>
                            </tr>
                         <?php } ?>
                    </tbody>
                   
                </table>
                <div class="aiz-pagination mt-4">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection