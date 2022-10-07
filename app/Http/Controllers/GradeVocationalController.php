<?php

namespace App\Http\Controllers;

use App\Actions\GetStudentsAction;
use App\Jobs\ProcessGradeVocational;
use App\Jobs\ProcessMarksVocational;
use App\Models\College;
use App\Models\ConfigCollegesType;
use App\Models\ConfigSemester;
use App\Models\ConfigSession;
use App\Models\ConfigState;
use App\Models\ConfigYear;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

/*
|--------------------------------------------------------------------------
| Set Vocational Grade Controller v1.1.0
|--------------------------------------------------------------------------
|
| Create students vocational subject total mark and grade
| based on request values from submit form.
| Author:mdherwan@gmail.com Date: 07 Oct 2022.
|
*/

class GradeVocationalController extends Controller
{
    public function create(Request $request)
    {
        $batch = null;

        if ($request->batch_id) {
            $batch = Bus::findBatch($request->batch_id);
        }

        $batch2 = null;
        if ($request->batch2_id) {
            $batch2 = Bus::findBatch($request->batch2_id);
        }

        return view('modules.grade.vocationals.create', [
            'states' => ConfigState::get(["parameter", "id"]),
            'collegeTypes' => ConfigCollegesType::get(["parameter", "id"]),
            'colleges' => College::get(["id", "code", "name"]),
            'years' => ConfigYear::get("parameter"),
            'semesters' => ConfigSemester::get(["id", "parameter"]),
            'sessions' => ConfigSession::get(["id", "parameter"]),
            'courses' => Course::get(["id", "code", "name"]),
            'batch' => $batch,
            'batch2' => $batch2
        ]);
    }

    public function store(
        Request $request,
        GetStudentsAction $studentsAction
    ) {
        try {
            $students = $studentsAction->handle($request);

            $batch = Bus::batch([])->name('Jana Markah')->dispatch();
            foreach ($students as $student) {
                $batch->add(new ProcessMarksVocational($student));
            }

            $batch2 = Bus::batch([])->name('Jana Gred')->dispatch();
            foreach ($students as $student) {
                $batch2->add(new ProcessGradeVocational($student));
            }
        } catch
        (Exception $e) {
            return back()->withError($e->getMessage());
        }

        return redirect('grade/academics?batch_id=' . $batch->id . '&batch2_id=' . $batch2->id);
    }

    // old is gold
//    public function create()
//    {
//        return view('modules.grade.vocationals.create', [
//            'states' => ConfigState::get(["parameter", "id"]),
//            'collegeTypes' => ConfigCollegesType::get(["parameter", "id"]),
//            'colleges' => College::get(["id", "code", "name"]),
//            'years' => ConfigYear::get("parameter"),
//            'semesters' => ConfigSemester::get(["id", "parameter"]),
//            'sessions' => ConfigSession::get(["id", "parameter"]),
//            'courses' => Course::get(["id", "code", "name"])
//        ]);
//    }

//    public function store(
//        Request $request,
//        GetStudentsAction $studentsAction,
//        MarksVocationalService $marksVocationalService,
//        GradeVocationalAction $gradeVocationalAction
//    ) {
//        try {
//            $students = $studentsAction->handle($request);
//            $marksVocationalService->handle($students);
//            $gradeVocationalAction->handle($students);
//        } catch
//        (Exception $e) {
//            return back()->withError($e->getMessage());
//        }
//
//        return back()->with('success', 'Gred Vokasional berjaya dijana.');
//    }
}
