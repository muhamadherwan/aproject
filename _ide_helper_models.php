<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Classroom
 *
 * @property int $id
 * @property int $courses_fk
 * @property int|null $year
 * @property int|null $semester
 * @property int|null $session
 * @property string|null $code
 * @property string $name
 * @property int $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom query()
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereCoursesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereYear($value)
 */
	class Classroom extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cluster
 *
 * @property int $id
 * @property int|null $year
 * @property int|null $semester
 * @property int|null $session
 * @property string|null $code
 * @property string $name
 * @property int $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereYear($value)
 */
	class Cluster extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\College
 *
 * @property int $id
 * @property int $config_colleges_types_fk
 * @property string $code
 * @property string $name
 * @property string|null $telephone
 * @property string|null $fax
 * @property string|null $email
 * @property string|null $address
 * @property string|null $postcode
 * @property string|null $area
 * @property string|null $city
 * @property int $config_states_fk
 * @property string|null $director_name
 * @property string|null $director_email
 * @property string|null $director_telephone
 * @property string|null $director_mobilephone
 * @property string|null $kjpp_name
 * @property string|null $kjpp_email
 * @property string|null $kjpp_telephone
 * @property string|null $kjpp_mobilephone
 * @property string|null $sup_name
 * @property string|null $sup_email
 * @property string|null $sup_telephone
 * @property string|null $sup_mobilephone
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|College newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|College newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|College query()
 * @method static \Illuminate\Database\Eloquent\Builder|College whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereConfigCollegesTypesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereConfigStatesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereDirectorEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereDirectorMobilephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereDirectorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereDirectorTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereKjppEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereKjppMobilephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereKjppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereKjppTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereSupEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereSupMobilephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereSupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereSupTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|College whereUpdatedAt($value)
 */
	class College extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CollegesCourse
 *
 * @property int $id
 * @property int $colleges_fk
 * @property int $courses_fk
 * @property int $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse whereCollegesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse whereCoursesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollegesCourse whereUpdatedAt($value)
 */
	class CollegesCourse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigCollegesType
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigCollegesType whereUpdatedAt($value)
 */
	class ConfigCollegesType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigGender
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGender whereUpdatedAt($value)
 */
	class ConfigGender extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigGradeAcademic
 *
 * @property int $id
 * @property int $mark_from
 * @property int $mark_to
 * @property string $grade
 * @property float $pointer
 * @property string $status
 * @property string $competency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereCompetency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereMarkFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereMarkTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic wherePointer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGradeAcademic whereUpdatedAt($value)
 */
	class ConfigGradeAcademic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigRace
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigRace whereUpdatedAt($value)
 */
	class ConfigRace extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigReligion
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigReligion whereUpdatedAt($value)
 */
	class ConfigReligion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigScoreVocational
 *
 * @property int $id
 * @property int $year
 * @property int $semester
 * @property int $session
 * @property string $score_pba
 * @property string $score_pbt
 * @property string $score_paa
 * @property string $score_pat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereScorePaa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereScorePat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereScorePba($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereScorePbt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigScoreVocational whereYear($value)
 */
	class ConfigScoreVocational extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigSemester
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSemester whereUpdatedAt($value)
 */
	class ConfigSemester extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigSession
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigSession whereUpdatedAt($value)
 */
	class ConfigSession extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigState
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigState whereUpdatedAt($value)
 */
	class ConfigState extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigStatus
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigStatus whereUpdatedAt($value)
 */
	class ConfigStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfigYear
 *
 * @property int $id
 * @property string $parameter
 * @property string|null $description
 * @property int|null $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigYear whereUpdatedAt($value)
 */
	class ConfigYear extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $clusters_fk
 * @property int|null $year
 * @property int|null $semester
 * @property int|null $session
 * @property string|null $code
 * @property string $name
 * @property int $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereClustersFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereYear($value)
 */
	class Course extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grade
 *
 * @property int $id
 * @property int $students_details_fk
 * @property string|null $grade_bm
 * @property string|null $grade_bi
 * @property string|null $grade_sj
 * @property string|null $grade_sc
 * @property string|null $grade_mt
 * @property string|null $grade_pi
 * @property string|null $grade_pm
 * @property int|null $academic_bm_credit_hour
 * @property string|null $academic_bm_pointer
 * @property int|null $academic_credit_hour
 * @property string|null $academic_pointer
 * @property int|null $academic_credit_hour_cum
 * @property string|null $academic_pointer_cum
 * @property int|null $vocational_credit_hour
 * @property string|null $vocational_pointer
 * @property int|null $vocational_credit_hour_cum
 * @property string|null $vocational_pointer_cum
 * @property string|null $png_bm
 * @property string|null $pngk_bm
 * @property string|null $png_a
 * @property string|null $pngk_a
 * @property string|null $png_v
 * @property string|null $pngk_v
 * @property string|null $pngk
 * @property string|null $pngkk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicBmCreditHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicBmPointer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicCreditHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicCreditHourCum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicPointer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicPointerCum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradeBi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradeBm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradeMt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradePi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradePm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradeSc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradeSj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngBm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngkA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngkBm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngkV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade wherePngkk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereStudentsDetailsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereVocationalCreditHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereVocationalCreditHourCum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereVocationalPointer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereVocationalPointerCum($value)
 */
	class Grade extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MarksAcademic
 *
 * @property int $id
 * @property int $students_details_fk
 * @property int $subject_academics_fk
 * @property float|null $mark_b1
 * @property float|null $mark_b2
 * @property float|null $mark_b3
 * @property float|null $mark_b4
 * @property float|null $mark_a1
 * @property float|null $mark_a2
 * @property float|null $mark_a3
 * @property float|null $mark_a4
 * @property int|null $total_marks
 * @property int $is_graded
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic query()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereIsGraded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkA1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkA2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkA3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkA4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkB1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkB2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkB3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereMarkB4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereStudentsDetailsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereSubjectAcademicsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereTotalMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksAcademic whereUpdatedAt($value)
 */
	class MarksAcademic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ModelHasRoles
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles whereRoleId($value)
 */
	class ModelHasRoles extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Module
 *
 * @property int $id
 * @property int $subject_vocationals_fk
 * @property int|null $year
 * @property int|null $semester
 * @property int|null $session
 * @property string|null $code
 * @property string $name
 * @property int|null $credit_hour
 * @property int|null $b_amali
 * @property int|null $b_teori
 * @property int|null $a_amali
 * @property int|null $a_teori
 * @property int $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereAAmali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereATeori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereBAmali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereBTeori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreditHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereSubjectVocationalsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereYear($value)
 */
	class Module extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Student
 *
 * @property int $id
 * @property string $name
 * @property string $mykad
 * @property string $student_number
 * @property string|null $phonenumber
 * @property string|null $email
 * @property int|null $config_genders_fk
 * @property int|null $config_races_fk
 * @property int|null $config_religions_fk
 * @property string|null $address
 * @property string|null $postcode
 * @property string|null $area
 * @property string|null $city
 * @property int|null $config_states_fk
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereConfigGendersFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereConfigRacesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereConfigReligionsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereConfigStatesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMykad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePhonenumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStudentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 */
	class Student extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StudentsDetail
 *
 * @property int $id
 * @property int $students_fk
 * @property int $colleges_fk
 * @property int|null $courses_fk
 * @property int|null $classrooms_fk
 * @property int $year
 * @property int|null $year_current
 * @property int $semester
 * @property int|null $session
 * @property int $config_statuses_fk
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereClassroomsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereCollegesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereConfigStatusesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereCoursesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereStudentsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentsDetail whereYearCurrent($value)
 */
	class StudentsDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubjectAcademic
 *
 * @property int $id
 * @property string $name
 * @property string $name_short
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic whereNameShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademic whereUpdatedAt($value)
 */
	class SubjectAcademic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubjectAcademicsDetail
 *
 * @property int $id
 * @property int $subject_academics_fk
 * @property string|null $code
 * @property int $year
 * @property int|null $year_exam
 * @property int $semester
 * @property int $credit_hour
 * @property int|null $continuous
 * @property int|null $final1
 * @property int|null $final2
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereContinuous($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereCreditHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereFinal1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereFinal2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereSubjectAcademicsFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectAcademicsDetail whereYearExam($value)
 */
	class SubjectAcademicsDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubjectVocational
 *
 * @property int $id
 * @property int $courses_fk
 * @property int|null $year
 * @property int|null $semester
 * @property int|null $session
 * @property string|null $code
 * @property string $name
 * @property int $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_id
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereCoursesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectVocational whereYear($value)
 */
	class SubjectVocational extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $mykad
 * @property string $dob
 * @property string|null $phonenumber
 * @property string|null $title
 * @property string|null $department
 * @property string|null $position
 * @property string|null $grade
 * @property string $address
 * @property string $postcode
 * @property string $area
 * @property string $city
 * @property int $config_states_fk
 * @property string $avatar
 * @property int $status
 * @property string|null $remember_token
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfigStatesFk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMykad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhonenumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

