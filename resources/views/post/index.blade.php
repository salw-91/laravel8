@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Posts  </h1>
        <a class="btn btn-primary btn-lg" href="{{route('posts.create')}}"> Create</a>
        @if ($postsDeleted->count() > 0 )
        <a class="btn btn-warning btn-lg" href="{{route('post.trashed')}}"> Trash </a>
        @endif
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


            @foreach ($posts as $item )

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$item->photo}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$item->title}}</h5>
                  <p class="card-text">{{$item->body}}</p>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><p class="card-text">Created at: {{$item->user->name}}</p></li>
                    <li class="list-group-item"><p class="card-text">Created at: {{$item->created_at->diffForhumans()}}</p></li>
                    <li class="list-group-item"><p class="card-text">Updated at: {{$item->updated_at->diffForhumans()}}</p></li>
                    </ul>
                    <div class="card-body">

                  <a class="btn btn-success mr-1" href="{{route('posts.edit',$item->id)}}">Edit</a>
                        <a  class="btn btn-primary mr-1" href="{{route('posts.show',$item->slug)}}">Show</a>
                        <a  class="btn btn-warning mr-1" href="{{route('post.soft.delete',$item->id)}}">Soft Delete</a>
                </div>
              </div>

              @endforeach
        </tbody>
      </table>
      {{ $posts->links() }}
  </div>
  </div>
@endsection
