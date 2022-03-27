@extends('auth.master')

@section('title', 'Вход')

@section('content')
    <div class="autentification__wrapper">
        <form class="autentification" method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Логин</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('login') }}">
                @error('name')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                @error('password')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection