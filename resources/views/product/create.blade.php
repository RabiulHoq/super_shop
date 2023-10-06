@extends('layout')
@section('content')
    <style>
        .uper {
            margin: 40px
        }
    </style>
    
    <div class="card uper">
        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('supershop.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="product_name">

                </div>

                <div class="form-group">
                    <label for="description">Product Description</label>
                    <input type="text" class="form-control" name="product_description">

                </div>

                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="text" class="form-control" name="product_price">

                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>

    </div>
@endsection
