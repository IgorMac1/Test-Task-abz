<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User2Level;
use Database\Factories\User2LevelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User2LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User2Level::factory(10)->create();
    }
}
