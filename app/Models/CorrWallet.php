<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrWallet extends Model
{
    use HasFactory;
    protected $table ='corr_wallets';
    protected  $primaryKey = 'wallet_id';
    protected $fillable = [
        'corr_id', 'credit', 'previous_due', 'created_at', 'updated_at'
    ];
}
