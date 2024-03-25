<?php

namespace App\Http\Controllers\Api;
use App\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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


    public function store(Request $request)
    {
        $validattor = Validator::make($request->all(), [
            'name' => 'required|string|max:91',
            'course' => 'required|string|max:91',
            'email' => 'required|email|max:91',
            'phone' => 'required|digits:10',
        ]);

        if($validattor->fails()) {

            return response()->json([
                'status' => 422,
                'errors' => $validattor->messages()
            ], 422);
        }else {

            $student = Student::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            if($student) {

                return response()->json([
                    'status' => 200,
                    'message' => "Student Created Successfully"
                ], 200);
            }else {

                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ], 500);
            }
        }
    }

    public function show()
    {
        
    }
}
