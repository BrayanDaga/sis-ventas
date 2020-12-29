<?php

namespace App\Http\Livewire;

use App\Product;
use App\Provider;
use App\Purchase;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PurchaseComponent extends Component
{
    public $price ;
    public $image ;
    public $provider;
    public $quantity = 1;
    public $type_vou;
    public $products=[];
    public $product;
    public $details=[];
    public $total= 0;

    public function mount()
    {
        $this->type_vou = 'boleta';
        $this->provider = Provider::orderBy('name')->pluck('id')->first();
    }

    public function render()
    {
        if(!empty($this->provider)) {
            $this->products = Product::where('person_id', $this->provider)->get();
        }
        return view('livewire.purchase-component')->withProviders(Provider::orderBy('name')->get());
    }

    public function updatedProduct()
    {
        $product = explode(',',$this->product);
        $this->price = $product[2];
        $this->image = $product[3];
    }

    public function updatedProvider()
    {
        $this->price = '';

        if(count($this->details)>0){
            $this->details=[];
        }

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
        if(isset($this->product) &&  $this->price != null){
            $product = explode(',',$this->product);
        $data = [
            'prod_id' => $product[0],
            'product' => $product[1],
            'image' => $this->image,
            'quantity' => $this->quantity,
            'precioU' => $this->price,
            'subtotal' => $product[2] * $this->quantity ,
        ];
        $exist = false;
        for ($i=0; $i < count($this->details) ; $i++) {
            if($this->details[$i]['prod_id'] == $data['prod_id'])
            {
                $this->details[$i]['quantity']+= $data['quantity'];
                $this->details[$i]['subtotal']+= $data['subtotal'];
                $exist = true;
            }
        }

        if(!$exist){
            array_push($this->details,$data);
        }

        $this->updateTotal();

        }
    }

    public function storePurchase()
    {

        DB::transaction(function () {
            $purchase  = Purchase::create([
                'provider_id' => $this->provider,
                'user_id' => auth()->user()->id,
                'type_vou' => $this->type_vou,
                'iva' => 1.8,
                'total' => $this->total
            ]);



            foreach ($this->details as $key => $detail) {
                $purchase->detailsPurchases()->create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $detail['prod_id'],
                    'quantity' => $detail['quantity'],
                    'price' => $detail['precioU'],
                    'subtotal' => $detail['subtotal']
                ]);
                $product = Product::find($detail['prod_id']);
                $product->stock += $detail['quantity'];
                $product->update();
            }

        }, 5);
        session()->flash('success', 'Compra realizada con exito');
        return redirect()->to('/compras/purchases');
    }

}
