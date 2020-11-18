@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Edit skill.
          {{$skill->name}}
        <form action="{{route('skill.update', $skill->id )}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="skill" value="{{$skill->skill}}" class="form-control" placeholder="Apply">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>

      </form>
    </div>
</div>

@endsection
