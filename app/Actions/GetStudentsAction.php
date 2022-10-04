<?php

namespace App\Actions;

use App\Models\College;
use App\Models\StudentsDetail;
use Exception;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Get Students Detail v1.2.0
|--------------------------------------------------------------------------
|
| Get students detail id, semester and year
| from db based on form request.
| Author:mdherwan@gmail.com Date: 05 Oct 2022.
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

        if (request('state') != 'all') {
            // fast hack to get all kpm college in request states. Will fix later to get by jenis request.
            $collection = College::where('config_states_fk', $request->state)
                ->where('config_colleges_types_fk', 1)->get('id');
            $query->whereIn('colleges_fk', $collection);
        }

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
