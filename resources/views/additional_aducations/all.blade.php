@extends('layouts.app')

@section('content')

    <div class="row mt-2 mb-2 ml-3">
        <a href="{{ route('add_ad.add') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="container-fluid">
        <table class="position__table table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Серия и номер</th>
                    <th>Вид образования</th>
                    <th>Документ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($additionalAducations as $additionalAducation)
                    <tr>
                        <td>{{ $additionalAducation->id }}</td>
                        <td>{{ $additionalAducation->certificateSeries }} {{ $additionalAducation->certificateNumber }}</td>
                        <td>{{ $additionalAducation->additionalType }}</td>
                        <td>{{ $additionalAducation->documentType }}</td>
                        <td>
                            <a href="{{ route('add_ad.edit', ["id" => $additionalAducation->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('add_ad.delete', ["id" => $additionalAducation->id]) }}"
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
