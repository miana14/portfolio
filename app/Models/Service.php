<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
    ];
}
