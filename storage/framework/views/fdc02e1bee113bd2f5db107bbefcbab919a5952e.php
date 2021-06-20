
<?php $__env->startSection('title', 'Add Answer'); ?>
<?php $__env->startSection('content'); ?>

<div class="card card-primary">
<?php
    // dd($questions->toarray());
?>
    <!-- form start -->
    <form action="<?php echo e(route('answer.update', $answer->id)); ?>" method="post" enctype= "multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="card-body">
            <div class="form-group">
                <label>Question Name</label>
                <select class="form-control" name="id_question">
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($question->id); ?>"
                    <?php if($answer->id_question == $question->id): ?>
                    <?php echo e('selected'); ?>

                    <?php endif; ?>
                ><?php echo e($question->question); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo e($answer->title); ?>">
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" cols="30" rows="10" placeholder="Enter answer"><?php echo e($answer->answer); ?></textarea>
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
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<script src="<?php echo e(asset('ckeditor.js')); ?>"></script>
<script> CKEDITOR.replace('answer'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CodeGym\Hackathon_QT_2021\resources\views/admin/answer/edit.blade.php ENDPATH**/ ?>