@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Create Post.

        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Title:</label>
          <input type="text" name="title" class="form-control" placeholder="Apply">
        </div>
        <div class="form-group">
          <label>Body:</label>
          <input type="text" name="body" class="form-control" placeholder="Text">
        </div>

        <div class="form-group">
            <label>Tags: <a class="btn btn-success btn-sm" href="{{route('tag.create')}}">Create Tag</a>

            </label>
        @foreach ($tags as $item)
        <input type="checkbox" name="tag[]" value="{{ $item->id}}" placeholder="Text">
        <label >{{$item->tag}}</label>
        @endforeach
        </div>



        <div class="form-group">
            <label for="myfile">Select a Photo:</label>
            <br>
            <input type="file" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a class="btn btn-warning" href="{{route('posts')}}">Back</a>

      </form>
    </div>
</div>

@endsection
