@extends('backend.layouts.app')

@section('content')
    <!-- <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col-md-12">
    			<h1 class="h3">{{translate('All cities')}}</h1>
    		</div>
    	</div>
    </div> -->
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <!--  -->
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <!-- <th data-breakpoints="lg">#</th> -->
                                <th>{{translate('Product Name')}}</th>
                                <th>{{translate('Weight')}}</th>
                                <th>{{translate('Weight Cost')}}</th>
                                <th>{{translate('Show/Hide')}}</th>
                                <th data-breakpoints="lg" class="text-right">{{translate('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                          foreach (DB::table('weights')->get() as $weight) { ?>
                                <tr>
                                    
                                    <td>{{ $weight->product_name }}</td>
                                    <td>{{ $weight->weight_gm }}</td>
                                    <td>{{ $weight->weight_cost }}</td>

                                    <td>
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                          <input onchange="update_status(this)" value="{{ $weight->wid }}" type="checkbox" <?php if($weight->status == 1) echo "checked";?> >
                                          <span class="slider round"></span>
                                        </label>
                                      </td>
                                    <td class="text-right">
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('weight.edit', ['id'=>$weight->wid, 'lang'=>env('DEFAULT_LANGUAGE')]) }}" title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('weight.destroy', $weight->wid)}}" title="{{ translate('Delete') }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
    		<div class="card">
    			<div class="card-header">
    				<h5 class="mb-0 h6">{{ translate('Add New Product Weight & Cost') }}</h5>
    			</div>
    			<div class="card-body">
    				<form action="{{ route('weight.store') }}" method="POST">
    					@csrf
    					<div class="form-group mb-3">
    						<label for="name">{{translate('Product Name')}}</label>
                            <select class="form-control" name="product_name">
                                <option>Select Product Name</option>
                                <?php foreach (DB::table('products')->get() as $product) { ?>
                                <option value="{{ $product->id }}">{{$weight->product_name == $product->id  ? 'selected' : ''}} {{ $product->name}}</option>
                               
                            <?php } ?>
                            </select>
    						<!-- <input type="text" placeholder="{{translate('Name')}}" name="product_name" class="form-control" required> -->
    					</div>

                        

                        <div class="form-group mb-3">
    						<label for="name">{{translate('Weight in gram')}}</label>
                            <!-- <select class="form-control" name="weight_gm">
                                <option>Select Weight</option>
                            </select> -->
    						<input type="number" min="0" step="0.01" placeholder="{{translate('Weight in gram')}}" name="weight_gm" class="form-control" required>
    					</div>
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Weight Cost')}}</label>
                            <input type="number" min="0" step="0.01" placeholder="{{translate('Weight Cost')}}" name="weight_cost" class="form-control" required>
                        </div>
    					<div class="form-group mb-3 text-right">
    						<button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        function sort_cities(el){
            $('#sort_cities').submit();
        }

        function update_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('cities.status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Country status updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

    </script>
@endsection
