@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('p.edit', ["id" => $position->id]) }}" method="POST" class="positions__form">
            @csrf
            <label for="name">
                <p>Название</p>
                <input type="text" name="name" id="name" value="{{ $position->name }}">
            </label>
            <input type="hidden" name="id" value="{{ $position->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
        @if (count($competencesPosition))
        <hr>
        <h3>Компетенции должности</h3>
        <table class="bind-competence__table table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competencesPosition as $competence)
                    <tr>
                        <td>{{ $competence->id }}</td>
                        <td>{{ $competence->name }}</td>
                        <td>
                            <a class="btn btn-warning"
                                href="{{ route('p.unBindCompetence', [
                                    'idPosition' => $position->id,
                                    'idCompetence' => $competence->id,
                                ]) }}">
                                Убрать
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <hr>
    <h3>Добавить компетенцию</h3>
    <table class="bind-competence__table table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competencesEmpty as $competence)
                <tr>
                    <td>{{ $competence->id }}</td>
                    <td>{{ $competence->name }}</td>
                    <td>
                        <a class="btn btn-warning"
                            href="{{ route('p.bindCompetence', [
                                'idPosition' => $position->id,
                                'idCompetence' => $competence->id,
                            ]) }}">
                            Связать
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
