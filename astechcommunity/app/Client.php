<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'company_name', 'slug', 'description', 'industry', 'logo', 'website_url',
        'contact_email', 'contact_phone', 'contact_person_name', 'contact_person_title',
        'address', 'city', 'country', 'company_size', 'employees_count', 'founded_year',
        'services_needed', 'technologies_used', 'project_budget_min', 'project_budget_max',
        'partnership_type', 'partnership_status', 'is_featured', 'is_active',
        'projects_completed', 'satisfaction_rating', 'testimonial', 'testimonial_author',
        'linkedin_url', 'twitter_url', 'last_interaction_at'
    ];

    protected $casts = [
        'services_needed' => 'array',
        'technologies_used' => 'array',
        'project_budget_min' => 'decimal:2',
        'project_budget_max' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'projects_completed' => 'integer',
        'satisfaction_rating' => 'decimal:2',
        'last_interaction_at' => 'datetime',
    ];
}
