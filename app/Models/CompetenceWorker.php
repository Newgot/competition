<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceWorker extends Model
{
    use HasFactory;
    protected $table = 'competences_workers';
    protected $fillable =
        [
            'worker_id',
            'competence_id'
        ];
}
