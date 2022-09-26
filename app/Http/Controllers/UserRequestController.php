<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\UserR;
use Illuminate\Http\JsonResponse;

class UserRequestController extends Controller
{
    public function getRequest(UserRequest $request): JsonResponse
    {
        $valid = $request->validated();

        UserR::updateOrCreate(
            ['email' => $valid['email']],
            ['name' => $valid['name'], 'email' => $valid['email'], 'telephone' => $valid['telephone']],
        );

        return response()->json(['method' => 'success', 'body' => ['message' => 'Вы успешно записались на курс!']]);
    }
}
