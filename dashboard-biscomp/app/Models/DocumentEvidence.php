<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentEvidence extends Model
{
    protected $fillable = [
        'project_period_document_id',
        'uploaded_by',
        'file_path',
        'external_url',
        'original_file_name',
        'mime_type',
        'file_size',
        'uploaded_at',
    ];

    protected function casts(): array
    {
        return [
            'uploaded_at' => 'datetime',
        ];
    }

    public function periodDocument(): BelongsTo
    {
        return $this->belongsTo(
            ProjectPeriodDocument::class,
            'project_period_document_id'
        );
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(DocumentVerification::class);
    }
}