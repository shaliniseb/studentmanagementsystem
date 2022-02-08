<?php

namespace App\Http\Controllers;

use App\Models\Marks as ModelsMarks;
use App\Models\Students;
use Illuminate\Http\Request;

class Marks extends Controller
{
    /**
     * @desc Display from for adding student marks
     */
    public function addStudentMark()
    {
        $data = Students::all();
        return view('addmark', ['students' => $data]);
    }

    /**
     * @desc Add marks to the table
     */
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'student' => 'required',
            'term' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required'
        ], [
            'student.required' => 'Please select a student',
            'term.required' => 'Please select a term',
            'maths.required' => 'Mark is required',
            'science.required' => 'Mark is required',
            'history.required' => 'Mark is required',
        ]);
        $mark = new ModelsMarks();
        $mark->student_id = $request->input('student');
        $mark->term = $request->input('term');
        $mark->maths_mark = $request->input('maths');
        $mark->science_mark = $request->input('science');
        $mark->history_mark = $request->input('history');
        $mark->save();
        return back()->with('success', 'Student marks added successfully.');
    }

    /**
     * @desc List all student and his/her marks
     */
    public function displayMarks()
    {
        $data = ModelsMarks::join('students', 'marks.student_id', '=', 'students.id')
            ->get(['students.name as student', 'marks.*']);
        return view('listmarks', ['marks' => $data]);
    }

    /**
     * @desc Load form for editing student mark
     */
    public function editMarkView($markListId)
    {
        $students = Students::all();
        $studentMarkData = ModelsMarks::join('students', 'marks.student_id', '=', 'students.id')
            ->where('marks.id', '=', $markListId)
            ->get(['students.name as student', 'marks.*']);
        return view('editmark', ['studentMarkData' => $studentMarkData, 'students' => $students]);
    }

    /**
     * @desc Edit student's marks
     */
    public function editMark(Request $request)
    {
        $validatedData = $request->validate([
            'student' => 'required',
            'term' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required'
        ], [
            'student.required' => 'Please select a student',
            'term.required' => 'Please select a term',
            'maths.required' => 'Mark is required',
            'science.required' => 'Mark is required',
            'history.required' => 'Mark is required',
        ]);
        $mark = ModelsMarks::find($request->input('markListId'));
        $mark->student_id = $request->input('student');
        $mark->term = $request->input('term');
        $mark->maths_mark = $request->input('maths');
        $mark->science_mark = $request->input('science');
        $mark->history_mark = $request->input('history');
        $mark->update();
        return back()->with('success', 'Student marks edited successfully.');
    }

    /**
     * @desc Delete marks
     */
    public function deleteMark(Request $request)
    {
        $res = ModelsMarks::where('id', $request['markListId'])->delete();
        return response()->json(['success' => 'Successfully deleted student marks']);
    }
}
