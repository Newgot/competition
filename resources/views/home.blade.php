@extends('layouts.app')

@section('content')
    <form action="{{ route('positionBindWorker') }}" class="input-form home__form" method="POST">
        @csrf
        <select name="position_id" id="position_id">
            @foreach ($positions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
        </select>
        <select name="worker_id" id="worker_id">
            @foreach ($wokrers as $wokrer)
                <option value="{{ $wokrer->id }}">{{ $wokrer->lastName }} {{ $wokrer->firstName }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success">Установить на должность</button>
    </form>
    <table class="home-table table">
        <thead>
        <tr>
            <th>№</th>
            <th>Должность</th>
            <th>Работник</th>
            <th>Недостающие компетенции</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($positionsWorkers as $positionsWorker)
            <tr class="{{count($positionsWorker->missingCompetencies) ? 'missing' :''}}">
                <td>{{ $loop->iteration}}</td>
                <td>{{ $positionsWorker->position->name}}</td>
                <td>{{ $positionsWorker->worker->lastName}} {{ $positionsWorker->worker->firstName}}</td>
                <td class="missing-competence">
                    @foreach($positionsWorker->missingCompetencies as $missingCompetence)
                        <p>{{ $missingCompetence->name }}</p>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
