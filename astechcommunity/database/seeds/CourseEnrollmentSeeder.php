<?php

use Illuminate\Database\Seeder;
use App\CourseEnrollment;
use App\Course;
use App\User;
use Faker\Factory as Faker;

class CourseEnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        $courses = Course::all();
        
        $statuses = ['enrolled', 'completed', 'cancelled'];
        
        for ($i = 0; $i < 50; $i++) {
            $user = $users->random();
            $course = $courses->random();
            
            // Check if enrollment already exists
            $exists = CourseEnrollment::where('user_id', $user->id)
                                    ->where('course_id', $course->id)
                                    ->exists();
            
            if (!$exists) {
                $status = $statuses[array_rand($statuses)];
                $enrolledAt = $faker->dateTimeBetween('-6 months', 'now');
                
                CourseEnrollment::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'amount_paid' => $course->final_price,
                    'status' => $status,
                    'enrolled_at' => $enrolledAt,
                    'completed_at' => $status === 'completed' ? $faker->dateTimeBetween($enrolledAt, 'now') : null,
                    'progress_percentage' => $status === 'completed' ? 100 : rand(0, 90),
                    'completed_lessons' => json_encode(array_slice(range(1, 10), 0, rand(1, 8))),
                ]);
            }
        }
    }
}
