<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Competence;
use App\Models\Position;
use App\Models\CompetencePosition;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function all()
    {
        $positions = Position::all();
        return view('positions.all', [
            'positions' => $positions
        ]);
    }

    public function add()
    {
        return view('positions.add');
    }

    public function create(PositionRequest $request)
    {
        Position::create($request->all());
        return redirect(route('p.all'));
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        if (!empty($position)) {
            $competencesPosition = $position->belongsToMany(Competence::class, 'competences_positions')->get();
            $competencesAll = Competence::all();
            $competencesEmpty = $competencesAll->diff($competencesPosition);
            return view('positions.edit', [
                'position' => $position,
                'competencesEmpty' => $competencesEmpty,
                'competencesPosition' => $competencesPosition,
            ]);
        }
        return redirect(route('p.all'));
    }

    public function update(PositionRequest $request)
    {
        $position = Position::findOrFail($request->id);
        if (!empty($position)) {
            $position->update($request->all());
        }
        return redirect(route('p.all'));
    }

    public function delete($id)
    {
        $position = Position::findOrFail($id);
        if (!empty($position)) {
            $position->delete();
        }
        return redirect(route('p.all'));
    }
    public function bindCompetence($idPosition, $idCompetence)
    {
        $position = Position::findOrFail($idPosition);
        $competence = Competence::findOrFail($idCompetence);
        $competencePosition = CompetencePosition::where([
            'competence_id' => $idCompetence,
            'position_id' => $idPosition,
        ])->get();
        if ($position && $competence && !count($competencePosition)) {
            CompetencePosition::create([
                'competence_id' => $idCompetence,
                'position_id' => $idPosition,
            ]);
        }
        return redirect(route('p.edit', ['id' => $idPosition]));
    }

    public function unbindCompetence($idPosition, $idCompetence) {
        $competencePositions = CompetencePosition::where([
            'competence_id' => $idCompetence,
            'position_id' => $idPosition,
        ])->get();
        foreach ($competencePositions as $competencePosition) {
            $competencePosition->delete();
        }
        return redirect(route('p.edit', ['id' => $idPosition]));
    }

}
