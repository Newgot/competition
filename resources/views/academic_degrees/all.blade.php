@extends('layouts.app')

@section('content')

    <div class="row mt-2 mb-2 ml-3">
        <a href="{{ route('academic_degree.add') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="container-fluid">
        <table class="position__table table">
            <thead>
                <tr>
                    <th>Код</th>
                    <th>Название</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($academicDegrees as $academicDegree)
                    <tr>
                        <td>{{ $academicDegree->code }}</td>
                        <td>{{ $academicDegree->name }}</td>
                        <td>
                            <a href="{{ route('academic_degree.edit', ["id" => $academicDegree->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('academic_degree.delete', ["id" => $academicDegree->id]) }}"
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
