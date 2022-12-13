<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\User3Level;
use Database\Factories\User3LevelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User3LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User3Level::factory(100)->create();
    }
}
