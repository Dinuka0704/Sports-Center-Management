@extends('layouts.app')

@section('content')
<h2>Add New Equipment</h2>

<form action="{{ route('equipment.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Total Quantity</label>
        <input type="number" name="quantity_total" class="form-control" min="1" required>
    </div>
    <button type="submit" class="btn btn-success">Add Equipment</button>
</form>
@endsection
