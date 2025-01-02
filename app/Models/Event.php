<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'date',
        'start_time',
        'end_time',
        'cost'
    ];

    // Event.php (Event Model)
    public function registeredEvents()
    {
        return $this->hasMany(RegisteredEvent::class);
    }
}
