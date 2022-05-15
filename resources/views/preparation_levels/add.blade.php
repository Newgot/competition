@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Уровень подготовки</h1>
        <form action="{{ route('preparation_level.add') }}" method="POST" class="input-form attractions__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </label>
            <label for="code">
                <p>Код</p>
                <input type="number" name="code" id="code" value="{{ old('code') }}">
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
