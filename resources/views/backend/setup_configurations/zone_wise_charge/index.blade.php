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
                                <th>{{translate('S.No')}}</th>
                                <th>{{translate('Weight Range (gm)')}}</th>
                                <th>{{translate('Zone Name')}}</th>
                                <th>{{translate('Amount')}}</th>
                                <th>{{translate('Action')}}</th>
                                <!-- <th data-breakpoints="lg" class="text-right">{{translate('Options')}}</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sl=1;
                            $zones = new App\Models\Zones();
                          foreach (DB::table('zone_weight_wises')->get() as $zwweight) { ?>
                                <tr>
                                    
                                    <td><?=$sl++;?></td>
                                    <td>{{ $zwweight->from }} - {{ $zwweight->to }}</td>
                                    <td> 
                                        <?php 
                                            $zone = $zones->where('zid',$zwweight->zid)->first();  
                                            echo $zone['zname']??'';
                                        ?>
                                    </td>
                                    <td>{{ $zwweight->amount }}</td>

                                    
                                    <td>
                                        
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('zone-wise-amt.destroy', $zwweight->zwwid)}}" title="{{ translate('Delete') }}">
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
    				<h5 class="mb-0 h6">{{ translate('Add New Weight & Amount') }}</h5>
    			</div>
    			<div class="card-body">
    				<form action="{{ route('zone-wise-amt.store') }}" method="POST">
    					@csrf
    					<div class="form-group mb-3 row">
                            <div class="col-lg-6">
    						    <label for="name">{{translate('Weight From (gm)')}}</label>
                                <input type="number" min="0" step="0.01" placeholder="{{translate('In Gm')}}" name="from" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">{{translate('Weight To (gm)')}}</label>
                                <input type="number" min="0" step="0.01" placeholder="{{translate('In Gm')}}" name="to" class="form-control" required>
                            </div>
                            
    					</div>

                        <div class="form-group mb-3">
    						<label for="name">{{translate('Zone Name')}}</label>
                            <select class="form-control" name="zid">
                               <option>Select Zone Name</option>
                                <?php foreach (DB::table('zones')->get() as $zones) { ?>
                                <option value="{{ $zones->zid }}">
                                	{{ $zones->zname }}
                                </option>
                               
                            <?php } ?>
                            </select>
    					</div>
    					<div class="form-group mb-3">
                            <label for="name">{{translate('Amount')}}</label>
                            <input type="number" min="0" step="0.01" placeholder="{{translate('Amount')}}" name="amount" class="form-control" required>
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
