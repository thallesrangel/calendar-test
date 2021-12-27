<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checker extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'checker';

    protected $fillable = [
        'classes_id',
        'people_id',
        'created_at',
        'updated_at',
        'flag_status'
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    public function people()
    {
        return $this->belongsTo(People::class, 'people_id');
    }
}
