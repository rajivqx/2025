<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap4.0.0.min.css')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <div id="wrapper">
        <header class="bg-info p-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center text-white">Laravel Crud</h1>
                    </div>
                </div>
            </div>
        </header>
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="bg-info text-white p-2 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span>Copyright © <?php echo date('Y'); ?> | <a href="https://www.yahoobaba.net" class="text-white" target="_blank">YahooBaba</a></span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html><?php /**PATH D:\xampp\htdocs\laravel-crud\resources\views/layout.blade.php ENDPATH**/ ?>