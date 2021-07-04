<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPrice extends Model
{
    protected $table = 'ads_price';


    //we have to define fillable to create/update/createOrUpdate etc
    protected $fillable = [
        'ads_type',
        'ads_position',
        'price',
        'extra_charge',
        'payment_status',
        'created_at',
        'updated_at',
    ];
}
