<div class="col-md-2 col-xs-4 product_list no-print create-product-button">
    <div class="add-product hover:tw-shadow-lg hover:tw-animate-pulse pos_add_quick_product" data-href="{{action([\App\Http\Controllers\ProductController::class, 'quickAdd'])}}" data-container=".quick_add_product_modal">
        <div class="image-container">
            <i class="fa fa-plus-circle" style='font-size:115px;color:LightSeaGreen'></i>
        </div>

        <div class="text_div">
            <br>
            <small class="text text-muted"style="font-size:16px ;color:LightSeaGreen">Crear Producto
            </small>
            <br>
          
          
        </div>
    </div>
</div>
@forelse($products as $product)
    <div class="col-md-2 col-xs-4 product_list no-print">
                    
            <!--<p>Total: {{ count($products)}}</p>-->
        <div class="product_box hover:tw-shadow-lg hover:tw-animate-pulse" style="position: relative;" data-variation_id="{{ $product->id }}" data-enable-stock="{{ $product->enable_stock }}" data-initial-qty="{{ $product->qty_available }}"
            title="@if ($product->type == 'variable') - {{ $product->variation }} @endif  @if (!empty($show_prices))  @format_currency($product->purchase_price) @foreach ($product->group_prices as $group_price) @if (array_key_exists($group_price->price_group_id, $allowed_group_prices)) {{ $allowed_group_prices[$group_price->price_group_id] }} - @format_currency($group_price->price_inc_tax) @endif @endforeach @endif">

<div style="display: flex; align-items: center; gap: 10px; justify-content: flex-start;">
    
    @if(!empty($product->brand))
        <div style="font-size:11px; font-weight:normal;">
            {{ $product->brand }}
        </div>
    @endif

    @if(!empty($product->weight))
        <div style="font-size:11px; font-weight:normal;">
            {{ $product->weight }}
        </div>
    @endif
    
</div>

@php
                $any_rack_enabled = session('business.enable_racks') && session('business.enable_row') && session('business.enable_position');
            @endphp
            @if($any_rack_enabled && (!empty($product->rack) || !empty($product->row) || !empty($product->position)))
                <div class="rack-info" style="position: absolute; top: 2px; right: 2px; z-index: 10;">
    
    @if(!empty($product->rack))
    <span class="label label-blue pos-rack-edit-btn" data-product-id="{{ $product->product_id }}"
          style="margin: 2px; padding: 6px 10px; font-size: 14px; color: #000; cursor: pointer;">
        E: {{ $product->rack }}
    </span>
    @endif

    @if(!empty($product->row))
    <span class="label label-blue pos-rack-edit-btn" data-product-id="{{ $product->product_id }}"
          style="margin: 2px; padding: 6px 10px; font-size: 14px; color: #000; cursor: pointer;">
        F: {{ $product->row }}
    </span>
    @endif

    @if(!empty($product->position))
    <span class="label label-blue pos-rack-edit-btn" data-product-id="{{ $product->product_id }}"
          style="margin: 2px; padding: 6px 10px; font-size: 14px; color: #000; cursor: pointer;">
        P: {{ $product->position }}
    </span>
    @endif

</div>
@endif


<br>
            
			<div style="display:flex">
				<small class="text text"style="font-size: 90%; float: right; font-weight: bold;">{{$product->name}} 
					@if($product->type == 'variable')
					- {{$product->variation}}
					@endif
				</small>
				
				<small class="selected-qty-badge" style="width:35px; height:25px; background-color: black; color: white; border-radius: 15%; display: none; align-items: center; justify-content: center; margin-left: 5px;">0</small>
			</div>
			
		

			
			<!--<script>-->
   <!--             console.log(@json($product));-->
   <!--         </script>-->
			
			
            <div class="image-container"
                style="background-image: url(
					@if (count($product->media) > 0) {{ $product->media->first()->display_url }}
					@elseif(!empty($product->product_image))
						{{ asset('/uploads/img/' . rawurlencode($product->product_image)) }}
					@else
						{{ asset('/img/default.png') }} @endif
				);
			background-repeat: no-repeat; background-position: center;
			background-size: contain;">
            </div>

            
            <small class="text-green qty-badge" style="font-size: 130%; float: right;font-weight: bold; ">
				@if($product->enable_stock)
				{{ @num_format($product->qty_available) }} 
				@else
					--
				@endif
			</small>
			
			<small class="text-muted" style="font-size: 110%; float: left;font-weight: bold; ">
				{{number_format($product->selling_price,0)}}
			</small><br>
			
		</div>
			
		</div>
	</div>
@empty
    <input type="hidden" id="no_products_found">
    <div class="col-md-12">
        <h4 class="text-center">
            @lang('lang_v1.no_products_to_display')
        </h4>
    </div>
@endforelse


