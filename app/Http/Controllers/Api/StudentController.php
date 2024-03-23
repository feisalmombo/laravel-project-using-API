<?php

namespace App\Http\Controllers\Api;
use App\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if($students->count() > 0){

            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }
}
