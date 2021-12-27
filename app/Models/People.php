<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'people';

    protected $fillable = [
        'name',
        'cpf',
        'role',
        'email',
        'flag_status'
    ];

    protected $hidden = [
        'password'
    ];
}
