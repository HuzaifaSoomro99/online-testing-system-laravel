@extends('admin.layout')

@section('content')

<h4 class="mb-3">👋 Welcome, Admin</h4>

<p class="text-muted mb-4">
    This is the Online Testing System dashboard. From here, you can manage
    questions, student accounts, and view test results.
</p>

<div class="row g-4">

    <!-- Questions -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center border-0">
            <div class="card-body">
                <h6 class="text-muted mb-2">📘 Total Questions</h6>
                <h3 class="fw-bold text-primary">
                    {{ $questions }}
                </h3>
            </div>
        </div>
    </div>

    <!-- Accounts -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center border-0">
            <div class="card-body">
                <h6 class="text-muted mb-2">👥 Student Accounts</h6>
                <h3 class="fw-bold text-success">
                    {{ $accounts }}
                </h3>
            </div>
        </div>
    </div>

    <!-- Results -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center border-0">
            <div class="card-body">
                <h6 class="text-muted mb-2">📊 Test Results</h6>
                <h3 class="fw-bold text-warning">
                    {{ $results }}
                </h3>
            </div>
        </div>
    </div>

</div>

@endsection
