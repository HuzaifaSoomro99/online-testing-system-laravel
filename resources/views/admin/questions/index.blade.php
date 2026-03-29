@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>📋 Questions List</h4>
    <a href="/admin/questions/create" class="btn btn-primary btn-sm">
        + Add New Question
    </a>
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
                <th>Question</th>
                <th>Answer Key</th>
                <th width="120">Edit</th>
                <th width="120">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->question }}</td>
                <td>
                    <span class="badge bg-success">
                        {{ $question->answerkey }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.questions.edit', $question->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('admin.questions.delete', $question->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this question?')">
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
