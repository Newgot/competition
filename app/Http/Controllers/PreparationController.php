<?php

namespace App\Http\Controllers;

use App\Models\Preparation;
use App\Models\PreparationLevel;
use Illuminate\Http\Request;

class PreparationController extends Controller
{
    public function all()
    {
        $preparations = Preparation::all();
        return view(
            'preparations.all',
            [
                'preparations' => $preparations
            ]
        );
    }

    public function add()
    {
        $preparationLevels = PreparationLevel::all();
        return view(
            'preparations.add',
            [
                'preparationLevels' => $preparationLevels,
            ]
        );
    }

    public function create(Request $request)
    {
        Preparation::create(
            [
                'name' => $request->name,
                'code' => $request->code,
                'preparation_level_id' => $request->preparation_level_id,
                'professorOnly' => (int)($request->professorOnly === 'on'),
            ]
        );
        return redirect(route('preparation.all'));
    }

    public function edit($id)
    {
        $preparation = Preparation::findOrFail($id);
        if (!empty($preparation)) {
            return view(
                'preparations.edit',
                [
                    'preparation' => $preparation,
                ]
            );
        }
        return redirect(route('preparation.all'));
    }

    public function update(Request $request)
    {
        $preparation = Preparation::findOrFail($request->id);
        if (!empty($preparation)) {
            $preparation->update($request->all());
        }
        return redirect(route('preparation.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $preparation = Preparation::findOrFail($id);
        if (!empty($preparation)) {
            $preparation->delete();
        }
        return redirect(route('preparation.all'));
    }
}
