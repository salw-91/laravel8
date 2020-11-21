@extends('layouts.app')

@section('content')

    <div class="container pt-4">
        <div class="card">

            @if ($message = Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{ $message }}
                </div>
            @endif
            @if ($message = Session::get('success_delete'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card-body">
                Edit {{$post->id}} Post.
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Apply">
                    </div>
                    <div class="form-group">
                        <label>Body:</label>
                        <input type="text" name="body" value="{{ $post->body }}" class="form-control" placeholder="Text">
                    </div>

                        <div class="form-group">
                            <label>Tags: <a class="btn btn-success btn-sm" href="{{ route('tag.create') }}">Create Tag</a>

                            @foreach ($tags as $item)
                            <input type="checkbox" name="tags[]"
                               value="{{$item->id}}"

                               @foreach ($post->tag as $item2)
                                   @if ($item->id == $item2->id)
                                       checked
                                   @endif
                               @endforeach

                               >

                               <label for="">{{$item->tag}}</label>
                            @endforeach

                          </div>



                    <div class="form-group">
                        <label for="myfile">Select a Photo:</label>
                        <br>
                        <input type="file" name="photo">

                        <div class="card mt-4" style="width: 18rem;">
                        <img class="card-img-top" src="{{URL::asset($post->photo)}}" alt="Card image cap">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-warning" href="{{ route('posts') }}">Back</a>

                </form>
            </div>
        </div>

    @endsection
