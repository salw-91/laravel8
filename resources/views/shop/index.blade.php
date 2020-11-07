@extends('layouts.app')

@section('content')
<div class="jumbotron container">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('shop.create')}}" role="button">Create</a>
    {{-- @if (Product::all()->deleted_at !== null) --}}
      <a class="btn btn-warning btn-lg" href="{{route('shop.trash')}}" role="button">Soft Deleted</a>
    {{-- @endif --}}
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
                        <a class="btn btn-success" href="{{route('shop.edit',$item->id)}}">Edit</a>
                    </div>

                    <div class="col-md-auto">
                        <a  class="btn btn-primary" href="{{route('shop.show',$item->id)}}">Show</a>
                    </div>
                    <div class="col-md-auto">
                        <a  class="btn btn-warning" href="{{route('soft.delete',$item->id)}}">Soft Delete</a>
                    </div>

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
      {{ $products->links() }}
  </div>
@endsection
