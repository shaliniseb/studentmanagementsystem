<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class Student extends Controller
{
    /**
     * @desc display Add student form
     */
    public function addStudent()
    {
        $data = Teachers::all();
        return view('addstudent', ['teachers' => $data]);
    }
    /**
     * @desc Add student to the table
     */
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'teacher' => 'required'
        ], [
            'name.required' => 'Name is required',
            'age.required' => 'Age is required',
            'gender.required' => 'Please select a gender',
            'teacher.required' => 'Please select a teacher',
        ]);
        $student = new Students();
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->age = $request->input('age');
        $student->teacher_id = $request->input('teacher');
        $student->save();
        return back()->with('success', 'Student added successfully.');
    }

    public function listStudent()
    {
        $data = Students::join('teachers', 'students.teacher_id', '=', 'teachers.id')
            ->get(['teachers.name as teacher', 'students.*']);
        return view('liststudent', ['students' => $data]);
    }

    /**
     * @desc load student data in the edit form
     */
    public function editStudent($studentId)
    {
        $teachers = Teachers::all();
        $studentData = Students::join('teachers', 'students.teacher_id', '=', 'teachers.id')
            ->where('students.id', '=', $studentId)
            ->get(['teachers.name as teacher', 'students.*']);
        return view('editstudent', ['studentdata' => $studentData, 'teachers' => $teachers]);
    }

    /**
     * @desc Edit student data in the table
     */
    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'teacher' => 'required'
        ], [
            'name.required' => 'Name is required',
            'age.required' => 'Age is required',
            'gender.required' => 'Please select a gender',
            'teacher.required' => 'Please select a teacher',
        ]);
        $student = Students::find($request->input('studentId'));
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->age = $request->input('age');
        $student->teacher_id = $request->input('teacher');
        $student->update();
        return back()->with('success', 'Student edited successfully.');
    }
    /**
     * @desc Delete student from table
     */
    public function delete(Request $request)
    {
        $res = Students::where('id', $request['studentId'])->delete();
        return response()->json(['success' => 'Successfully deleted student']);
    }
}
