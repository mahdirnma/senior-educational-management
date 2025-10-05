<?php

namespace App\Http\Controllers;

use App\Models\Collegian;
use App\Http\Requests\StoreCollegianRequest;
use App\Http\Requests\UpdateCollegianRequest;
use App\Models\User;

class CollegianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collegians = Collegian::where('is_active',1)->paginate(2);
        return view('admin.collegians.index', compact('collegians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.collegians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollegianRequest $request)
    {
        $collegian=Collegian::create($request->only('name','phoneNumber','gender','age','email'));
        $user=User::create([
            ...$request->only('name','email','password'),
            'role'=>'collegian'
        ]);
        if ($collegian && $user) {
            return redirect()->route('collegians.index');
        }
        return redirect()->route('collegians.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collegian $collegian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collegian $collegian)
    {
        return view('admin.collegians.edit', compact('collegian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollegianRequest $request, Collegian $collegian)
    {
        $status= $collegian->update($request->only('name','phoneNumber','gender','age'));
        $user=User::where('email',$collegian->email)->first();
        $status= $user->update([
            'name'=>$request->name
        ]);
        if ($status){
            return redirect()->route('collegians.index');
        }
        return redirect()->route('collegians.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collegian $collegian)
    {
        $user=User::where('email',$collegian->email)->first();
        $user->update(['is_active'=>0]);
        $collegian->update(['is_active'=>0]);
        return redirect()->route('collegians.index');
    }
}
