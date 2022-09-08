<?php

namespace Database\Seeders;

use App\Models\ConfigReligion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigReligion::create(['parameter' => 'ISLAM', 'index' => '1', 'created_at' => now()]);
        ConfigReligion::create(['parameter' => 'KRISTIAN', 'index' => '2', 'created_at' => now()]);
        ConfigReligion::create(['parameter' => 'HINDU', 'index' => '3', 'created_at' => now()]);
        ConfigReligion::create(['parameter' => 'BUDDHA', 'index' => '4', 'created_at' => now()]);
        ConfigReligion::create(['parameter' => 'LAIN-LAIN', 'index' => '99', 'created_at' => now()]);
    }
}
