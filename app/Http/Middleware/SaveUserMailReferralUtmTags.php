<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\VisitorInfo;
use Illuminate\Support\Facades\Log;

class SaveUserMailReferralUtmTags
{
    /**
     * Если клиент перешел из письма, сохраяняем его utm метки и информацию о пользователе
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(null === $request->get('utm_mgash')){
            return $next($request);
        }

        $email = $request->get('utm_mgash');
        $email_hash = hash('sha256', $email);

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/email_hashes.log')
        ])->info("$email\t$email_hash");

        try{
            VisitorInfo::updateOrCreate(
                ['email_hash' => $email_hash],
                [
                    'utm_subject' => $request->get('utm_subject'), 
                    'utm_source' => $request->get('utm_source'), 
                    'type' => $request->get('type'),
                    'ip' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null,
                    'from' => $request->get('from')
                ]
            );

            $request->session()->put('user_email_referral_hash', $email_hash);
        } catch (\Exception $e) {
            Log::error("Не удалось сохранить визит: '" . $e->getMessage() ."'");
        } finally {
            return $next($request);
        }
    }
}
