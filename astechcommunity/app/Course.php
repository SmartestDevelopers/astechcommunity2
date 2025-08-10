<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'short_description', 'instructor_id', 'category_id',
        'price', 'discount_price', 'image', 'video_url', 'level', 'duration_hours', 
        'duration_minutes', 'total_lessons', 'rating', 'total_reviews', 'total_students',
        'is_featured', 'is_active', 'meta_title', 'meta_description', 'what_you_learn', 'requirements'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'what_you_learn' => 'array',
        'requirements' => 'array',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(CourseReview::class);
    }
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->discount_price && $this->price > 0) {
            return round((($this->price - $this->discount_price) / $this->price) * 100);
        }
        return 0;
    }

    public function getFinalPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    /**
     * Get the course image URL with fallback to placeholder
     */
    public function getImageUrlAttribute()
    {
        // If course has an image and it exists in storage
        if ($this->image) {
            $storagePath = storage_path('app/public/' . $this->image);
            if (file_exists($storagePath)) {
                return asset('storage/' . $this->image);
            }
        }

        // Fallback to default placeholder based on course category or random
        $placeholderNumber = $this->getPlaceholderNumber();
        return asset('template/img/coursesCards/' . $placeholderNumber . '.png');
    }

    /**
     * Get placeholder image number based on category or course ID
     */
    private function getPlaceholderNumber()
    {
        // Map course categories to specific placeholder images
        $categoryPlaceholderMap = [
            'ms-office' => 1,
            'website-designing' => 2,
            'web-development' => 3,
            'computerized-accounting' => 4,
            'computer-hardware' => 5,
            'video-editing' => 6,
            'mobile-app-development' => 7,
            'programming-languages' => 8,
            'database-management' => 9,
            'cybersecurity' => 10,
            'digital-marketing' => 11,
            'graphic-design' => 12,
        ];

        // Try to get placeholder based on category
        if ($this->category && isset($categoryPlaceholderMap[$this->category->slug])) {
            return $categoryPlaceholderMap[$this->category->slug];
        }

        // Fallback to course ID modulo 12 (ensuring we use images 1-12)
        return (($this->id - 1) % 12) + 1;
    }

    /**
     * Check if the course has a valid image
     */
    public function hasValidImage()
    {
        if (!$this->image) {
            return false;
        }

        $storagePath = storage_path('app/public/' . $this->image);
        return file_exists($storagePath);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);
            }
        });

        static::updating(function ($course) {
            if ($course->isDirty('title') && empty($course->slug)) {
                $course->slug = Str::slug($course->title);
            }
        });
    }
}
