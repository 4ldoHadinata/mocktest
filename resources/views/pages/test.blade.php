@extends('layouts.user')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ $subject->subject }} Test</h1>
      <a href="{{ route('subject.index') }}" class="btn btn-sm btn-primary shadow-sm">
        Back
      </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            @forelse ($questions as $question)
            <section class="form-group">
                <label for="question">{{ $question->question }}</label>
                <input type="text" class="form-control" name="answer" placeholder="Enter the Answer Here" value="{{ old('answer') }}">
                @if (session()->has('done'))
                    <span>Answer : </span><br>
                    <p>{{ $question->answer }}</p>
                @endif
            </section>
            @empty
                <h2>No Question yet</h2>
            @endforelse
            <a href="{{ route('answer', ['id' => $subject->id]) }}" class="btn btn-info">
                Done
            </a>
        </div>
    </div>

</div>
@endsection