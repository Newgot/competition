@extends('master')

@section('title', 'Регистрация')

@section('content')
    <div class="autentification__wrapper">
        <form class="autentification" method="POST" action="{{ route('auth.registration') }}">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" value="{{ old('login') }}">
                @error('login')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{ old('email') }}">
            </div>
            @error('login')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" value="{{ old('password') }}">
            </div>
            @error('login')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
        </form>
    </div>
@endsection