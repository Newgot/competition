<?php

namespace App\Http\Controllers;

use App\Models\PreparationLevel;
use Illuminate\Http\Request;

class PreparationLevelController extends Controller
{
    public function all()
    {
        $preparationLevels = PreparationLevel::all();
        return view(
            'preparation_levels.all',
            [
                'preparationLevels' => $preparationLevels
            ]
        );
    }

    public function add()
    {
        return view('preparation_levels.add');
    }

    public function create(Request $request)
    {
        PreparationLevel::create($request->all());
        return redirect(route('preparation_level.all'));
    }

    public function edit($id)
    {
        $preparationLevel = PreparationLevel::findOrFail($id);
        if (!empty($preparationLevel)) {
            return view(
                'preparation_levels.edit',
                [
                    'preparationLevel' => $preparationLevel,
                ]
            );
        }
        return redirect(route('preparation_level.all'));
    }

    public function update(Request $request)
    {
        $preparationLevel = PreparationLevel::findOrFail($request->id);
        if (!empty($preparationLevel)) {
            $preparationLevel->update($request->all());
        }
        return redirect(route('preparation_level.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $preparationLevel = PreparationLevel::findOrFail($id);
        if (!empty($preparationLevel)) {
            $preparationLevel->delete();
        }
        return redirect(route('preparation_level.all'));
    }
}
