@extends('layouts.app')

@section('content')
    <div class="row mt-2 mb-2 ml-3">
        <a href="{{ route('w.add') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="container-fluid">
        <table class="worker__table table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Начало трудовой деятельности</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workers as $worker)
                    <tr>
                        <td>{{ $worker->id }}</td>
                        <td>{{ $worker->firstName }}</td>
                        <td>{{ $worker->lastName }}</td>
                        <td>{{ $worker->fatherName }}</td>
                        <td>{{ $worker->dateStart }}</td>
                        <td>
                            <a href="{{ route('w.edit', ["id" => $worker->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('w.delete', ["id" => $worker->id]) }}"
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
