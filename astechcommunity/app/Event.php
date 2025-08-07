<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'short_description', 'event_date', 'event_end_date',
        'location', 'address', 'price', 'image', 'max_attendees', 'current_attendees',
        'organizer_name', 'organizer_email', 'organizer_phone', 'is_featured', 'is_active',
        'meta_title', 'meta_description'
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'event_end_date' => 'datetime',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', Carbon::now())
                    ->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getAvailableSpotsAttribute()
    {
        if ($this->max_attendees) {
            return $this->max_attendees - $this->current_attendees;
        }
        return null;
    }

    public function getIsFullAttribute()
    {
        if ($this->max_attendees) {
            return $this->current_attendees >= $this->max_attendees;
        }
        return false;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });

        static::updating(function ($event) {
            if ($event->isDirty('title') && empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }
}
