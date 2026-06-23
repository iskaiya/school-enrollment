<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Add this property to allow your CSV script to write to these columns
    protected $fillable = [
        'code',
        'title',
        'department',
        'units',
    ];
}
