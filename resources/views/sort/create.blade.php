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
          Create Sort.

        <form action="{{route('sort.store')}}"  method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="sort" class="form-control" placeholder="Admin">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('sorts')}}" class="btn btn-warning"> Go back</a>

      </form>
    </div>
</div>

@endsection
