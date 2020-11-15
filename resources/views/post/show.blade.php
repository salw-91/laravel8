@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
        <form action="{{route('posts.index')}}">
        @csrf
        <div class="card" >
            <img class="card-img-top" src="{{URL::asset($post->photo)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->body}}</p>
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item"><p class="card-text">Created at: {{$post->user->name}}</p></li>
                <li class="list-group-item"><p class="card-text">Created at: {{$post->created_at->diffForhumans()}}</p></li>
                <li class="list-group-item"><p class="card-text">Updated at: {{$post->updated_at->diffForhumans()}}</p></li>
                </ul>
                
            <button type="submit" class="btn btn-primary">Back</button>
          </div>

      </form>
    </div>
</div>

@endsection
