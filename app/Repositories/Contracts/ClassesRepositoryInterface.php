<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\ClassesRequest;

interface ClassesRepositoryInterface
{
    public function get();
    public function getToday();
    public function getWeek();
    public function getByDateTime($request);
    public function show($id);
    public function store($request);
    public function disable($id);
}
