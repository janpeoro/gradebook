<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingComponent extends Model
{
    use HasFactory;

    // Define the table if it's not the default
    protected $table = 'grading_components';

    protected $fillable = [
        'class_standing',
        'percentage',
        'assessment_type',
        'assessment_percentage',
    ];
}