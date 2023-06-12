<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable =  [
        'user_id',
        'professional_id',
        'content',
        'image',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comment() {
        return $this->hasMany(Comments::class, 'post_id');
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

}
