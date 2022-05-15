<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AducationLevel extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'code',
            'preparation_level_id',
        ];
}
