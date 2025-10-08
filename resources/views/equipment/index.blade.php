@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Equipment List</h2>
    <a href="{{ route('equipment.create') }}" class="btn btn-primary">Add Equipment</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Total Quantity</th>
            <th>Available</th>
            <th>Damaged</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipment as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category }}</td>
            <td>{{ $item->quantity_total }}</td>
            <td>{{ $item->quantity_available }}</td>
            <td>{{ $item->quantity_damaged }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
