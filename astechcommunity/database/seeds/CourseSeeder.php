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
        // Get categories and instructors for proper mapping
        $msOfficeCategory = Category::where('slug', 'ms-office')->first();
        $websiteDesignCategory = Category::where('slug', 'website-designing')->first();
        $webDevelopmentCategory = Category::where('slug', 'web-development')->first();
        $accountingCategory = Category::where('slug', 'computerized-accounting')->first();
        $hardwareCategory = Category::where('slug', 'computer-hardware')->first();
        $videoEditingCategory = Category::where('slug', 'video-editing')->first();
        $mobileAppCategory = Category::where('slug', 'mobile-app-development')->first();
        $programmingCategory = Category::where('slug', 'programming-languages')->first();
        $digitalMarketingCategory = Category::where('slug', 'digital-marketing')->first();
        $graphicDesignCategory = Category::where('slug', 'graphic-design')->first();
        $databaseCategory = Category::where('slug', 'database-management')->first();
        $cybersecurityCategory = Category::where('slug', 'cybersecurity')->first();

        // Get instructors
        $mariaInstructor = Instructor::where('email', 'maria.rodriguez@astechcommunity.com')->first();
        $ahmedInstructor = Instructor::where('email', 'ahmed.hassan@astechcommunity.com')->first();
        $johnInstructor = Instructor::where('email', 'john.doe@astechcommunity.com')->first();
        $jenniferInstructor = Instructor::where('email', 'jennifer.lee@astechcommunity.com')->first();
        $robertInstructor = Instructor::where('email', 'robert.kim@astechcommunity.com')->first();
        $lisaInstructor = Instructor::where('email', 'lisa.thompson@astechcommunity.com')->first();
        $carlosInstructor = Instructor::where('email', 'carlos.martinez@astechcommunity.com')->first();
        $ryanInstructor = Instructor::where('email', 'ryan.scott@astechcommunity.com')->first();
        $sarahInstructor = Instructor::where('email', 'sarah.johnson@astechcommunity.com')->first();
        $emilyInstructor = Instructor::where('email', 'emily.davis@astechcommunity.com')->first();
        $michaelInstructor = Instructor::where('email', 'michael.chen@astechcommunity.com')->first();
        $davidInstructor = Instructor::where('email', 'david.wilson@astechcommunity.com')->first();

        $courses = [
            // 1. MS Office Courses
            [
                'title' => 'Complete Microsoft Office Suite Mastery Course',
                'slug' => 'complete-microsoft-office-suite-mastery',
                'description' => 'Master all Microsoft Office applications including Word, Excel, PowerPoint, Access, and Outlook. From beginner to advanced level with hands-on projects and real-world scenarios. Perfect for professionals, students, and business owners.',
                'short_description' => 'Complete MS Office training covering Word, Excel, PowerPoint, Access & Outlook',
                'instructor_id' => $mariaInstructor ? $mariaInstructor->id : 1,
                'category_id' => $msOfficeCategory ? $msOfficeCategory->id : 8,
                'price' => 149.99,
                'discount_price' => 49.99,
                'image' => 'courses/ms_office_complete.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=ms-office-demo',
                'level' => 'Beginner',
                'duration_hours' => 45,
                'duration_minutes' => 0,
                'total_lessons' => 180,
                'rating' => 4.8,
                'total_reviews' => 5200,
                'total_students' => 25000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Master Microsoft Word for professional document creation and formatting',
                    'Create advanced spreadsheets and data analysis with Excel',
                    'Design stunning presentations with PowerPoint animations and transitions',
                    'Build and manage databases using Microsoft Access',
                    'Efficiently manage emails, calendars, and contacts with Outlook',
                    'Integrate all Office applications for seamless workflow',
                    'Use advanced formulas, pivot tables, and macros in Excel',
                    'Create mail merge documents and automated reports'
                ]),
                'requirements' => json_encode([
                    'Basic computer skills and familiarity with Windows',
                    'Microsoft Office installed (2016 or later recommended)',
                    'No prior experience with Office applications required',
                    'Willingness to practice and complete hands-on exercises'
                ]),
            ],
            [
                'title' => 'Advanced Excel for Business Analytics & Data Visualization',
                'slug' => 'advanced-excel-business-analytics',
                'description' => 'Take your Excel skills to the next level with advanced formulas, pivot tables, data analysis, VBA macros, and professional dashboard creation. Perfect for analysts, managers, and business professionals.',
                'short_description' => 'Master advanced Excel features for business analytics and reporting',
                'instructor_id' => $mariaInstructor ? $mariaInstructor->id : 1,
                'category_id' => $msOfficeCategory ? $msOfficeCategory->id : 8,
                'price' => 99.99,
                'discount_price' => 39.99,
                'image' => 'courses/advanced_excel.jpg',
                'level' => 'Advanced',
                'duration_hours' => 25,
                'duration_minutes' => 30,
                'total_lessons' => 85,
                'rating' => 4.9,
                'total_reviews' => 3800,
                'total_students' => 18500,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Create complex formulas using VLOOKUP, INDEX, MATCH functions',
                    'Build interactive dashboards with charts and pivot tables',
                    'Automate repetitive tasks with VBA macros',
                    'Perform statistical analysis and forecasting',
                    'Create professional reports and data visualizations',
                    'Use Power Query and Power Pivot for data modeling'
                ]),
                'requirements' => json_encode([
                    'Basic to intermediate Excel knowledge',
                    'Microsoft Excel 2016 or later',
                    'Understanding of basic mathematical concepts'
                ]),
            ],

            // 2. Website Designing Courses
            [
                'title' => 'Complete Website Designing Course: HTML, CSS, JavaScript & Bootstrap',
                'slug' => 'complete-website-designing-course',
                'description' => 'Learn modern web design from scratch! Master HTML5, CSS3, JavaScript, jQuery, and Bootstrap to create responsive, interactive websites. Build 10+ real projects including portfolio sites, landing pages, and business websites.',
                'short_description' => 'Learn HTML, CSS, JavaScript, jQuery & Bootstrap to create stunning websites',
                'instructor_id' => $ahmedInstructor ? $ahmedInstructor->id : 2,
                'category_id' => $websiteDesignCategory ? $websiteDesignCategory->id : 9,
                'price' => 179.99,
                'discount_price' => 59.99,
                'image' => 'courses/website_designing.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=web-design-demo',
                'level' => 'Beginner',
                'duration_hours' => 40,
                'duration_minutes' => 45,
                'total_lessons' => 165,
                'rating' => 4.7,
                'total_reviews' => 6500,
                'total_students' => 32000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Build responsive websites using HTML5 and CSS3',
                    'Create interactive user interfaces with JavaScript',
                    'Master jQuery for dynamic web effects and animations',
                    'Use Bootstrap framework for rapid development',
                    'Implement modern design principles and UI/UX best practices',
                    'Create mobile-first responsive layouts',
                    'Build portfolio websites and landing pages',
                    'Optimize websites for search engines (SEO basics)'
                ]),
                'requirements' => json_encode([
                    'Basic computer skills and internet browsing knowledge',
                    'A code editor (VS Code recommended - free)',
                    'Modern web browser (Chrome, Firefox, or Safari)',
                    'No prior coding experience required'
                ]),
            ],
            [
                'title' => 'Advanced CSS & JavaScript: Animations, Frameworks & Modern Techniques',
                'slug' => 'advanced-css-javascript',
                'description' => 'Take your web design skills to the next level with advanced CSS animations, JavaScript ES6+, SASS/SCSS, CSS Grid, Flexbox, and modern front-end development techniques.',
                'short_description' => 'Advanced CSS animations, JavaScript ES6+, and modern front-end techniques',
                'instructor_id' => $ahmedInstructor ? $ahmedInstructor->id : 2,
                'category_id' => $websiteDesignCategory ? $websiteDesignCategory->id : 9,
                'price' => 129.99,
                'discount_price' => 49.99,
                'image' => 'courses/advanced_css_js.jpg',
                'level' => 'Advanced',
                'duration_hours' => 30,
                'duration_minutes' => 15,
                'total_lessons' => 120,
                'rating' => 4.8,
                'total_reviews' => 2800,
                'total_students' => 12000,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Create stunning CSS animations and transitions',
                    'Master CSS Grid and Flexbox for complex layouts',
                    'Use SASS/SCSS for efficient stylesheet management',
                    'Implement modern JavaScript ES6+ features',
                    'Build interactive web components',
                    'Create smooth scrolling and parallax effects'
                ]),
                'requirements' => json_encode([
                    'Solid understanding of HTML, CSS, and basic JavaScript',
                    'Previous web development experience recommended',
                    'Code editor with SASS support'
                ]),
            ],

            // 3. Website Development Courses
            [
                'title' => 'Full-Stack Web Development with PHP, Laravel & MySQL',
                'slug' => 'fullstack-web-development-php-laravel',
                'description' => 'Become a complete web developer! Learn PHP programming, Laravel framework, MySQL database management, and modern JavaScript. Build real-world applications including e-commerce sites, CMS, and APIs.',
                'short_description' => 'Complete full-stack development with PHP, Laravel, JavaScript & MySQL',
                'instructor_id' => $johnInstructor ? $johnInstructor->id : 1,
                'category_id' => $webDevelopmentCategory ? $webDevelopmentCategory->id : 1,
                'price' => 199.99,
                'discount_price' => 69.99,
                'image' => 'courses/fullstack_php_laravel.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=php-laravel-demo',
                'level' => 'Intermediate',
                'duration_hours' => 55,
                'duration_minutes' => 30,
                'total_lessons' => 220,
                'rating' => 4.6,
                'total_reviews' => 8900,
                'total_students' => 45000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Master PHP programming from basics to advanced concepts',
                    'Build modern web applications using Laravel framework',
                    'Design and manage databases with MySQL',
                    'Create RESTful APIs and web services',
                    'Implement user authentication and authorization',
                    'Build e-commerce applications with payment integration',
                    'Use JavaScript, jQuery, and Bootstrap for frontend',
                    'Deploy applications to production servers',
                    'Implement security best practices'
                ]),
                'requirements' => json_encode([
                    'Basic HTML, CSS, and JavaScript knowledge',
                    'Understanding of web development concepts',
                    'Local development environment (XAMPP/WAMP recommended)',
                    'Code editor (VS Code or PHPStorm)',
                    'Willingness to learn and practice coding'
                ]),
            ],
            [
                'title' => 'Modern JavaScript & Frontend Frameworks Course',
                'slug' => 'modern-javascript-frontend-frameworks',
                'description' => 'Master modern JavaScript ES6+, React.js, Vue.js fundamentals, and build interactive single-page applications. Learn state management, API integration, and modern development tools.',
                'short_description' => 'Master modern JavaScript, React fundamentals, and SPA development',
                'instructor_id' => $johnInstructor ? $johnInstructor->id : 1,
                'category_id' => $webDevelopmentCategory ? $webDevelopmentCategory->id : 1,
                'price' => 159.99,
                'discount_price' => 59.99,
                'image' => 'courses/modern_javascript.jpg',
                'level' => 'Intermediate',
                'duration_hours' => 42,
                'duration_minutes' => 0,
                'total_lessons' => 168,
                'rating' => 4.7,
                'total_reviews' => 5400,
                'total_students' => 28000,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Master JavaScript ES6+ features and modern syntax',
                    'Build interactive user interfaces with React.js',
                    'Understand component-based architecture',
                    'Manage application state effectively',
                    'Integrate with REST APIs and external services',
                    'Use modern development tools and workflows'
                ]),
                'requirements' => json_encode([
                    'Solid foundation in HTML, CSS, and basic JavaScript',
                    'Understanding of programming concepts',
                    'Node.js installed on your computer'
                ]),
            ],

            // 4. Computerized Accounting Courses
            [
                'title' => 'Complete Computerized Accounting: Tally, QuickBooks & Advanced Excel',
                'slug' => 'complete-computerized-accounting',
                'description' => 'Master professional accounting software including Tally Prime, QuickBooks, Peachtree, and advanced Excel for financial analysis. Perfect for accountants, bookkeepers, and business owners.',
                'short_description' => 'Master Tally, QuickBooks, Peachtree & Excel for professional accounting',
                'instructor_id' => $jenniferInstructor ? $jenniferInstructor->id : 3,
                'category_id' => $accountingCategory ? $accountingCategory->id : 10,
                'price' => 169.99,
                'discount_price' => 59.99,
                'image' => 'courses/computerized_accounting.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=accounting-software-demo',
                'level' => 'Beginner',
                'duration_hours' => 38,
                'duration_minutes' => 45,
                'total_lessons' => 155,
                'rating' => 4.8,
                'total_reviews' => 4200,
                'total_students' => 22000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Master Tally Prime for complete business accounting',
                    'Use QuickBooks for small business financial management',
                    'Navigate Peachtree (Sage 50) for comprehensive accounting',
                    'Create advanced Excel spreadsheets for financial analysis',
                    'Generate professional financial reports and statements',
                    'Manage inventory, payroll, and tax calculations',
                    'Implement GST/VAT compliance in accounting software',
                    'Create automated accounting workflows and templates'
                ]),
                'requirements' => json_encode([
                    'Basic understanding of accounting principles',
                    'Computer literacy and Windows operating system knowledge',
                    'Access to accounting software (trial versions available)',
                    'Microsoft Excel installed',
                    'Basic mathematics and calculation skills'
                ]),
            ],
            [
                'title' => 'Advanced Tally Prime with GST & Financial Reporting',
                'slug' => 'advanced-tally-prime-gst',
                'description' => 'Become a Tally Prime expert with advanced features, GST compliance, financial reporting, inventory management, and payroll processing. Includes real business scenarios and case studies.',
                'short_description' => 'Advanced Tally Prime training with GST, inventory & payroll management',
                'instructor_id' => $jenniferInstructor ? $jenniferInstructor->id : 3,
                'category_id' => $accountingCategory ? $accountingCategory->id : 10,
                'price' => 99.99,
                'discount_price' => 39.99,
                'image' => 'courses/advanced_tally.jpg',
                'level' => 'Advanced',
                'duration_hours' => 22,
                'duration_minutes' => 30,
                'total_lessons' => 90,
                'rating' => 4.9,
                'total_reviews' => 2100,
                'total_students' => 11500,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Configure complex GST scenarios and compliance',
                    'Create advanced inventory management systems',
                    'Process payroll with statutory compliances',
                    'Generate comprehensive financial reports',
                    'Use Tally for multi-company and multi-location business',
                    'Implement cost center and budget analysis'
                ]),
                'requirements' => json_encode([
                    'Basic Tally knowledge required',
                    'Understanding of GST and Indian taxation',
                    'Tally Prime software access'
                ]),
            ],

            // 5. Computer Hardware Courses
            [
                'title' => 'Complete Computer Hardware Course: Repair, Maintenance & Troubleshooting',
                'slug' => 'complete-computer-hardware-course',
                'description' => 'Learn comprehensive computer hardware repair, motherboard troubleshooting, RAM diagnosis, power supply repair, and system installation. Become a certified hardware technician with hands-on experience.',
                'short_description' => 'Complete hardware repair: motherboard, RAM, power supply & system installation',
                'instructor_id' => $robertInstructor ? $robertInstructor->id : 4,
                'category_id' => $hardwareCategory ? $hardwareCategory->id : 11,
                'price' => 139.99,
                'discount_price' => 49.99,
                'image' => 'courses/computer_hardware.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=hardware-repair-demo',
                'level' => 'Beginner',
                'duration_hours' => 35,
                'duration_minutes' => 20,
                'total_lessons' => 142,
                'rating' => 4.6,
                'total_reviews' => 3400,
                'total_students' => 18500,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Diagnose and repair motherboard issues and components',
                    'Test and replace RAM modules and memory systems',
                    'Repair power supplies and electrical components',
                    'Create bootable USB drives and recovery media',
                    'Install Windows, Linux, and other operating systems',
                    'Troubleshoot hardware conflicts and compatibility issues',
                    'Use professional diagnostic tools and multimeters',
                    'Perform component-level repair and micro-soldering',
                    'Set up computer networks and peripheral devices'
                ]),
                'requirements' => json_encode([
                    'Basic understanding of computer components',
                    'Willingness to work with electronic equipment',
                    'Basic tools (screwdrivers, multimeter recommended)',
                    'Safety awareness when working with electronics',
                    'Practice computer or old hardware for hands-on learning'
                ]),
            ],
            [
                'title' => 'Advanced PC Building & Custom Configuration Course',
                'slug' => 'advanced-pc-building-configuration',
                'description' => 'Master the art of building custom PCs, server setup, advanced BIOS configuration, overclocking, and system optimization. Perfect for enthusiasts and professionals.',
                'short_description' => 'Advanced PC building, server setup, BIOS configuration & optimization',
                'instructor_id' => $robertInstructor ? $robertInstructor->id : 4,
                'category_id' => $hardwareCategory ? $hardwareCategory->id : 11,
                'price' => 119.99,
                'discount_price' => 44.99,
                'image' => 'courses/advanced_pc_building.jpg',
                'level' => 'Advanced',
                'duration_hours' => 28,
                'duration_minutes' => 15,
                'total_lessons' => 112,
                'rating' => 4.7,
                'total_reviews' => 1800,
                'total_students' => 9200,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Build high-performance custom PCs and workstations',
                    'Configure BIOS/UEFI settings for optimal performance',
                    'Implement safe overclocking techniques',
                    'Set up and maintain server systems',
                    'Create custom cooling solutions and cable management',
                    'Troubleshoot complex hardware compatibility issues'
                ]),
                'requirements' => json_encode([
                    'Previous computer hardware experience',
                    'Understanding of computer components and their functions',
                    'Access to computer hardware for practice'
                ]),
            ],

            // 6. Video Editing Courses
            [
                'title' => 'Professional Video Editing Masterclass: Complete Production Course',
                'slug' => 'professional-video-editing-masterclass',
                'description' => 'Master professional video editing with Adobe Premiere Pro, After Effects, and DaVinci Resolve. Learn green screen techniques, sound design, color grading, motion graphics, and create stunning videos for any purpose.',
                'short_description' => 'Complete video editing: green screen, sound design, animation & creative production',
                'instructor_id' => $lisaInstructor ? $lisaInstructor->id : 5,
                'category_id' => $videoEditingCategory ? $videoEditingCategory->id : 12,
                'price' => 189.99,
                'discount_price' => 64.99,
                'image' => 'courses/professional_video_editing.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=video-editing-demo',
                'level' => 'Beginner',
                'duration_hours' => 48,
                'duration_minutes' => 30,
                'total_lessons' => 195,
                'rating' => 4.8,
                'total_reviews' => 7200,
                'total_students' => 35000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Master Adobe Premiere Pro for professional video editing',
                    'Create stunning green screen effects and compositing',
                    'Design professional sound effects and audio mixing',
                    'Produce systematic video content for YouTube and social media',
                    'Create engaging video advertisements and commercials',
                    'Develop character animation and motion graphics',
                    'Apply cinematic color grading and visual effects',
                    'Edit films with professional storytelling techniques',
                    'Export and optimize videos for different platforms'
                ]),
                'requirements' => json_encode([
                    'Computer with good processing power (Intel i5/AMD Ryzen 5 or better)',
                    'At least 8GB RAM (16GB recommended)',
                    'Adobe Creative Cloud subscription or trial',
                    'Basic computer skills and file management knowledge',
                    'Passion for creative storytelling and video production'
                ]),
            ],
            [
                'title' => 'Advanced Motion Graphics & Visual Effects with After Effects',
                'slug' => 'advanced-motion-graphics-after-effects',
                'description' => 'Create professional motion graphics, visual effects, and animations using Adobe After Effects. Learn advanced compositing, 3D animation, particle systems, and create broadcast-quality content.',
                'short_description' => 'Advanced After Effects: motion graphics, VFX, 3D animation & compositing',
                'instructor_id' => $lisaInstructor ? $lisaInstructor->id : 5,
                'category_id' => $videoEditingCategory ? $videoEditingCategory->id : 12,
                'price' => 149.99,
                'discount_price' => 54.99,
                'image' => 'courses/motion_graphics_ae.jpg',
                'level' => 'Advanced',
                'duration_hours' => 32,
                'duration_minutes' => 45,
                'total_lessons' => 130,
                'rating' => 4.9,
                'total_reviews' => 3600,
                'total_students' => 16500,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Create professional motion graphics and title sequences',
                    'Master advanced compositing and visual effects',
                    'Design 3D animations and camera movements',
                    'Use particle systems and advanced effects',
                    'Create broadcast-quality graphics and animations',
                    'Integrate 3D elements with live-action footage'
                ]),
                'requirements' => json_encode([
                    'Basic knowledge of video editing concepts',
                    'Adobe After Effects installed',
                    'Powerful computer with dedicated graphics card',
                    'Previous experience with Adobe Creative Suite helpful'
                ]),
            ],

            // 7. Additional Professional Courses
            [
                'title' => 'Mobile App Development: React Native & Flutter Complete Course',
                'slug' => 'mobile-app-development-react-native-flutter',
                'description' => 'Build cross-platform mobile applications using React Native and Flutter. Learn to create iOS and Android apps from a single codebase with modern UI/UX design patterns.',
                'short_description' => 'Build iOS & Android apps with React Native and Flutter',
                'instructor_id' => $carlosInstructor ? $carlosInstructor->id : 6,
                'category_id' => $mobileAppCategory ? $mobileAppCategory->id : 13,
                'price' => 179.99,
                'discount_price' => 64.99,
                'image' => 'courses/mobile_app_development.jpg',
                'level' => 'Intermediate',
                'duration_hours' => 45,
                'duration_minutes' => 0,
                'total_lessons' => 180,
                'rating' => 4.7,
                'total_reviews' => 4800,
                'total_students' => 24000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Build native mobile apps using React Native',
                    'Create beautiful UIs with Flutter framework',
                    'Integrate APIs and backend services',
                    'Implement user authentication and data storage',
                    'Publish apps to App Store and Google Play',
                    'Use device features like camera, GPS, and notifications'
                ]),
                'requirements' => json_encode([
                    'Basic JavaScript knowledge',
                    'Understanding of programming concepts',
                    'Development environment setup (Android Studio/Xcode)',
                    'Smartphone for testing applications'
                ]),
            ],
            [
                'title' => 'Complete Programming Languages Bootcamp: Python, Java & C++',
                'slug' => 'complete-programming-languages-bootcamp',
                'description' => 'Master multiple programming languages including Python, Java, and C++. Learn data structures, algorithms, object-oriented programming, and build real-world projects.',
                'short_description' => 'Master Python, Java & C++ with data structures and algorithms',
                'instructor_id' => $ryanInstructor ? $ryanInstructor->id : 7,
                'category_id' => $programmingCategory ? $programmingCategory->id : 14,
                'price' => 199.99,
                'discount_price' => 74.99,
                'image' => 'courses/programming_languages.jpg',
                'level' => 'Beginner',
                'duration_hours' => 60,
                'duration_minutes' => 30,
                'total_lessons' => 240,
                'rating' => 4.8,
                'total_reviews' => 9500,
                'total_students' => 42000,
                'is_featured' => true,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Master Python programming for web development and data analysis',
                    'Build enterprise applications with Java',
                    'Create high-performance applications with C++',
                    'Understand data structures and algorithms',
                    'Implement object-oriented programming principles',
                    'Build desktop and console applications',
                    'Connect to databases and create APIs',
                    'Follow industry best practices and coding standards'
                ]),
                'requirements' => json_encode([
                    'Basic computer literacy',
                    'Logical thinking and problem-solving interest',
                    'No previous programming experience required',
                    'Code editor (VS Code recommended)'
                ]),
            ],
            [
                'title' => 'Database Management & SQL Mastery Course',
                'slug' => 'database-management-sql-mastery',
                'description' => 'Master database design, SQL queries, MySQL, PostgreSQL, and database administration. Learn to design efficient databases, write complex queries, and optimize database performance.',
                'short_description' => 'Master SQL, MySQL, PostgreSQL & database administration',
                'instructor_id' => $michaelInstructor ? $michaelInstructor->id : 3,
                'category_id' => $databaseCategory ? $databaseCategory->id : 15,
                'price' => 129.99,
                'discount_price' => 49.99,
                'image' => 'courses/database_management.jpg',
                'level' => 'Intermediate',
                'duration_hours' => 35,
                'duration_minutes' => 0,
                'total_lessons' => 140,
                'rating' => 4.7,
                'total_reviews' => 3200,
                'total_students' => 18000,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Design normalized database schemas',
                    'Write complex SQL queries and stored procedures',
                    'Master MySQL and PostgreSQL administration',
                    'Optimize database performance and indexing',
                    'Implement database security and backup strategies',
                    'Use database tools and management interfaces'
                ]),
                'requirements' => json_encode([
                    'Basic understanding of data and information systems',
                    'Logical thinking and analytical skills',
                    'Database software access (free versions available)'
                ]),
            ],
            [
                'title' => 'Cybersecurity Fundamentals & Ethical Hacking Course',
                'slug' => 'cybersecurity-ethical-hacking-course',
                'description' => 'Learn cybersecurity fundamentals, ethical hacking techniques, network security, and penetration testing. Understand security vulnerabilities and how to protect systems from cyber threats.',
                'short_description' => 'Learn ethical hacking, network security & cybersecurity best practices',
                'instructor_id' => $ryanInstructor ? $ryanInstructor->id : 7,
                'category_id' => $cybersecurityCategory ? $cybersecurityCategory->id : 16,
                'price' => 159.99,
                'discount_price' => 59.99,
                'image' => 'courses/cybersecurity.jpg',
                'level' => 'Intermediate',
                'duration_hours' => 38,
                'duration_minutes' => 45,
                'total_lessons' => 155,
                'rating' => 4.6,
                'total_reviews' => 2800,
                'total_students' => 14500,
                'is_featured' => false,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    'Understand cybersecurity threats and vulnerabilities',
                    'Learn ethical hacking and penetration testing',
                    'Implement network security measures',
                    'Use security tools and frameworks',
                    'Develop incident response procedures',
                    'Create security policies and best practices'
                ]),
                'requirements' => json_encode([
                    'Basic networking and computer system knowledge',
                    'Understanding of IT infrastructure',
                    'Virtual machine setup capability',
                    'Strong ethical commitment to responsible security practices'
                ]),
            ]
        ];

        // Generate additional courses to reach 50 total
        $additionalCourseTemplates = [
            'Frontend Development with Vue.js & Nuxt.js',
            'Backend Development with Express.js & MongoDB',
            'Android App Development with Kotlin',
            'iOS Development with Swift & SwiftUI',
            'DevOps with Docker & Kubernetes',
            'AWS Cloud Computing Fundamentals',
            'Google Cloud Platform Complete Guide',
            'Microsoft Azure Cloud Solutions',
            'Machine Learning with Python & Scikit-learn',
            'Deep Learning with TensorFlow & Keras',
            'Data Analysis with Pandas & NumPy',
            'Business Intelligence with Power BI',
            'Digital Marketing & SEO Mastery',
            'Social Media Marketing Complete Course',
            'Content Marketing & Copywriting',
            'E-commerce with Shopify & WooCommerce',
            'WordPress Development & Customization',
            'Photoshop for Web Designers',
            'Figma UI/UX Design Complete Course',
            'Adobe Illustrator for Beginners',
            'Video Editing with Final Cut Pro',
            'Audio Production & Podcast Creation',
            '3D Modeling with Blender',
            'Game Development with Unity',
            'Blockchain Development with Solidity',
            'Cryptocurrency & DeFi Fundamentals',
            'Internet of Things (IoT) with Arduino',
            'Raspberry Pi Programming & Projects',
            'Linux System Administration',
            'Network Security & Firewall Configuration',
            'Penetration Testing with Kali Linux',
            'Digital Forensics & Incident Response'
        ];

        // Get all categories for random assignment
        $allCategories = Category::all();
        
        // Add additional courses
        foreach ($additionalCourseTemplates as $index => $templateTitle) {
            $courseIndex = count($courses) + 1;
            $instructor = [$johnInstructor, $sarahInstructor, $emilyInstructor, $michaelInstructor, $davidInstructor, $mariaInstructor, $ahmedInstructor, $jenniferInstructor, $robertInstructor, $lisaInstructor][array_rand([$johnInstructor, $sarahInstructor, $emilyInstructor, $michaelInstructor, $davidInstructor, $mariaInstructor, $ahmedInstructor, $jenniferInstructor, $robertInstructor, $lisaInstructor])];
            $category = $allCategories->random();
            $level = ['Beginner', 'Intermediate', 'Advanced'][array_rand(['Beginner', 'Intermediate', 'Advanced'])];
            $price = rand(99, 299) + 0.99;
            $discountPrice = round($price * (rand(30, 70) / 100), 2);
            
            $courses[] = [
                'title' => $templateTitle,
                'slug' => Str::slug($templateTitle) . '-' . $courseIndex,
                'description' => "Master $templateTitle with this comprehensive course. Learn from industry experts through hands-on projects and practical exercises. This course covers everything from fundamental concepts to advanced techniques, preparing you for real-world applications. Perfect for beginners and professionals looking to enhance their skills.",
                'short_description' => "Learn $templateTitle from basics to advanced level with practical projects",
                'instructor_id' => $instructor ? $instructor->id : rand(1, 10),
                'category_id' => $category ? $category->id : rand(1, 16),
                'price' => $price,
                'discount_price' => $discountPrice,
                'image' => 'courses/course-' . ($courseIndex % 20 + 1) . '.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=demo-' . $courseIndex,
                'level' => $level,
                'duration_hours' => rand(20, 60),
                'duration_minutes' => rand(0, 59),
                'total_lessons' => rand(50, 250),
                'rating' => round(rand(40, 50) / 10, 1),
                'total_reviews' => rand(500, 5000),
                'total_students' => rand(1000, 25000),
                'is_featured' => $courseIndex <= 15,
                'is_active' => true,
                'what_you_learn' => json_encode([
                    "Master the fundamentals of $templateTitle",
                    'Build practical projects and real-world applications',
                    'Understand industry best practices and standards',
                    'Learn from experienced professionals',
                    'Get hands-on experience with modern tools',
                    'Prepare for career opportunities in the field'
                ]),
                'requirements' => json_encode([
                    'Basic computer skills',
                    'Reliable internet connection',
                    'Enthusiasm to learn and practice',
                    'No prior experience required for beginner courses'
                ]),
            ];
        }

        foreach ($courses as $course) {
            // Generate slug if not provided
            if (!isset($course['slug'])) {
                $course['slug'] = Str::slug($course['title']);
            }
            
            Course::updateOrCreate(
                ['slug' => $course['slug']], // Find by slug
                $course
            );
        }
    }
}

