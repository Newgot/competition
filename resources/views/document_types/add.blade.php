@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Вид докуента</h1>
        <form action="{{ route('document_type.add') }}" method="POST" class="input-form document_types__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
