<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\ConfigState;
use App\Models\ConfigYear;
use App\Models\ConfigSession;
use App\Models\ConfigSemester;
use App\Models\ConfigCollegesType;
use App\Models\College;
use Yajra\DataTables\DataTables;

class AcademicContinuousAssessmentController extends Controller
{
    public function index()
    {
        $default_colleges_type = '1'; //KPM

        $states = ConfigState::all();
        $colleges_types = ConfigCollegesType::all();
        $colleges = College::all()->where('config_colleges_types_fk', '=', $default_colleges_type)->sortByDesc('name');
        $years = ConfigYear::all()->sortByDesc('parameter');
        $sessions = ConfigSession::all();
        $semesters = ConfigSemester::all();
        return view('modules.marks-academic.assessment-b.index', compact('states', 'colleges_types', 'colleges', 'years', 'sessions', 'semesters'));
    }

    public function getAjax(Request $request)
    {
        if ($request->ajax()) {

            $selectedState = $request->state;

            $query = College::select('name');

            if ($selectedState != 'all') {
                $query = $query->where('config_states_fk', '=', $selectedState);
            }

            $data = !empty($query) ? $query->get() : [];

            return DataTables::of($data)->addIndexColumn()->toJson();
        }
    }
}
