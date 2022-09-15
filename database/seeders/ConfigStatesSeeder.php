<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ConfigState;

class ConfigStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigState::create(['parameter' => 'JOHOR', 'index' => '1', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'KEDAH', 'index' => '2', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'KELANTAN', 'index' => '3', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'MELAKA', 'index' => '4', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'NEGERI SEMBILAN', 'index' => '5', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'PAHANG', 'index' => '6', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'PERAK', 'index' => '7', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'PERLIS', 'index' => '8', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'PULAU PINANG', 'index' => '9', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'SABAH', 'index' => '10', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'SARAWAK', 'index' => '11', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'SELANGOR', 'index' => '12', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'TERENGGANU', 'index' => '13', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'WILAYAH PERSEKUTUAN KUALA LUMPUR', 'index' => '14', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'WILAYAH PERSEKUTUAN LABUAN', 'index' => '15', 'created_at' => now()]);
        ConfigState::create(['parameter' => 'WILAYAH PERSEKUTUAN PUTRAJAYA', 'index' => '16', 'created_at' => now()]);
    }
}
