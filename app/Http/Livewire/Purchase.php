<?php

namespace App\Http\Livewire;

use App\Product;
use App\Provider;
use Livewire\Component;

class Purchase extends Component
{
    public $price ;
    public $provider;
    public $quantity;
    public $type_vou;
    public $products=[];
    public $product;
    public $details=[];
    public $total= 0;

    public function render()
    {
        if(!empty($this->provider)) {
            $this->products = Product::where('person_id', $this->provider)->get();
        }
        return view('livewire.purchase')->withProviders(Provider::orderBy('name')->get());
    }

    public function updatedProduct()
    {
        $product = explode(',',$this->product);
        $this->price = $product[2];
    }

  

    public function delRow(int $row)
    {
        unset($this->details[$row]);
        $this->details = array_values($this->details);

        $this->updateTotal();
    }

    public function updateTotal()
    {
        $this->total =0;
        foreach ($this->details as $detail) {
            $this->total += $detail['subtotal'];
        }
    }
    public function addRow()
    {
        $product = explode(',',$this->product);
            array_push($this->details,[
            'prod_id' => $product[0],
            'product' => $product[1],
            'quantity' => $this->quantity,
            'precioU' => $this->price,
            'subtotal' => $product[2] * $this->quantity ,
        ]);
        $this->addNotRepeat();

        $this->updateTotal();
    }
    public function addNotRepeat()
    {
        for ($i=0; $i < count($this->details)-1; $i++) {   
            if($this->details[$i]['prod_id'] == $this->details[$i+1]['prod_id'])
            {
                $this->details[$i]['quantity']+= $this->details[$i+1]['quantity'];
                $this->details[$i]['subtotal']+= $this->details[$i+1]['subtotal'];
                unset($this->details[$i+1]);
            }
        }
        // foreach ($this->details as $detail) {
        //     $detail[]
        // }

    }
}