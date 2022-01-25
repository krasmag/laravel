@extends('layout')
@section('content')
@if($users)
<h1>{{$red}}</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            @if($user->company === $red)
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <form method="get" action="{{ route('delete', ['id' => $user->id]) }}">
            <td><input type="hidden" value="{{$red}}" id="c" name="c"><button type="submit" class="btn btn-primary">Удалить</button></td>
            </form>
            <form method="get" action="{{ route('dbredakt') }}">
            <td><input type="hidden" value="{{$user->id}}" id="c" name="c"><button type="submit" class="btn btn-primary">Редактировать</button></td>
        </form>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<form method="get" action="{{ route('dbredakt') }}">
<td><input type="hidden" value="add" id="c" name="c"><button type="submit" class="btn btn-primary">Добавить сотрудника</button></td>
</form>
</div>
@else
<p>Записей не найдено...</p>
@endif
@endsection
