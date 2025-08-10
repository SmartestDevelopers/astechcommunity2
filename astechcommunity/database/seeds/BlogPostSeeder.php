<?php

use Illuminate\Database\Seeder;
use App\BlogPost;
use App\Category;
use App\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        
        $blogTopics = [
            'Web Development', 'Mobile App Development', 'Artificial Intelligence', 'Machine Learning',
            'Data Science', 'Cybersecurity', 'Cloud Computing', 'DevOps', 'UI/UX Design',
            'Digital Marketing', 'E-commerce', 'Blockchain', 'IoT', 'Virtual Reality',
            'Augmented Reality', 'Programming Tips', 'Career Advice', 'Tech Trends',
            'Software Architecture', 'Database Management', 'API Development', 'Testing',
            'Performance Optimization', 'Code Review', 'Project Management'
        ];

        $authors = [
            ['name' => 'Sarah Johnson', 'image' => 'authors/sarah_johnson.jpg'],
            ['name' => 'Michael Chen', 'image' => 'authors/michael_chen.jpg'],
            ['name' => 'Emily Davis', 'image' => 'authors/emily_davis.jpg'],
            ['name' => 'David Wilson', 'image' => 'authors/david_wilson.jpg'],
            ['name' => 'Maria Rodriguez', 'image' => 'authors/maria_rodriguez.jpg'],
            ['name' => 'Ahmed Hassan', 'image' => 'authors/ahmed_hassan.jpg'],
            ['name' => 'Jennifer Lee', 'image' => 'authors/jennifer_lee.jpg'],
            ['name' => 'Robert Kim', 'image' => 'authors/robert_kim.jpg'],
            ['name' => 'Lisa Thompson', 'image' => 'authors/lisa_thompson.jpg'],
            ['name' => 'Carlos Martinez', 'image' => 'authors/carlos_martinez.jpg']
        ];

        $blogContent = [
            'introduction' => [
                'In today\'s rapidly evolving technology landscape, staying ahead of the curve is more crucial than ever.',
                'The digital transformation has revolutionized the way we work, learn, and interact with technology.',
                'As we navigate through the complexities of modern software development, it\'s important to understand the fundamentals.',
                'The technology industry continues to grow at an unprecedented pace, creating new opportunities and challenges.',
                'Understanding the latest trends and best practices is essential for any professional in the tech industry.'
            ],
            'body' => [
                'Let\'s dive deep into the core concepts and explore how they can be applied in real-world scenarios. The implementation requires careful consideration of various factors including scalability, security, and user experience. By following industry best practices and leveraging modern tools and frameworks, developers can create robust and efficient solutions.',
                'One of the key aspects to consider is the architecture and design patterns that best suit your project requirements. Whether you\'re building a small application or a large-scale enterprise system, choosing the right approach is crucial for long-term success. Modern development methodologies emphasize the importance of clean code, testing, and continuous integration.',
                'The learning curve might seem steep initially, but with dedicated practice and the right resources, anyone can master these concepts. It\'s important to start with the fundamentals and gradually build upon your knowledge. Hands-on experience through projects and real-world applications is invaluable for solidifying your understanding.',
                'Security considerations should never be an afterthought in any development process. From the initial planning phase to deployment and maintenance, security must be integrated into every aspect of your application. This includes proper authentication, data encryption, secure coding practices, and regular security audits.',
                'Performance optimization is another critical factor that can make or break your application\'s success. Users expect fast, responsive applications, and even small delays can significantly impact user experience and conversion rates. Understanding how to optimize code, database queries, and resource loading is essential for modern applications.'
            ],
            'conclusion' => [
                'In conclusion, mastering these concepts requires dedication, practice, and a commitment to continuous learning.',
                'The journey of learning and implementing these technologies can be challenging but incredibly rewarding.',
                'As we move forward, staying updated with the latest developments and best practices will be key to success.',
                'Remember that the technology landscape is constantly evolving, so adaptability and continuous learning are essential.',
                'By applying these principles and techniques, you\'ll be well-equipped to tackle complex challenges and build amazing applications.'
            ]
        ];

        // Get users to use as authors
        $users = User::all();
        
        for ($i = 1; $i <= 50; $i++) {
            $topic = $blogTopics[array_rand($blogTopics)];
            $author = $authors[array_rand($authors)];
            $category = $categories->random();
            $user = $users->random(); // Get a random user as author
            
            $titles = [
                "Complete Guide to $topic in 2025",
                "Mastering $topic: Best Practices and Tips",
                "$topic for Beginners: Everything You Need to Know",
                "Advanced $topic Techniques Every Developer Should Know",
                "The Ultimate $topic Tutorial",
                "$topic vs Other Technologies: A Comprehensive Comparison",
                "How to Get Started with $topic",
                "$topic in Practice: Real-World Applications",
                "Common $topic Mistakes and How to Avoid Them",
                "The Future of $topic: Trends and Predictions"
            ];
            
            $title = $titles[array_rand($titles)];
            $slug = Str::slug($title) . '-' . $i;
            
            $content = $blogContent['introduction'][array_rand($blogContent['introduction'])] . "\n\n" .
                      $blogContent['body'][array_rand($blogContent['body'])] . "\n\n" .
                      $blogContent['body'][array_rand($blogContent['body'])] . "\n\n" .
                      $blogContent['conclusion'][array_rand($blogContent['conclusion'])];
            
            $excerpt = substr($content, 0, 200) . '...';
            
            $tags = [
                strtolower(str_replace(' ', '-', $topic)),
                'tutorial',
                'guide',
                'development',
                'programming',
                'technology'
            ];
            
            BlogPost::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'excerpt' => $excerpt,
                'featured_image' => 'blog/blog-' . ($i % 12 + 1) . '.jpg',
                'author_id' => $user->id,
                'category_id' => $category->id,
                'tags' => array_slice($tags, 0, rand(3, 5)),
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(rand(1, 365)),
                'views_count' => rand(50, 2000),
                'likes_count' => rand(0, 100),
                'comments_count' => rand(0, 25),
                'reading_time' => ceil(str_word_count($content) / 200),
                'is_featured' => $i <= 10, // First 10 are featured
                'meta_title' => $title,
                'meta_description' => $excerpt
            ]);
        }
    }
}
