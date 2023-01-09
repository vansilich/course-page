<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\CourseRegistrationUserData;
use App\Models\UserDataField;
use App\Services\CourseRegistrationService;
use App\Http\Requests\CourseRegistrationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseSignUp;
use App\Mail\CourseFutureSignUp;
use App\Models\CourseFutureRegistrationUserData;
use App\Models\CourseFutureRegistration;

class CourseRegisterController extends Controller
{
    
    public function register(CourseRegistrationRequest $request, string $course_slug)
    {
        $validated = $request->validated();

        $course = Course::where('slug', $course_slug)->first();

        $email_user_field = UserDataField::where('slug', 'email')->first();
        $email = $validated['email'];
        
        $email_registered_record = CourseRegistrationUserData::select('course_registration_user_data.*')
            ->join('course_registrations', 'course_registrations.id', '=', 'course_registration_user_data.registration_id')
            ->where('course_registrations.course_id', $course->id)
            ->where('field_id', $email_user_field->id)
            ->where('field_value', $email)
            ->first();

        // Есть ли уже запись с данным имейлом среди регистраций на этот курс?
        if(null !== $email_registered_record){
            return response()->json([
                'method' => 'success',
                'message' => 'Вы уже записаны на курс!'
            ]);
        }

        // Если регистрация на курс закончилась, то записываем на будущее
        if($course->end_date < now()){
            return $this->futureRegister($request, $course);
        }

        $new_registration = CourseRegistration::create(['course_id' => $course->id]);

        foreach($course->registrationInputs as $registrationInput){

            $input = $registrationInput->userDataField;

            CourseRegistrationUserData::create([
                'registration_id' => $new_registration->id,
                'field_id' => $input->id,
                'field_value' => $validated[$input->slug] ?? null,
            ]);
        }

        Mail::to($validated['email'])
            ->later(now()->addMinute(), new CourseSignUp(
                $course->title,
                $validated['name_and_surname'], 
                $validated['email'], 
                $course->title,
                'Приглашение на курс',
            ));

        return response()->json([
            'method' => 'success', 
            'message' => 'Вы успешно записались на курс!'
        ]);
    }

    private function futureRegister(CourseRegistrationRequest $request, Course $course)
    {
        $validated = $request->validated();

        $email_user_field = UserDataField::where('slug', 'email')->first();
        $email = $validated['email'];
        
        $email_registered_record = CourseFutureRegistrationUserData::select('course_future_registration_user_data.*')
            ->join('course_future_registrations', 'course_future_registrations.id', '=', 'course_future_registration_user_data.registration_id')
            ->where('course_future_registrations.course_id', $course->id)
            ->where('field_id', $email_user_field->id)
            ->where('field_value', $email)
            ->first();

        // Есть ли уже запись с данным имейлом среди регистраций на этот курс?
        if(null !== $email_registered_record){
            return response()->json([
                'method' => 'success',
                'message' => 'Вы уже записаны на следующий поток курса.'
            ]);
        }

        $new_registration = CourseFutureRegistration::create(['course_id' => $course->id]);

        foreach($course->registrationInputs as $registrationInput){

            $input = $registrationInput->userDataField;

            CourseFutureRegistrationUserData::create([
                'registration_id' => $new_registration->id,
                'field_id' => $input->id,
                'field_value' => $validated[$input->slug] ?? null,
            ]);
        }

        Mail::to($validated['email'])
            ->later(now()->addMinute(), new CourseFutureSignUp(
                $course->title,
                $validated['name_and_surname'], 
                $validated['email'], 
                $course->title,
                'Приглашение на курс',
            ));

        return response()->json([
            'method' => 'success', 
            'message' => 'Регистрация на текущий поток закрата! Вы успешно записались на следующий поток курса.'
        ]);
    }

}
