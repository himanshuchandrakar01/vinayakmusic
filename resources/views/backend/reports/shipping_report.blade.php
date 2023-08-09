@extends('backend.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<style>
    .card .card-body {
    padding: 13px 8px;
    border-radius: 4px;
}
</style>
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class=" align-items-center">
       <h1 class="h3">{{translate('Complete Order Report')}}</h1>
	</div>
</div>

<div class="row">
    
    <div class="col-md-12 mx-auto">
        <div class="card">
            
            
            <div class="card-body">
                <form action="" method="GET">
                <div class="row">
                    
                        <div class="col-sm-4">
                        <input type="date" name="from" value="<?=$_GET['from']??'' ?>" class="form-control">
                        </div>
                        <div class="col-sm-4">
                        <input type="date" name="to" value="<?=$_GET['to']??'' ?>" class="form-control">
                        </div>
                        <div class="col-sm-2">
                        <button class="btn btn-warning">GET</button></div>
                    
            </div>
            </form>
            <br>
            
            <form> 
                <!--<input type="search" class="form-control" placeholder="Find user here" name="search">-->
    
                <table class="table table-bordered aiz-table mb-0" id="yourHtmTable">
                   <!--<a href="https://vinayakmusic.com/admin/download/shipping-report"><button class="btn btn-info">Download Report</button></a>-->
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>{{ translate('Order Date') }}</th>
                            <th>{{ translate('Order Number') }}</th>
                            <th>{{ translate('Order Currency') }}</th>
                            <th>{{ translate('Customer Name') }}</th>
                            <!--<th>{{ translate('Product Sku') }}</th>-->
                            <th>{{ translate('Product Weight') }}</th>
                            <th>{{ translate('Order Total') }}</th>
                            <th>{{ translate('Shipping Through') }}</th>
                            <th>{{ translate('Tracking Number') }}</th>
                            <th>{{ translate('Shipping Cost With GST') }}</th>
                            <th>{{ translate('Invoice No.') }}</th>
                            <th>{{ translate('Invoice Date.') }}</th>
                            <!--<th>{{ translate('Action') }}</th>-->
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $sl=1;
                            use Illuminate\Support\Facades\DB;
                            // $orderdetail = new App\Models\OrderDetail();
                            ?>
                           
                         @foreach($orders as $order)
                         
                         <?php 
                            $orderDetails = DB::table('order_details')->where('order_id',$order->id)->get();
                            
                            // $productStocks = DB::table('product_stocks')->where('product_id',$list->product_id)->first();
                            
                            $totalWeight = 0;
                            $totalShipping = 0;
                            foreach($orderDetails as $od)
                            {
                                $product = DB::table('products')->where('id',$od->product_id)->first();
                                $totalWeight += $product->product_weight;
                                $totalShipping += $od->shipping_cost;
                            }
                            if($order->billing_address) {
        				
        					$billing_address = json_decode($order->billing_address);
        					
                            }
                            
                         ?>
                            <tr>
                                <td><?=$sl++; ?></td>
                                <td><?=$order->created_at; ?></td>
                                <td><?=$order->code; ?></td>
                                <td><?=$order->currency_symbol; ?></td>
                                <td><?=$billing_address->name ?></td>
                                <td><?=$totalWeight ?> gm</td>
                                <td><?=$order->grand_total; ?></td>
                                <td><?=$order->shipping_through; ?></td>
                                <td><?=$order->awb_number; ?></td>
                                <td><?=$totalShipping ?></td>
                                <td><?=$order->id; ?></td>
                                <td><?=$order->created_at; ?></td>
                               
                               
                                <!--<td><a href="">Edit</a></td>-->
                            </tr>
                         @endforeach
                    </tbody>
                   
                  </table>
                </form>
                <div class="aiz-pagination mt-4">
                    
                </div>
            </div>
        </div>
    </div>

</div>
<!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>-->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>


<script>
// $(document).ready(function() {
//     $('#myTable').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ]
//     } );
// } );
</script>

<script>
    $("#yourHtmTable").table2excel({
    exclude: ".excludeThisClass",
    name: "Worksheet Name",
    filename: "completed_orders" //do not include extension
});
</script>
@endsection

