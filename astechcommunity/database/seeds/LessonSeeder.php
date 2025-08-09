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
        
        if ($courses->isEmpty()) {
            $this->command->warn('No courses found. Skipping lessons.');
            return;
        }
        
        $currentLessonCount = Lesson::count();
        $targetLessons = 50;
        $lessonsToCreate = max(0, $targetLessons - $currentLessonCount);
        
        $created = 0;
        $globalCount = $currentLessonCount;
        
        foreach ($courses as $course) {
            if ($created >= $lessonsToCreate) break;
            
            // Check how many lessons this course already has
            $existingLessonsCount = Lesson::where('course_id', $course->id)->count();
            $maxLessonsPerCourse = 8;
            $lessonsForThisCourse = min(
                $maxLessonsPerCourse - $existingLessonsCount,
                $lessonsToCreate - $created
            );
            
            if ($lessonsForThisCourse <= 0) continue;
            
            $nextSortOrder = $existingLessonsCount + 1;
            
            for ($i = 0; $i < $lessonsForThisCourse; $i++) {
                $title = $lessonTitles[($globalCount % count($lessonTitles))] . ' - ' . $course->title;
                $slug = Str::slug($title) . '-' . $globalCount;
                
                // Ensure unique slug
                while (Lesson::where('slug', $slug)->exists()) {
                    $globalCount++;
                    $slug = Str::slug($title) . '-' . $globalCount;
                }
                
                Lesson::create([
                    'course_id' => $course->id,
                    'title' => $title,
                    'slug' => $slug,
                    'description' => $faker->paragraph(2),
                    'content' => $faker->paragraphs(5, true),
                    'video_url' => $videoUrls[array_rand($videoUrls)],
                    'video_duration' => sprintf('%02d:%02d', rand(5, 60), rand(0, 59)),
                    'attachments' => json_encode([
                        'slides' => 'lesson-' . $globalCount . '-slides.pdf',
                        'resources' => 'lesson-' . $globalCount . '-resources.zip'
                    ]),
                    'sort_order' => $nextSortOrder + $i,
                    'is_preview' => ($nextSortOrder + $i) <= 2 ? true : false,
                    'is_active' => true,
                    'meta_title' => $title . ' | ' . config('app.name'),
                    'meta_description' => $faker->sentence(15),
                ]);
                
                $created++;
                $globalCount++;
            }
        }
        
        $totalLessons = Lesson::count();
        $this->command->info("Total lessons: {$totalLessons} (created {$created} new)");
    }
}
