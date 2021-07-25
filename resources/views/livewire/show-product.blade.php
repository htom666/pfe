<div>

    <div class="mt-4" id="fieldList">
        <div class="row text-600 text-white bgc-default-tp1 py-25">
            <div class="col-9 col-sm-5">Description</div>
            <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
            <div class="d-none d-sm-block col-sm-2">Unit Price</div>
            <div class="col-2">Amount</div>
        </div>
        @foreach ($orderProducts as $index => $orderProduct)
            <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4 ">
                <div class="col-9 col-sm-5">
                    <div class="field_wrapper">
                    <div> 
                        <div class="form-group">
                            {{-- <select class="form-control" name="orderProduct[{{$index}}][product_id]" wire:model="orderProducts.{{$index}}.product_id"> --}}
                                @foreach($allProducts as $product)
                                    <h2>{{ $product->id }}{{ $product->name }}</h2>
                                @endforeach
                            {{-- </select> --}}
                        </div>
                    </div>
                </div>
            </div>
                <div class="d-none d-sm-block col-2"><input type="number"  size="4" id="quantity{{$index}}" name="orderProduct[{{$index}}][quantity]" wire:model="orderProducts.{{$index}}.quantity"></div>
                <div class="col-1 text-secondary-d2"><h2>{{$orderProducts[$index]['price']}}</h2>
                <div class="col-2 text-secondary-d2"><h2>{{$orderProducts[$index]['total_price']}}</h2></div>
                    <div class="col-md-12">
                        <div class="row">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- <input size="4" type="number" id="prx" value="{{$price}}"> --}}
        <div class="row border-b-2 brc-default-l2"></div>
        <div class="row mt-3">
            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
            </div>
            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                <div class="row my-2">
                    <div class="col-7 text-right">
                        SubTotal
                    </div>
                    <div class="col-5">
                        <span class="text-120 text-secondary-d1">{{$price}}</span>
                    </div>
                </div>

                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                    <div class="col-7 text-right">
                        TVA %
                    </div>
                    <div class="col-5">
                        <span class="text-110 text-secondary-d1"><input type="number" style="width:100px" id="tvaper" name="tva" value="{{$tva}}" wire:model="tva"></span>
                    </div>
                </div>

                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                    <div class="col-7 text-right">
                        Tax
                    </div>
                    <div class="col-5">
                        <span class="text-150 text-success-d3 opacity-2"><input type="number" style="width:150px" id="ttc" name="tax" value="{{$tax}}" ></span>
                    </div>
                </div>
                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                    <div class="col-7 text-right">
                        SubTotal
                    </div>
                    <div class="col-5">
                        <span class="text-150 text-success-d3 opacity-2"><input type="number" style="width:150px" id="total" name="ttc" value="{{$ttc}}"></span>
                    </div>
                </div>
            </div>
        </div>
        
</div>
