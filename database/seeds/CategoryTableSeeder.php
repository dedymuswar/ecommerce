<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Category::insert([
            ['name' =>  'Laptops', 'slug'    =>  'laptops', 'created_at' => $now, 'updated_at' =>   $now],
            ['name' =>  'Desktops', 'slug'    =>  'desktops', 'created_at' => $now, 'updated_at' =>   $now],
            ['name' =>  'Mobile phones', 'slug'    =>  'mobile-phones', 'created_at' => $now, 'updated_at' =>   $now],
            ['name' =>  'Tablets', 'slug'    =>  'tablets', 'created_at' => $now, 'updated_at' =>   $now],
            ['name' =>  'Tvs', 'slug'    =>  'tvs', 'created_at' => $now, 'updated_at' =>   $now],
            ['name' =>  'Digital cameras', 'slug'    =>  'digital-cameras', 'created_at' => $now, 'updated_at' =>   $now],
            ['name' =>  'Appliances', 'slug'    =>  'appliances', 'created_at' => $now, 'updated_at' =>   $now],
        ]);
    }
}
