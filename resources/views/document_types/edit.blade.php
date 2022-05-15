@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Вид докуента</h1>
        <form action="{{ route('document_type.edit', ["id" => $documentType->id]) }}" method="POST"
              class="input-form document_type__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $documentType->name }}">
            </label>
            <input type="hidden" name="id" value="{{ $documentType->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
