@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Работник</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('w.add') }}" method="POST" class="input-form competences__form">
            @csrf
            <label for="firstName">
                <p>Имя</p>
                <input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}">
            </label>
            <label for="lastName">
                <p>Фамилия</p>
                <input type="text" name="lastName" id="lastName" value="{{ old('lastName') }}">
            </label>
            <label for="fatherName">
                <p>Отчество</p>
                <input type="text" name="fatherName" id="fatherName" value="{{ old('fatherName') }}">
            </label>

            <label for="dateStart">
                <p>Начало трудовой деятельности</p>
                <input type="date" name="dateStart" id="dateStart" value="{{ old('dateStart') }}">
            </label>
            <label for="academic_title_id">
                <p>Звание</p>
                @include('partials.select_list',
                [
                    'name' => 'academic_title_id',
                    'items' => $academicTitles,
                ])
            </label>
            <label for="academic_degree_id">
                <p>Ученая степень</p>
                @include('partials.select_list',
                [
                    'name' => 'academic_degree_id',
                    'items' => $academicDegrees,
                ])
            </label>
            <label for="attraction_id">
                <p>Условие привлечения</p>
                @include('partials.select_list',
                [
                    'name' => 'attraction_id',
                    'items' => $attractions,
                ])
            </label>
            <label for="aducation_level_id">
                <p>Уровень образования</p>
                @include('partials.select_list',
                [
                    'name' => 'aducation_level_id',
                    'items' => $aducationLevels,
                ])
            </label>
            <label for="additional_aducation_id">
                <p>Дополнительное образоание</p>
                @include('partials.select_list',
                [
                    'name' => 'additional_aducation_id',
                    'items' => $additionalAducations,
                ])
            </label>
            <label for="preparation_id">
                <p>Направление подготовки</p>
                @include('partials.select_list',
                [
                    'name' => 'preparation_id',
                    'items' => $preparations,
                ])
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
