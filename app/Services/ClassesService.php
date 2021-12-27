<?php

namespace App\Services;

use App\Repositories\Contracts\ClassesRepositoryInterface;
use App\Http\Requests\ClassesRequest;
use App\Services\Rules\CheckClassLimitTrait;
use App\Repositories\CheckerRepositoryEloquent;
use App\Services\SendEmail;


class ClassesService
{
    use CheckClassLimitTrait;
    protected $classesRepository;
    protected $checkerRepository;
    protected $sendEmail;

    public function __construct(ClassesRepositoryInterface $classesRepository, 
                                CheckerRepositoryEloquent $checkerRepository,
                                SendEmail $sendEmail)
    {
        $this->classesRepository = $classesRepository;
        $this->checkerRepository = $checkerRepository;
        $this->sendEmail = $sendEmail;
    }

    public function get()
    {
        return $this->classesRepository->get();
    }

    public function getToday()
    {
        $class = $this->classesRepository->getToday();
        $classWithCounterCheckIn = $this->counterStudentCheckIn($class);
        
        return $classWithCounterCheckIn;
    }

    public function getWeek()
    {
        $class = $this->classesRepository->getWeek();
        $classWithCounterCheckIn = $this->counterStudentCheckIn($class);
        
        return $classWithCounterCheckIn;
    }

    public function show($idClass)
    {
        return $this->classesRepository->show($idClass);
    }

    public function store(ClassesRequest $request)
    {
        $checkIfExistsDateTimeRegistered = $this->classesRepository->getByDateTime($request);
        
        if ($checkIfExistsDateTimeRegistered) {
            return redirect()->route('class.list')->with("warning", "Há aulas nessa faixa de horário");
        }
        
        return $this->classesRepository->store($request);
    }

    public function disable($idClass)
    {
        try{
            $this->classesRepository->disable($idClass);
        } catch(\Exception $e) {
            return redirect()->route('class.list')->with("error", "Registro não pode ser excluído");
        }

        $people = $this->checkerRepository->getByClass($idClass);
        $this->sendEmail->send($people);
        
        return redirect()->route('class.list')->with("success", "Registro excluído com sucesso e emails enviados");
    }
}
