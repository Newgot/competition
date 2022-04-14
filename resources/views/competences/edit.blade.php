@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('c.edit', ["id" => $competence->id]) }}" method="POST" class="competences__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $competence->name }}">
            </label>
            <input type="hidden" name="id" value="{{ $competence->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
