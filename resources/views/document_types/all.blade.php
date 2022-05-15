@extends('layouts.app')

@section('content')

    <div class="row mt-2 mb-2 ml-3">
        <a href="{{ route('document_type.add') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="container-fluid">
        <table class="position__table table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentTypes as $documentType)
                    <tr>
                        <td>{{ $documentType->id }}</td>
                        <td>{{ $documentType->name }}</td>
                        <td>
                            <a href="{{ route('document_type.edit', ["id" => $documentType->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('document_type.delete', ["id" => $documentType->id]) }}"
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
