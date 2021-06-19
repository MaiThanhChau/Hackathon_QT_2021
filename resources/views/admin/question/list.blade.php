@extends('layout.admin.index')
@section('title', 'Question List')
@section('content')
    <?php
        // dd($categories->toarray());
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
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <form action="{{ route('question.edit', 1) }}" method="get">
                                                @csrf
                                                <button class="btn btn-warning">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('question.destroy', 1) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
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