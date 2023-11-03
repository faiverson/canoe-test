<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotentialDuplicatedFund extends Model
{
    use HasFactory;

    protected $primaryKey = ['original_fund_id', 'duplicated_fund_id'];

    public $incrementing = false;

    protected $fillable = [
        'original_fund_id',
        'duplicated_fund_id',
    ];

    public $timestamps = false;

    public function fundOriginal()
    {
        return $this->belongsTo(Fund::class, 'original_fund_id');
    }

    public function fundDuplicated()
    {
        return $this->belongsTo(Fund::class, 'duplicated_fund_id');
    }

}
