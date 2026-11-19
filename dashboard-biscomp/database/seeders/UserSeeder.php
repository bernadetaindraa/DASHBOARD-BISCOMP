<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'email'     => 'auditor@garudapratama.com',
                'name'      => 'Auditor',
                'password'  => Hash::make('password'),
                'unit_id'   => 1,
                'role_id'   => 2,
                'is_active' => 1,
            ],
            [
                'email'     => 'admin@garudapratama.com',
                'name'      => 'Admin',
                'password'  => Hash::make('password'),
                'unit_id'   => 1,
                'role_id'   => 1,
                'is_active' => 1,
            ],
            [
                'email'     => 'faisal.jamil@garudapratama.com',
                'name'      => 'Faisal Jamil',
                'password'  => Hash::make('password'),
                'unit_id'   => 3,
                'role_id'   => 4,
                'is_active' => 1,
            ],
            [
                'email'     => 'budi.darmawan@garudapratama.com',
                'name'      => 'Budi Darmawan Susilo',
                'password'  => Hash::make('password'),
                'unit_id'   => 3,
                'role_id'   => 4,
                'is_active' => 1,
            ],
            [
                'email'     => 'abi.wafa@garudapratama.com',
                'name'      => 'Abi Wafa',
                'password'  => Hash::make('password'),
                'unit_id'   => 3,
                'role_id'   => 4,
                'is_active' => 1,
            ],
            [
                'email'     => 'rizka@garudapratama.com',
                'name'      => 'Rizka Nugraha Wahyudi',
                'password'  => Hash::make('password'),
                'unit_id'   => 3,
                'role_id'   => 4,
                'is_active' => 1,
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']], // Kondisi pencarian
                $userData                        // Data untuk update / create
            );
        }
    }
}