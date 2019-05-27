<?php

use Illuminate\Database\Seeder;
use App\Store_product;

class StoreProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Store_product::class, 50)->create();
    }
}
