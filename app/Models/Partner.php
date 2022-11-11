<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'partner_organization',
        'partnership_timeline',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
