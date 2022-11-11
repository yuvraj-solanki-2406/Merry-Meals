<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_name',
        'member_address',
        'member_phone',
        'member_latitude',
        'member_longitude',
        'meal_image',
        'meal_name',
        'meal_type',
        'partner_organizations',
        'partner_address',
        'partner_latitude',
        'partner_longitude',
        'rider',
    ];
}
