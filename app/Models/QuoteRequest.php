<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = ['name', 'email', 'message', 'total'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}