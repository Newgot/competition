<?php

namespace App\Http\Controllers;

use App\Models\AcademicTitle;
use Illuminate\Http\Request;

class AcademicTitleController extends Controller
{
    public function all()
    {
        $academicTitles = AcademicTitle::all();
        return view(
            'academic_titles.all',
            [
                'academicTitles' => $academicTitles
            ]
        );
    }

    public function add()
    {
        return view('academic_titles.add');
    }

    public function create(Request $request)
    {
        AcademicTitle::create($request->all());
        return redirect(route('academic_title.all'));
    }

    public function edit($id)
    {
        $academicTitle = AcademicTitle::findOrFail($id);
        if (!empty($academicTitle)) {
            return view(
                'academic_titles.edit',
                [
                    'academicTitle' => $academicTitle,
                ]
            );
        }
        return redirect(route('academic_title.all'));
    }

    public function update(Request $request)
    {
        $academicTitle = AcademicTitle::findOrFail($request->id);
        if (!empty($academicTitle)) {
            $academicTitle->update($request->all());
        }
        return redirect(route('academic_title.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $academicTitle = AcademicTitle::findOrFail($id);
        if (!empty($academicTitle)) {
            $academicTitle->delete();
        }
        return redirect(route('academic_title.all'));
    }
}
