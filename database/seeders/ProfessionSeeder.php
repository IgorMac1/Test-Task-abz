<?php

namespace Database\Seeders;

use App\Helpers\Enums\ProfessionEnum;
use App\Models\Profession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profession = collect(ProfessionEnum::cases());
        $profession->each(fn($profession)=>Profession::firstOrCreate([
            'profession' => $profession->value,
            'admin_created_id'=>1,
            'admin_updated_id' => 1,
            ]));

    }
}
