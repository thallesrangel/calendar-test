<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassesRequest;
use App\Services\CheckerService;
use App\Services\ClassesService;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    protected $classesService;
    protected $checkerService;

    public function __construct(ClassesService $classesService, CheckerService $checkerService)
    {
        $this->classesService = $classesService;
        $this->checkerService = $checkerService;
    }

    public function index(Request $request)
    {
        switch ($request->data) {
            case 'semana':
                $classes = $this->classesService->getWeek();
                break;

            default:
                $classes = $this->classesService->getToday();
                break;
        }

        return view((session('people.role') == 'admin') ? 'class.list' : 'class-student.list', [ 'data' => $classes ]);        
    }
    
    public function create()
    {
        return view('class.create');
    }
    public function store(ClassesRequest $request)
    {
        try {
            $this->classesService->store($request);
        } catch (\Exception $e) {
            return redirect()->route('class.create')->with('error', 'Ocorreu um erro. Verifique os campos.');
        }
        
        return redirect()->route('class.list')->with('success', 'Registrado com sucesso.');
    }
    
    public function show($id)
    {
        $class = $this->classesService->show($id);
        $checkIn = $this->checkerService->getByClass($id);
        
        return view('class.details', [ 'class' => $class, 'checkIn' => $checkIn ]);
    }
    
    public function disable($id)
    {
        $this->classesService->disable($id);
        
        return redirect()->route('class.list');
    }
}

