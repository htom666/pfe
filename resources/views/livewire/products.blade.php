<div>
<table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th class="text-center"> # </th>
        <th class="text-center"> Product </th>
        <th class="text-center"> Qty </th>
        <th class="text-center"> Price </th>
        <th class="text-center"> Total </th>
      </tr>
    </thead>
    <tbody>
      @if($orderProducts != null)
        @foreach ($orderProducts  as $index => $orderProduct)
        <tr>
        <td>{{$i++}}</td>
        <td>
            <select class="form-control" name="orderProduct[{{$index}}][product_id]" wire:model="orderProducts.{{$index}}.product_id">
                <option value=""> Select </option>
                @foreach($allProducts as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} ({{$product->quantity}} disponible)</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number"  size="4" id="quantity{{$index}}" name="orderProduct[{{$index}}][quantity]" wire:model="orderProducts.{{$index}}.quantity"> 
        </td>
            <td><input type="number" size="4" id="price{{$index}}" value="{{$orderProducts[$index]['price']}}" ></td>
            <td><input type="number" size="4" id="total_price{{$index}}" name="orderProduct[{{$index}}][total_price]" value="{{$orderProducts[$index]['total_price']}}"></td>
            <td><a href="#" wire:click.prevent="removeProduct({{$index}})" class="text-danger">x</a></td>   
        </tr>
        @endforeach
        @endif
        @if($orderServices != null)
        @foreach ($orderServices as $index => $orderService)
       
        <tr>
            <td>{{$i++}}</td>
            <td>
                <select class="form-control" name="orderService[{{$index}}][service_id]" id="orderService[{{$index}}][service_id]" wire:model="orderServices.{{$index}}.service_id">
                    @foreach($allServices as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number"  size="4" id="service_quantity{{$index}}" name="orderService[{{$index}}][quantity]" wire:model="orderServices.{{$index}}.quantity"></td>
            <td><input type="number" size="4" id="service_price{{$index}}" value="{{$orderServices[$index]['price']}}" wire:model="orderServices.{{$index}}.price" ></td>
            <td><input type="number" size="4" id="service_total_price{{$index}}" name="orderService[{{$index}}][total]" value="{{$orderServices[$index]['total']}}"></td>
            <td><a href="#" wire:click.prevent="removeService({{$index}})" class="text-danger">x</a></td>
                                   
            </tr>

        @endforeach
        @endif
    </tbody>
</table>
<div class="row clearfix">
    <div class="col-md-12">
      <button  class="btn btn-default pull-left"wire:click.prevent="addProduct">Add Another Product</button>
      <button  class="pull-right btn btn-default"wire:click.prevent="addService">Add Another Service</button>
    </div>
</div>
<div class="row clearfix " style="margin-top:20px;">
    <div class="float-right col-md-4 col">
      <table class="table table-bordered table-hover" style="margin-left:689px">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name="pht" value="{{$price}}" placeholder='0.00' class="form-control" readonly></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tvaper" name="tva" value="{{$tva}}" placeholder="0" wire:model="tva">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" id="ttc" name="tax" value="{{$tax}}" class="form-control"></td>
          </tr>
          <tr>
            <th class="text-center">Timbre Fiscal</th>
            <td class="text-center"><input type="number" id="timbre" name="ttc" value="0.6" placeholder='0.00' class="form-control" readonly></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" id="total" name="ttc" value="{{$ttc}}" placeholder='0.00' class="form-control" readonly></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
