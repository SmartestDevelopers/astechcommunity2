<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'title',
        'bio',
        'profile_image',
        'skills',
        'hourly_rate',
        'currency',
        'experience_years',
        'location',
        'available_remote',
        'availability_status',
        'rating',
        'reviews_count',
        'projects_completed',
        'portfolio_links',
        'linkedin_url',
        'github_url',
        'website_url',
        'languages',
        'preferred_project_types',
        'is_verified',
        'is_featured',
        'is_active',
        'last_active_at',
    ];

    protected $casts = [
        'skills' => 'array',
        'portfolio_links' => 'array',
        'languages' => 'array',
        'available_remote' => 'boolean',
        'is_verified' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'rating' => 'decimal:1',
        'hourly_rate' => 'decimal:2',
        'last_active_at' => 'datetime',
    ];
}
