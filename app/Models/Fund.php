<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fund extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_year', 'manager_id', 'aliases'];

    protected $casts = [
        'aliases' => 'array',
    ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(FundManager::class);
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_fund');
    }

}
