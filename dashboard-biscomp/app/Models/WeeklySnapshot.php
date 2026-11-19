<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeeklySnapshot extends Model
{
    protected $fillable = [
        'snapshot_date',
        'generated_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'snapshot_date' => 'date',
            'generated_at' => 'datetime',
        ];
    }

    public function details(): HasMany
    {
        return $this->hasMany(WeeklySnapshotDetail::class);
    }
}