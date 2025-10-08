@extends('layouts.app')

@section('content')
<h2>Borrow Equipment</h2>

<form action="{{ route('borrow.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Student ID</label>
        <input type="text" name="student_id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Equipment</label>
        <select name="equipment_id" class="form-control" required>
            @foreach(\App\Models\Equipment::all() as $item)
                <option value="{{ $item->id }}">{{ $item->name }} (Available: {{ $item->quantity_available }})</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Borrow</button>
</form>
@endsection
