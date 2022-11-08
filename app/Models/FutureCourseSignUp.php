<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureCourseSignUp extends Model
{
    use HasFactory;

    protected $table = 'future_course_sign_up';

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'job',
        'company'
    ];
}
