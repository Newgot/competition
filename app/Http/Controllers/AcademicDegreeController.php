<?php

namespace App\Http\Controllers;

use App\Models\AcademicDegree;
use Illuminate\Http\Request;

class AcademicDegreeController extends Controller
{
    public function all()
    {
        $academicDegrees = AcademicDegree::all();
        return view(
            'academic_degrees.all',
            [
                'academicDegrees' => $academicDegrees
            ]
        );
    }

    public function add()
    {
        return view('academic_degrees.add');
    }

    public function create(Request $request)
    {
        AcademicDegree::create($request->all());
        return redirect(route('academic_degree.all'));
    }

    public function edit($id)
    {
        $academicDegree = AcademicDegree::findOrFail($id);
        if (!empty($academicDegree)) {
            return view(
                'academic_degrees.edit',
                [
                    'academicDegree' => $academicDegree,
                ]
            );
        }
        return redirect(route('academic_degree.all'));
    }

    public function update(Request $request)
    {
        $academicDegree = AcademicDegree::findOrFail($request->id);
        if (!empty($academicDegree)) {
            $academicDegree->update($request->all());
        }
        return redirect(route('academic_degree.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $academicDegree = AcademicDegree::findOrFail($id);
        if (!empty($academicDegree)) {
            $academicDegree->delete();
        }
        return redirect(route('academic_degree.all'));
    }
}
