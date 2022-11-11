<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'volunteer_manpower_name',
        'volunteer_manpower_email',
        'volunteer_manpower_phone',
        'volunteer_manpower_days',
        'volunteer_manpower_hours',
    ];

    public function users(){
        return  $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
