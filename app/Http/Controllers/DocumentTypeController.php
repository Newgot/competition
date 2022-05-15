<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function all()
    {
        $documentTypes = DocumentType::all();
        return view(
            'document_types.all',
            [
                'documentTypes' => $documentTypes
            ]
        );
    }

    public function add()
    {
        return view('document_types.add');
    }

    public function create(Request $request)
    {
        DocumentType::create($request->all());
        return redirect(route('document_type.all'));
    }

    public function edit($id)
    {
        $documentType = DocumentType::findOrFail($id);
        if (!empty($documentType)) {
            return view(
                'document_types.edit',
                [
                    'documentType' => $documentType,
                ]
            );
        }
        return redirect(route('document_type.all'));
    }

    public function update(Request $request)
    {
        $documentType = DocumentType::findOrFail($request->id);
        if (!empty($documentType)) {
            $documentType->update($request->all());
        }
        return redirect(route('document_type.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $documentType = DocumentType::findOrFail($id);
        if (!empty($documentType)) {
            $documentType->delete();
        }
        return redirect(route('document_type.all'));
    }
}
