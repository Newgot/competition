@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('w.edit', ['id' => $worker->id]) }}" method="POST" class="input-form competences__form">
            @csrf
            <label for="firstName">
                <p>Имя</p>
                <input type="text" name="firstName" id="firstName" value="{{ $worker->firstName }}">
            </label>
            <label for="lastName">
                <p>Фамилия</p>
                <input type="text" name="lastName" id="lastName" value="{{ $worker->lastName }}">
            </label>
            <label for="fatherName">
                <p>Отчество</p>
                <input type="text" name="fatherName" id="fatherName" value="{{ $worker->fatherName }}">
            </label>
            <label for="dateStart">
                <p>Начало трудовой деятельности</p>
                <input type="date" name="dateStart" id="dateStart" value="{{ $worker->calendarDate }}">
            </label>
            <input type="hidden" name="id" value="{{ $worker->id }}">
            <label for="academic_title_id">
                <p>Звание</p>
                @include('partials.select_list',
                [
                    'name' => 'academic_title_id',
                    'items' => $academicTitles,
                    'current' =>$worker->academic_title_id,
                ])
            </label>
            <label for="academic_degree_id">
                <p>Ученая степень</p>
                @include('partials.select_list',
                [
                    'name' => 'academic_degree_id',
                    'items' => $academicDegrees,
                    'current' =>$worker->academic_degree_id,

                ])
            </label>
            <label for="attraction_id">
                <p>Условие привлечения</p>
                @include('partials.select_list',
                [
                    'name' => 'attraction_id',
                    'items' => $attractions,
                    'current' =>$worker->attraction_id,
                ])
            </label>
            <label for="aducation_level_id">
                <p>Уровень образования</p>
                @include('partials.select_list',
                [
                    'name' => 'aducation_level_id',
                    'items' => $aducationLevels,
                    'current' =>$worker->aducation_level_id,
                ])
            </label>
            <label for="additional_aducation_id">
                <p>Дополнительное образоание</p>
                @include('partials.select_list',
                [
                    'name' => 'additional_aducation_id',
                    'items' => $additionalAducations,
                    'current' =>$worker->additional_aducation_id,
                ])
            </label>
            <label for="preparation_id">
                <p>Направление подготовки</p>
                @include('partials.select_list',
                [
                    'name' => 'preparation_id',
                    'items' => $preparations,
                    'current' =>$worker->academic_title_id,
                ])
            </label>
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
