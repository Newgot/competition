<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function all()
    {
        $attractions = Attraction::all();
        return view(
            'attractions.all',
            [
                'attractions' => $attractions
            ]
        );
    }

    public function add()
    {
        return view('attractions.add');
    }

    public function create(Request $request)
    {
        Attraction::create($request->all());
        return redirect(route('attraction.all'));
    }

    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);
        if (!empty($attraction)) {
            return view(
                'attractions.edit',
                [
                    'attraction' => $attraction,
                ]
            );
        }
        return redirect(route('attraction.all'));
    }

    public function update(Request $request)
    {
        $attraction = Attraction::findOrFail($request->id);
        if (!empty($attraction)) {
            $attraction->update($request->all());
        }
        return redirect(route('attraction.all'));
    }

    public function delete($id)
    {
        // @TODO: Дописать проверку других таблиц при удалении
        $attraction = Attraction::findOrFail($id);
        if (!empty($attraction)) {
            $attraction->delete();
        }
        return redirect(route('attraction.all'));
    }
}
