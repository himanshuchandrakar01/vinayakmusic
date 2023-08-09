@extends('backend.layouts.app')
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> -->
@section('content')



<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css"> -->
 

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class=" align-items-center">
       <h1 class="h3">{{translate('Staff Report')}}</h1>
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
                            <th>{{ translate('Staff Name') }}</th>
                            <th>{{ translate('Product Name') }}</th>
                            <th>{{ translate('Product SKU') }}</th>
                            <th>{{ translate('Quantity') }}</th>
                            <th>{{ translate('Unit Price') }}</th>
                            <th>{{ translate('GST Percent') }}</th>
                            <th>{{ translate('Date') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $sl=1;
                            $users = new App\Models\User();
                            // $sku = new App\Models\ProductTranslation();
                          foreach (DB::table('products')->select('products.*', 'product_stocks.*')->leftJoin('product_stocks','products.id','=','product_stocks.product_id')->get() as $productsitem) {
                            // $products =  App\Models\Product::all();
                           ?>
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td><?php 
                                            $user = $users->find($productsitem->uploaded_by);  
                                            echo $user['user_type']??'';
                                        ?></td>
                                <td>{{ $productsitem->name }}</td>
                                <td>{{ $productsitem->sku }}</td>
                                <td>{{ $productsitem->qty }}</td>
                                <td>{{ $productsitem->unit_price }}</td>
                                <td>{{ $productsitem->gst_percent }}%</td>
                                <td>{{ $productsitem->created_at }}</td>
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

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#example');
</script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
    new DataTable('#example');
</script> -->
@endsection