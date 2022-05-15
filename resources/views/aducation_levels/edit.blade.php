@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Уровень образования</h1>
        <form action="{{ route('aducation_level.edit', ["id" => $aducationLevel->id]) }}" method="POST"
              class="input-form attraction__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $aducationLevel->name }}">
            </label>
            <label for="code">
                <p>Код</p>
                <input type="number" name="code" id="code" value="{{ $aducationLevel->code }}">
            </label>
            <label for="preparation_level_id">
                <p>Уровень образования</p>
                @include('partials.select_list',
                [
                    'name' => 'preparation_level_id',
                    'items' => $preparationLevels,
                    'current' =>$aducationLevel->preparation_level_id,
                ])
            </label>
            <input type="hidden" name="id" value="{{ $aducationLevel->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
