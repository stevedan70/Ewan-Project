<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'location',
        'date_time',
        'involved_student_name',
        'status',
        'description',
        'file_1',
        'file_2',
        'file_3',
        'is_private'
    ];
}
