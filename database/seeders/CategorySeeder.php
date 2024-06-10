<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ["name" => "T-Shirt"],
            ["name" => "Hoodie"],
            ["name" => "Mugs"],
            ["name" => "Sweater"],
            ["name" => "Totebag"],
            ["name" => "Jacket"],
            ["name" => "LongSleeves"],
            ["name" => "PDL"]
        ]);

    }
}
