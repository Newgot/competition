<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionWorker extends Model
{
    use HasFactory;

    protected $fillable = ['position_id','worker_id'];

    public function getPositionAttribute() {
        return Position::find($this->position_id);
    }

    public function getWorkerAttribute()
    {
        return Worker::find($this->worker_id);
    }

    public function getMissingCompetenciesAttribute()
    {
        $position = Position::find($this->position_id);
        $worker = Worker::find($this->worker_id);

        $positionCompetences = $position->belongsToMany(Competence::class, 'competences_positions')->get();
        $workerCompetences = $worker->belongsToMany(Competence::class, 'comptetence_workers')->get();
        return $positionCompetences->diff($workerCompetences);
    }
}
