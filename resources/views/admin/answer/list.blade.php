@extends('layout.admin.index')
@section('title', 'Answer List')
@section('content')
    <?php
        // dd($answers[0]->question->question);
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
                                    <form action="{{ route('answer.create') }}" method="get">
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
                                        <th>Title</th>
                                        <th>Question Name</th>
                                        <th colspan="2" style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($answers as $key => $answer)
 
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $answer->title }}</td>
                                        <td>{{ $answer->quest->question }}</td>
                                        <td>
                                            <form action="{{ route('answer.edit', 1) }}" method="get">
                                                @csrf
                                                <button class="btn btn-warning">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('answer.destroy', 1) }}" method="post">
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