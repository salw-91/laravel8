@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Edit Post.
          {{$post->title}}
        <form action="{{route('posts.update', $post->id )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-4">
          <label>Title</label>
          <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Text">
        </div>
        <div class="form-group col-4">
          <label>Body</label>
          <input type="text" name="body" value="{{$post->body}}" class="form-control" placeholder="Text">
        </div>
        <div class="form-group">
            <label for="myfile">Select a Photo:</label>
            <br>
            <input type="file" name="photo">

        </div>
        <div>
            <img src="{{URL::asset($post->photo)}}" alt="{{$post->photo}}"
          class="img-tumbnail"  width="25%" height="25%">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>

      </form>
    </div>
</div>

@endsection
