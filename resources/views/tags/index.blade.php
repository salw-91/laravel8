@extends('layouts.app')

@section('content')
{{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"> --}}
@auth
<div class="container">
    <div class="row">
      <div class="col">
<div class="jumbotron">
    <h1 class="display-4">All Tags  </h1>    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('tag.create')}}" role="button">Create</a>

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
            <th scope="col" class="text-center">Tag name</th>
            <th scope="col" class="text-center">Edit</th>
          </tr>
        </thead>
        <tbody>

            @php
            $i = 1;
        @endphp

            @foreach ($tags as $item )

          <tr>
            <th scope="row" class="text-center">{{$i++}}</th>
            <td class="text-center">{{$item->tag}}</td>

            <td class="text-center">
                <div class="row justify-content-center">

                    <div class="col-md-auto">
                        <a class="btn btn-success" href="{{route('tag.edit',$item->id)}}">Edit</a>
                    </div>

                    <div class="col-md-auto">
                        <a  class="btn btn-warning" href="{{route('tag.destroy',$item->id)}}" method="DELETE">Delete</a>
                    </div>

                    <div class="col-md-auto">
                    </div>
                </div>

            </td>
          </tr>
              @endforeach
        </tbody>
      </table>
  </div>
  </div>
@endsection
