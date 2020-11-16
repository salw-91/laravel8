@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Edit tag.
          {{$tag->name}}
        <form action="{{route('tag.update', $tag->id )}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="tag" value="{{$tag->tag}}" class="form-control" placeholder="Apply">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>

      </form>
    </div>
</div>

@endsection
