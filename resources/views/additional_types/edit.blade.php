@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Вид доп. образования</h1>
        <form action="{{ route('additional_type.edit', ["id" => $additionalType->id]) }}" method="POST"
              class="input-form additional_type__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $additionalType->name }}">
            </label>
            <input type="hidden" name="id" value="{{ $additionalType->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
