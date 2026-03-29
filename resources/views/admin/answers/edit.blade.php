@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>✏ Edit Answer</h4>
    <a href="{{ route('admin.answers.index') }}" class="btn btn-secondary btn-sm">
        ← Back
    </a>
</div>

<form action="{{ route('admin.answers.update', $answer->id) }}" method="POST" class="row g-3">
    @csrf
    @method('put')

    <div class="col-12">
        <label class="form-label fw-semibold">Question</label>
        <select name="question" class="form-select" required>
            @foreach ($questions as $q)
                <option value="{{ $q->id }}"
                    {{ old('question', $answer->question_id) == $q->id ? 'selected' : '' }}>
                    {{ $q->question }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Answer</label>
        <input type="text"
               name="answer"
               class="form-control"
               value="{{ old('answer', $answer->answers) }}"
               required>
    </div>

    <div class="col-12 text-end">
        <button class="btn btn-success">
            Update Answer
        </button>
    </div>
</form>
@endsection
