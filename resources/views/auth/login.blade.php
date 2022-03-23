@extends('master')

@section('title', 'Вход')

@section('content')
<div class="autentification__wrapper">
    <form 
        class="autentification"
        method="POST"
        action="{{route('auth.login')}}"
    >
        @csrf
        <div class="mb-3">
          <label for="login" class="form-label">Логин</label>
          <input type="text" class="form-control" id="login" value="{{old('login')}}">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" id="password"  value="{{old('password')}}">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
      </form>
</div>
@endsection