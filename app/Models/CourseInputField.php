<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInputField extends Model
{
    use HasFactory;

    protected $table = 'course_input_fields';

    protected $fillable = [
        'course_id',
        'field_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function userDataField()
    {
        return $this->belongsTo(UserDataField::class, 'field_id', 'id');
    }
}
