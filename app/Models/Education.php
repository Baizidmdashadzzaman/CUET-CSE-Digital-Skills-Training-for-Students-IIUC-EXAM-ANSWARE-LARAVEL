<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = ['institute', 'institute_logo', 'degree', 'subject', 'passing_year'];
}
