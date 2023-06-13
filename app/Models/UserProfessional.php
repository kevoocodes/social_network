<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfessional extends Model
{
    protected $table = 'userprofessional'; // Specify the correct table nam
    use HasFactory;
    protected $fillable = [
        'user_id', // Add 'user_id' to the $fillable array
        'professional_id'
    ];
}
