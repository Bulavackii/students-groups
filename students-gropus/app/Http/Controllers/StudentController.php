<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Student; 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Group $group)
    {
        $students = $group->students; 
        return view('students.index', compact('group', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group)
    {
        return view('students.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255', 
        ]);

        $student = new Student($validatedData);
        $student->group_id = $group->id; 
        $student->save(); 

        return redirect()->route('groups.students.index', $group)->with('success', 'Студент успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show($groupId, $studentId)
{
    $group = Group::findOrFail($groupId);
    $student = Student::findOrFail($studentId);

    return view('students.show', compact('group', 'student'));
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($groupId, $studentId)
{
    $group = Group::findOrFail($groupId);
    $student = Student::findOrFail($studentId);
    
    return view('students.edit', compact('group', 'student'));
}





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $groupId, $studentId)
{
    // Валидация входящих данных
    $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
    ]);

    $student = Student::findOrFail($studentId);

    $student->name = $request->input('name');
    $student->surname = $request->input('surname');
    $student->save();

    return redirect()->route('groups.students.show', [$groupId, $studentId])
                     ->with('success', 'Студент успешно обновлен!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group, Student $student)
{
    $student->delete();
    return redirect()->route('groups.students.index', $group)->with('success', 'Студент успешно удален!');
}

    
}
