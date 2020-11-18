@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Create Tag.
          
        <form action="{{route('tag.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="tag" class="form-control" placeholder="Python">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>

      </form>
    </div>
</div>

@endsection
