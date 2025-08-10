<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Web Development',
                'description' => 'Courses on front-end and back-end development.',
                'image' => 'categories/web_development.png',
                'icon' => 'icon-web',
                'color' => '#FFC107',
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Learn SEO, social media, and content marketing.',
                'image' => 'categories/digital_marketing.png',
                'icon' => 'icon-marketing',
                'color' => '#4CAF50',
            ],
            [
                'name' => 'Graphic Design',
                'description' => 'Master design principles and tools like Photoshop and Illustrator.',
                'image' => 'categories/graphic_design.png',
                'icon' => 'icon-design',
                'color' => '#E91E63',
            ],
            [
                'name' => 'Data Science',
                'description' => 'Explore data analysis, machine learning, and AI.',
                'image' => 'categories/data_science.png',
                'icon' => 'icon-data',
                'color' => '#2196F3',
            ],
            [
                'name' => 'Business',
                'description' => 'Courses on entrepreneurship, finance, and management.',
                'image' => 'categories/business.png',
                'icon' => 'icon-business',
                'color' => '#FF5722',
            ],
            [
                'name' => 'Photography',
                'description' => 'Learn the art and technique of taking stunning photos.',
                'image' => 'categories/photography.png',
                'icon' => 'icon-camera',
                'color' => '#9C27B0',
            ],
            [
                'name' => 'Personal Development',
                'description' => 'Improve your skills in communication, leadership, and productivity.',
                'image' => 'categories/personal_development.png',
                'icon' => 'icon-self-improvement',
                'color' => '#607D8B',
            ],
            [
                'name' => 'MS Office',
                'description' => 'Master Microsoft Office applications including Word, Excel, PowerPoint, Access, and Outlook.',
                'image' => 'categories/ms_office.png',
                'icon' => 'icon-office',
                'color' => '#0078D4',
            ],
            [
                'name' => 'Website Designing',
                'description' => 'Learn front-end web technologies including HTML, CSS, JavaScript, jQuery, and Bootstrap.',
                'image' => 'categories/website_designing.png',
                'icon' => 'icon-design-web',
                'color' => '#FF6B35',
            ],
            [
                'name' => 'Computerized Accounting',
                'description' => 'Master accounting software including Tally, QuickBooks, Peachtree, and advanced Excel.',
                'image' => 'categories/accounting.png',
                'icon' => 'icon-accounting',
                'color' => '#28A745',
            ],
            [
                'name' => 'Computer Hardware',
                'description' => 'Learn computer repair, motherboard fixing, RAM repair, and system installation.',
                'image' => 'categories/hardware.png',
                'icon' => 'icon-hardware',
                'color' => '#6C757D',
            ],
            [
                'name' => 'Video Editing',
                'description' => 'Master video editing techniques including green screen, sound editing, and animation.',
                'image' => 'categories/video_editing.png',
                'icon' => 'icon-video',
                'color' => '#DC3545',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Build native and cross-platform mobile applications for Android and iOS.',
                'image' => 'categories/mobile_app.png',
                'icon' => 'icon-mobile',
                'color' => '#17A2B8',
            ],
            [
                'name' => 'Programming Languages',
                'description' => 'Learn popular programming languages like Python, Java, C++, and more.',
                'image' => 'categories/programming.png',
                'icon' => 'icon-code',
                'color' => '#6610F2',
            ],
            [
                'name' => 'Database Management',
                'description' => 'Master database design, SQL, MySQL, PostgreSQL, and database administration.',
                'image' => 'categories/database.png',
                'icon' => 'icon-database',
                'color' => '#FD7E14',
            ],
            [
                'name' => 'Cybersecurity',
                'description' => 'Learn ethical hacking, network security, and cybersecurity best practices.',
                'image' => 'categories/cybersecurity.png',
                'icon' => 'icon-security',
                'color' => '#20C997',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])], // Find by slug
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'image' => $category['image'],
                    'icon' => $category['icon'],
                    'color' => $category['color'],
                    'is_active' => true,
                ]
            );
        }
    }
}

