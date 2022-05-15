@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Дополнительное образование</h1>
        <form action="{{ route('add_ad.add') }}" method="POST" class="input-form add_ads__form">
            @csrf
            <label for="certificateSeries">
                <p>Серия</p>
                <input type="text" name="certificateSeries" id="certificateSeries"
                       value="{{ old('certificateSeries') }}">
            </label>
            <label for="certificateNumber">
                <p>Номер</p>
                <input type="text" name="certificateNumber" id="certificateNumber"
                       value="{{ old('certificateNumber') }}">
            </label>
            <label for="certificateDate">
                <p>Дата получения документа</p>
                <input type="date" name="certificateDate" id="certificateDate" value="{{ old('certificateDate') }}">
            </label>
            <label for="dataFrom">
                <p>Дата начала обучения</p>
                <input type="date" name="dataFrom" id="dataFrom" value="{{ old('dataFrom') }}">
            </label>
            <label for="dataTo">
                <p>Дата окончания обучения</p>
                <input type="date" name="dataTo" id="dataTo" value="{{ old('dataTo') }}">
            </label>
            <label for="courseVolume">
                <p>Колличество часов</p>
                <input type="number" name="courseVolume" id="courseVolume" value="{{ old('courseVolume') }}">
            </label>
            <label for="additional_type_id">
                <p>Вид доп образования</p>
                @include('partials.select_list',
                [
                    'name' => 'additional_type_id',
                    'items' => $additionalTypes
                ])
            </label>
            <label for="document_type_id">
                <p>Вид документа</p>
                @include('partials.select_list',
                [
                    'name' => 'document_type_id',
                    'items' => $documentTypes
                ])
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
