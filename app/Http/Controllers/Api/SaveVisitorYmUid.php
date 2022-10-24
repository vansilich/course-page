<?php

namespace App\Http\Controllers\Api;

use App\Models\VisitorInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveVisitorYmUid extends Controller
{
    public function __invoke(Request $request)
    {
        VisitorInfo::updateOrCreate(
            ['email_hash' => $request->get('hash')],
            ['ym_uid' => $request->get('ym_uid')]
        );
    }
}
