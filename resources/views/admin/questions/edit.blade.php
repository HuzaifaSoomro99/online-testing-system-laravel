@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>✏ Edit Question</h4>
    <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary btn-sm">
        ← Back
    </a>
</div>

<form action="{{ route('admin.questions.update', $data->id) }}" method="POST" class="row g-3">
    @csrf
    @method('put')

    <div class="col-12">
        <label class="form-label fw-semibold">Question</label>
        <input type="text"
               name="question"
               class="form-control"
               value="{{ old('question', $data->question) }}"
               required>
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Answer Key</label>
        <input type="text"
               name="answerkey"
               class="form-control"
               value="{{ old('answerkey', $data->answerkey) }}"
               required>
    </div>

    <div class="col-12 text-end">
        <button class="btn btn-success">
            Update Question
        </button>
    </div>
</form>
@endsection
