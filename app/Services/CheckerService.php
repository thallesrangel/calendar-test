<?php

namespace App\Services;

use App\Repositories\ClassesRepositoryEloquent;
use App\Repositories\Contracts\CheckerRepositoryInterface;
use App\Services\Rules\ { CheckHasBeenVerifiedTrait, CheckIfLessMinutesTrait, CheckClassLimitTrait };

class CheckerService
{
    use CheckHasBeenVerifiedTrait, CheckIfLessMinutesTrait, CheckClassLimitTrait;
    protected $checkerRepository;
    protected $classesRepository;

    public function __construct(CheckerRepositoryInterface $checkerRepository, ClassesRepositoryEloquent $classesRepository)
    {
        $this->checkerRepository = $checkerRepository;
        $this->classesRepository = $classesRepository;
    }

    public function getByClass($idClass)
    {
        return $this->checkerRepository->getByClass($idClass);
    }

    public function in($idClass)
    {
        $class = $this->checkerRepository->getByClassByPeople($idClass);

        if ($this->checkHasBeenVerified($class)) {
            return redirect()->route('class.list')->with('error', 'Não foi possível realizar o Check-in');
        }
        
        #TODO Se já tiver feito algum checkout (nao criar novo registro)

        $classById = $this->classesRepository->show($idClass);
        $classWithCounterCheckIn = $this->counterStudentCheckIn($classById);

        if ($classWithCounterCheckIn[0]['busy'] >= $classWithCounterCheckIn[0]['limit_student']) {
            return redirect()->route('class.list')->with('warning', 'Todas as vagas foram preenchidas');
        }

        return $this->checkerRepository->in($idClass);
    }

    public function out($idClass)
    {
        $class = $this->checkerRepository->getByClass($idClass);

        if (!$this->checkIfLessThirtyMinutes($class)) {
            return redirect()->route('class.list')->with('error', 'Não foi possível realizar o Check-out');
        }

        if ($this->checkHasBeenVerified($class)) {
            return $this->checkerRepository->out($idClass);
        };
    }
}
