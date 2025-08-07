<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Category;
use App\Instructor;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title' => 'The Complete 2025 Web Development Bootcamp',
                'description' => 'Become a full-stack web developer with just one course. Learn HTML, CSS, Javascript, Node, React, MongoDB and more!',
                'short_description' => 'The most comprehensive web development course. Build 16 projects.',
                'instructor_id' => 1, 
                'category_id' => 1,
                'price' => 199.99,
                'discount_price' => 24.99,
                'image' => 'courses/web_dev_bootcamp.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=zb3Qk8p_L-s',
                'level' => 'Beginner',
                'duration_hours' => 62,
                'duration_minutes' => 30,
                'total_lessons' => 521,
                'rating' => 4.7,
                'total_reviews' => 180000,
                'total_students' => 750000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Build 16 web development projects for your portfolio, ready to apply for junior developer jobs.',
                    'Learn the latest technologies, including Javascript, React, Node and even Web3 development.',
                    'After the course you will be able to build ANY website you want.',
                    'Build a fully-fledged website and web app for your startup or business.',
                ]),
                'requirements' => json_encode([
                    'No programming experience needed - I\'ll teach you everything you need to know',
                    'A Mac or PC computer with access to the internet',
                    'No paid software required - all websites will be created with free tools',
                ]),
            ],
            [
                'title' => 'The Complete Digital Marketing Course - 12 Courses in 1',
                'description' => 'Master Digital Marketing: SEO, Social Media, Email Marketing, Analytics & More! Attract Customers, Grow Your Business.',
                'short_description' => 'Grow your business with the latest digital marketing strategies.',
                'instructor_id' => 2, 
                'category_id' => 2, 
                'price' => 199.99,
                'discount_price' => 29.99,
                'image' => 'courses/digital_marketing.jpg',
                'level' => 'Beginner',
                'duration_hours' => 23,
                'duration_minutes' => 30,
                'total_lessons' => 237,
                'rating' => 4.6,
                'total_reviews' => 98000,
                'total_students' => 450000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Grow a Business Online From Scratch',
                    'Make Money as a Digital Marketing Freelancer',
                    'Get Hired as a Digital Marketing Expert',
                ]),
                'requirements' => json_encode([
                    'No experience required',
                    'Suitable for all types of businesses (digital, physical, B2B, B2C).',
                ]),
            ],
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate(
                ['title' => $course['title']], // Find by title
                $course
            );
        }
    }
}

