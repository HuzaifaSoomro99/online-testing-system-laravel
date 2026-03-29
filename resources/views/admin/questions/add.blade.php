@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-4">➕ Add New Question</h4>
    <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary btn-sm">
        ← Back
    </a>
</div>


<form action="/admin/questions/store" method="POST" class="row g-3">
    @csrf

    <div class="col-12">
        <label class="form-label fw-semibold">Question</label>
        <input type="text" name="question" class="form-control" placeholder="Enter question here" required>
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Answer Key</label>
        <input type="text" name="answerkey" class="form-control" placeholder="Correct answer" required>
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary">
            Add Question
        </button>
    </div>
</form>
@endsection
