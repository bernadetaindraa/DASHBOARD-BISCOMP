<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    protected $fillable = [
        'code',
        'name',
        'responsible_unit_code',
        'sort_order',
        'is_active',
    ];

    public function periodDocuments(): HasMany
    {
        return $this->hasMany(ProjectPeriodDocument::class);
    }
}