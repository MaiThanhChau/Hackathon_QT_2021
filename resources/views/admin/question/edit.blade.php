@extends('layout.admin.index')
@section('title', 'Edit Question')
@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form action="{{ route('question.update', $question->id_question) }}" method="post">
    @csrf
    @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $question->question }}">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection