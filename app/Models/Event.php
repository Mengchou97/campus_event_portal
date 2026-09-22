<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['organizer_id', 'title', 'description', 'location', 'starts_at', 'ends_at', 'status'];
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
