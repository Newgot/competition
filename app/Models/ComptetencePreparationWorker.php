<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComptetencePreparationWorker extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'worker_id',
            'competence_id',
            'preparation_id',
        ];
}
