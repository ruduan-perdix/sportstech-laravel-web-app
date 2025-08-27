<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['programme_id', 'name', 'quantity'];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
