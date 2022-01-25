@extends('layout')

@section('content')
@if($com == 'add')
<form class="row g-3" method="post" action="{{route('updatedb')}}">
    {{csrf_field()}}
    <div class="col-md-12">
      <label for="inputname" class="form-label">Name</label>
      <input name="name" type="text" class="form-control" id="inputname">
    </div>
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input name="email"  type="email" class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Phone</label>
        <input name="phone"  type="phone" class="form-control" id="inputphone">
      </div>
    <div class="col-md-12">
      <label for="inputState" class="form-label">company</label>
      <select name="company" id="inputState" class="form-select">
        <option selected>Ledner-Bode</option>
        <option>Mante Ltd</option>
        <option>Franecki PLC</option>
        <option>Bartoletti and Sons</option>
      </select>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
</form>
@else
<form class="row g-3" method="post" action="{{route('updatedb')}}">
{{csrf_field()}}
@foreach($users as $user)
    @if($user->id == $com)

    <div class="col-md-12">
      <label for="inputname" class="form-label">Name</label>
      <input name="name" type="text" value="{{$user->name}}" class="form-control" id="inputname">
    </div>
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input name="email" value="{{$user->email}}" type="email" class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Phone</label>
        <input name="phone" value="{{$user->phone}}" type="phone" class="form-control" id="inputphone">
      </div>
    <div class="col-md-12">
      <label for="inputState" class="form-label">company</label>
      <select name="company" id="inputState" class="form-select">
        <option selected>Ledner-Bode</option>
        <option>Mante Ltd</option>
        <option>Franecki PLC</option>
        <option>Bartoletti and Sons</option>
      </select>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
    <input name="id" type="hidden" value="{{$user->id}}">
  </form>
  @endif
  @endforeach

  @endif
  @endsection
