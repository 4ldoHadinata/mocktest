@extends('layouts.user')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Question</h1>
        <a href="{{ route('question.index', ['id' => $_GET['id'] ]) }}" class="btn btn-sm btn-primary shadow-sm">
            Back
        </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('question.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="subject_id" value="{{ $_GET['id'] }}">
                    <section class="form-group">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" name="question" placeholder="Enter the question here" value="{{ old('question') }}">
                    </section>
                    <section class="form-group">
                        <label for="answer">Answer</label>
                        <input type="text" class="form-control" name="answer" placeholder="Enter the answer here" value="{{ old('answer') }}">
                    </section>
                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection