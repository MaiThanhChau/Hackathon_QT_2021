@extends('layout.admin.index')
@section('title', 'Question List')
@section('content')
    <?php
        // dd($questions->toarray());
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                aria-label="Toolbar with button groups">
                                <div class="btn-group" role="group" aria-label="First group">
                                    <h3 class="card-title">List</h3>
                                </div>
                                @if(Session::has('success'))
                                    <span style="color: green">{{ Session::get('success') }}</span>
                                @endif
                                <div class="input-group">
                                    <form action="{{ route('question.create') }}" method="get">
                                        @csrf
                                        <button class="btn btn-success" style="margin-right: 2px">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th colspan="2" style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $key => $question)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            <form action="{{ route('question.edit', $question->id_question) }}" method="get">
                                                @csrf
                                                <button class="btn btn-warning">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('question.destroy', $question->id_question) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection