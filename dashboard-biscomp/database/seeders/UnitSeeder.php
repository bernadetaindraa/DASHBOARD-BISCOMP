<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            ['code' => 'UI', 'name' => 'Internal Audit', 'parent' => null],
            ['code' => 'UB', 'name' => 'Unit Bisnis', 'parent' => null],
            ['code' => 'AMS', 'name' => 'Account Manager & Sales', 'parent' => 'UB'],
            ['code' => 'US', 'name' => 'Corporate Secretary & Legal', 'parent' => null],
            ['code' => 'UO', 'name' => 'Operation', 'parent' => null],
        ];

        foreach ($units as $unit) {
            $parentId = $unit['parent']
                ? DB::table('units')->where('code', $unit['parent'])->value('id')
                : null;

            DB::table('units')->updateOrInsert(
                ['code' => $unit['code']],
                [
                    'name' => $unit['name'],
                    'parent_id' => $parentId,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}