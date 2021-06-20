
<?php $__env->startSection('title', 'Answer List'); ?>
<?php $__env->startSection('content'); ?>
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
                                <?php if(Session::has('success')): ?>
                                    <span style="color: green"><?php echo e(Session::get('success')); ?></span>
                                <?php endif; ?>
                                <div class="input-group">
                                    <a href="<?php echo e(route('answer.create')); ?>" method="get">
                                        <button class="btn btn-success" style="margin-right: 2px">Add</button>
                                    </a>
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
                                <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
                                    <tr>
                                        <td><?php echo e(++$key); ?></td>
                                        <td><?php echo e($answer->title); ?></td>
                                        <td><?php echo e($answer->quest->question); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('answer.edit', $answer->id)); ?>" method="get">
                                                <button class="btn btn-warning">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('answer.destroy', $answer->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CodeGym\Hackathon_QT_2021\resources\views/admin/answer/list.blade.php ENDPATH**/ ?>