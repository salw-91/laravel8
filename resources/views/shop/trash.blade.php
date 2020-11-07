@extends('layouts.app')

@section('content')
<div class="jumbotron container">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('shop.index')}}" role="button">Index</a>
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
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col-md-auto">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $item )

          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->price}} €</td>
            {{-- <td>{{$item->detail}}</td> --}}
            <td>
                <div class="row">
                  <div class="col-md-auto">
                        <a class="btn btn-success" href="{{route('shop.return.trash',$item->id)}}">Return</a>
                        <a class="btn btn-danger" href="{{route('shop.hard.delete',$item->id)}}">Hard Delete</a>
                    </div>
                    <div class="col-md-auto">
                        {{-- <form action="{{ route('shop.hard.destroy',$item->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                    </div>
                  </div>
                </div>

            </td>
          </tr>
              @endforeach
        </tbody>
      </table>
      {{ $products->links() }}
  </div>
@endsection
