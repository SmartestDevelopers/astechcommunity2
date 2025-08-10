<?php

use Illuminate\Database\Seeder;
use App\Event;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventTypes = [
            'Workshop', 'Webinar', 'Conference', 'Meetup', 'Bootcamp', 'Seminar', 
            'Training', 'Hackathon', 'Panel Discussion', 'Networking Event'
        ];

        $technologies = [
            'React', 'Laravel', 'Python', 'JavaScript', 'Node.js', 'AI/ML', 'DevOps',
            'Cloud Computing', 'Cybersecurity', 'Mobile Development', 'UI/UX Design',
            'Data Science', 'Blockchain', 'IoT', 'AR/VR', 'Full Stack Development'
        ];

        $locations = [
            'Virtual Event', 'Karachi Tech Hub', 'Lahore Innovation Center', 'Islamabad Convention Center',
            'Online Platform', 'AS-Tech Community Center', 'University of Technology', 'Business District Conference Hall',
            'Tech Park Auditorium', 'Innovation Lab', 'Startup Incubator', 'Co-working Space',
            'Hotel Conference Room', 'Corporate Training Center', 'Digital Campus'
        ];

        $organizers = [
            ['name' => 'AS-Tech Community', 'email' => 'events@astechcommunity.com', 'phone' => '+92-300-1234567'],
            ['name' => 'Tech Innovators Pakistan', 'email' => 'info@techinnovators.pk', 'phone' => '+92-300-2345678'],
            ['name' => 'Digital Skills Academy', 'email' => 'contact@digitalskills.edu', 'phone' => '+92-300-3456789'],
            ['name' => 'Future Developers Guild', 'email' => 'hello@futuredevs.org', 'phone' => '+92-300-4567890'],
            ['name' => 'Women in Tech Pakistan', 'email' => 'admin@womenintech.pk', 'phone' => '+92-300-5678901']
        ];

        for ($i = 1; $i <= 50; $i++) {
            $eventType = $eventTypes[array_rand($eventTypes)];
            $technology = $technologies[array_rand($technologies)];
            $location = $locations[array_rand($locations)];
            $organizer = $organizers[array_rand($organizers)];
            
            // Generate event date (mix of past and future events)
            $isUpcoming = rand(1, 10) > 3; // 70% upcoming events
            $eventDate = $isUpcoming 
                ? Carbon::now()->addDays(rand(1, 180))
                : Carbon::now()->subDays(rand(1, 90));
            
            $eventEndDate = (clone $eventDate)->addHours(rand(2, 8));
            
            $titles = [
                "$technology $eventType: Mastering Modern Development",
                "Advanced $technology Techniques $eventType",
                "$eventType: Introduction to $technology for Beginners",
                "Professional $technology Development $eventType",
                "$technology Best Practices $eventType",
                "Complete $technology Mastery $eventType",
                "$technology and Future Technologies $eventType",
                "Hands-on $technology $eventType",
                "$technology Career Development $eventType",
                "Industry Expert $technology $eventType"
            ];
            
            $title = $titles[array_rand($titles)];
            $slug = Str::slug($title) . '-' . $i;
            
            $descriptions = [
                "Join us for an intensive $eventType focused on $technology. This comprehensive session will cover fundamental concepts, best practices, and real-world applications. Perfect for developers looking to enhance their skills and stay ahead in the competitive tech industry.",
                "Discover the latest trends and techniques in $technology during this engaging $eventType. Our expert speakers will share insights from years of industry experience, providing valuable knowledge for both beginners and experienced professionals.",
                "This $eventType is designed to provide hands-on experience with $technology. Participants will work on practical projects, learn from industry experts, and network with like-minded professionals in an interactive environment.",
                "Explore the world of $technology in this comprehensive $eventType. Whether you're starting your journey or looking to advance your career, this event offers valuable insights, networking opportunities, and practical knowledge."
            ];
            
            $description = $descriptions[array_rand($descriptions)];
            $shortDescription = substr($description, 0, 150) . '...';
            
            // Pricing logic
            $isFree = rand(1, 10) > 6; // 40% free events
            $price = $isFree ? 0 : rand(500, 5000);
            
            $maxAttendees = rand(20, 200);
            $currentAttendees = $isUpcoming ? rand(5, min($maxAttendees - 10, $maxAttendees * 0.8)) : rand($maxAttendees * 0.6, $maxAttendees);
            
            Event::create([
                'title' => $title,
                'slug' => $slug,
                'description' => $description . "\n\nWhat you'll learn:\n- Core concepts and fundamentals\n- Industry best practices\n- Hands-on practical exercises\n- Real-world project examples\n- Career development tips\n\nWho should attend:\n- Developers and programmers\n- Students and fresh graduates\n- IT professionals looking to upskill\n- Entrepreneurs and tech enthusiasts",
                'short_description' => $shortDescription,
                'event_date' => $eventDate,
                'event_end_date' => $eventEndDate,
                'location' => $location,
                'address' => $location === 'Virtual Event' || $location === 'Online Platform' 
                    ? 'Online - Link will be shared before the event' 
                    : 'Office # ' . rand(100, 999) . ', Block ' . chr(rand(65, 90)) . ', ' . $location,
                'price' => $price,
                'image' => 'events/event-' . ($i % 12 + 1) . '.jpg',
                'max_attendees' => $maxAttendees,
                'current_attendees' => $currentAttendees,
                'organizer_name' => $organizer['name'],
                'organizer_email' => $organizer['email'],
                'organizer_phone' => $organizer['phone'],
                'is_featured' => $i <= 8, // First 8 are featured
                'is_active' => true,
                'meta_title' => $title,
                'meta_description' => $shortDescription
            ]);
        }
    }
}
