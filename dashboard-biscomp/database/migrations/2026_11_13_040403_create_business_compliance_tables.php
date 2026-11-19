
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. MASTER UNIT
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('name');
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('units')
                ->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. MASTER ROLE
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 3. TAMBAHAN KOLOM USERS
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('unit_id')
                ->nullable()
                ->constrained('units')
                ->nullOnDelete();

            $table->foreignId('role_id')
                ->nullable()
                ->constrained('roles')
                ->nullOnDelete();

            $table->boolean('is_active')->default(true);
        });

        // 4. MASTER PROJECT
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_code')->unique();
            $table->string('group_name')->nullable();
            $table->string('customer_name');
            $table->timestamps();
        });

        // 5. PERIODE PROJECT
        Schema::create('project_periods', function (Blueprint $table) {
            $table->id();

            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('period_number');
            $table->unsignedSmallInteger('year_entered');

            $table->foreignId('ams_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->default('active');

            $table->timestamps();

            $table->unique(
                ['project_id', 'period_number'],
                'project_period_unique'
            );
        });

        // 6. JENIS DOKUMEN
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->unique();
            $table->string('name');
            $table->string('responsible_unit_code', 20);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 7. CHECKLIST DOKUMEN PER PERIODE
        Schema::create('project_period_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('project_period_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('document_type_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('status', 30)->default('not_uploaded');

            $table->timestamps();

            $table->unique(
                ['project_period_id', 'document_type_id'],
                'period_document_unique'
            );
        });

        // 8. RIWAYAT UPLOAD DOKUMEN
        Schema::create('document_evidences', function (Blueprint $table) {
            $table->id();

            $table->foreignId('project_period_document_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('uploaded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('file_path')->nullable();
            $table->string('external_url')->nullable();
            $table->string('original_file_name')->nullable();
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->timestamp('uploaded_at')->useCurrent();

            $table->timestamps();
        });

        // 9. EVIDENCE TERAKHIR YANG SEDANG DINILAI
        Schema::table('project_period_documents', function (Blueprint $table) {
            $table->foreignId('current_evidence_id')
                ->nullable()
                ->constrained('document_evidences')
                ->nullOnDelete();
        });

        // 10. RIWAYAT VERIFIKASI UI
        Schema::create('document_verifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('document_evidence_id')
                ->constrained('document_evidences')
                ->cascadeOnDelete();

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('status', 30);
            $table->text('notes')->nullable();
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });

        // 11. SNAPSHOT MINGGUAN
        Schema::create('weekly_snapshots', function (Blueprint $table) {
            $table->id();
            $table->date('snapshot_date')->unique();
            $table->timestamp('generated_at')->nullable();
            $table->string('status')->default('completed');
            $table->timestamps();
        });

        // 12. DETAIL KPI SNAPSHOT
        Schema::create('weekly_snapshot_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('weekly_snapshot_id')
                ->constrained()
                ->cascadeOnDelete();

            // overall, by_category, by_unit, by_project
            $table->string('metric_type', 30);

            $table->foreignId('project_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('project_period_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('document_type_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('unit_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->unsignedInteger('total_documents')->default(0);
            $table->unsignedInteger('verified_documents')->default(0);
            $table->decimal('compliance_percentage', 5, 2)->default(0);

            $table->timestamps();
        });

        // 13. LOG AKTIVITAS
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('action', 100);
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('weekly_snapshot_details');
        Schema::dropIfExists('weekly_snapshots');
        Schema::dropIfExists('document_verifications');

        Schema::table('project_period_documents', function (Blueprint $table) {
            $table->dropForeign(['current_evidence_id']);
            $table->dropColumn('current_evidence_id');
        });

        Schema::dropIfExists('document_evidences');
        Schema::dropIfExists('project_period_documents');
        Schema::dropIfExists('document_types');
        Schema::dropIfExists('project_periods');
        Schema::dropIfExists('projects');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
            $table->dropForeign(['role_id']);
            $table->dropColumn(['unit_id', 'role_id', 'is_active']);
        });

        Schema::dropIfExists('roles');
        Schema::dropIfExists('units');
    }
};
