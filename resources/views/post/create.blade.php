@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="card">
        <div class="card-body">
          Create product.

        <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Apply">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Price</label>
          <input type="text" name="price" class="form-control" placeholder="2,5">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Detail</label>
          <textarea class="form-control" name="detail" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>

      </form>
    </div>
</div>

@endsection
