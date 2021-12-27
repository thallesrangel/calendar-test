<?php

namespace App\Repositories;

use App\Models\People;
use App\Repositories\Contracts\PeopleRepositoryInterface;

class PeopleRepositoryEloquent implements PeopleRepositoryInterface
{
    protected $people;

    public function __construct(People $people)
    {
        $this->people = $people;
    }

    public function get($request)
    {
        return $this->people->where('email', '=', $request->email)->where('password', '=', md5($request->password))->first();
    }
}
