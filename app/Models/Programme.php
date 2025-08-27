<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Programme extends Model
{
    use HasFactory;

    // Optional: explicitly define table if it doesn’t match pluralization
    protected $table = 'programmes';

    // Define which fields are mass-assignable
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
    ];
    protected $appends = ['duration'];

    // Calculate duration
        public function getDurationAttribute()
        {
        if ($this->start_date && $this->end_date) {
            return Carbon::parse($this->start_date)->diffInDays(Carbon::parse($this->end_date));
        }
        return null;
        }

    // Add Exercises
        public function exercises()
        {
            return $this->hasMany(Exercise::class);
        }
}
