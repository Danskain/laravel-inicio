@extends('layouts.app')

@section('content')
    <h1>Create a product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="form-row">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label>Description</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') }}" required>
        </div>
        <div class="form-row">
            <label>price</label>
            <input class="form-control" type="number" min="1.00" step="0.01"   name="price" value="{{ old('price') }}" required>
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number" name="stock" value="{{ old('stock') }}" required>
        </div>
        <div class="form-row">
            <label>Status</label>
            <select class="form-control" type="text" name="status" required>
                <option value="" selected>Select...</option>
                <option {{ old('status') == 'available' ? 'selected' : ''}} value="available">available</option>
                <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
            </select> 
        </div>
        <div class="form-row mt-3">
            <button class="btn btn-primary btn-lg" type="submit">Create Product</button>
        </div>
    </form>
@endsection
