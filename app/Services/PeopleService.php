<?php

namespace App\Services;

use App\Repositories\Contracts\PeopleRepositoryInterface;

class PeopleService
{
    protected $peopleRepository;

    public function __construct(PeopleRepositoryInterface $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }

    public function get($data)
    {
        return $this->peopleRepository->get($data);
    }
}
