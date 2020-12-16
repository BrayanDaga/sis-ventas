<?php

use App\Purchase;
use App\Detailpurchase;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purchases = factory(Purchase::class,5)
        ->create()
        ->each(function ($purchase){
           factory(Detailpurchase::class,3)->create([
               'purchase_id' => $purchase->id
           ]);
        });
    }
}
