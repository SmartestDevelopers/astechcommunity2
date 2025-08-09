<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AllTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->seedServices();
        $this->seedBlogPosts();
        $this->seedMembershipPlans();
        $this->seedFaqs();
        $this->seedFreelancers();
        $this->seedMentors();
        $this->seedClients();
        $this->seedCharityPrograms();
        $this->seedSeoPages();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function seedServices()
    {
        DB::table('services')->truncate();
        
        $services = [
            'Web Development', 'Mobile App Development', 'UI/UX Design', 'Digital Marketing',
            'SEO Optimization', 'E-commerce Solutions', 'DevOps Services', 'Cloud Computing',
            'Cybersecurity', 'Data Analytics', 'AI/ML Solutions', 'Blockchain Development',
            'Quality Assurance', 'Technical Consulting', 'API Development', 'Database Design',
            'Performance Optimization', 'Code Review', 'System Architecture', 'Project Management',
            'Technical Writing', 'Software Training', 'Legacy System Migration', 'Maintenance & Support',
            'Progressive Web Apps', 'Cross-platform Development', 'Microservices', 'Serverless Computing',
            'IoT Development', 'AR/VR Development', 'Game Development', 'Chatbot Development',
            'Social Media Integration', 'Payment Gateway Integration', 'Third-party Integrations',
            'Custom CMS Development', 'Enterprise Solutions', 'SaaS Development', 'Platform Development',
            'API Security', 'Penetration Testing', 'Code Auditing', 'Performance Monitoring',
            'Backup Solutions', 'Disaster Recovery', 'Data Migration', 'System Integration',
            'Technical Documentation', 'User Training', 'Ongoing Support', 'Emergency Fixes'
        ];

        foreach ($services as $index => $service) {
            DB::table('services')->insert([
                'title' => $service,
                'slug' => Str::slug($service),
                'short_description' => 'Professional ' . strtolower($service) . ' services for your business needs.',
                'description' => 'Comprehensive ' . strtolower($service) . ' solutions designed to help your business grow and succeed in the digital landscape. Our expert team delivers high-quality results with cutting-edge technologies and best practices.',
                'icon' => 'template/img/featureCards/' . (($index % 6) + 1) . '.svg',
                'image' => 'template/img/coursesCards/' . (($index % 12) + 1) . '.png',
                'price' => rand(50, 500) + 0.99,
                'price_type' => ['fixed', 'hourly', 'monthly'][rand(0, 2)],
                'features' => json_encode([
                    'Professional consultation',
                    'Custom solution design',
                    '24/7 support',
                    'Quality assurance',
                    'Timely delivery'
                ]),
                'is_featured' => rand(0, 1),
                'is_active' => 1,
                'sort_order' => $index,
                'meta_title' => $service . ' Services - AS-Tech Community',
                'meta_description' => 'Get professional ' . strtolower($service) . ' services from experienced developers at AS-Tech Community.',
                'meta_keywords' => strtolower(str_replace(' ', ', ', $service)) . ', professional services, development',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedBlogPosts()
    {
        DB::table('blog_posts')->truncate();
        
        $titles = [
            'The Future of Web Development in 2025',
            'Machine Learning Fundamentals for Beginners',
            'Building Scalable Applications with Microservices',
            'Cybersecurity Best Practices for Developers',
            'Introduction to Cloud Computing Platforms',
            'Mobile App Development: Native vs Cross-Platform',
            'Database Design Principles and Best Practices',
            'DevOps Culture: Breaking Down Silos',
            'Understanding RESTful API Design',
            'Frontend Framework Comparison: React vs Vue vs Angular',
            'Docker Containerization for Beginners',
            'Kubernetes Orchestration Made Simple',
            'JavaScript ES2023: New Features and Updates',
            'Python for Data Science: Getting Started',
            'Git Version Control: Advanced Techniques',
            'Agile Development Methodologies Explained',
            'Software Testing Strategies and Tools',
            'Performance Optimization Techniques',
            'Security Vulnerabilities Every Developer Should Know',
            'Building Progressive Web Applications',
            'GraphQL vs REST: When to Use Which',
            'Serverless Architecture Benefits and Challenges',
            'AI and Machine Learning in Web Development',
            'Blockchain Technology for Developers',
            'IoT Development: Connecting the Physical World',
            'Responsive Web Design Best Practices',
            'CSS Grid vs Flexbox: Layout Comparison',
            'Node.js Performance Optimization',
            'React Hooks: A Complete Guide',
            'Vue.js 3 Composition API Tutorial',
            'Angular Universal: Server-Side Rendering',
            'TypeScript for JavaScript Developers',
            'MongoDB vs PostgreSQL: Database Comparison',
            'Redis Caching Strategies',
            'Elasticsearch for Full-Text Search',
            'WebSocket Real-time Communication',
            'OAuth 2.0 Authentication Implementation',
            'JWT Token Security Best Practices',
            'CI/CD Pipeline Setup with GitHub Actions',
            'Monitoring and Logging Best Practices',
            'Load Balancing Strategies',
            'CDN Implementation Guide',
            'SSL/TLS Certificate Management',
            'Code Review Best Practices',
            'Technical Debt Management',
            'Software Architecture Patterns',
            'Design Patterns in Modern Development',
            'Clean Code Principles',
            'Testing Pyramid Strategy',
            'Career Growth for Software Developers'
        ];

        foreach ($titles as $index => $title) {
            DB::table('blog_posts')->insert([
                'title' => $title,
                'slug' => Str::slug($title),
                'excerpt' => 'Learn about ' . strtolower($title) . ' and how it can improve your development skills and career prospects.',
                'content' => $this->generateBlogContent($title),
                'featured_image' => 'template/img/blog-list/' . (($index % 9) + 1) . '.png',
                'author_id' => 1, // Assuming admin user has ID 1
                'category_id' => rand(1, 5),
                'tags' => json_encode($this->generateTags($title)),
                'status' => ['published', 'draft'][rand(0, 1)],
                'published_at' => rand(0, 1) ? now()->subDays(rand(1, 30)) : null,
                'views_count' => rand(100, 5000),
                'likes_count' => rand(10, 500),
                'comments_count' => rand(0, 50),
                'reading_time' => rand(3, 15),
                'is_featured' => rand(0, 1),
                'meta_title' => $title . ' - AS-Tech Community Blog',
                'meta_description' => 'Learn about ' . strtolower($title) . ' with our comprehensive guide. Improve your skills with expert insights.',
                'meta_keywords' => implode(', ', $this->generateTags($title)),
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now()->subDays(rand(0, 30)),
            ]);
        }
    }

    private function seedMembershipPlans()
    {
        DB::table('membership_plans')->truncate();
        
        $plans = [
            [
                'name' => 'Basic',
                'description' => 'Perfect for students and beginners starting their tech journey.',
                'price' => 0.00,
                'billing_cycle' => 'monthly',
                'features' => [
                    'Access to free courses',
                    'Community forum access',
                    'Basic support',
                    'Course certificates'
                ],
                'limitations' => [
                    'Limited course access',
                    'No premium content',
                    'Standard support only'
                ],
                'max_courses' => 5,
                'is_popular' => false,
                'color_scheme' => 'gray'
            ],
            [
                'name' => 'Pro',
                'description' => 'For serious learners who want full access to our course library.',
                'price' => 29.99,
                'billing_cycle' => 'monthly',
                'features' => [
                    'Access to all courses',
                    'Premium course content',
                    'Priority support',
                    'Downloadable resources',
                    'Course certificates',
                    'Project templates'
                ],
                'max_courses' => null,
                'has_certificates' => true,
                'is_popular' => true,
                'color_scheme' => 'purple'
            ],
            [
                'name' => 'Enterprise',
                'description' => 'Complete solution for professionals and teams.',
                'price' => 99.99,
                'billing_cycle' => 'monthly',
                'features' => [
                    'Everything in Pro',
                    '1-on-1 mentorship',
                    'Career placement support',
                    'Custom learning paths',
                    'Direct instructor access',
                    'Team management tools'
                ],
                'has_mentorship' => true,
                'has_career_services' => true,
                'is_popular' => false,
                'color_scheme' => 'gold'
            ]
        ];

        foreach ($plans as $index => $plan) {
            DB::table('membership_plans')->insert([
                'name' => $plan['name'],
                'slug' => Str::slug($plan['name']),
                'description' => $plan['description'],
                'price' => $plan['price'],
                'billing_cycle' => $plan['billing_cycle'],
                'original_price' => $plan['price'] > 0 ? $plan['price'] * 1.2 : null,
                'discount_percentage' => $plan['price'] > 0 ? 20 : 0,
                'features' => json_encode($plan['features']),
                'limitations' => json_encode($plan['limitations'] ?? []),
                'max_courses' => $plan['max_courses'] ?? null,
                'has_mentorship' => $plan['has_mentorship'] ?? false,
                'has_certificates' => $plan['has_certificates'] ?? false,
                'has_career_services' => $plan['has_career_services'] ?? false,
                'is_popular' => $plan['is_popular'],
                'is_active' => true,
                'sort_order' => $index,
                'color_scheme' => $plan['color_scheme'],
                'meta_title' => $plan['name'] . ' Plan - AS-Tech Community Membership',
                'meta_description' => $plan['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedFaqs()
    {
        DB::table('faqs')->truncate();
        
        $faqs = [
            [
                'question' => 'What courses do you offer?',
                'answer' => 'We offer a comprehensive range of technology courses including Web Development, Mobile App Development, Data Science, Machine Learning, Cloud Computing, Cybersecurity, DevOps, and much more. Our courses are designed for all skill levels from beginner to advanced.',
                'category' => 'courses'
            ],
            [
                'question' => 'How much do the courses cost?',
                'answer' => 'We have flexible pricing options. Our Basic membership is completely free with access to select courses. Pro membership is $29.99/month with access to all premium courses. Enterprise membership is $99.99/month with additional mentorship and career services.',
                'category' => 'pricing'
            ],
            [
                'question' => 'Do you offer certificates upon completion?',
                'answer' => 'Yes! Pro and Enterprise members receive industry-recognized certificates upon successful completion of courses. These certificates can be shared on LinkedIn and included in your resume.',
                'category' => 'certificates'
            ],
            [
                'question' => 'Can I cancel my membership anytime?',
                'answer' => 'Absolutely! You can cancel your membership at any time without any cancellation fees. There are no long-term contracts. You\'ll continue to have access until the end of your current billing period.',
                'category' => 'billing'
            ],
            [
                'question' => 'What is your refund policy?',
                'answer' => 'We offer a 30-day money-back guarantee for all paid memberships. If you\'re not satisfied with our courses or services within the first 30 days, we\'ll provide a full refund.',
                'category' => 'billing'
            ],
            [
                'question' => 'Do you provide job placement assistance?',
                'answer' => 'Yes! Enterprise members get access to our comprehensive career services including resume reviews, interview preparation, job search assistance, and connections to our network of partner companies.',
                'category' => 'career'
            ],
            [
                'question' => 'How do I contact support?',
                'answer' => 'You can contact our support team through the contact form on our website, email us at support@astechcommunity.com, or use the live chat feature available to Pro and Enterprise members.',
                'category' => 'support'
            ],
            [
                'question' => 'Are the courses self-paced?',
                'answer' => 'Yes, all our courses are self-paced. You can learn at your own speed and revisit lessons as many times as needed. Pro and Enterprise members also get lifetime access to course materials.',
                'category' => 'courses'
            ],
            [
                'question' => 'Do you offer group discounts?',
                'answer' => 'Yes, we offer special pricing for teams and educational institutions. Contact our sales team for custom pricing options for groups of 5 or more members.',
                'category' => 'pricing'
            ],
            [
                'question' => 'What programming languages do you cover?',
                'answer' => 'We cover all major programming languages including JavaScript, Python, Java, C#, PHP, Go, Rust, Swift, Kotlin, and many more. Our courses are regularly updated to include the latest technologies.',
                'category' => 'courses'
            ]
        ];

        // Generate 50 FAQs by repeating and modifying the base ones
        $allFaqs = [];
        for ($i = 0; $i < 50; $i++) {
            $baseFaq = $faqs[$i % count($faqs)];
            $allFaqs[] = [
                'question' => $baseFaq['question'] . ($i >= 10 ? ' (Version ' . ceil($i/10) . ')' : ''),
                'answer' => $baseFaq['answer'],
                'category' => $baseFaq['category'],
                'is_active' => 1,
                'sort_order' => $i,
                'views_count' => rand(50, 1000),
                'is_featured' => rand(0, 1),
                'tags' => json_encode(['general', $baseFaq['category']]),
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(0, 15)),
            ];
        }

        DB::table('faqs')->insert($allFaqs);
    }

    // Add more seeder methods for other tables...
    private function generateBlogContent($title)
    {
        return "<h2>Introduction</h2>
        <p>In this comprehensive guide, we'll explore {$title} and its importance in modern software development.</p>
        
        <h2>Key Concepts</h2>
        <p>Understanding the fundamental concepts is crucial for mastering this topic. We'll cover the essential principles that every developer should know.</p>
        
        <h2>Best Practices</h2>
        <p>Follow these industry-proven best practices to implement {$title} effectively in your projects:</p>
        <ul>
            <li>Plan your approach carefully</li>
            <li>Follow established conventions</li>
            <li>Test thoroughly</li>
            <li>Document your implementation</li>
        </ul>
        
        <h2>Conclusion</h2>
        <p>By following this guide, you'll have a solid foundation in {$title} and be ready to apply these concepts in real-world projects.</p>";
    }

    private function generateTags($title)
    {
        $words = explode(' ', strtolower($title));
        $techWords = ['web', 'development', 'javascript', 'python', 'react', 'node', 'database', 'api', 'security', 'cloud', 'mobile', 'frontend', 'backend', 'devops'];
        
        $tags = array_intersect($words, $techWords);
        if (empty($tags)) {
            $tags = array_slice($words, 0, 3);
        }
        
        return array_slice($tags, 0, 5);
    }

    // Simplified version for other seeders - you can expand these as needed
    private function seedFreelancers()
    {
        DB::table('freelancers')->truncate();
        
        $names = ['Sarah Johnson', 'Mike Chen', 'Emily Davis', 'David Wilson', 'Lisa Brown', 'James Miller', 'Anna Garcia', 'Tom Anderson', 'Maria Rodriguez', 'John Smith'];
        $titles = ['Full Stack Developer', 'Mobile App Developer', 'UI/UX Designer', 'DevOps Engineer', 'Data Scientist', 'Frontend Developer', 'Backend Developer', 'System Administrator', 'Software Architect', 'Quality Assurance Engineer'];
        $skills = [
            ['JavaScript', 'React', 'Node.js', 'MongoDB'],
            ['Swift', 'Kotlin', 'React Native', 'Flutter'],
            ['Figma', 'Adobe XD', 'Sketch', 'InVision'],
            ['Docker', 'Kubernetes', 'AWS', 'Jenkins'],
            ['Python', 'TensorFlow', 'Pandas', 'SQL']
        ];

        for ($i = 0; $i < 50; $i++) {
            DB::table('freelancers')->insert([
                'name' => $names[$i % 10] . ($i >= 10 ? ' ' . chr(65 + ($i/10)) : ''),
                'email' => 'freelancer' . ($i + 1) . '@astechcommunity.com',
                'phone' => '+1555' . sprintf('%07d', $i + 1000000),
                'title' => $titles[$i % 10],
                'bio' => 'Experienced professional with ' . rand(2, 10) . '+ years in the tech industry.',
                'profile_image' => 'template/img/team/' . (($i % 8) + 1) . '.png',
                'skills' => json_encode($skills[$i % 5]),
                'hourly_rate' => rand(25, 150) + 0.50,
                'currency' => 'USD',
                'experience_years' => rand(1, 15),
                'location' => ['New York', 'San Francisco', 'London', 'Toronto', 'Remote'][$i % 5],
                'available_remote' => true,
                'availability_status' => ['available', 'busy', 'unavailable'][rand(0, 2)],
                'rating' => rand(35, 50) / 10,
                'reviews_count' => rand(5, 100),
                'projects_completed' => rand(10, 200),
                'is_verified' => rand(0, 1),
                'is_featured' => rand(0, 1),
                'is_active' => 1,
                'last_active_at' => now()->subDays(rand(0, 7)),
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now()->subDays(rand(0, 30)),
            ]);
        }
    }

    private function seedMentors()
    {
        DB::table('mentors')->truncate();
        
        // Similar structure for mentors - abbreviated for brevity
        for ($i = 0; $i < 50; $i++) {
            DB::table('mentors')->insert([
                'name' => 'Dr. Mentor ' . ($i + 1),
                'email' => 'mentor' . ($i + 1) . '@astechcommunity.com',
                'title' => 'Senior ' . ['Developer', 'Designer', 'Engineer', 'Architect', 'Consultant'][rand(0, 4)],
                'company' => ['Google', 'Microsoft', 'Apple', 'Amazon', 'Meta', 'Netflix', 'Tesla', 'Uber'][rand(0, 7)],
                'bio' => 'Experienced mentor with extensive industry knowledge.',
                'profile_image' => 'template/img/team/' . (($i % 8) + 1) . '.png',
                'expertise_areas' => json_encode(['Leadership', 'Technical Skills', 'Career Development']),
                'experience_years' => rand(5, 20),
                'location' => 'Remote',
                'available_remote' => true,
                'session_rate' => rand(100, 300),
                'rating' => rand(40, 50) / 10,
                'reviews_count' => rand(10, 150),
                'is_verified' => true,
                'is_featured' => rand(0, 1),
                'is_active' => 1,
                'accepting_new_mentees' => true,
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now()->subDays(rand(0, 30)),
            ]);
        }
    }

    private function seedClients()
    {
        DB::table('clients')->truncate();
        
        $companies = [
            'TechCorp Solutions', 'Digital Innovations Inc', 'CloudFirst Technologies', 'DataDrive Systems',
            'NextGen Software', 'SmartTech Enterprises', 'CyberSafe Solutions', 'WebPro Development',
            'MobileTech Studios', 'AI Solutions Group', 'BlockChain Dynamics', 'IoT Innovations',
            'DevOps Masters', 'SecurityFirst Corp', 'ScaleUp Technologies', 'FastTrack Development'
        ];

        for ($i = 0; $i < 50; $i++) {
            $company = $companies[$i % 16] . ($i >= 16 ? ' ' . chr(65 + ($i/16)) : '');
            DB::table('clients')->insert([
                'company_name' => $company,
                'slug' => Str::slug($company),
                'description' => 'A leading technology company specializing in innovative solutions.',
                'industry' => ['Technology', 'Healthcare', 'Finance', 'E-commerce', 'Education'][rand(0, 4)],
                'logo' => 'template/img/clients/' . (($i % 6) + 1) . '.svg',
                'contact_email' => 'contact@' . Str::slug($company) . '.com',
                'company_size' => ['startup', 'small', 'medium', 'enterprise'][rand(0, 3)],
                'partnership_type' => ['one-time', 'ongoing', 'recruitment'][rand(0, 2)],
                'partnership_status' => ['prospect', 'active', 'completed'][rand(0, 2)],
                'is_featured' => rand(0, 1),
                'is_active' => 1,
                'projects_completed' => rand(1, 20),
                'satisfaction_rating' => rand(40, 50) / 10,
                'created_at' => now()->subDays(rand(1, 90)),
                'updated_at' => now()->subDays(rand(0, 30)),
            ]);
        }
    }

    private function seedCharityPrograms()
    {
        DB::table('charity_programs')->truncate();
        
        $programs = [
            'Free Tech Education for Underserved Communities',
            'Computer Lab Setup in Rural Schools',
            'Coding Bootcamp Scholarships',
            'Mentorship for Disadvantaged Youth',
            'Women in Tech Support Program',
            'Senior Citizen Digital Literacy',
            'Refugee Technology Training',
            'Disability-Inclusive Tech Education',
            'Indigenous Community Tech Access',
            'Veteran Career Transition Program'
        ];

        for ($i = 0; $i < 50; $i++) {
            $program = $programs[$i % 10] . ($i >= 10 ? ' - Phase ' . ceil($i/10) : '');
            DB::table('charity_programs')->insert([
                'title' => $program,
                'slug' => Str::slug($program),
                'short_description' => 'Making technology education accessible to everyone.',
                'description' => 'A comprehensive program designed to bridge the digital divide and provide opportunities for underserved communities.',
                'program_type' => ['education', 'equipment', 'mentorship', 'scholarship'][rand(0, 3)],
                'status' => ['planning', 'active', 'completed'][rand(0, 2)],
                'target_amount' => rand(10000, 100000),
                'raised_amount' => rand(1000, 50000),
                'target_beneficiaries' => rand(100, 1000),
                'current_beneficiaries' => rand(10, 500),
                'location' => ['Global', 'USA', 'Europe', 'Asia', 'Africa'][rand(0, 4)],
                'is_featured' => rand(0, 1),
                'is_active' => 1,
                'accepting_donations' => true,
                'accepting_volunteers' => true,
                'accepting_applications' => true,
                'meta_title' => $program . ' - AS-Tech Community Charity',
                'meta_description' => 'Join our mission to make technology education accessible to everyone.',
                'created_at' => now()->subDays(rand(1, 120)),
                'updated_at' => now()->subDays(rand(0, 30)),
            ]);
        }
    }

    private function seedSeoPages()
    {
        DB::table('seo_pages')->truncate();
        
        $pages = [
            ['name' => 'Home', 'route' => 'home', 'path' => '/'],
            ['name' => 'About', 'route' => 'about', 'path' => '/about'],
            ['name' => 'Services', 'route' => 'services', 'path' => '/services'],
            ['name' => 'Courses', 'route' => 'courses', 'path' => '/courses'],
            ['name' => 'Events', 'route' => 'events', 'path' => '/events'],
            ['name' => 'Blog', 'route' => 'blog', 'path' => '/blog'],
            ['name' => 'Contact', 'route' => 'contact', 'path' => '/contact'],
            ['name' => 'Membership Plans', 'route' => 'membership-plans', 'path' => '/membership-plans'],
            ['name' => 'FAQs', 'route' => 'faqs', 'path' => '/faqs'],
            ['name' => 'Shop', 'route' => 'shop', 'path' => '/shop'],
            ['name' => 'Freelancers', 'route' => 'freelancers', 'path' => '/freelancers'],
            ['name' => 'Mentors', 'route' => 'mentors', 'path' => '/mentors'],
            ['name' => 'Clients', 'route' => 'clients', 'path' => '/clients'],
            ['name' => 'Charity', 'route' => 'charity', 'path' => '/charity']
        ];

        foreach ($pages as $page) {
            DB::table('seo_pages')->insert([
                'page_name' => $page['name'],
                'route_name' => $page['route'],
                'url_path' => $page['path'],
                'meta_title' => $page['name'] . ' - AS-Tech Community | Learn Technology Skills Online',
                'meta_description' => 'Discover ' . strtolower($page['name']) . ' at AS-Tech Community. Join our platform to learn cutting-edge technology skills from industry experts.',
                'meta_keywords' => strtolower($page['name']) . ', technology education, online learning, programming courses, AS-Tech Community',
                'og_title' => $page['name'] . ' - AS-Tech Community',
                'og_description' => 'Join AS-Tech Community to access our ' . strtolower($page['name']) . ' and advance your technology career.',
                'og_image' => asset('template/img/general/logo.svg'),
                'twitter_title' => $page['name'] . ' - AS-Tech Community',
                'twitter_description' => 'Explore ' . strtolower($page['name']) . ' at AS-Tech Community and enhance your tech skills.',
                'canonical_url' => url($page['path']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
