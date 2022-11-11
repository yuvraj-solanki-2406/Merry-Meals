<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'vol_resource_name',
        'vol_resource_email',
        'vol_resource_phone',
        'vol_resources',
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
