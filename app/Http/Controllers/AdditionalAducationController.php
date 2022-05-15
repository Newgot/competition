<?php

namespace App\Http\Controllers;

use App\Models\AdditionalAducation;
use App\Models\AdditionalType;
use App\Models\DocumentType;
use Illuminate\Http\Request;

class AdditionalAducationController extends Controller
{
    public function all()
    {
        $additionalAducations = AdditionalAducation::all();
        foreach ($additionalAducations as $i => $additionalAducation) {
            $additionalType = AdditionalType::findOrFail($additionalAducation->additional_type_id);
            $additionalAducations[$i]->additionalType = $additionalType ? $additionalType->name : '';
            $documentType = DocumentType::findOrFail($additionalAducation->document_type_id);
            $additionalAducations[$i]->documentType = $documentType ? $documentType->name : '';

        }
        return view(
            'additional_aducations.all',
            [
                'additionalAducations' => $additionalAducations
            ]
        );
    }

    public function add()
    {
        $additionalTypes = AdditionalType::all();
        $documentTypes = DocumentType::all();
        return view(
            'additional_aducations.add',
            [
                'additionalTypes' => $additionalTypes,
                'documentTypes' => $documentTypes,
            ]
        );
    }

    public function create(Request $request)
    {
        AdditionalAducation::create($request->all());
        return redirect(route('add_ad.all'));
    }

    public function edit($id)
    {
        $additionalAducation = AdditionalAducation::findOrFail($id);
        if (!empty($additionalAducation)) {
            $additionalTypes = AdditionalType::all();
            $documentTypes = DocumentType::all();
            return view(
                'additional_aducations.edit',
                [
                    'additionalAducation' => $additionalAducation,
                    'additionalTypes' => $additionalTypes,
                    'documentTypes' => $documentTypes,
                ]
            );
        }
        return redirect(route('add_ad.all'));
    }

    public function update(Request $request)
    {
        $additionalAducation = AdditionalAducation::findOrFail($request->id);
        if (!empty($additionalAducation)) {
            $additionalAducation->update($request->all());
        }
        return redirect(route('add_ad.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $additionalAducation = AdditionalAducation::findOrFail($id);
        if (!empty($additionalAducation)) {
            $additionalAducation->delete();
        }
        return redirect(route('add_ad.all'));
    }
}
