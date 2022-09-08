<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\ConfigCollegesType;
use App\Models\ConfigSemester;
use App\Models\ConfigSession;
use App\Models\ConfigState;
use App\Models\ConfigYear;
use App\Models\Course;
use Illuminate\Http\Request;

class GradeVocationalController extends Controller
{
    public function index()
    {
        $states = ConfigState::all();
        $collegeTypes = ConfigCollegesType::all();
        $colleges = College::all()->where('config_colleges_types_fk', '=', '1');
        $years = ConfigYear::all();
        $semesters = ConfigSemester::all();
        $sessions = ConfigSession::all();
        return view('modules.grade.vocationals.index', compact('states', 'collegeTypes', 'colleges', 'years', 'semesters', 'sessions'));
    }


    public function getColleges(Request $request)
    {

        try {
            $selectedState = $request->input('selectedState');
            $selectedType = $request->input('selectedType');

            $data = College::all();

            if ($selectedState != 'all') {
                $data = $data->where('config_states_fk', $selectedState);
            }

            if ($selectedType != 'all') {
                $data = $data->where('config_colleges_types_fk', $selectedType);
            }

            http_response_code(200);
            return response([
                'message' => 'Data successfully retrieved.',
                'data' => $data
            ]);
        } catch (RequestException $r) {

            http_response_code(400);
            return response([
                'message' => 'Failed to retrieve data.',
                'errorCode' => 4103
            ], 400);
        }
    }

//    public function getCourses(Request $request)
//    {
//        try {
//            $selectedCollege = $request->input('selectedCollege');
//            $selectedYear = $request->input('selectedYear');
//
//            $query =
//                Course::join('colleges_courses', 'colleges_courses.courses_fk', '=', 'courses.id')
//                    ->select('courses.id', 'courses.code', 'courses.name');
//
//            if ($selectedCollege != 'all') {
//                $query = $query->where('colleges_courses.colleges_fk', $selectedCollege);
//            }
//
//            if ($selectedYear != '0') {
//                $query = $query->where('courses.year', $selectedYear);
//            }
//
//            $data = !empty($query) ? $query->get() : [];
//
//            http_response_code(200);
//            return response([
//                'message' => 'Data successfully retrieved.',
//                'data' => $data
//            ]);
//        } catch (RequestException $r) {
//
//            http_response_code(400);
//            return response([
//                'message' => 'Failed to retrieve data.',
//                'errorCode' => 4103
//            ], 400);
//        }
//    }
}
