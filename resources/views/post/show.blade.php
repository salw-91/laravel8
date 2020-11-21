@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <div class="card">
                        <img class="card-img-top" src="{{URL::asset($post->photo)}}" alt="Card image cap">
                        {{-- <img src="{{ $post->photo }}" class="card-img-top"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text"> {{ $post->body }}</p>
                            @foreach ($tags as $item)

                                <label for="">{{ $item->tag }}</label>
                            @endforeach
                            <p> Created by: {{ $post->user->name }}</p>
                            <p> Created at: {{ $post->created_at->diffForhumans() }}</p>
                            <p> Updated at: {{ $post->updated_at->diffForhumans() }}</p>
                            <br>
                            <a class="btn btn-warning" href="{{ route('posts') }}"> Back</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
