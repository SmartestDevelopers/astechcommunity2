<?php

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
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            InstructorSeeder::class,
            CourseSeeder::class,
            LessonSeeder::class,
            CourseEnrollmentSeeder::class,
            CourseReviewSeeder::class,
            ServiceSeeder::class,
            FreelancerSeeder::class,
        ]);
    }
}
