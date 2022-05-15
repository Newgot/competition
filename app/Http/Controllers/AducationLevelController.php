<?php

namespace App\Http\Controllers;

use App\Models\AducationLevel;
use App\Models\PreparationLevel;
use Illuminate\Http\Request;

class AducationLevelController extends Controller
{
    public function all()
    {
        $aducationLevels = AducationLevel::all();
        foreach ($aducationLevels as $i => $aducationLevel) {
            $preparationLevel = PreparationLevel::findOrFail($aducationLevel->preparation_level_id);
            $aducationLevels[$i]->preparationLevel = $preparationLevel ? $preparationLevel->name : '';
        }
        return view(
            'aducation_levels.all',
            [
                'aducationLevels' => $aducationLevels,
            ]
        );
    }

    public function add()
    {
        $preparationLevels = PreparationLevel::all();
        return view(
            'aducation_levels.add',
            [
                'preparationLevels' => $preparationLevels
            ]
        );
    }

    public function create(Request $request)
    {
        AducationLevel::create($request->all());
        return redirect(route('aducation_level.all'));
    }

    public function edit($id)
    {
        $aducationLevel = AducationLevel::findOrFail($id);
        if (!empty($aducationLevel)) {
            $preparationLevels = PreparationLevel::all();
            return view(
                'aducation_levels.edit',
                [
                    'aducationLevel' => $aducationLevel,
                    'preparationLevels' => $preparationLevels,
                ]
            );
        }
        return redirect(route('aducation_level.all'));
    }

    public function update(Request $request)
    {
        $aducationLevel = AducationLevel::findOrFail($request->id);
        if (!empty($aducationLevel)) {
            $aducationLevel->update($request->all());
        }
        return redirect(route('aducation_level.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $aducationLevel = AducationLevel::findOrFail($id);
        if (!empty($aducationLevel)) {
            $aducationLevel->delete();
        }
        return redirect(route('aducation_level.all'));
    }
}
