<?php

use Illuminate\Database\Seeder;
use App\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseServices = [
            [
                'title' => 'Custom Website Development',
                'short_description' => 'Responsive and modern websites built with Laravel/Vue.',
                'description' => 'We build scalable, secure, and SEO-friendly websites tailored to your business needs using Laravel, Vue.js and Tailwind CSS.',
                'icon' => 'icon-code',
                'price' => 1499.00,
                'price_type' => 'fixed',
                'features' => [
                    'Responsive Design', 'SEO Optimized', 'Admin Panel', 'Contact Forms', 'Performance Optimized'
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'E-commerce Store Setup',
                'short_description' => 'Full e-commerce solution with payment integration.',
                'description' => 'Complete e-commerce setup with product catalog, cart, checkout, payment gateway integration, and order management.',
                'icon' => 'icon-basket',
                'price' => 2499.00,
                'price_type' => 'fixed',
                'features' => ['Product Management', 'Cart & Checkout', 'Payment Integration', 'Order Tracking'],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Mobile App Development',
                'short_description' => 'iOS and Android apps using React Native or Flutter.',
                'description' => 'Cross-platform mobile applications with beautiful UI/UX, API integration, and push notifications.',
                'icon' => 'icon-mobile',
                'price' => 4999.00,
                'price_type' => 'fixed',
                'features' => ['iOS & Android', 'Push Notifications', 'API Integration', 'App Store Publishing'],
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        $services = $baseServices;

        // Add up to 50 total
        for ($i = count($services) + 1; $i <= 50; $i++) {
            $title = 'Professional Service Package ' . $i;
            $services[] = [
                'title' => $title,
                'short_description' => 'High-quality tech service covering deliverables and support.',
                'description' => 'Comprehensive service offering to meet your business goals with clear scope, deliverables, and timelines.',
                'icon' => 'icon-star',
                'price' => rand(500, 5000),
                'price_type' => 'fixed',
                'features' => ['Consultation', 'Design', 'Development', 'QA & Testing', 'Deployment'],
                'is_featured' => $i % 7 === 0,
                'is_active' => true,
            ];
        }

        foreach ($services as $service) {
            $service['slug'] = Str::slug($service['title']);
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
