@extends('layouts.user')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Subject</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('subject.update', $subject->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <section class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter the Subject Here" value="{{ old('subject') ?? $subject->subject }}">
                    </section>
                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection