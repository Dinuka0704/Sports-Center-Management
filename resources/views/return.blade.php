@extends('layouts.app')

@section('content')
<h2>Return Equipment</h2>

<form action="{{ url('/return/'.$borrow->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Condition</label>
        <select name="condition" class="form-control">
            <option value="Good">Good</option>
            <option value="Damaged">Damaged</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Return Item</button>
</form>
@endsection
