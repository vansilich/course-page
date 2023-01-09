<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseInputField;

class CourseInputFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CourseInputField::create(['course_id' => 1, 'field_id' => 1, 'validation_rule' => 'required']);
        CourseInputField::create(['course_id' => 1, 'field_id' => 2, 'validation_rule' => 'required|email']);
        CourseInputField::create(['course_id' => 1, 'field_id' => 3, 'validation_rule' => 'required']);
        CourseInputField::create(['course_id' => 1, 'field_id' => 4, 'validation_rule' => 'required']);
        CourseInputField::create(['course_id' => 1, 'field_id' => 5, 'validation_rule' => 'required']);

        // ===

        CourseInputField::create(['course_id' => 2, 'field_id' => 1, 'validation_rule' => 'required']);
        CourseInputField::create(['course_id' => 2, 'field_id' => 2, 'validation_rule' => 'required|email']);
        CourseInputField::create(['course_id' => 2, 'field_id' => 3, 'validation_rule' => 'required']);
        CourseInputField::create(['course_id' => 2, 'field_id' => 8, 'validation_rule' => '']);

        CourseInputField::create(['course_id' => 2, 'field_id' => 4, 'validation_rule' => 'required_without:is-student']);
        CourseInputField::create(['course_id' => 2, 'field_id' => 5, 'validation_rule' => 'required_without:is-student']);

        CourseInputField::create(['course_id' => 2, 'field_id' => 6, 'validation_rule' => 'required_if:is-student,on']);
        CourseInputField::create(['course_id' => 2, 'field_id' => 7, 'validation_rule' => 'required_if:is-student,on']);
    }
}
