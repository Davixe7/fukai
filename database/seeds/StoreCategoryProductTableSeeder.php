<?php

use Illuminate\Database\Seeder;
use App\Store_category;

class StoreCategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<=9 ; $i++){
            $Product = Store_category::find($i);
            $iNextCatId = 0;
            for($j=1 ; $j<=6 ; $j++){
                do{
                    $iCatId = rand(1,50);
                } while ($iCatId == $iNextCatId);

                $Product->products()->attach($iCatId);
                $iNextCatId =$iCatId;
            }
        }
    }
}
