<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['registration_id', 'code', 'checked_in_at'];
    protected $casts = ['checked_in_at' => 'datetime'];
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
