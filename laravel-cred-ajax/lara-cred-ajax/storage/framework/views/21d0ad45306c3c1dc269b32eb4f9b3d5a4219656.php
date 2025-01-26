<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="site-url" content="<?php echo e(url('/')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap4.0.0.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <style>
        .page-link{
            color: #28A745;
        }
        .page-item.active .page-link{
            background-color: #28A745;
            border-color: #28A745;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <header class="bg-success p-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center text-white">Laravel Crud with AJAX</h1>
                    </div>
                </div>
            </div>
        </header>
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="bg-success text-white p-2 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span>Copyright © <?php echo date('Y'); ?> | <a href="https://www.yahoobaba.net" class="text-white" target="_blank">YahooBaba</a></span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main_ajax.js')); ?>"></script>
</body>
</html><?php /**PATH D:\xampp\htdocs\laravel-ajax\script\resources\views/layout.blade.php ENDPATH**/ ?>