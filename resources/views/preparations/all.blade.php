@extends('layouts.app')

@section('content')

    <div class="row mt-2 mb-2 ml-3">
        <a href="{{ route('preparation.add') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="container-fluid">
        <table class="position__table table">
            <thead>
                <tr>
                    <th>Код</th>
                    <th>Название</th>
                    <th>Уровень</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preparations as $preparation)
                    <tr>
                        <td>{{ $preparation->code }}</td>
                        <td>{{ $preparation->name }}</td>
                        <td>{{ $preparation->preparationLevel->name }}</td>
                        <td>
                            <a href="{{ route('preparation.edit', ["id" => $preparation->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('preparation.delete', ["id" => $preparation->id]) }}"
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
