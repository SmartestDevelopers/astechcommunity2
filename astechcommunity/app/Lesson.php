<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lesson extends Model
{
    protected $fillable = [
        'course_id', 'title', 'slug', 'description', 'content', 'video_url', 
        'video_duration', 'attachments', 'sort_order', 'is_preview', 'is_active',
        'meta_title', 'meta_description'
    ];
    
    protected $casts = [
        'attachments' => 'array',
        'is_preview' => 'boolean',
        'is_active' => 'boolean',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lesson) {
            if (empty($lesson->slug)) {
                $lesson->slug = Str::slug($lesson->title);
            }
        });
    }
}
