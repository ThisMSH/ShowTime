<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $categories = [
        //     [
        //         "category" => "Series"
        //     ],
        //     [
        //         "category" => "Movies"
        //     ],
        //     [
        //         "category" => "Anime Series"
        //     ],
        //     [
        //         "category" => "Anime Movies"
        //     ],
        // ];

        // foreach($categories as $key => $value) {
        //     Category::create($value);
        // }

        Category::factory(4)->sequence(
            [
                "category" => "Series"
            ],
            [
                "category" => "Movies"
            ],
            [
                "category" => "Anime Series"
            ],
            [
                "category" => "Anime Movies"
            ]
        )->create();
    }
}
