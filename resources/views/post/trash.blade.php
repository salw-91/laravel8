@extends('layouts.app')

@section('content')
<div class="jumbotron container">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('posts.index')}}" role="button">Index</a>
    </p>
  </div>
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
</div>

  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col"  class="text-center">#</th>
            <th scope="col"  class="text-center">title</th>
            <th scope="col"  class="text-center">user</th>
            <th scope="col"  class="text-center">photo</th>
            <th scope="col" class="text-center">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item )

          <tr>
            <th scope="row"  class="text-center">{{$item->id}}</th>
            <td  class="text-center">{{$item->title}}</td>
            <td  class="text-center">{{$item->user->name}}</td>
            <td  class="text-center"><img src="{{$item->photo}}" alt="{{$item->photo}}"
                class="img-tumbnail" width="100" height="100"></td>

            <td>
                <div class="row">
                  <div class="col-md-auto">
                        <a class="btn btn-success" href="{{route('post.restore',$item->id)}}">Return</a>
                        <a class="btn btn-danger" href="{{route('post.harddelete',$item->id)}}">Hard Delete</a>
                    </div>

                  </div>
                </div>

            </td>
          </tr>
              @endforeach
        </tbody>
      </table>
      {{-- {{ $posts->links() }} --}}
  </div>
@endsection
