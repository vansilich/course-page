<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorInfo;
use Illuminate\Support\Facades\Log;

class MailRefferalController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $email = $request->get('utm_mgash');
        $email_hash = hash('sha256', $email);

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/email_hashes.log')
        ])->info("$email\t$email_hash");

        $utm_subject = $request->get('utm_subject');
        $utm_source = $request->get('utm_source');
        $type = $request->get('type');
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
        $from = $request->get('from');

        try{
            VisitorInfo::updateOrCreate(
                ['email_hash' => $email_hash],
                [
                    'utm_subject' => $utm_subject, 
                    'utm_source' => $utm_source, 
                    'type' => $type,
                    'ip' => $ip,
                    'from' => $from
                ]
            );
        } catch (\Exception $e) {
            Log::error("Не удалось сохранить визит: '" . $e->getMessage() ."'");
        } finally {
            return redirect('/')->with('hash', $email_hash);
        }
    }
}
