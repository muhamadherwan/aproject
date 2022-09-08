<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ConfigCollegesType;

class ConfigCollegesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigCollegesType::create(['parameter' => 'KPM', 'index' => '1', 'created_at' => now()]);
        ConfigCollegesType::create(['parameter' => 'ILKA', 'index' => '2', 'created_at' => now()]);
        ConfigCollegesType::create(['parameter' => 'ILKS', 'index' => '3', 'created_at' => now()]);
    }
}
