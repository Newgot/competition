<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalAducation extends Model
{
    use HasFactory;

    protected $fillable =[
        'additional_type_id',
        'document_type_id',
        'dataFrom',
        'dataTo',
        'courseVolume',
        'certificateSeries',
        'certificateNumber',
        'certificateDate'
    ];

    public function getNameAttribute()
    {
        $additionaType = AdditionalType::findOrFail($this->additional_type_id);
        $name = $additionaType ? $additionaType->name : '';
        return "$this->certificateSeries $this->certificateNumber $name";
    }
}
