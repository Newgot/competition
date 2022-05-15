@extends('layouts.app')

@section('content')

    <div class="row mt-2 mb-2 ml-3">
        <a href="{{ route('preparation_level.add') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="container-fluid">
        <table class="position__table table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Код</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preparationLevels as $preparationLevel)
                    <tr>
                        <td>{{ $preparationLevel->id }}</td>
                        <td>{{ $preparationLevel->name }}</td>
                        <td>{{ $preparationLevel->code }}</td>
                        <td>
                            <a href="{{ route('preparation_level.edit', ["id" => $preparationLevel->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('preparation_level.delete', ["id" => $preparationLevel->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
