@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('p.add') }}" method="POST" class="competences__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </label>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
