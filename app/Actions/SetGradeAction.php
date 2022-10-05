<?php

namespace App\Actions;

use App\Jobs\ProcessGradeAcademic;

/*
|--------------------------------------------------------------------------
| Set Students Detail v1.2.0
|--------------------------------------------------------------------------
|
| Set students academic subject grade based on total mark, stored in
| grades table and update is graded status to 1 in marks_academics table.
| Author:mdherwan@gmail.com Date: 05 Oct 2022.
|
*/

class SetGradeAction
{
    public function handle(object $students): bool
    {
        foreach ($students as $student) {
            ProcessGradeAcademic::dispatch($student);
        }

        return true;
    }
}
