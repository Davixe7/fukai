<?php

use Illuminate\Database\Seeder;
use App\Store_category;

class StoreCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store_category::create([
            'name' => 'Para compartir',
            'slug' => 'para-compartir',
            'pos'  => '1',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'Entradas calientes',
            'slug' => 'entradas-calientes',
            'pos'  => '2',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'House Roll`s',
            'slug' => 'house-rolls',
            'pos'  => '3',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'Roll`s en caliente',
            'slug' => 'rolls-en-caliente',
            'pos'  => '4',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'Roll´s en palta',
            'slug' => 'rolls-en-palta',
            'pos'  => '5',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'Roll´s en salmón',
            'slug' => 'rolls-en-salmón',
            'pos'  => '6',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'California roll´s',
            'slug' => 'california-rolls',
            'pos'  => '7',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'Sashimis',
            'slug' => 'sashimis',
            'pos'  => '8',
            'status' => '1'
        ]);
        Store_category::create([
            'name' => 'Destacado',
            'slug' => 'destacado',
            'pos'  => '9',
            'status' => '1'
        ]);
    }
}
