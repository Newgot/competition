@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('c.add') }}" method="POST" class="input-form competences__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
