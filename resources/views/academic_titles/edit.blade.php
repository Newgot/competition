@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Ученое звание</h1>
        <form action="{{ route('academic_title.edit', ["id" => $academicTitle->id]) }}" method="POST"
              class="input-form academic_title__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $academicTitle->name }}">
            </label>
            <label for="code">
                <p>Код</p>
                <input type="number" name="code" id="code" value="{{ $academicTitle->code }}">
            </label>
            <input type="hidden" name="id" value="{{ $academicTitle->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
