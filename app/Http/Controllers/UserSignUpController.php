<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\FutureSignUpRequest;
use App\Mail\SendInvite;
use App\Mail\CompasFutureSignUp;
use App\Models\UserR;
use App\Models\FutureCourseSignUp;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class UserSignUpController extends Controller
{
    public function getRequest(UserRequest $request): JsonResponse
    {
        $valid = $request->validated();
        $response = UserR::updateOrCreate(
            ['email' => $valid['email']],
            ['name' => $valid['name'], 'email' => $valid['email'], 'telephone' => $valid['telephone'], 'updated_at' => time()],
        );

        if ($response->created_at == $response->updated_at) {
            $body = ['method' => 'success', 'message' => 'Вы успешно записались на курс!'];

            Mail::to($valid['email'])
                ->later(now()->addMinute(), new SendInvite([
                    'name' => $valid['name'], 'email' => $valid['email'], 'telephone' => $valid['telephone']
                ]));
        } else {
            $body = ['method' => 'success', 'message' => 'Вы уже записаны на курс!'];

        }
        return response()->json($body);
    }

    public function futureSignUp(FutureSignUpRequest $request)
    {
        $valid = $request->validated();
        $response = FutureCourseSignUp::updateOrCreate(
            ['email' => $valid['email']],
            [
                'name' => $valid['name'], 
                'email' => $valid['email'], 
                'telephone' => $valid['telephone'],
                'job' => $valid['job'],
                'company' => $valid['company'],
                'updated_at' => time()
            ],
        );

        if ($response->created_at == $response->updated_at) {
            $body = ['method' => 'success', 'message' => 'Вы успешно записались на курс!'];

            Mail::to($valid['email'])
                ->later(now()->addMinute(), new CompasFutureSignUp([
                    'name' => $valid['name'], 'email' => $valid['email'], 'telephone' => $valid['telephone']
                ]));
        } else {
            $body = ['method' => 'success', 'message' => 'Вы уже записаны на курс!'];
        }

        return response()->json($body);
    }
}
