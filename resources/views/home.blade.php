@extends('layouts.app')

@section('content')
    <form action="{{ route('positionBindWorker') }}" method="POST">
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
        <button type="submit" class="btn btn-success">Установить</button>
    </form>
    <table class="home-table table">
        <thead>
            <tr>
                <th>№</th>
                <th>Должность</th>
                <th>Работник</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positionsWorkers as $item)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $item->position->name}}</td>
                    <td>{{ $item->worker->lastName}} {{ $item->worker->firstName}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
