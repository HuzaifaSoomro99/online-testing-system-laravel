@extends('students.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>👥 Student Result</h4>
    <a href="{{ route('std.dashboard') }}" class="btn btn-secondary btn-sm">
        ← Back
    </a>
</div>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Obtain Marks</th>
                <th>Status</th>
                <th>Percentage</th>
                <th width="120">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($result as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->account->firstname }} {{ $result->account->lastname }}</td>
                <td>{{ $result->obtainmarks }}</td>
                <td>{{ $result->status }}</td>
                <td>{{ $result->percentage }}</td>
                <td>{{ $result->date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
