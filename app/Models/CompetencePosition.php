<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetencePosition extends Model
{
    use HasFactory;
    protected $table = 'competences_positions';
    protected $fillable =
        [
            'position_id',
            'competence_id'
        ];
}
