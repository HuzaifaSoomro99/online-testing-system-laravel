@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>👥 Student Accounts</h4>
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
                <th>Date</th>
                <th width="120">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($results as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->account->firstname }} {{ $result->account->lastname }}</td>
                <td>{{ $result->obtainmarks }}</td>
                <td>{{ $result->status }}</td>
                <td>{{ $result->percentage }}</td>
                <td>{{ $result->date }}</td>
                <td>   
                <form action="{{ route('admin.result.delete', $result->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </td>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
