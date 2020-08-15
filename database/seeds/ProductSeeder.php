<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(mt_rand(3, 6));
            $title = str_replace('.', '', $title);
            $slug = str_replace(' ', '-', strtolower($title));
           
            // $cover_path = './public/images/products';
            // $cover_fullpath = $faker->image($cover_path,300,500,null,true,true,null);
            // $cover = str_replace($cover_path . '/','',$cover_fullpath);
            $products[$i] = [
                'name' => $title,
                'slug' => $slug,
                'description' => $faker->text(255),
                'price' => mt_rand(1, 10) * 50000,
                // 'cover'=>$cover,
                'weight' => 0.5,
                'stock' => 20,
                'created_at' => Carbon\Carbon::now(),
            ];
        }
        DB::table('products')->insert($products);
    }
    
}
