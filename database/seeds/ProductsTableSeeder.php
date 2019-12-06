<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'  =>  'Macbook Pro asus',
            'slug'  =>  'macbook-pro-asus',
            'image'  =>  'product1.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. ',
            'old_price'     =>  '2300000',
            'price'     =>  '1300000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(1);

        $product = Product::find(1);
        $product->categories()->attach(2);

        Product::create([
            'name'  =>  'Macbook Air toshiba 2012',
            'slug'  =>  'macbook-air-toshiba-2012',
            'image'  =>  'product2.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. ',
            'old_price'     =>  '4000000',
            'price'     =>  '3700000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(2);

        Product::create([
            'name'  =>  'Asus Book Air',
            'slug'  =>  'asus-book-air',
            'image'  =>  'product3.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. ',
            'old_price'     =>  '5300000',
            'price'     =>  '4300000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(3);
        Product::create([
            'name'  =>  'Toshiba L445',
            'slug'  =>  'toshiba-l445',
            'image'  =>  'product4.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. ',
            'old_price'     =>  '4300000',
            'price'     =>  '3300000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(4);
        Product::create([
            'name'  =>  'Lenovo blackmate',
            'slug'  =>  'lenovo-blackmate',
            'image'  =>  'product5.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            'old_price'     =>  '4300000',
            'price'     =>  '2400000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(5);
        Product::create([
            'name'  =>  'Toshiba L835',
            'slug'  =>  'toshiba-L835',
            'image'  =>  'product6.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. ',
            'old_price'     =>  '8300000',
            'price'     =>  '6300000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(6);
        Product::create([
            'name'  =>  'ASUS Pro air 2018',
            'slug'  =>  'asus-pro-air-2018',
            'image'  =>  'product7.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. ',
            'old_price'     =>  '9300000',
            'price'     =>  '7300000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(7);
        Product::create([
            'name'  =>  'Hitachi 2019 Pro',
            'slug'  =>  'hitachi-2019-pro',
            'image'  =>  'product8.jpg',
            'description'   =>  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. ',
            'old_price'     =>  '5300000',
            'price'     =>  '3300000',
            'spesification' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum error facere saepe aspernatur dignissimos totam facilis iste. Quibusdam voluptatibus, velit voluptatem magnam laboriosam sapiente? Provident vero rem natus magni at fuga animi excepturi ipsum obcaecati.'
        ])->categories()->attach(7);
    }
}
