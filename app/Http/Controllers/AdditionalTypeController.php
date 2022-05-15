<?php

namespace App\Http\Controllers;

use App\Models\AdditionalType;
use Illuminate\Http\Request;

class AdditionalTypeController extends Controller
{
    public function all()
    {
        $additionalTypes = AdditionalType::all();
        return view(
            'additional_types.all',
            [
                'additionalTypes' => $additionalTypes
            ]
        );
    }

    public function add()
    {
        return view('additional_types.add');
    }

    public function create(Request $request)
    {
        AdditionalType::create($request->all());
        return redirect(route('additional_type.all'));
    }

    public function edit($id)
    {
        $additionalType = AdditionalType::findOrFail($id);
        if (!empty($additionalType)) {
            return view(
                'additional_types.edit',
                [
                    'additionalType' => $additionalType,
                ]
            );
        }
        return redirect(route('additional_type.all'));
    }

    public function update(Request $request)
    {
        $additionalType = AdditionalType::findOrFail($request->id);
        if (!empty($additionalType)) {
            $additionalType->update($request->all());
        }
        return redirect(route('additional_type.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $additionalType = AdditionalType::findOrFail($id);
        if (!empty($additionalType)) {
            $additionalType->delete();
        }
        return redirect(route('additional_type.all'));
    }
}
