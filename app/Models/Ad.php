<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_status', 'deleted_at'
    ];

    public function scopeWhereStatus($query, int $status){
        return $query->when($status == 0 || $status ==1 , fn($query) => $query->where('ads.payment_status',$status))
        ->when($status ==2 , fn($query) => $query->where('ads.upazila_id', 494))
        ->when($status ==3, fn($query) => $query->where('ads.upazila_id','<>', 494));
    }

}
