<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ApiPlatform\Metadata\ApiResource;


#[ApiResource]
class QuoteRequest extends Model
{
    protected $fillable = ['name', 'email', 'message', 'total'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}