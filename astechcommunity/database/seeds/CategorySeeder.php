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

