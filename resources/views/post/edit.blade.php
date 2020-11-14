@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Edit Post.
          {{$posts->title}}
        <form action="{{route('posts.update', $posts->id )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="name" value="{{$posts->name}}" class="form-control" placeholder="Apply">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Body</label>
          <input type="text" name="price" value="{{$posts->price}}" class="form-control" placeholder="2,5">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Photo</label>
        <textarea class="form-control" name="detail" rows="3">{!!$posts->photo!!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

      </form>
    </div>
</div>

@endsection
