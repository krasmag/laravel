
@extends('layout')

@section('content')
@if(count($users))
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">company</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <form method="get" action="{{ route('company') }}">
                <td><input type="hidden" value="{{$user->company}}" id="c" name="c"><button type="submit"class="btn btn-primary">{{ $user->company }}</button></td>
            </form>
        </tr>
        @endforeach

    </tbody>
</table>


{{ $users->appends(['s' => request()->ser])->links() }}
@else
<p>Записей не найдено...</p>
@endif
@endsection
