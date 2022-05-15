<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\AcademicDegree;
use App\Models\AcademicTitle;
use App\Models\AdditionalAducation;
use App\Models\AducationLevel;
use App\Models\Attraction;
use App\Models\Competence;
use App\Models\ComptetencePreparationWorker;
use App\Models\Preparation;
use App\Models\Worker;
use App\Models\CompetenceWorker;
use Carbon\Carbon;
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
        $academicDegrees = AcademicDegree::all();
        $academicTitles = AcademicTitle::all();
        $attractions = Attraction::all();
        $additionalAducations = AdditionalAducation::all();
        $aducationLevels = AducationLevel::all();
        $preparations = Preparation::all();
        return view('workers.add', [
            'academicTitles' => $academicTitles,
            'academicDegrees' => $academicDegrees,
            'attractions' => $attractions,
            'aducationLevels' => $aducationLevels,
            'additionalAducations' => $additionalAducations,
            'preparations' => $preparations,
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
        $worker->calendarDate = Carbon::create($worker->dateStart)->locale('ru')->format('Y-m-d');
        if (!empty($worker)) {
            $competencesWorker = $worker->belongsToMany(Competence::class, 'comptetence_workers')->get();
            $competencesAll = Competence::all();
            $competencesEmpty = $competencesAll->diff($competencesWorker);
            $academicDegrees = AcademicDegree::all();
            $academicTitles = AcademicTitle::all();
            $attractions = Attraction::all();
            $additionalAducations = AdditionalAducation::all();
            $aducationLevels = AducationLevel::all();
            $preparations = Preparation::all();
            return view('workers.edit', [
                'worker' => $worker,
                'competencesEmpty' => $competencesEmpty,
                'competencesWorker' => $competencesWorker,
                'academicTitles' => $academicTitles,
                'academicDegrees' => $academicDegrees,
                'attractions' => $attractions,
                'aducationLevels' => $aducationLevels,
                'additionalAducations' => $additionalAducations,
                'preparations' => $preparations,
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
