<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WorkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        return redirect('/');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'fatherName' => 'required',
            'dateStart' => 'required',
            'academic_title_id' => 'required',
            'academic_degree_id' => 'required',
            'attraction_id' => 'required',
            'aducation_level_id' => 'required',
            'additional_aducation_id' => 'required',
            'preparation_id' => 'required',
        ];
    }
}
