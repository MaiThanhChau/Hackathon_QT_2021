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
                <label for="name">Name</label>
                <textarea name="name" id="name" cols="30" rows="10" placeholder="Enter name"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
<script> CKEDITOR.replace('name'); </script>
@endsection