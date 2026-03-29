@extends('students.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>➕ Add New Account</h4>
    <a href="{{ route('students.accounts.index') }}" class="btn btn-secondary btn-sm">
        ← Back
    </a>
</div>

<form action="/accounts/store" method="POST" class="row g-3">
    @csrf

    <div class="col-md-6">
        <label class="form-label fw-semibold">First Name</label>
        <input type="text" name="fname" class="form-control" placeholder="First name" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Last Name</label>
        <input type="text" name="lname" class="form-control" placeholder="Last name" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">CNIC</label>
        <input type="text" name="cnic" class="form-control" placeholder="XXXXX-XXXXXXX-X" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Gender</label>
        <select name="gender" class="form-select" required>
            <option value="">-- Select Gender --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Email</label>
        <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Create password" required>
    </div>

    <div class="col-12 text-end">
        <button class="btn btn-primary">
            Add Account
        </button>
    </div>
</form>
@endsection
