<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $userStaff = User::create([
            'name' => 'staff',
            'email' => 'staff@staff.com',
            'password' => Hash::make('staff'),
        ]);

        $admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);

        $user->assignRole($admin);
        $userStaff->assignRole($staff);
    }
}
