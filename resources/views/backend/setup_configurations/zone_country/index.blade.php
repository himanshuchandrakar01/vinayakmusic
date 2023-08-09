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
                                <th>{{ translate('S.No')}}</th>
                                <th>{{translate('Zone Name')}}</th>
                                <th>{{translate('Country')}}</th>
                                <th>{{translate('Action')}}</th>
                                <!-- <th data-breakpoints="lg" class="text-right">{{translate('Options')}}</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sl=1;
                            $zones = new App\Models\Zones();
                          foreach ($zones->get() as $zone_country) { ?>
                                <tr>
                                    <td class="p-1"><?=$sl++;?></td>
                                    <td class="p-1">{{ $zone_country->zname }}</td>
                                    <td class="p-1">
                                        <table class="table table-sm table-bordered">
                                        <?php
                                         foreach($zones->get_countries($zone_country->zid) as $country_data)
                                         {
                                            $cdata = $zones->get_county($country_data['cid']) ;
                                            echo "<tr><td class='p-1'>".$cdata['name']??''."</td></tr>";
                                            // echo ($cdata['name'])?"<span class='btn btn-xs btn-primary'>".$cdata['name']."</span>":'' ;
                                            
                                         }

                                        ?>
                                        </table>
                                    </td>
                                   

                                    <td>
                                        
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('zone-country.destroy', $zone_country->zid)}}" title="{{ translate('Delete') }}">
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
                    <h5 class="mb-0 h6">{{ translate('Add New Country') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('zone-country.store') }}" method="POST">
                        @csrf
                       

                        <div class="form-group mb-3">
                            <label for="name">{{translate('Zone Name')}}</label>
                            <select class="select2 form-control aiz-selectpicker" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true" name="zid">
                               <option>Select Zones Name</option>
                                <?php foreach (DB::table('zones')->get() as $zones) { ?>
                                <option value="{{ $zones->zid }}">
                                    {{ $zones->zname }}
                                </option>
                               
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Country Name')}}</label>
                            <select class="select2 form-control aiz-selectpicker" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true" name="cid[]" multiple>
                                <?php foreach (DB::table('countries')->get() as $countries) { ?>
                                <option value="{{ $countries->id }}">
                                    {{ $countries->name }}
                                </option>
                               
                            <?php } ?>
                            </select>
                        </div>
                        <div>
                           
                            <br>
                        </div>
                        <div class="customer_choice_options" id="customer_choice_options">

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
        function add_more_customer_choice_option(i, name){
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     type:"POST",
        //     url:'{{ route('products.add-more-choice-option') }}',
        //     data:{
        //        attribute_id: i
        //     },
            success: function(data) {
                var obj = JSON.parse(data);
                $('#customer_choice_options').append('\
                <div class="form-group row">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="'+i+'">\
                        <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly>\
                    </div>\
                    <div class="col-md-8">\
                        <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_'+ i +'[]" multiple>\
                            '+obj+'\
                        </select>\
                    </div>\
                </div>');
                AIZ.plugins.bootstrapSelect('refresh');
           }
       }


    

         $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });

        update_sku();
    });

    </script>
@endsection
