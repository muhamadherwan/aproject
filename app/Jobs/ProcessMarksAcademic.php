<?php

namespace App\Jobs;

use App\Models\MarksAcademic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessMarksAcademic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $students;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($students)
    {
        $this->students = $students;
//        dd($this->students);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->students as $student) {

            $bm = 1;
            $student->subject = $bm;
            $totalMarks = 900;

            MarksAcademic::where('students_details_fk', $student->id)
                ->where('subject_academics_fk', $student->subject)
                ->update(['total_marks' => $totalMarks]);

        }
    }
}
