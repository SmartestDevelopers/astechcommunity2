<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    protected $fillable = [
        'freelancer_id',
        'client_name',
        'client_email',
        'project_brief',
        'status',
    ];

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
}


