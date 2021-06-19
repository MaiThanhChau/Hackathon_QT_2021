@extends('layout.admin.index')
@section('title', 'Add Answer')
@section('content')

<div class="card card-primary">
<?php
    // dd($questions->toarray());
?>
    <!-- form start -->
    <form action="{{ route('answer.store') }}" method="post" enctype= "multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Question Name</label>
                <select class="form-control" name="id_question">
                @foreach($questions as $question)
                <option value="{{ $question->id_question }}">{{ $question->question }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" cols="30" rows="10" placeholder="Enter answer"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="exampleInputFile" name="file">
                    </div>
                </div>
            </div>
           
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
<script src="{{ asset('ckeditor.js') }}"></script>
<script> CKEDITOR.replace('answer'); </script>
@endsection