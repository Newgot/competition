<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetenceRequest;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function all()
    {
        $competences = Competence::all();
        return view('competences.main', [
            'competences' => $competences
        ]);
    }

    public function add()
    {
        return view('competences.add');
    }

    public function create(CompetenceRequest $request)
    {
        Competence::create($request->all());
        return redirect(route('c.all'));
    }

    public function edit($id)
    {
        $competence = Competence::findOrFail($id);
        if (!empty($competence)) {
            return view('competences.edit', [
                'competence' => $competence,
            ]);
        }
        return redirect(route('c.all'));
    }

    public function update(CompetenceRequest $request)
    {
        $competence = Competence::findOrFail($request->id);
        if (!empty($competence)) {
            $competence->update($request->all());
        }
        return redirect(route('c.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $competence = Competence::findOrFail($id);
        if (!empty($competence)) {
            $competence->delete();
        }
        return redirect(route('c.all'));
    }
}
