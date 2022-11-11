<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riderdelivery extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'rider_name',
        'member_name',
        'member_address',
        'member_email',
        'organization_name',
        'organization_address',
        'distance'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
