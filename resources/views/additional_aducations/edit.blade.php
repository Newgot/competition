@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Дополнительное образование</h1>
        <form action="{{ route('add_ad.edit', ["id" => $additionalAducation->id]) }}" method="POST"
              class="input-form add_ads__form">
            @csrf
            <label for="certificateSeries">
                <p>Серия</p>
                <input type="text" name="certificateSeries" id="certificateSeries"
                       value="{{ $additionalAducation->certificateSeries }}">
            </label>
            <label for="certificateNumber">
                <p>Номер</p>
                <input type="text" name="certificateNumber" id="certificateNumber"
                       value="{{ $additionalAducation->certificateNumber }}">
            </label>
            <label for="certificateDate">
                <p>Дата получения документа</p>
                <input type="date" name="certificateDate" id="certificateDate" value="{{ $additionalAducation->certificateDate }}">
            </label>
            <label for="dataFrom">
                <p>Дата начала обучения</p>
                <input type="date" name="dataFrom" id="dataFrom" value="{{ $additionalAducation->dataFrom }}">
            </label>
            <label for="dataTo">
                <p>Дата окончания обучения</p>
                <input type="date" name="dataTo" id="dataTo" value="{{ $additionalAducation->dataTo }}">
            </label>
            <label for="courseVolume">
                <p>Колличество часов</p>
                <input type="number" name="courseVolume" id="courseVolume" value="{{ $additionalAducation->courseVolume }}">
            </label>
            <label for="additional_type_id">
                <p>Вид доп образования</p>
                @include('partials.select_list',
                [
                    'name' => 'additional_type_id',
                    'items' => $additionalTypes,
                    'current' => $additionalAducation->additional_type_id
                ])
            </label>
            <label for="additional_type_id">
                <p>Вид документа</p>
                @include('partials.select_list',
                [
                    'name' => 'document_type_id',
                    'items' => $documentTypes,
                    'current' => $additionalAducation->document_type_id
                ])
            </label>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
