<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\User4Level;
use Database\Factories\User4LevelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User4LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User4Level::factory(1000)->create();
    }
}
