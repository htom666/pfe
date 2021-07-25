<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class Products extends Component
{
    public $allProducts = [];
    public $orderProducts = [];
    public $orderServices = [];
    public $allServices = [];
    public $product = null;
    public $product_id = null;
    public $service = null;
    public $service_id = null;
    public $price = 0;
    public $tax = 0;
    public $tva = 0;
    public $ttc;
    public $i=1;
    public function mount()
    {

        $this->tax = 0;
        $this->tva = 0;
        $this->ttc = 0;
        $this->price = 0;
        $this->service_price = 0;
        $this->product = Product::orderBy('id', 'desc')->first();
        $this->service = Service::orderBy('id', 'desc')->first();
        $this->product_id = $this->product->id;
        $this->service_id = $this->service->id;
        $this->allProducts = Product::orderBy('id', 'desc')->get();
        
        $this->allServices = Service::orderBy('id', 'desc')->get();
        $this->orderProducts = [
            // ['product_id' => '' , 'quant'=> 1 , 'price' =>'','demo'=>'']; 
        ];
        $this->orderServices = [];
    }
    public function addProduct()
    {

        $this->orderProducts[] = ['product_id' => $this->product->id, 'quantity' => 1, 'price' => $this->product->price, 'total_price' => $this->product->price, 'product_name' => $this->product->name];
        $this->price = $this->price();
    }
    public function addService()
    {
        $this->orderServices[] = [
            'service_id' => $this->service->id,
            'quantity' => 1,
            'price' => $this->service->price,
            'total' => $this->service->price
        ];
        $this->price = $this->price();
    }
    public function updatingorderProducts($value, $index)
    {
        $values = explode('.', $index);
        switch ($values[1]) {
            case 'product_id':
                foreach ($this->allProducts as $product) {
                    if ($product->id == $value) {
                        $this->product_id = $product->id;
                        $this->orderProducts[$values[0]]['price'] = $product->price;
                        $this->orderProducts[$values[0]]['total_price'] = $product->price *  $this->orderProducts[$values[0]]['quantity'];
                        $this->price = $this->price();
                        // $this->tax = (($this->price()*$this->tva)/100);

                    }
                }
                break;
            case 'quantity':
                if ($value == null) {
                    $this->orderProducts[$values[0]]['quantity'] = 1;
                } elseif ($value == 0) {
                    $this->orderProducts[$values[0]]['quantity'] = 1;
                } else {
                    foreach ($this->allProducts as $item) {
                        if ($item->id ==  $this->orderProducts[$values[0]]['product_id']) {
                            $this->orderProducts[$values[0]]['price'] = $item->price;
                            $this->orderProducts[$values[0]]['total_price'] = $item->price * $value;
                            $this->price = $this->price();
                            break;
                        }
                    }
                }
                break;
        }
    }

    public function updatingorderServices($value, $index)
    {
        $values = explode('.', $index);
        switch ($values[1]) {
            case 'service_id':
                foreach ($this->allServices as $service) {
                    if ($service->id == $value) {
                        $this->orderServices[$values[0]]['service_id'] = $value;
                        $this->orderServices[$values[0]]['price'] = $service->price;
                        $this->orderServices[$values[0]]['total'] = $service->price * $this->orderServices[$values[0]]['quantity'];
                        $this->price = $this->price();
                    }
                }
                break;
            case 'quantity':
                switch ($value) {
                    case 0:
                        $this->orderServices[$values[0]]['total'] = 0;
                        $this->price = $this->price();
                        break;
                    case null:
                        $this->orderServices[$values[0]]['total'] = 0;
                        $this->price = $this->price();
                        break;
                    default:
                        $this->orderServices[$values[0]]['total'] =   $this->orderServices[$values[0]]['price'] * $value;
                        $this->price = $this->price();
                        break;
                }
                break;
        }
    }
    public function updatingtva($value)
    {
        $price = $this->price();
        $this->tax = ($value * $price) / 100;
        $this->ttc = $price + $this->tax + 0.600;
    }
    public function price()
    {
        $price = 0;
        foreach ($this->orderProducts as $product) {
            $price = $price + $product['total_price'];
        }
        foreach ($this->orderServices as $service) {
           $price = $price + $service['total'];
        }
        $this->tax = ($this->tva * $price) / 100;
        $this->ttc = $price + $this->tax + 0.600;
        return $price;
    }

    public function render()
    {
        return view('livewire.products');
    }
    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
        $this->price = $this->price();
    }
    public function removeService($index)
    {
        unset($this->orderServices[$index]);
        $this->orderServices = array_values($this->orderServices);
        $this->price = $this->price();
    }
}
