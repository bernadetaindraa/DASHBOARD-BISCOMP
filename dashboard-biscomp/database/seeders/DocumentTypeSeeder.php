<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $documents = [
            ['code' => 'PROPOSAL', 'name' => 'Proposal', 'unit' => 'AMS', 'order' => 1],
            ['code' => 'GI', 'name' => 'General Information', 'unit' => 'AMS', 'order' => 2],
            ['code' => 'RR', 'name' => 'Risk Register', 'unit' => 'AMS', 'order' => 3],
            ['code' => 'PA', 'name' => 'Profitability Analysis', 'unit' => 'AMS', 'order' => 4],
            ['code' => 'PI', 'name' => 'Project Information', 'unit' => 'AMS', 'order' => 5],
            ['code' => 'KONTRAK', 'name' => 'Kontrak', 'unit' => 'US', 'order' => 6],
            ['code' => 'BOQ', 'name' => 'Material / BoQ', 'unit' => 'UO', 'order' => 7],
        ];

        foreach ($documents as $document) {
            DB::table('document_types')->updateOrInsert(
                ['code' => $document['code']],
                [
                    'name' => $document['name'],
                    'responsible_unit_code' => $document['unit'],
                    'sort_order' => $document['order'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}