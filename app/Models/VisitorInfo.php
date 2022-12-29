<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorInfo extends Model
{
    use HasFactory;

    protected $table = 'visitor_info';

    protected $fillable = [
        'email_hash',
        'utm_subject',
        'utm_source',
        'type',
        'ip',
        'from',
        'ym_uid',
    ];
}
