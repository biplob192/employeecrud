<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','division_id','district_id','upazila_id','mobile','nid', 'corrid', 'email', 'appointed_date', 'image'
    ];
}
