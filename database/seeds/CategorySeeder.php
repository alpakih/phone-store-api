<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $faker = Faker\Factory::create();
        $image_categories = [
            'abstract','nightlife','technics'
        ];
        for ($i = 0; $i < 5; $i++) {
            $name = $faker->unique()->word();
            $name = str_replace('.', '', $name);
            $slug = str_replace(' ', '-', strtolower($name));
            $category = $image_categories[mt_rand(0, 2)];
            $image_path = './public/images/categories';
            $image_fullpath = $faker->image($image_path,500,300,$category,true,true,
                $category
            );
            $image = str_replace($image_path . '/','',$image_fullpath);
            $categories[$i] = [
                'name' => $name,
                'slug' => $slug,
                'image' => $image,
                'created_at' => Carbon\Carbon::now(),
            ];
        }
        DB::table('categories')->insert($categories);
    }
}
