<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ConfigStatesSeeder::class,
            ConfigCollegesTypeSeeder::class,
            ConfigReligionSeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,
            SubjectAcademicSeeder::class,
        ]);
        $this->call(ConfigCollegesTypesTableSeeder::class);
        $this->call(ConfigRacesTableSeeder::class);
        $this->call(CollegesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(ConfigYearsTableSeeder::class);
        $this->call(ConfigSemestersTableSeeder::class);
        $this->call(ConfigGendersTableSeeder::class);
        $this->call(ConfigSessionsTableSeeder::class);
        $this->call(ClustersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(SubjectVocationalsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(CollegesCoursesTableSeeder::class);
        $this->call(ConfigGradeAcademicsTableSeeder::class);
        $this->call(ConfigStatusesTableSeeder::class);
        $this->call(ClassroomsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(StudentsDetailsTableSeeder::class);
        $this->call(MarksAcademicsTableSeeder::class);
    }
}
