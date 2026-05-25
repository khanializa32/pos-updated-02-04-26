<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        {!! Form::open(['url' => action([\App\Http\Controllers\ProductController::class, 'updateRackDetails'], [$product->id]), 'method' => 'post', 'id' => 'edit_rack_details_form']) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">
                <i class="fas fa-edit"></i> Editar Estante - {{ $product->name }}
            </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('business.business_location')</th>
                                <th>@lang('lang_v1.rack')</th>
                                <th>@lang('lang_v1.row')</th>
                                <th>@lang('lang_v1.position')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($business_locations as $id => $location)
                                <tr>
                                    <td>{{ $location }}</td>
                                    <td>
                                        {!! Form::text('product_racks[' . $id . '][rack]', 
                                            !empty($rack_details[$id]['rack']) ? $rack_details[$id]['rack'] : null, 
                                            ['class' => 'form-control', 'placeholder' => __('lang_v1.rack')]) !!}
                                    </td>
                                    <td>
                                        {!! Form::text('product_racks[' . $id . '][row]', 
                                            !empty($rack_details[$id]['row']) ? $rack_details[$id]['row'] : null, 
                                            ['class' => 'form-control', 'placeholder' => __('lang_v1.row')]) !!}
                                    </td>
                                    <td>
                                        {!! Form::text('product_racks[' . $id . '][position]', 
                                            !empty($rack_details[$id]['position']) ? $rack_details[$id]['position'] : null, 
                                            ['class' => 'form-control', 'placeholder' => __('lang_v1.position')]) !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn bg-info">
                <i class="fas fa-save"></i> @lang('messages.save')
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
                @lang('messages.close')
            </button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
