<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $data = ['admin', 'petugas', 'owner'];

        foreach ($data as $item) {
            Role::firstOrCreate([
                'role' => $item
            ]);
        }
    }
}
