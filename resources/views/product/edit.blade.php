@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Product Edit
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('supershop.update', $gadget->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="{{ $gadget->product_name }}" />
                </div>
                <div class="form-group">
                    <label for="price">Product Description</label>
                    <input type="text" class="form-control" name="product_description" value="{{ $gadget->product_description }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Product Price</label>
                    <input type="number" class="form-control" name="product_price" value="{{ $gadget->product_price }}" />
                </div> <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
