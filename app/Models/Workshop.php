<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = ['event_id', 'title', 'description', 'capacity'];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
