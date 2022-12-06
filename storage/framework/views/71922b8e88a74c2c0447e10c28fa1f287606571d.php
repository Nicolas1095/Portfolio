<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <title><?php echo e(__('Portfolio')); ?> Nicolas Galarraga</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f7cea812e2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo e(storage_path('img/icon.png')); ?>" type="image/x-icon">
    <!-- Css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <?php if(app()->environment('production')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <?php endif; ?>
</head>

<body>
    <div class="alerts position-fixed">
        <?php if($errors->any()): ?>
            <?php echo implode(
                '',
                $errors->all('
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        :message
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        </button>
                                                    </div>'),
            ); ?>

        <?php endif; ?>
        <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissible fade show"><?php echo e(session('status')); ?><button type="button"
                    class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button></div>
        <?php endif; ?>
    </div>
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.statically.io/gh/kswedberg/jquery-smooth-scroll/3948290d/jquery.smooth-scroll.min.js"></script>
    <script src="<?php echo e(asset('js/minified/ScrollTrigger.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/minified/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/portfolio.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\laragon\www\portfolio\resources\views/layouts/structure.blade.php ENDPATH**/ ?>