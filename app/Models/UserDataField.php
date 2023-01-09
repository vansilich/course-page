<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDataField extends Model
{
    use HasFactory;

    protected $table = 'user_data_fields';

    protected $fillable = [
        'title',
        'slug',
    ];
}
