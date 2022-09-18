<?php

namespace App\Actions;

use App\Models\StudentsDetail;
use Illuminate\Http\Request;

class GetStudentsAction
{
    /**
     * @throws \Exception
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

        $students = $query->get(['id', 'semester', 'year']);

        if ($students->count() == 0) {
            throw new \Exception('Tiada rekod pelajar ditemui di dalam pangkalan data.');
        }

        return $students;
    }
}
