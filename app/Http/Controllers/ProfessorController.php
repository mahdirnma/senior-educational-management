<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Models\User;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professors = Professor::where('is_active', 1)->paginate(2);
        return view('admin.professors.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.professors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessorRequest $request)
    {
        $professor = Professor::create($request->only('name', 'phoneNumber', 'gender','age'));
        $professor2= User::create([
            ...$request->only('email', 'password','name'),
            'role' => 'professor',
        ]);
        if($professor && $professor2){
            return redirect()->route('professors.index');
        }
        return redirect()->route('professors.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
        return view('admin.professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        $status= $professor->update($request->only('name', 'phoneNumber', 'gender','age'));
        if($status){
            return redirect()->route('professors.index');
        }
        return redirect()->route('professors.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        //
    }
}
