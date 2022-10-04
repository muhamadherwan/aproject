<?php

namespace App\Services;

use App\Jobs\ProcessMarksAcademic;
use Exception;

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
    public function handle(object $students): bool
    {
        foreach ($students as $student) {
            ProcessMarksAcademic::dispatch($student);
        }

        return true;
    }

}
