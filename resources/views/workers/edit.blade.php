@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('w.edit', ['id' => $worker->id]) }}" method="POST" class="competences__form">
            @csrf
            <label for="firstName">
                <p>Имя</p>
                <input type="text" name="firstName" id="firstName" value="{{ $worker->firstName }}">
            </label>
            <label for="lastName">
                <p>Фамилия</p>
                <input type="text" name="lastName" id="lastName" value="{{ $worker->lastName }}">
            </label>
            <label for="dob">
                <p>Дата рождения</p>
                <input type="date" name="dob" id="dob" value="{{ $worker->dob }}">
            </label>
            <input type="hidden" name="id" value="{{ $worker->id }}">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
        @if (count($competencesWorker))
            <hr>
            <h3>Компетенции работника</h3>
            <table class="bind-competence__table table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competencesWorker as $competence)
                        <tr>
                            <td>{{ $competence->id }}</td>
                            <td>{{ $competence->name }}</td>
                            <td>
                                <a class="btn btn-warning"
                                    href="{{ route('w.unBindCompetence', [
                                        'idWorker' => $worker->id,
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
                                href="{{ route('w.bindCompetence', [
                                    'idWorker' => $worker->id,
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
