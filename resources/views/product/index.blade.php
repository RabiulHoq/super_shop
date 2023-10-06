@extends('layout')
@section('content')
    <style>
        .uper {
            margin: 40px
        }
    </style>
    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-stripd">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Product name</td>
                    <td>Product Description</td>
                    <td>Product Price</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td><a href="{{ route('supershop.edit', $product->id) }}" class="btn btn-outline-primary">Edit</a></td>
                        <td>
                            <form method="post" action="{{ route('supershop.destroy', $product->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
