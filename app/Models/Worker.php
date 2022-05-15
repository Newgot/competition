<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'fatherName',
        'dateStart',
        'academic_title_id',
        'academic_degree_id',
        'attraction_id',
        'additional_aducation_id',
        'preparation_id',
        'aducation_level_id',
    ];

    public function getDateStartAttribute($key)
    {
        return Carbon::create($key)->locale('ru')->format('d M Y');
    }

}
