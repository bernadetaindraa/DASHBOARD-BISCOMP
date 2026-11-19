<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeeklySnapshotDetail extends Model
{
    protected $fillable = [
        'weekly_snapshot_id',
        'metric_type',
        'project_id',
        'project_period_id',
        'document_type_id',
        'unit_id',
        'total_documents',
        'verified_documents',
        'compliance_percentage',
    ];

    public function snapshot(): BelongsTo
    {
        return $this->belongsTo(WeeklySnapshot::class, 'weekly_snapshot_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(ProjectPeriod::class, 'project_period_id');
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}