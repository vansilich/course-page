<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistrationUserData extends Model
{
    use HasFactory;

    protected $table = 'course_registration_user_data';

    protected $fillable = [
        'registration_id',
        'field_id',
        'field_value',
    ];

    public function course()
    {
        return $this->hasOneThrough(Course::class, CourseRegistration::class);
    }

    public function registration()
    {
        return $this->belongsTo(CourseRegistration::class);
    }
}
