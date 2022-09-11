<?php

namespace App\Http\Controllers;

use App\Models\StudentsDetail;
use Illuminate\Http\Request;

class GradeAcademicController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('modules.grade.academics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // get students based on request
        $colleges_fk = 75;
        $year = 2022;
        $semester = 1;
        $session = 1;
        $courses_fk = 718;

        $data = StudentsDetail::where('colleges_fk', $colleges_fk)
          ->where('year', $year)
          ->where('semester', $semester)
          ->where('session', $session)
          ->where('courses_fk', $courses_fk)
          ->get('students_fk');

//        if ( !empty($student = $this->getStudent($request) ) )
//        {
//            // set student grade for each subject
//            // save student grade id db
//            return redirect()->route( 'grade.academics.create')
//                ->with('success', 'Gred akademik telah berjaya dijana.');
//        }
//
        dd($data);
//        return redirect()->route( 'grade.academics.create')
//            ->with('error', 'Gred akademik gagal dijana.');

    }
}
