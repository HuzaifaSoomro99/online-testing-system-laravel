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
                <th>CNIC</th>
                <th>Gender</th>
                <th>Email</th>
                <th width="120">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($accounts as $account)
            <tr>
                <td>{{ $account->id }}</td>
                <td>{{ $account->firstname }} {{ $account->lastname }}</td>
                <td>{{ $account->cnic }}</td>
                <td>
                    <span class="badge {{ $account->gender == 'male' ? 'bg-primary' : 'bg-danger' }}">
                        {{ ucfirst($account->gender) }}
                    </span>
                </td>
                <td>{{ $account->email }}</td>
                <td>
                    <form action="{{ route('students.accounts.delete', $account->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
