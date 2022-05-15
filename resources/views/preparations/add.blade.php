@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Направление подготовки</h1>
        <form action="{{ route('preparation.add') }}" method="POST" class="input-form attractions__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </label>
            <label for="code">
                <p>Код</p>
                <input type="text" name="code" id="code" value="{{ old('code') }}">
            </label>
            <label for="preparation_level_id">
                <p>Уровень подготовки</p>
                @include('partials.select_list',
                [
                    'name' => 'preparation_level_id',
                    'items' => $preparationLevels
                ])
            </label>
            <label for="professorOnly">
                <input type="checkbox" name="professorOnly">
                только для преподавателей
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
