<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(StoreProductTableSeeder::class);
        $this->call(StoreCategoryTableSeeder::class);
        $this->call(StoreCategoryProductTableSeeder::class);
        $this->call(ProjectPathTableSeeder::class);

        Model::reguard();
    }
}
