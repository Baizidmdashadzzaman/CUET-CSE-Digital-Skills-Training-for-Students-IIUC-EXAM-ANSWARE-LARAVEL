@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Education</h1>
    <form action="{{ route('educations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="degree">Degree</label>
            <input type="text" class="form-control" id="degree" name="degree" required>
        </div>
        <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" class="form-control" id="institution" name="institution" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" class="form-control" id="year" name="year" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
