<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'donor_name',
        'donor_phone',
        'donation_amount'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}

?>
