@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Create Post.

        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" class="form-control" placeholder="Apply">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Body</label>
          <input type="text" name="body" class="form-control" placeholder="2,5">
        </div>
        <div class="form-group">
            <label for="myfile">Select a Photo:</label>
            <br>
            <input type="file" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a class="btn btn-warning" href="{{route('posts.index')}}">Back</a>

      </form>
    </div>
</div>

@endsection
