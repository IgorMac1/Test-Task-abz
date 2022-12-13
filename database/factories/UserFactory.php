<?php

namespace Database\Factories;

use App\Models\Profession;
use Couchbase\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'profession_id' => rand(1,6),
            'admin_created_id' => 1,
            'admin_updated_id' => 1,
//            'manager_id' => 1,
            'full_name' => fake()->name() ,
            'employment_date' => fake()->dateTimeInInterval('-1 week', '+3 days')->format('Y-m-d'),
            'phone' => fake()->unique()->e164PhoneNumber,
            'email' => fake()->unique()->safeEmail(),
            'salary' => fake()->randomFloat(2,500,500000),
            'photo' => "https://loremflickr.com/320/240?random=" . rand(1,50000),
            'remember_token' => Str::random(10),
        ];


    }


}
