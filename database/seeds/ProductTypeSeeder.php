<?php

use Illuminate\Database\Seeder;
use App\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTypes = [
            [
                'name' => 'Sofa',
                'image' => 'product types/sofa.jpg'
            ],[
                'name' => 'Bookshelf',
                'image' => 'product types/bookshelf.jpg'
            ],[
                'name' => 'Bed Frame',
                'image' => 'product types/bed frame.jpg'
            ],[
                'name' => 'Chair',
                'image' => 'product types/chair.jpg'
            ],[
                'name' => 'Desk',
                'image' => 'product types/desk.jpg'
            ],
        ];

        foreach($productTypes as $productType){
            ProductType::create([
                'name' => $productType['name'],
                'image' => $productType['image'],
            ]);
        }
    }
}
