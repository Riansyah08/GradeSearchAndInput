<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
