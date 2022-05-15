@extends('layouts.app')

@section('content')

    <div class="row mt-2 mb-2 ml-3">
        <a href="{{ route('aducation_level.add') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="container-fluid">
        <table class="position__table table">
            <thead>
                <tr>
                    <th>Код</th>
                    <th>Название</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aducationLevels as $aducationLevel)
                    <tr>
                        <td>{{ $aducationLevel->code }}</td>
                        <td>{{ $aducationLevel->name }}</td>
                        <td>{{ $aducationLevel->preparationLevel }}</td>
                        <td>
                            <a href="{{ route('aducation_level.edit', ["id" => $aducationLevel->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('aducation_level.delete', ["id" => $aducationLevel->id]) }}"
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
