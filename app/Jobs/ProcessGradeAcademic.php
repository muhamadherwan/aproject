<?php

namespace App\Jobs;

use App\Models\ConfigGradeAcademic;
use App\Models\Grade;
use App\Models\MarksAcademic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/*
|--------------------------------------------------------------------------
| Set Academics Subject Grade Queue Job v1.1.0
|--------------------------------------------------------------------------
|
| Set academic subject grade based on semester
| and dispatch to job queue for stored in db process.
| Author:mdherwan@gmail.com
| Created: 05 Oct 2022.
|
*/

class ProcessGradeAcademic implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public object $student;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subjects = MarksAcademic::where('students_details_fk', $this->student->id)
            ->where('is_graded', '=', 0)
            ->orderBy('subject_academics_fk', 'ASC')
            ->get(['subject_academics_fk', 'total_marks']);

        foreach ($subjects as $subject) {
            $totalMarks = $subject->total_marks ?? 0;

            $grade = ConfigGradeAcademic::where('mark_from', '<=', $totalMarks)
                ->where('mark_to', '>=', $totalMarks)->get('grade');

            $row = match ($subject->subject_academics_fk) {
                1 => 'grade_bm',
                2 => 'grade_bi',
                3 => 'grade_mt',
                4 => 'grade_sn',
                5 => 'grade_sj',
                6 => 'grade_pi',
                7 => 'grade_pm',
            };

            $gradeRow = Grade::where('students_details_fk', $this->student->id)->count();

            if ($gradeRow == 0) {
                Grade::create(['students_details_fk' => $this->student->id]);
            }

            Grade::where('students_details_fk', $this->student->id)->update([$row => $grade[0]->grade]);

            MarksAcademic::where('students_details_fk', $this->student->id)
                ->where('subject_academics_fk', $subject->subject_academics_fk)
                ->update(['is_graded' => 1]);
        }
    }
}
