

<?php $__env->startSection('title', 'Add New Student'); ?>

<?php $__env->startSection('content'); ?>
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Add New Student</h3>
                        <a href="/students" class="btn btn-info float-right">All Students</a>
                    </div>
                    <div class="card-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                        <form action="/students" class="form-horizontal" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Student Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Student Class</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="class">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Student Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-info" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\new_laravel\resources\views/create.blade.php ENDPATH**/ ?>