<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group; 

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start_from' => 'required|date',
            'is_active' => 'sometimes|boolean', 
        ]);
    
        $validatedData['is_active'] = $request->has('is_active') ? 1 : 0; 
    
        Group::create($validatedData);
    
        return redirect()->route('groups.index')->with('success', 'Группа успешно создана!'); 
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start_from' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        $group = Group::findOrFail($id);
        $group->update($validatedData);

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $group = Group::findOrFail($id);
    $group->delete();

    return redirect()->route('groups.index')->with('success', 'Группа удалена успешно!');
}
}
