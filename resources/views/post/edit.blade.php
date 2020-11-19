@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">

        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
        @endif

        <div class="card-body">
          Edit Post.
          {{$post->title}}
          <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card" style="width: 18rem;">
            @if ($post->photo)
            <img class="card-img-top" src="{{ $post->photo }}" alt="Card image cap">
            @endif
            <div class="card-body">
                Title:
                <input type="text" name="title" value="{{ $post->title }}">
                <br>
                Body:
                <input type="text" name="body" value="{{ $post->body }}">
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <p class="card-text">Created at: {{ $post->user->name }}</p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">Created at: {{ $post->created_at->diffForhumans() }}</p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">Updated at: {{ $post->updated_at->diffForhumans() }}</p>
                </li>
            </ul>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>

      </form>
    </div>
</div>

@endsection
