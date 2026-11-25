<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

     protected $fillable = [
    'title',
    'location',
    'description',
    'before_image',
    'after_image',
];
}