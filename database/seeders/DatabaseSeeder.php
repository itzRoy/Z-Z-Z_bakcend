<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Gender;
use App\Models\Categorie;
use App\Models\Item;
use App\Models\Image;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::factory(10)->create();
      Gender::factory(3)->create();
      Categorie::factory(20)->create();
      Item::factory(100)->create();
      Image::factory(400)->create();

    }
}
