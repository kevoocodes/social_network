<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionals extends Model
{
    use HasFactory;

    public function posts()
    {
            // return $this->hasMany(Posts::class);
            return $this->hasMany(Posts::class, 'professional_id');
    }

    protected $table = 'professionals';

    protected $fillable = [
        'name',
        // Add other fillable fields as needed
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'userprofessional', 'professional_id', 'user_id');
    }

    

}
