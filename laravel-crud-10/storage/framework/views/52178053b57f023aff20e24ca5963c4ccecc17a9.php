

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
                                <label for="" class="col-sm-3 text-right">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Class</label>
                                <div class="col-sm-6">
                                    <select name="class" class="form-control">
                                        <option value="" selected disabled selected >Select Class</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class_list->id); ?>"><?php echo e($class_list->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Age</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="age">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Gender</label>
                                <div class="col-sm-3">
                                    <input type="radio" name="gender" value="m"> Male
                                    <input type="radio" name="gender" value="f"> Female
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel-crud\resources\views/create.blade.php ENDPATH**/ ?>