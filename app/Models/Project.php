<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'image',
        'status',
        'date',
    ];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/no-photo.jpg'); // Image de fallback si manquante
        }

        if (Str::startsWith($this->image, 'http')) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }
    
    protected static function booted()
    {
        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });
    }
}
