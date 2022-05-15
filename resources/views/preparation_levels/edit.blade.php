@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Уровень подготовки</h1>
        <form action="{{ route('preparation_level.edit', ["id" => $preparationLevel->id]) }}" method="POST"
              class="input-form attraction__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $preparationLevel->name }}">
            </label>
            <label for="code">
                <p>Код</p>
                <input type="number" name="code" id="code" value="{{ $preparationLevel->code }}">
            </label>
            <input type="hidden" name="id" value="{{ $preparationLevel->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
