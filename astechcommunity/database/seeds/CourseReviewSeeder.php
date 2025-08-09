<?php

use Illuminate\Database\Seeder;
use App\CourseReview;
use App\Course;
use App\User;
use Faker\Factory as Faker;

class CourseReviewSeeder extends Seeder
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
        
        $reviewTexts = [
            'Excellent course! The instructor explains concepts very clearly and the content is well-structured.',
            'Great learning experience. The practical examples really helped me understand the material.',
            'Outstanding course material. I was able to apply what I learned immediately in my work.',
            'The instructor is very knowledgeable and the course pace is perfect for beginners.',
            'Highly recommend this course. The assignments were challenging but rewarding.',
            'Well-organized content with good video quality. The quizzes helped reinforce learning.',
            'Amazing course! The real-world projects gave me confidence to use these skills professionally.',
            'The course exceeded my expectations. Great value for money and excellent support.',
            'Perfect balance between theory and practice. The instructor makes complex topics easy to understand.',
            'Comprehensive course with detailed explanations. The community forum was very helpful.',
            'Great course for intermediate learners. The advanced topics were explained very well.',
            'The course content is up-to-date and relevant to current industry standards.',
            'Excellent teaching methodology. The step-by-step approach made learning enjoyable.',
            'Very informative course with practical insights. The downloadable resources are valuable.',
            'The instructor responds quickly to questions and provides helpful feedback.',
            'Good course structure with clear learning objectives. The final project was excellent.',
            'I learned more in this course than in my college classes. Highly recommended!',
            'The course is well-paced and includes everything needed to master the subject.',
            'Great instructor with real industry experience. The examples are very relevant.',
            'Excellent course quality with professional video production and clear audio.'
        ];
        
        for ($i = 0; $i < 50; $i++) {
            $user = $users->random();
            $course = $courses->random();
            
            // Check if review already exists
            $exists = CourseReview::where('user_id', $user->id)
                                ->where('course_id', $course->id)
                                ->exists();
            
            if (!$exists) {
                CourseReview::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'rating' => rand(3, 5), // Mostly positive reviews
                    'review' => $reviewTexts[array_rand($reviewTexts)],
                    'is_approved' => true,
                ]);
            }
        }
    }
}
