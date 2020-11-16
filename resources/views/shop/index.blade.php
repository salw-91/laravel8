@extends('layouts.app')

@section('content')
{{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"> --}}
@auth
<div class="container">
    <div class="row">
      <div class="col">
<div class="jumbotron">
    <h1 class="display-4">All Products  </h1>    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('shop.create')}}" role="button">Create</a>
    {{-- @if (Product::all()->deleted_at !== null) --}}
      <a class="btn btn-warning btn-lg" href="{{route('shop.trash')}}" role="button">Soft Deleted</a>
    {{-- @endif --}}
    </p>
  </div>
@endif
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
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Price</th>
            <th scope="col" class="text-center">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $item )

          <tr>
            <th scope="row">{{$item->id}}</th>
            <td class="text-center">{{$item->name}}</td>
            <td class="text-center">{{$item->price}} €</td>
            {{-- <td class="text-center">{{$item->detail}}</td> --}}
            <td class="text-center">
                <div class="row justify-content-center">
                    @auth
                    <div class="col-md-auto">
                        <a class="btn btn-success" href="{{route('shop.edit',$item->id)}}">Edit</a>
                    </div>

                    <div class="col-md-auto">
                        <a  class="btn btn-primary" href="{{route('shop.show',$item->id)}}">Show</a>
                    </div>
                    <div class="col-md-auto">
                        <a  class="btn btn-warning" href="{{route('soft.delete',$item->id)}}">Soft Delete</a>
                    </div>
                    @else
                    <div class="col-md-auto">
                        <a  class="btn btn-primary" href="{{route('shop.show',$item->id)}}">Show</a>
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
      {{ $products->links() }}
  </div>
  </div>
@endsection
