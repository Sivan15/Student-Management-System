<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'bob', 'image', 'address', 'phone', 'hobbies', 'gender',
        'tamil', 'english', 'maths', 'science', 'soc_science',
    ];

    protected $appends = ['total_marks', 'percentage', 'grade'];
}
