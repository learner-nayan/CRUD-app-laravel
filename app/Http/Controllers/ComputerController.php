<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

use App\Http\Requests\ComputerRequest;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $computers = Computer::get();
            return view('computers.index', compact('computers'));
        } catch (\Exception $e) {
            return view('computers.index')->with('message', 'Failed to find the data! '.$e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComputerRequest $request)
    {
        try {
            Computer::create($request->validated());
            return redirect()->route('computers.index')->with('message', 'Data stored successfully!');
        } catch (\Exception $e) {
            return redirect()->route('computers.index')->with('message', 'Failed storing data! '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(Computer $computer)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer)
    {
        return view('computers.edit', compact('computer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComputerRequest $request, Computer $computer)
    {
        try {
            $computer->update($request->validated());
            return redirect()->route('computers.index')->with('message', 'Data updated successfully!');    
        } catch (\Exception $e) {
            return redirect()->route('computers.index')->with('message', 'Failed updating data! '.$e->getMessage());    
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer)
    {
        try {
            $computer->delete();
            return redirect()->route('computers.index')->with('message', 'Data deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('computers.index')->with('message', 'Failed deleting data! '.$e->getMessage());
        }
    }
}
