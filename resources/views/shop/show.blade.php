@extends('shop.layout')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Create product.
          {{-- {{$id}}
          {{$product->name}} --}}
        <form action="{{route('shop.index')}}" >
        @csrf
        <div class="form-group">
          <label>Name</label>
          <p>{{$product->name}}</p>
        </div>
        <div class="form-group">
          <label>Price</label>
          <p>{{$product->price}}</p>
        </div>
        <div class="form-group">

          <label >Detail</label>
          <p>{!!$product->detail!!}</p>
        </div>
        <button type="submit" class="btn btn-primary">Back</button>

      </form>
    </div>
</div>

@endsection
