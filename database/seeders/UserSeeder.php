<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        User::factory(10,['manager_id' => 1])->create();
        $this->createUser(100,2,11);
        $this->createUser(1000,12,111);
        $this->createUser(48889,112,1111);
    }

    public function createUser(int $count,int $minNum,int $maxNum)
    {
        for ($i=0;$i<=$count;$i++)
        {
            User::factory(1,['manager_id' => fake()->numberBetween($minNum, $maxNum)])->create();
        }
    }
}
