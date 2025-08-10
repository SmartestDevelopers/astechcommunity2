<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ClientApplication extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'company_name', 'industry',
        'project_description', 'budget_range', 'timeline', 'required_skills',
        'region', 'website', 'linkedin', 'status'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'required_skills' => 'array',
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
