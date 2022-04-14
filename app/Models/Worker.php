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
        'dob',
    ];

    public function getDobAttribute($key)
    {
        return Carbon::create($key)->locale('ru')->format('d M Y');
    }
}
