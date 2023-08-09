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
                    <table class="table aiz-table table-sm mb-0">
                        <thead>
                            <tr>
                                <!-- <th data-breakpoints="lg">#</th> -->
                                <th>{{translate('S.No')}}</th>
                                <th>{{translate('Weight Range')}}</th>
                                <th>{{translate('Amount')}}</th>
                                <th>{{translate('Action')}}</th>
                                <!-- <th data-breakpoints="lg" class="text-right">{{translate('Options')}}</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sl=1;
                            $domesticData = DB::table('domestic_weight_group')->get();
                          foreach ($domesticData as $dwgroup) { ?>
                                <tr>
                                    
                                    <td><?=$sl++;?></td>
                                    <td>{{ $dwgroup->from }} - {{ $dwgroup->to }}</td>
                                    <td>{{ $dwgroup->domestic_amount }}</td>

                                    
                                    <td>
                                        
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('domestic-weight.destroy', $dwgroup->dwid)}}" title="{{ translate('Delete') }}">
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
    				<form action="{{ route('domestic-weight.store') }}" method="POST">
    					@csrf
    					

                        <div class="form-group mb-3">
                            <label for="name">{{translate('Weight Range From')}}</label>
                            <input type="number" min="0" step="0.01" placeholder="{{translate('From Weight')}}" name="from" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">{{translate('Weight Range To')}}</label>
                            <input type="number" min="0" step="0.01" placeholder="{{translate('To Weight')}}" name="to" class="form-control" required>
                        </div>

                        
    					<div class="form-group mb-3">
                            <label for="name">{{translate('Amount')}}</label>
                            <input type="number" min="0" step="0.01" placeholder="{{translate('Amount')}}" name="domestic_amount" class="form-control" required>
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
