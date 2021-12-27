<?php

namespace App\Repositories\Contracts;

interface CheckerRepositoryInterface
{
    public function get($idClass);
    public function getByClass($idClass);
    public function getByClassByPeople($idClass);
    public function in($idClass);
    public function out($idClass);
}
