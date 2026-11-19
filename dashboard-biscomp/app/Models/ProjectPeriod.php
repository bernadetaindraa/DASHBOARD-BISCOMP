<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\DocumentType;

class ProjectPeriod extends Model
{
    protected $fillable = [
        'project_id',
        'period_number',
        'year_entered',
        'ams_user_id',
        'start_date',
        'end_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function amsUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ams_user_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(ProjectPeriodDocument::class);
    }

    protected static function booted(): void
    {
        static::created(function (ProjectPeriod $period) {
            $documentTypes = DocumentType::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get();

            foreach ($documentTypes as $documentType) {
                $period->documents()->firstOrCreate(
                    [
                        'document_type_id' => $documentType->id,
                    ],
                    [
                        'status' => 'not_uploaded',
                    ]
                );
            }
        });
    }
}