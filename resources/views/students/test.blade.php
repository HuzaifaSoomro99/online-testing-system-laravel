@extends('students.layout')

@section('content')

{{-- ===================== --}}
{{-- QUESTION MODE --}}
{{-- ===================== --}}
@if($index < $total)

<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="badge bg-warning text-dark fs-6">
        ⏱ Time Left: <span id="timer"></span>
    </span>

    <span class="badge bg-secondary fs-6">
        Question {{ $index + 1 }} / {{ $total }}
    </span>
</div>

<script>
let timeLeft = {{ $remaining }};

function startTimer() {
    let timer = setInterval(() => {
        let min = Math.floor(timeLeft / 60);
        let sec = timeLeft % 60;

        document.getElementById('timer').innerHTML =
            min + ":" + (sec < 10 ? "0" + sec : sec);

        timeLeft--;

        if (timeLeft < 0) {
            clearInterval(timer);
            window.location.href = "/test/submit";
        }
    }, 1000);
}

startTimer();
</script>

<div class="card shadow-sm">
    <div class="card-body">

        <h5 class="mb-4">
            {{ $question['question'] }}
        </h5>

        <form action="/test/save" method="POST">
            @csrf

            <input type="hidden" name="question_id" value="{{ $question['id'] }}">
            <input type="hidden" name="next" id="nextIndex" value="{{ $index + 1 }}">

            <div class="list-group mb-4">
                @foreach ($question['answers'] as $ans)
                    <label class="list-group-item list-group-item-action">
                        <input class="form-check-input me-2"
                               type="radio"
                               name="answer"
                               value="{{ $ans['id'] }}"
                               {{ $selected == $ans['id'] ? 'checked' : '' }}>
                        {{ $ans['answers'] }}
                    </label>
                @endforeach
            </div>

            <div class="d-flex justify-content-between">

                {{-- Previous --}}
                @if ($index > 0)
                    <button type="submit"
                            class="btn btn-outline-secondary"
                            onclick="document.getElementById('nextIndex').value={{ $index - 1 }}">
                        ← Previous
                    </button>
                @else
                    <div></div>
                @endif

                {{-- Next / Finish --}}
                @if ($index < $total - 1)
                    <button type="submit" class="btn btn-primary">
                        Next →
                    </button>
                @else
                    <button type="submit" class="btn btn-success">
                        Finish Test
                    </button>
                @endif

            </div>
        </form>

    </div>
</div>

{{-- ===================== --}}
{{-- COMPLETION MODE --}}
{{-- ===================== --}}
@else

<div class="card shadow-sm text-center">
    <div class="card-body py-5">
        <h4 class="mb-3 text-success">✅ Test Completed</h4>

        <p class="text-muted mb-4">
            You have completed all the questions.<br>
            Click the button below to submit your test.
        </p>

        <form action="/test/submit" method="POST">
            @csrf
            <button class="btn btn-lg btn-primary">
                Submit Test
            </button>
        </form>
    </div>
</div>

@endif

@endsection
