<?php

use Illuminate\Database\Seeder;
use App\Lesson;
use App\Course;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $courses = Course::all();
        
        $lessonTitles = [
            'Introduction to the Course',
            'Getting Started with Basics',
            'Understanding Core Concepts',
            'Working with Tools and Resources',
            'Practical Examples and Use Cases',
            'Advanced Techniques',
            'Best Practices and Standards',
            'Common Mistakes to Avoid',
            'Real-world Implementation',
            'Performance Optimization',
            'Debugging and Troubleshooting',
            'Testing Your Skills',
            'Building Your First Project',
            'Working with APIs',
            'Database Integration',
            'User Interface Design',
            'Security Considerations',
            'Deployment Strategies',
            'Monitoring and Maintenance',
            'Final Project and Review'
        ];
        
        $videoUrls = [
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'https://vimeo.com/123456789',
            'https://www.youtube.com/watch?v=oHg5SJYRHA0',
            'https://vimeo.com/987654321',
            'https://www.youtube.com/watch?v=kJQP7kiw5Fk'
        ];
        
        $count = 0;
        foreach ($courses as $course) {
            $lessonsCount = rand(3, 8);
            
            for ($i = 1; $i <= $lessonsCount; $i++) {
                if ($count >= 50) break;
                
                $title = $lessonTitles[($count % count($lessonTitles))] . ' - ' . $course->title;
                
                Lesson::create([
                    'course_id' => $course->id,
                    'title' => $title,
                    'slug' => Str::slug($title) . '-' . $count,
                    'description' => $faker->paragraph(2),
                    'content' => $faker->paragraphs(5, true),
                    'video_url' => $videoUrls[array_rand($videoUrls)],
                    'video_duration' => sprintf('%02d:%02d', rand(5, 60), rand(0, 59)),
                    'attachments' => json_encode([
                        'slides' => 'lesson-' . $count . '-slides.pdf',
                        'resources' => 'lesson-' . $count . '-resources.zip'
                    ]),
                    'sort_order' => $i,
                    'is_preview' => $i <= 2 ? true : false,
                    'is_active' => true,
                    'meta_title' => $title . ' | ' . config('app.name'),
                    'meta_description' => $faker->sentence(15),
                ]);
                
                $count++;
            }
            
            if ($count >= 50) break;
        }
    }
}
