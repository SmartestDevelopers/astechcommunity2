<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class MentorApplication extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'profession', 'experience_years',
        'expertise_areas', 'bio', 'education', 'certifications', 'availability',
        'mentorship_type', 'linkedin', 'portfolio_link', 'picture',
        'willing_to_volunteer', 'status'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'willing_to_volunteer' => 'boolean',
    ];

    /**
     * Hash the password when setting it
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the status badge class
     */
    public function getStatusBadgeClassAttribute()
    {
        $classes = [
            'pending' => 'bg-yellow-100 text-yellow-800',
            'approved' => 'bg-green-100 text-green-800',
            'rejected' => 'bg-red-100 text-red-800',
        ];
        
        return $classes[$this->status] ?? 'bg-gray-100 text-gray-800';
    }
}
