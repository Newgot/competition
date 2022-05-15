<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'preparation_level_id',
        'professorOnly',
    ];

    public function preparationLevel()
    {
        return $this->belongsTo(PreparationLevel::class);
    }
}
