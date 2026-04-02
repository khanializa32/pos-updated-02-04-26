@foreach($featured_products as $variation)
    <div class="col-md-1 col-xs-2 product_list no-print">
        <div class="product_box hover:tw-shadow-lg hover:tw-animate-pulse" 
             data-toggle="tooltip" 
             data-placement="bottom" 
             data-variation_id="{{$variation->id}}" 
             title="{{$variation->full_name}}">
            
            
             <div class="text_div">
                <small class="text text-muted">
                    {{$variation->product->name}} 
                    @if($variation->product->type == 'variable')
                        - {{$variation->name}}
                    @endif
                </small>

            <div class="image-container" 
                 style="background-image: url(
                     @if(count($variation->media) > 0)
                         {{$variation->media->first()->display_url}}
                     @elseif(!empty($variation->product->image_url))
                         {{$variation->product->image_url}}
                     @else
                         {{asset('/img/default.png')}}
                     @endif
                 ); 
                 background-repeat: no-repeat; 
                 background-position: center; 
                 background-size: contain;">
            </div>

           

               

                <!-- Stock y Precio -->
                <div class="mt-1">
                   <div class="mt-1 text-start">
                        <span class="badge bg-info d-block">{{ number_format($variation->variation_location_details->sum('qty_available'), 0) }}</span>
                        <span class="badge bg-success"> {{number_format($variation->sell_price_inc_tax, 0)}}</span>
                    </div>


                    
                </div>
            </div>

        </div>
    </div>
@endforeach
