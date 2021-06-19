@extends('layout.admin.index')
@section('title', 'Add Question')
@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form action="{{ route('question.store') }}" method="post">
    @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>

@endsection