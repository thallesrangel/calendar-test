<?php

namespace App\Http\Controllers;

use App\Services\PeopleService;
use App\Http\Requests\SignInRequest;

class SignInController extends Controller
{
    protected $peopleService;

    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    public function index()
    {
        if (session('people.id')) {
            return redirect()->route('class.list');
        }

        return view('signIn.index');
    }

    public function validation(SignInRequest $request)
    {
        $people = $this->peopleService->get($request);

        return $this->checkValidation($people);
    }

    private function checkValidation($people)
    {
        if (!empty($people)) {
            session()->put('people', $people);
            
            return redirect()->route('class.list')->with('success', 'Bem-vindo');
        } else { 
            return redirect()->route('signIn')->with('error', 'Usuário ou senha incorreto');
        }
    }
}
