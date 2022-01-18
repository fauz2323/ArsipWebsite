<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Staf2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userStaff = User::create([
            'name' => 'staff',
            'email' => 'staff@staff.com',
            'password' => Hash::make('staff'),
        ]);

        $userStaff->assignRole('staff');
    }
}
