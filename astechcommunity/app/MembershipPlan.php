<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'billing_cycle', 'original_price',
        'discount_percentage', 'features', 'limitations', 'max_courses', 'max_downloads',
        'has_mentorship', 'has_certificates', 'has_career_services', 'is_popular',
        'is_active', 'sort_order', 'stripe_price_id', 'color_scheme', 'meta_title',
        'meta_description', 'meta_keywords'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'discount_percentage' => 'integer',
        'features' => 'array',
        'limitations' => 'array',
        'has_mentorship' => 'boolean',
        'has_certificates' => 'boolean',
        'has_career_services' => 'boolean',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
