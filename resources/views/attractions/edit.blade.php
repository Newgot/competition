@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Условие привлечения</h1>
        <form action="{{ route('attraction.edit', ["id" => $attraction->id]) }}" method="POST"
              class="input-form attraction__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $attraction->name }}">
            </label>
            <label for="code">
                <p>Код</p>
                <input type="number" name="code" id="code" value="{{ $attraction->code }}">
            </label>
            <input type="hidden" name="id" value="{{ $attraction->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
