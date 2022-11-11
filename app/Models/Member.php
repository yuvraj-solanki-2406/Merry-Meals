<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'member_name',
        'member_phone',
        'member_address',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
