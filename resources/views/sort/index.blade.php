@extends('layouts.app')

@section('content')
@auth
<div class="container">
    <div class="row">
      <div class="col">
<div class="jumbotron">
    <h1 class="display-4">All Sorts  </h1>    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('sort.create')}}" role="button">Create</a>
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
            <th scope="col" class="text-center">Skill name</th>
            <th scope="col" class="text-center">Edit</th>
          </tr>
        </thead>
        <tbody>

            @php
            $i = 1;
        @endphp

            @foreach ($sorts as $item )

          <tr>
            <th scope="row" class="text-center">{{$i++}}</th>
            <td class="text-center">{{$item->sort}}</td>

            <td class="text-center">
                <div class="row justify-content-center">

                    <div class="col-md-auto">
                        <a class="btn btn-success" href="{{route('sort.edit',$item->id)}}">Edit</a>
                    </div>

                    <div class="col-md-auto">
                        <a  class="btn btn-warning" href="{{route('sort.destroy',$item->id)}}" method="DELETE">Delete</a>
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
