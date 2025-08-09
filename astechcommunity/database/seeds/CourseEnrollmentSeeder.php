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
        
        if ($users->isEmpty() || $courses->isEmpty()) {
            $this->command->warn('No users or courses found. Skipping enrollments.');
            return;
        }
        
        $statuses = ['enrolled', 'completed', 'cancelled'];
        $currentEnrollmentCount = CourseEnrollment::count();
        $targetEnrollments = 50;
        $enrollmentsToCreate = max(0, $targetEnrollments - $currentEnrollmentCount);
        
        $created = 0;
        $attempts = 0;
        $maxAttempts = $enrollmentsToCreate * 3; // Prevent infinite loop
        
        while ($created < $enrollmentsToCreate && $attempts < $maxAttempts) {
            $attempts++;
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
                    'amount_paid' => $course->final_price ?? $course->price ?? 0,
                    'status' => $status,
                    'enrolled_at' => $enrolledAt,
                    'completed_at' => $status === 'completed' ? $faker->dateTimeBetween($enrolledAt, 'now') : null,
                    'progress_percentage' => $status === 'completed' ? 100 : rand(0, 90),
                    'completed_lessons' => json_encode(array_slice(range(1, 10), 0, rand(1, 8))),
                ]);
                $created++;
            }
        }
        
        $totalEnrollments = CourseEnrollment::count();
        $this->command->info("Total course enrollments: {$totalEnrollments} (created {$created} new)");
    }
}
