<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User5Level;
use Database\Factories\User5LevelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User5LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User5Level::factory(48889)->create();
    }
}
