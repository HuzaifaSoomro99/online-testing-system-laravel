@extends('students.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>✏ Edit Account</h4>
    <a href="{{ route('std.dashboard') }}" class="btn btn-secondary btn-sm">
        ← Back
    </a>
</div>

<form action="{{ route('students.accounts.update', $account->id) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')

    <div class="col-md-6">
        <label class="form-label fw-semibold">First Name</label>
        <input type="text"
               name="fname"
               class="form-control"
               value="{{ old('fname', $account->firstname) }}"
               required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Last Name</label>
        <input type="text"
               name="lname"
               class="form-control"
               value="{{ old('lname', $account->lastname) }}"
               required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">CNIC</label>
        <input type="text"
               name="cnic"
               class="form-control"
               value="{{ old('cnic', $account->cnic) }}"
               required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Gender</label>
        <select name="gender" class="form-select" required>
            <option value="">-- Select Gender --</option>
            <option value="male" {{ old('gender', $account->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $account->gender) == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email', $account->email) }}"
               required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">New Password (optional)</label>
        <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
    </div>

    <div class="col-12 text-end">
        <button class="btn btn-success">
            Update Account
        </button>
    </div>
</form>
@endsection
