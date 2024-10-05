<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{

    public function index() {
        // $students = DB::table('students')
        //     ->join('student_locations', 'student_locations.student_id', 'students.id')
        //     ->orderBy('fname')
        //     ->get();
        $students = Student::get();
        // $courses = [];
        // foreach ($students as $student) {
        //     $student_id = $student->id;
        //     $student_courses = StudentCourse::where('student_id', $student_id)->get();
        //     $courses[$student->id] = [];
        //     foreach ($student_courses as $pivot) {
        //         $course = Course::find($pivot->course_id);
        //         $courses[$pivot->student_id][] = $course;
        //     }
        // }
        // return response()->json(compact('students', 'courses'));
        return response()->json(compact('students'));
    }

    public function show($id) {
        try {
            $student = Student::findOrFail($id);
            return response()->json($student);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                    'message' => 'Invalid Student ID'
                ], 404);
        }
    }

    public function destroy($id) {
        try {
            $student = Student::findOrFail($id);
            return response()->json([
                    'message' => 'deleted!'
                ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Student not found!'
            ], Response::HTTP_NOT_FOUND);
        }
    }

}
