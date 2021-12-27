<?php

namespace App\Repositories;

use App\Models\Checker;
use App\Repositories\Contracts\CheckerRepositoryInterface;

class CheckerRepositoryEloquent implements CheckerRepositoryInterface
{
    protected $checker;

    public function __construct(Checker $checker)
    {
        $this->checker = $checker;
    }

    public function get($idClass)
    {
        return $this->checker
                    ->where('classes_id', $idClass)
                    ->where('flag_status', 'checkin')
                    ->with('classes')
                    ->with('people')
                    ->get()
                    ->toArray();
    }

    public function getByClass($idClass)
    {
        return $this->checker
                    ->where('classes_id', $idClass)
                    ->where('flag_status', 'checkin')
                    ->with('classes')
                    ->with('people')
                    ->get();
    }

    public function getByClassByPeople($idClass)
    {
        return $this->checker
                    ->where('classes_id', $idClass)
                    ->where('people_id', session('people.id'))
                    ->where('flag_status', 'checkin')
                    ->with('classes')
                    ->with('people')
                    ->get()
                    ->toArray();
    }

    public function in($idClass)
    {
        $checker = new $this->checker;

        $checker->classes_id = $idClass;
        $checker->people_id = session('people.id');
        $checker->flag_status = 'checkin';
        $checker->created_at = now();

        $checker->save();

        return $checker->fresh();
    }

    public function out($idClass)
    {
        $checker = $this->checker->where('classes_id', $idClass)->where('people_id', session('people.id'))->first();
        $checker->flag_status = 'checkout';
        $checker->updated_at = now();
        $checker->save();

        return $checker->fresh();
    }
}
