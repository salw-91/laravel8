@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">

            @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
              {{$message}}
              </div>
            @endif
            @if ($message = Session::get('success_delete'))
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @endif


        <div class="card-body">
          Create Tag.

        <form action="{{route('skill.store')}}"  method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="skill" class="form-control" placeholder="Python">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('skills')}}" class="btn btn-warning"> Go back</a>

      </form>
    </div>
</div>

@endsection
