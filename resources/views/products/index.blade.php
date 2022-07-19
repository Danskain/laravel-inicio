@extends('layouts.master')

@section('content')
    <h1>List of Products</h1>

    @if(empty($products))
    @endif
    @empty($products)
        <div class="alert alert-warning">
            La lista de productos esta basia
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped"> 
                <thead class="thead-light"> 
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Descrption</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty    
@endsection