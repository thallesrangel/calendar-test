<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'classes';

    protected $fillable = [
        'people_id',
        'date_time_start',
        'date_time_end',
        'name',
        'limit_student',
        'flag_status'
    ];

    public function people()
    {
        return $this->belongsTo(People::class, 'people_id');
    }

    public function checker()
    {
        return $this->hasMany(Checker::class, 'classes_id', 'id');
    }
}
