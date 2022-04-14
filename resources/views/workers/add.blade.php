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
            <label for="dob">
                <p>Дата рождения</p>
                <input type="date" name="dob" id="dob" value="{{ old('dob') }}">
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection