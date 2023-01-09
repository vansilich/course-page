<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $table = 'course_registrations';

    protected $fillable = [
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
