@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Edit product.
          {{$product->name}}
        <form action="{{route('shop.update', $product->id )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Apply">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Price</label>
          <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="2,5">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Detail</label>
        <textarea class="form-control" name="detail" rows="3">{!!$product->detail!!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

      </form>
    </div>
</div>

@endsection
