<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Instructor;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instructors = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@astechcommunity.com',
                'phone' => '+1-555-123-4567',
                'bio' => 'Senior Web Developer with 10+ years of experience in React, Node.js, and full-stack development.',
                'image' => 'instructors/john_doe.jpg',
                'specialization' => 'Web Development',
                'rating' => 4.8,
                'total_students' => 15000,
                'total_courses' => 12,
                'facebook' => 'https://facebook.com/johndoe',
                'twitter' => 'https://twitter.com/johndoe',
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@astechcommunity.com',
                'phone' => '+1-555-234-5678',
                'bio' => 'Digital Marketing Expert specializing in SEO, SEM, and social media marketing with 8 years of experience.',
                'image' => 'instructors/sarah_johnson.jpg',
                'specialization' => 'Digital Marketing',
                'rating' => 4.9,
                'total_students' => 12000,
                'total_courses' => 8,
                'facebook' => 'https://facebook.com/sarahjohnson',
                'twitter' => 'https://twitter.com/sarahjohnson',
                'instagram' => 'https://instagram.com/sarahjohnson',
                'linkedin' => 'https://linkedin.com/in/sarahjohnson',
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'michael.chen@astechcommunity.com',
                'phone' => '+1-555-345-6789',
                'bio' => 'Data Scientist and AI Engineer with expertise in Python, Machine Learning, and Deep Learning frameworks.',
                'image' => 'instructors/michael_chen.jpg',
                'specialization' => 'Data Science',
                'rating' => 4.7,
                'total_students' => 8500,
                'total_courses' => 6,
                'twitter' => 'https://twitter.com/michaelchen',
                'linkedin' => 'https://linkedin.com/in/michaelchen',
                'is_active' => true,
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@astechcommunity.com',
                'phone' => '+1-555-456-7890',
                'bio' => 'Creative Designer with 12 years of experience in branding, UI/UX design, and visual communications.',
                'image' => 'instructors/emily_davis.jpg',
                'specialization' => 'Graphic Design',
                'rating' => 4.8,
                'total_students' => 11000,
                'total_courses' => 10,
                'facebook' => 'https://facebook.com/emilydavis',
                'instagram' => 'https://instagram.com/emilydavis',
                'linkedin' => 'https://linkedin.com/in/emilydavis',
                'is_active' => true,
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david.wilson@astechcommunity.com',
                'phone' => '+1-555-567-8901',
                'bio' => 'Business Consultant and Entrepreneur with 15 years of experience in startup development and business strategy.',
                'image' => 'instructors/david_wilson.jpg',
                'specialization' => 'Business',
                'rating' => 4.6,
                'total_students' => 9500,
                'total_courses' => 7,
                'facebook' => 'https://facebook.com/davidwilson',
                'twitter' => 'https://twitter.com/davidwilson',
                'linkedin' => 'https://linkedin.com/in/davidwilson',
                'is_active' => true,
            ],
        ];

        foreach ($instructors as $instructor) {
            Instructor::updateOrCreate(
                ['email' => $instructor['email']], // Find by email
                $instructor
            );
        }
    }
}
