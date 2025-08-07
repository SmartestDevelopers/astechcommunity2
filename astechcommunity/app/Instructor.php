<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Instructor extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'bio', 'image', 'specialization', 
        'rating', 'total_students', 'total_courses', 'facebook', 'twitter', 
        'instagram', 'linkedin', 'is_active', 'meta_title', 'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($instructor) {
            if (empty($instructor->slug)) {
                $instructor->slug = Str::slug($instructor->name);
            }
        });

        static::updating(function ($instructor) {
            if ($instructor->isDirty('name') && empty($instructor->slug)) {
                $instructor->slug = Str::slug($instructor->name);
            }
        });
    }
}
