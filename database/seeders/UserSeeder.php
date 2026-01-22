<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('role', 'admin')->first();

        User::create([
            'name'     => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('123'),
            'role_id'  => $adminRole->id,
        ]);
    }
}
