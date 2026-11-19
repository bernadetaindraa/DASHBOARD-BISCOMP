<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectPeriodDocument extends Model
{
    protected $fillable = [
        'project_period_id',
        'document_type_id',
        'status',
        'current_evidence_id',
    ];

    public function period(): BelongsTo
    {
        return $this->belongsTo(ProjectPeriod::class, 'project_period_id');
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function evidences(): HasMany
    {
        return $this->hasMany(DocumentEvidence::class);
    }

    public function currentEvidence(): BelongsTo
    {
        return $this->belongsTo(
            DocumentEvidence::class,
            'current_evidence_id'
        );
    }
}