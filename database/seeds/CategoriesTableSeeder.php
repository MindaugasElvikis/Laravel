<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Cars', 'Food', 'Information technology', 'Politics'] as $category) {
            \App\Category::create(['name' => $category]);
        }
    }
}
