<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getColleges(Request $request)
    {

        try {
            $selectedState = $request->selectedState;
            $selectedType = $request->selectedType;

            $query = College::all();

            if ($selectedState != 'all') {
                $query = $query->where('config_states_fk', $selectedState);
            }

            if ($selectedType != 'all') {
                $query = $query->where('config_colleges_types_fk', $selectedType);
            }

            $data = $query;

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

    public function getCourses(Request $request)
    {

        try {

            $selectedState = $request->selectedState;
            $selectedType = $request->selectedType;
            $selectedCollege = $request->selectedCollege;
            $selectedYear = $request->selectedYear;
            $selectedSession = $request->selectedSession;

            $query =
                Course::join('colleges_courses', 'colleges_courses.courses_fk', 'courses.id')
                    ->join('colleges', 'colleges.id', 'colleges_courses.colleges_fk')
                    ->select('courses.id', 'courses.code', 'courses.name')->distinct();

            if ($selectedState != 'all') {
                $query = $query->where('colleges.config_states_fk', $selectedState);
            }

            if ($selectedType != 'all') {
                $query = $query->where('colleges.config_colleges_types_fk', $selectedType);
            }

            if ($selectedCollege != 'all') {
                $query = $query->where('colleges_courses.colleges_fk', $selectedCollege);
            }

            if ($selectedYear != '0') {
                $query = $query->where('courses.year', $selectedYear);
            }

            if ($selectedSession != '0') {
                $query = $query->where('courses.session', $selectedSession);
            }

            $data = !empty($query) ? $query->get() : [];

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
}
