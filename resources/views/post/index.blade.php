@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Posts  </h1>
        <a class="btn btn-primary btn-lg" href="{{route('posts.create')}}"> Create</a>
        <a class="btn btn-warning btn-lg" href="{{route('post.trashed')}}"> Trash </a>
           </div>
      </div>
    </div>
    <div class="row">

  <div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-primary" role="alert">
      {{$message}}
      </div>
    @endif
    @if ($message = Session::get('success_delete'))
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @endif

</div>

<div class="col">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col"  class="text-center">#</th>
            <th scope="col"  class="text-center">Name</th>
            <th scope="col"  class="text-center">Price</th>
            <th scope="col"  class="text-center">photo</th>
            <th scope="col" class="text-center">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item )
          <tr>
            <th scope="row"  class="text-center">{{$item->id}}</th>
            <td  class="text-center">{{$item->title}}</td>
            <td  class="text-center">{{$item->body}} </td>
            <td  class="text-center"><img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}"
                class="img-tumbnail" width="100" height="100"></td>

            <td  class="text-center">
                <div class="row justify-content-center">
                    @auth
                    <div class="col-md-auto">
                        <a class="btn btn-success" href="{{route('posts.edit',$item->id)}}">Edit</a>
                    </div>

                    <div class="col-md-auto">
                        <a  class="btn btn-primary" href="{{route('posts.show',$item->slug)}}">Show</a>
                    </div>
                    <div class="col-md-auto">
                        <a  class="btn btn-warning" href="{{route('posts.destroy',$item->id)}}">Soft Delete</a>
                    </div>
                    @else
                    <div class="col-md-auto">
                        <a  class="btn btn-primary" href="{{route('posts.show',$item->slug)}}">Show</a>
                    </div>
                    @endif
                    <div class="col-md-auto">
                        {{-- <a  class="btn btn-danger" href="{{ route('shop.hard.destroy',$item->id)}}">Hard Delete</a> --}}

                        {{-- <form action="{{ route('shop.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                    </div>
                </div>

            </td>
          </tr>
              @endforeach
        </tbody>
      </table>
      {{ $posts->links() }}
  </div>
  </div>
@endsection
