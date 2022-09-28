<?php

namespace App\Services;

use App\Models\MarksVocational;
use App\Models\Module;
use Exception;

class TotalMarksVocationalService
{
    public function handle(object $students): bool
    {
        foreach ($students as $student) {
            $collection = MarksVocational::where('students_details_fk', $student->id)->get();

            $this->store($collection);
        }

        return true;
    }

    /**
     * @throws Exception
     */
    private function store(object $collection): bool
    {
        foreach ($collection as $collect) {
            $marks = MarksVocational::where('students_details_fk', $collect->students_details_fk)
                ->where('modules_fk', $collect->modules_fk)
                ->get([
                    'mark_b_teori',
                    'mark_b_amali',
                    'mark_a_teori',
                    'mark_a_amali'
                ]);

            if ((-1 == $marks[0]->mark_b_teori) || (-1 == $marks[0]->mark_b_amali) || (-1 == $marks[0]->mark_a_teori) || (-1 == $marks[0]->mark_a_amali)) {
                $this->setTotalMarksNegative($collect);
            }

            if ((-1 != $marks[0]->mark_b_teori) || (-1 != $marks[0]->mark_b_amali) || (-1 != $marks[0]->mark_a_teori) || (-1 != $marks[0]->mark_a_amali)) {
                $markBTeori = $marks[0]->mark_b_teori ?? 0;
                $markBAmali = $marks[0]->mark_b_amali ?? 0;
                $markATeori = $marks[0]->mark_a_teori ?? 0;
                $markAAmali = $marks[0]->mark_b_amali ?? 0;

                $modules = $this->getModules($collect->modules_fk);

                $totalBTeori = ceil(($markBTeori / 100) * $modules[0]->b_teori);
                $totalBAmali = ceil(($markBAmali / 100) * $modules[0]->b_amali);
                $totalATeori = ceil(($markATeori / 100) * $modules[0]->a_teori);
                $totalAAmali = ceil(($markAAmali / 100) * $modules[0]->a_amali);

                $totalMarks = $totalBTeori + $totalBAmali + $totalATeori + $totalAAmali;

                MarksVocational::where('students_details_fk', $collect->students_details_fk)->where(
                    'modules_fk',
                    $collect->modules_fk
                )->update(['total_marks' => $totalMarks]);
            }
        }

        return true;
    }

    /**
     * @throws Exception
     */
    private function setTotalMarksNegative(object $student): void
    {
        $collection = MarksVocational::where('students_details_fk', $student->students_details_fk)
            ->where('modules_fk', $student->modules_fk)
            ->update(['total_marks' => -1]);

        if ($collection != true) {
            throw new Exception('Gred vokasional tidak berjaya dijana. Tiada rekod markah -1');
        }
    }

    /**
     * @throws Exception
     */
    private function getModules(int $modulesId): object
    {
        $collection = Module::where('id', $modulesId)
            ->get([
                'b_teori',
                'b_amali',
                'a_teori',
                'a_amali'
            ]);

        if ($collection->isEmpty()) {
            throw new Exception('Gred vokasional tidak berjaya dijana. Tiada rekod wajaran.');
        }

        return $collection;
    }
}
