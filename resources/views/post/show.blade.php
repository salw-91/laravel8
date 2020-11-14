@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Create product.

        <form action="{{route('shop.index')}}">
        @csrf
        <div class="form-group">
          <label><b>Name</b> </label>
          <p>{{$product->name}}</p>
        </div>
        <div class="form-group">
          <label><b>Price</b></label>
          <p>{{$product->price}}</p>
        </div>
        <div class="form-group">

          <label ><b>Detail</b></label>
          <p>{!!$product->detail!!}</p>
        </div>
        <button type="submit" class="btn btn-primary">Back</button>

      </form>
    </div>
</div>

@endsection
