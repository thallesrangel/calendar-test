<?php

namespace App\Repositories;

use App\Models\Classes;
use App\Repositories\Contracts\ClassesRepositoryInterface;

class ClassesRepositoryEloquent implements ClassesRepositoryInterface
{
    protected $classes;

    public function __construct(Classes $classes)
    {
        $this->classes = $classes;
    }

    public function get()
    {
        return $this->classes->where('flag_status', 'enabled')
                            ->get();
    }

    public function getToday()
    {
        return $this->classes->whereDate('date_time_start', \Carbon\Carbon::today())
                            ->where('flag_status', 'enabled')
                            ->with('checker')
                            ->get()
                            ->toArray();
    }

    public function getWeek()
    {
        return $this->classes->whereBetween('date_time_start', [
                                \Carbon\Carbon::now()->startOfMonth(),
                                \Carbon\Carbon::now()->endOfMonth(),
                            ])
                            ->where('flag_status', 'enabled')
                            ->with('checker')
                            ->get()
                            ->toArray();
    }

    public function getByDateTime($request)
    {
        return $this->classes->whereBetween('date_time_start', [ $request->date_time_start, $request->date_time_end ])
                            ->whereBetween('date_time_end', [ $request->date_time_start, $request->date_time_end ])
                            ->where('flag_status', 'enabled')
                            ->get()
                            ->toArray();
    }

    public function show($id)
    {
        return $this->classes->whereId($id)
                            ->where('flag_status', 'enabled')
                            ->with('checker')
                            ->get()
                            ->toArray();
    }

    public function store($request)
    {
        $classes = new $this->classes;
        
        $classes->people_id = session('people.id');
        $classes->date_time_start = $request->date_time_start;
        $classes->date_time_end = $request->date_time_end;
        $classes->name_class = $request->name_class;
        $classes->name_teacher = $request->name_teacher;
        $classes->limit_student = $request->limit_student;
        
        $classes->save();

        return $classes->fresh();
    }
    
    public function disable($id)
    {
        $classes = $this->classes->find($id);

        $classes->update([ 'flag_status' => 'disabled' ]);
        
        return $classes;
    }
}
