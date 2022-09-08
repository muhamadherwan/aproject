<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'ADMIN',
            'email' => 'admin@themesbrand.com',
            'email_verified_at' => '2022-01-01 00:00:00',
            'password' => Hash::make('123456'),
            'mykad' => '001010000000',
            'dob' => '2000-10-10',
            'address' => 'LP',
            'postcode' => '00000',
            'area' => 'PUTRAJAYA',
            'city' => 'PUTRAJAYA',
            'config_states_fk' => '15',
            'avatar' => 'images/avatar-1.jpg',
            'status' => '1',
            'created_by' => '1',
            'created_at' => now(),
        ]);
    }
}
