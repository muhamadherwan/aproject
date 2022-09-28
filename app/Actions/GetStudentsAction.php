<?php

namespace App\Actions;

use App\Models\StudentsDetail;
use Exception;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Get Students Detail v1.1.0
|--------------------------------------------------------------------------
|
| Get students detail id, semester and year
| from db based on form request.
| Author:mdherwan@gmail.com Date: 13 Sept 2022.
|
*/

class GetStudentsAction
{
    /**
     * @throws Exception
     */
    public function handle(Request $request): object
    {
        $query = StudentsDetail::query();

        $query->where('year', $request->year)
            ->where('semester', $request->semester)
            ->where('session', $request->session);

        if (request('college') != 'all') {
            $query->where('colleges_fk', $request->college);
        }

        if (request('course') != 'all') {
            $query->where('courses_fk', $request->course);
        }

        $collection = $query->get(['id', 'students_fk', 'semester', 'year']);

        if ($collection->isEmpty()) {
            throw new Exception('Tiada rekod pelajar ditemui di dalam pangkalan data.');
        }

        return $collection;
    }
}
