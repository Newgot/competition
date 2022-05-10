@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
