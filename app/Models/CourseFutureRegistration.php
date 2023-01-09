<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFutureRegistration extends Model
{
    use HasFactory;

    protected $table = 'course_future_registrations';

    protected $fillable = [
        'course_id',
    ];
}
