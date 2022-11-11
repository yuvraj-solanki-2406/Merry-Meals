<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rider_name',
        'rider_address',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
