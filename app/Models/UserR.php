<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserR extends Model
{
    protected $fillable = ['name', 'email', 'telephone'];
    protected $table = 'user_request';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $connection = 'mysql';
}
