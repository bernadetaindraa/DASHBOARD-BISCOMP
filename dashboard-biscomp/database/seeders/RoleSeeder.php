<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['code' => 'ADMIN', 'name' => 'Administrator'],
            ['code' => 'Auditor', 'name' => 'Auditor'],
            ['code' => 'Risk', 'name' => 'Risk'],
            ['code' => 'AMS', 'name' => 'Account Management & Sales'],
            ['code' => 'US', 'name' => 'Corporate Secretary & Legal'],
            ['code' => 'UO', 'name' => 'Operation'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['code' => $role['code']],
                $role + [
                    'description' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}