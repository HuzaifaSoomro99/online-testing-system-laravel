@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-4">➕ Add Answer</h4>
    <a href="{{ route('admin.answers.index') }}" class="btn btn-secondary btn-sm">
        ← Back
    </a>
</div>


<form action="/admin/answers/store" method="POST" class="row g-3">
    @csrf

    <div class="col-12">
        <label class="form-label fw-semibold">Select Question</label>
        <select name="question" class="form-select" required>
            <option value="">-- Select Question --</option>
            @foreach ($questions as $q)
                <option value="{{ $q->id }}">{{ $q->question }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Answer</label>
        <input type="text"
               name="answer"
               class="form-control"
               placeholder="Enter answer"
               required>
    </div>

    <div class="col-12 text-end">
        <button class="btn btn-primary">
            Add Answer
        </button>
    </div>
</form>
@endsection
