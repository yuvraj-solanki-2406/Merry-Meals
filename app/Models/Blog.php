<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'writer_name',
        'blog_title',
        'blog_desc',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
