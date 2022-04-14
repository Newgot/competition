<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Competence;
use App\Models\Worker;
use App\Models\CompetenceWorker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function all()
    {
        $workers = Worker::all();
        return view('workers.all', [
            'workers' => $workers,
        ]);
    }

    public function add()
    {
        $competences = Competence::all();
        return view('workers.add', [
            'competences' => $competences,
        ]);
    }

    public function create(WorkerRequest $request)
    {
        Worker::create($request->all());
        return redirect(route('w.all'));
    }

    public function edit($id)
    {
        $worker = Worker::findOrFail($id);
        if (!empty($worker)) {
            $competencesWorker = $worker->belongsToMany(Competence::class, 'competences_workers')->get();
            $competencesAll = Competence::all();
            $competencesEmpty = $competencesAll->diff($competencesWorker);

            return view('workers.edit', [
                'worker' => $worker,
                'competencesEmpty' => $competencesEmpty,
                'competencesWorker' => $competencesWorker,
            ]);
        }
        return redirect(route('w.all'));
    }

    public function update(WorkerRequest $request)
    {
        $worker = Worker::findOrFail($request->id);
        if (!empty($worker)) {
            $worker->update($request->all());
        }
        return redirect(route('w.all'));
    }

    public function delete($id)
    {
        $worker = Worker::findOrFail($id);
        if (!empty($worker)) {
            $worker->delete();
        }
        return redirect(route('w.all'));
    }

    public function bindCompetence($idWorker, $idCompetence)
    {
        $worker = Worker::findOrFail($idWorker);
        $competence = Competence::findOrFail($idCompetence);
        $competenceWorker = CompetenceWorker::where([
            'competence_id' => $idCompetence,
            'worker_id' => $idWorker,
        ])->get();
        if ($worker && $competence && !count($competenceWorker)) {
            CompetenceWorker::create([
                'competence_id' => $idCompetence,
                'worker_id' => $idWorker,
            ]);
        }
        return redirect(route('w.edit', ['id' => $idWorker]));
    }

    public function unbindCompetence($idWorker, $idCompetence) {
        $competenceWorkers = CompetenceWorker::where([
            'competence_id' => $idCompetence,
            'worker_id' => $idWorker,
        ])->get();
        foreach ($competenceWorkers as $competenceWorker) {
            $competenceWorker->delete();
        }
        return redirect(route('w.edit', ['id' => $idWorker]));
    }
}
