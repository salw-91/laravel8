@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Create product.

        <form action="{{route('posts.index')}}">
        @csrf
        <div class="form-group">
          <label><b>Name</b> </label>
          <p>{{$post->title}}</p>
        </div>
        <div class="form-group">
          <label><b>Price</b></label>
          <p>{{$post->body}}</p>
        </div>
        <div class="form-group">

          <label ><b>Detail</b></label>
          <img src="{{URL::asset($post->photo)}}" alt="{{$post->photo}}"
          class="img-tumbnail"  width="25%" height="25%">

          <p>{{$post->image}}</p>
        </div>
        <button type="submit" class="btn btn-primary">Back</button>

      </form>
    </div>
</div>

@endsection
