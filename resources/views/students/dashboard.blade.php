@extends('students.layout')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h4 class="mb-3">🎓 Student Panel</h4>

<h6 class="mb-4">
    Welcome Dear :
    <strong>{{ $account->firstname }} {{ $account->lastname }}</strong>
</h6>

<div class="row g-3">

    <!-- View Profile -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h6 class="mb-2">👤 View Profile</h6>
                <a href="{{ route('students.accounts.edit', $account->id) }}"
                   class="btn btn-outline-primary btn-sm">
                    View Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Results -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h6 class="mb-2">📊 Results</h6>
                <a href="{{route('test.result',$account->id)}}"
                   class="btn btn-outline-success btn-sm">
                    View Results
                </a>
            </div>
        </div>
    </div>

    <!-- Test Start -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h6 class="mb-2">📝 Test</h6>
                <a href="/test/start"
                   class="btn btn-outline-warning btn-sm">
                    Start Test
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
