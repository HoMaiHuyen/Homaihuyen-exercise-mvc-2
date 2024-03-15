<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getStudents()
    {
        $student = new Student();
        $students = $student->getStudents();

        return ([
            'data' => $students
        ]);
    }

    public function showStudents()
    {
        $student = new Student();
        $students = $student->getStudents();
        return view('students', ['students' => $students]);
    }

    public function getStudentById($id)
    {
        $student = new Student();
        $students = $student->getStudents();

        foreach ($students as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }

        return ('Student not found');
    }
}

