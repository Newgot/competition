@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Ученая степень</h1>
        <form action="{{ route('academic_degree.edit', ["id" => $academicDegree->id]) }}" method="POST"
              class="input-form academic_degree__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $academicDegree->name }}">
            </label>
            <label for="code">
                <p>Код</p>
                <input type="number" name="code" id="code" value="{{ $academicDegree->code }}">
            </label>
            <input type="hidden" name="id" value="{{ $academicDegree->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
