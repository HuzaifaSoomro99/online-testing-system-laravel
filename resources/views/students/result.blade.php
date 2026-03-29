@extends('students.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow-sm text-center">
            <div class="card-body py-4">

                <h4 class="mb-3 fw-bold">📊 Test Result</h4>

                <div class="mb-4">
                    <div class="progress" style="height: 25px;">
                        <div class="progress-bar 
                            {{ $percentage >= 50 ? 'bg-success' : 'bg-danger' }}"
                            role="progressbar"
                            style="width: {{ $percentage }}%">
                            {{ $percentage }}%
                        </div>
                    </div>
                </div>

                <ul class="list-group mb-4">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Questions</span>
                        <strong>{{ $total }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between text-success">
                        <span>Correct Answers</span>
                        <strong>{{ $correct }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between text-danger">
                        <span>Wrong Answers</span>
                        <strong>{{ $wrong }}</strong>
                    </li>
                </ul>

                <h5 class="{{ $percentage >= 50 ? 'text-success' : 'text-danger' }}">
                    {{ $percentage >= 50 ? '🎉 Passed' : '❌ Failed' }}
                </h5>

                <div class="mt-4">
                    <a href="/student/dashboard" class="btn btn-primary">
                        Go to Dashboard
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
