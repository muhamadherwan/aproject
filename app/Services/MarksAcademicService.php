<?php

namespace App\Services;

use App\Jobs\ProcessMarksAcademic;
use Exception;
use Illuminate\Support\Facades\Bus;

/*
|--------------------------------------------------------------------------
| Set Academics Subject Total Mark v2.3.0
|--------------------------------------------------------------------------
|
| Set students academic subject total mark based on semester
| and dispatch to job queue for stored in db.
| Author:mdherwan@gmail.com
| Created: 05 Oct 2022.
|
*/

class MarksAcademicService
{
    /**
     * @throws Exception
     */
    public function handle(object $students)
    {
        $batch = Bus::batch([])->dispatch();

        foreach ($students as $student) {
            $batch->add(new ProcessMarksAcademic($student));
//            ProcessMarksAcademic::dispatch($student);
        }

//        return true;
//        return redirect()
//        return redirect()->route('grade.academics.create');

//        return $batch;
    }

}
