<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'partner_id',
        'meal_name',
        'meal_type',
        'meal_image',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function partners(){
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }
}
