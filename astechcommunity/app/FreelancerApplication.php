<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class FreelancerApplication extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'profession', 'region', 'skills',
        'about', 'portfolio_link', 'linkedin', 'fiverr', 'facebook', 'upwork',
        'picture', 'apply_for_interview', 'status'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'skills' => 'array',
        'apply_for_interview' => 'boolean',
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
