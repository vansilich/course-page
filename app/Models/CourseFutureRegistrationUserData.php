<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFutureRegistrationUserData extends Model
{
    use HasFactory;

    protected $table = 'course_future_registration_user_data';

    protected $fillable = [
        'registration_id',
        'field_id',
        'field_value',
    ];

    public function course()
    {
        return $this->hasOneThrough(Course::class, CourseFutureRegistration::class);
    }

    public function registration()
    {
        return $this->belongsTo(CourseFutureRegistration::class);
    }
}
