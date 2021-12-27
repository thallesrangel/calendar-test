<?php

namespace App\Http\Controllers;

use App\Services\CheckerService;

class CheckerController extends Controller
{
    protected $checkerService;

    public function __construct(CheckerService $checkerService)
    {
        $this->checkerService = $checkerService;
    }

    public function in($idClass)
    {
        $this->checkerService->in($idClass);
        
        return redirect()->route('class.list')->with('success', 'Check-in realizado com sucesso');
    }

    public function out($idClass)
    {
        $this->checkerService->out($idClass);
        
        return redirect()->route('class.list')->with('success', 'Check-out realizado com sucesso');
    }
}
