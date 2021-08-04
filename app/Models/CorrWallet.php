<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrWallet extends Model
{
    use HasFactory;
    protected $table ='corr_wallet';
    protected $fillable = [
        'corr_id', 'credit', 'created_at', 'updated_at'
    ];
}
