<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = $this->data();

        foreach($products as $product){
            Product::create([
                'name' => $product['name'],
                'product_type_id' => $product['product_type_id'],
                'stock' => $product['stock'],
                'price' => $product['price'],
                'description' => $product['description'],
                'image' => $product['image'].$product['name'].'.jpg',
            ]);
        }
    }

    //function for the array of data
    public function data(){
        $imagePath=[
            'product/sofa/',
            'product/bookshelf/',
            'product/bed frame/',
            'product/chair/',
            'product/desk/',
        ];

        return [
            [
                'name' => 'Hauga',
                'product_type_id' => 3,
                'stock' => 13,
                'price' => 2299000,
                'description' => 'Upholsa light tered bed frame, Vissle Grey',
                'image' => $imagePath[2],
            ],[
                'name' => 'Malm',
                'product_type_id' => 3,
                'stock' => 9,
                'price' => 2799000,
                'description' => 'Bed frame, high, brown stained veneer/Luroy',
                'image' => $imagePath[2],
            ],[
                'name' => 'Slattum',
                'product_type_id' => 3,
                'stock' => 19,
                'price' => 2999000,
                'description' => 'Upholstered bed frame, Knisa light grey',
                'image' => $imagePath[2],
            ],[
                'name' => 'Hemnes',
                'product_type_id' => 3,
                'stock' => 22,
                'price' => 3799000,
                'description' => 'Bed frame, black-brown/Lonset',
                'image' => $imagePath[2],
            ],[
                'name' => 'Leirvik',
                'product_type_id' => 3,
                'stock' => 20,
                'price' => 3999000,
                'description' => 'Bed frame, white/Lonset',
                'image' => $imagePath[2],
            ],[
                'name' => 'Gersby',
                'product_type_id' => 2,
                'stock' => 126,
                'price' => 599000,
                'description' => 'Bookcase, white',
                'image' => $imagePath[1],
            ],[
                'name' => 'Laiva',
                'product_type_id' => 2,
                'stock' => 168,
                'price' => 399000,
                'description' => 'Bookcase, black-brown',
                'image' => $imagePath[1],
            ],[
                'name' => 'Lommarp',
                'product_type_id' => 2,
                'stock' => 14,
                'price' => 2799000,
                'description' => 'Bookcase, light beige',
                'image' => $imagePath[1],
            ],[
                'name' => 'Hemnes',
                'product_type_id' => 2,
                'stock' => 5,
                'price' => 2999000,
                'description' => 'Bookcase, black-brown/light brown',
                'image' => $imagePath[1],
            ],[
                'name' => 'Brusali',
                'product_type_id' => 2,
                'stock' => 12,
                'price' => 1799000,
                'description' => 'Bookcase, white',
                'image' => $imagePath[1],
            ],[
                'name' => 'Hemlingby',
                'product_type_id' => 1,
                'stock' => 16,
                'price' => 2995000,
                'description' => 'Two-seat sofa, Bomstad black',
                'image' => $imagePath[0],
            ],[
                'name' => 'Klippan',
                'product_type_id' => 1,
                'stock' => 36,
                'price' => 2895000,
                'description' => '2-seat sofa, Vissle grey',
                'image' => $imagePath[0],
            ],[
                'name' => 'Gronlid',
                'product_type_id' => 1,
                'stock' => 2,
                'price' => 7495000,
                'description' => '2-seat sofa, Ljungen light red',
                'image' => $imagePath[0],
            ],[
                'name' => 'Kivik',
                'product_type_id' => 1,
                'stock' => 6,
                'price' => 29990000,
                'description' => '4-seat sofa, with chaise longue/Grann/Bomstad black',
                'image' => $imagePath[0],
            ],[
                'name' => 'Knopparp',
                'product_type_id' => 1,
                'stock' => 17,
                'price' => 1995000,
                'description' => '2-seat sofa, Knisa light grey',
                'image' => $imagePath[0],
            ],[
                'name' => 'Markus',
                'product_type_id' => 4,
                'stock' => 52,
                'price' => 2999000,
                'description' => 'Office chair, Vissle dark grey',
                'image' => $imagePath[3],
            ],[
                'name' => 'Lidkullen',
                'product_type_id' => 4,
                'stock' => 9,
                'price' => 1499000,
                'description' => 'Active sit/stand support, Gunnared beige',
                'image' => $imagePath[3],
            ],[
                'name' => 'Flintan',
                'product_type_id' => 4,
                'stock' => 60,
                'price' => 999000,
                'description' => 'Office chair, Vissle grey',
                'image' => $imagePath[3],
            ],[
                'name' => 'Trollberget',
                'product_type_id' => 4,
                'stock' => 9,
                'price' => 1999000,
                'description' => 'Active sit/stand support, Grann beige',
                'image' => $imagePath[3],
            ],[
                'name' => 'Alefjall',
                'product_type_id' => 4,
                'stock' => 8,
                'price' => 4999000,
                'description' => 'Office chair, Grann golden-brown',
                'image' => $imagePath[3],
            ],[
                'name' => 'Micke',
                'product_type_id' => 5,
                'stock' => 177,
                'price' => 1499000,
                'description' => 'Desk, white',
                'image' => $imagePath[4],
            ],[
                'name' => 'Brusali',
                'product_type_id' => 5,
                'stock' => 4,
                'price' => 1499000,
                'description' => 'Corner desk , white',
                'image' => $imagePath[4],
            ],[
                'name' => 'Fredde',
                'product_type_id' => 5,
                'stock' => 40,
                'price' => 3499000,
                'description' => 'Desk, black',
                'image' => $imagePath[4],
            ],[
                'name' => 'Lommarp',
                'product_type_id' => 5,
                'stock' => 11,
                'price' => 2499000,
                'description' => 'Desk, light beige',
                'image' => $imagePath[4],
            ],[
                'name' => 'Ingatorp',
                'product_type_id' => 5,
                'stock' => 6,
                'price' => 2499000,
                'description' => ' Desk, black',
                'image' => $imagePath[4],
            ],
        ];
    }
}
