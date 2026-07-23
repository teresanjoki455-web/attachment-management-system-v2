<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Tells Laravel which table to connect to in phpMyAdmin
    protected $table = 'applications';

    // Allows columns to accept form data safely
    protected $fillable = [
        'student_id',
        'name',
        'company_name',
        'job_title',
        'status',
    ];
}