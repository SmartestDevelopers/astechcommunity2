<?php

use Illuminate\Database\Seeder;
use App\Freelancer;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseFreelancers = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '+1234567890',
                'title' => 'Full Stack Developer',
                'bio' => 'Experienced full stack developer specializing in Laravel, Vue, and MySQL.',
                'skills' => ['Laravel', 'Vue.js', 'MySQL', 'REST APIs'],
                'hourly_rate' => 35,
                'currency' => 'USD',
                'experience_years' => 5,
                'location' => 'Pakistan',
                'available_remote' => true,
                'availability_status' => 'available',
                'rating' => 4.7,
                'reviews_count' => 42,
                'projects_completed' => 58,
                'portfolio_links' => ['https://github.com/johndoe'],
                'linkedin_url' => 'https://linkedin.com/in/johndoe',
                'github_url' => 'https://github.com/johndoe',
                'website_url' => null,
                'languages' => ['English', 'Urdu'],
                'preferred_project_types' => 'Web applications, APIs, dashboards',
                'is_verified' => true,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        $freelancers = $baseFreelancers;

        $names = ['Ali Khan', 'Sara Ahmed', 'Umer Farooq', 'Ayesha Siddiqui', 'Bilal Hussain', 'Fatima Noor', 'Hamza Tariq', 'Zara Shah', 'Usman Khalid', 'Mariam Iqbal'];
        $titles = ['Frontend Developer', 'Backend Developer', 'UI/UX Designer', 'Mobile Developer', 'DevOps Engineer', 'Data Analyst', 'Graphic Designer', 'SEO Specialist'];
        $locations = ['Pakistan', 'India', 'USA', 'UK', 'Canada', 'Bangladesh'];
        $skillsPool = ['PHP', 'Laravel', 'Vue.js', 'React.js', 'Node.js', 'MySQL', 'PostgreSQL', 'Tailwind', 'Figma', 'Flutter', 'React Native', 'AWS', 'Docker'];

        for ($i = count($freelancers) + 1; $i <= 50; $i++) {
            $name = $names[array_rand($names)] . ' ' . rand(100, 999);
            $skillCount = rand(3, 6);
            shuffle($skillsPool);
            $skills = array_slice($skillsPool, 0, $skillCount);
            $freelancers[] = [
                'name' => $name,
                'email' => 'freelancer' . $i . '@example.com',
                'phone' => '+92' . rand(3000000000, 3999999999),
                'title' => $titles[array_rand($titles)],
                'bio' => 'Professional ' . strtolower($titles[array_rand($titles)]) . ' with strong focus on quality and timely delivery.',
                'skills' => $skills,
                'hourly_rate' => rand(10, 70),
                'currency' => 'USD',
                'experience_years' => rand(1, 12),
                'location' => $locations[array_rand($locations)],
                'available_remote' => (bool)rand(0, 1),
                'availability_status' => ['available', 'busy', 'unavailable'][array_rand(['available', 'busy', 'unavailable'])],
                'rating' => round(rand(40, 50) / 10, 1),
                'reviews_count' => rand(0, 120),
                'projects_completed' => rand(0, 200),
                'portfolio_links' => ['https://portfolio.example.com/' . $i],
                'linkedin_url' => null,
                'github_url' => null,
                'website_url' => null,
                'languages' => ['English'],
                'preferred_project_types' => null,
                'is_verified' => (bool)rand(0, 1),
                'is_featured' => $i % 9 === 0,
                'is_active' => true,
            ];
        }

        foreach ($freelancers as $data) {
            Freelancer::create($data);
        }
    }
}
