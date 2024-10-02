<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStanding extends Model
{
    use HasFactory;

    protected $fillable = ['standing', 'percentage', 'assessments'];

    // Decode the assessments JSON when retrieving it
    public function getAssessmentsAttribute($value)
    {
        return json_decode($value, true);
    }
}
