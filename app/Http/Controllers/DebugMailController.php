<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\SendInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class DebugMailController extends Controller
{
    /**
     * Для тестирования отправки письма и отладки ошибок.
     *
     * @path api/debug/mail
     * @param UserRequest $request
     * @return void
     */
    public function index(UserRequest $request) {
        $valid = $request->validated();
        Mail::to($valid['email'])->send(new SendInvite([
            'name' => $valid['name'], 'email' => $valid['email'], 'telephone' => $valid['telephone']
        ]));
    }
}
