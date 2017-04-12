<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(isset($name) ? title_case($name) : ''); ?> | <?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Titillium+Web" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <style type="text/css">
        #<?php echo e(isset($name) ? $name : ''); ?>-list {
            background-color: #fddf01;
            color: #022d41;
        }
    </style>

    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo e(URL::asset('/js/jquery-3.1.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('/js/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('/js/script.js')); ?>"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app" class="<?php echo e(isset($name) ? $name : ''); ?>-color-back">
        <nav class="navbar navbar-default navbar-static-top <?php echo e(isset($name) ? $name : ''); ?>-color-dark">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo e(url('/senbud')); ?>" id="senbud-list">Senbud</a></li>
                        <li><a href="<?php echo e(url('/pnk')); ?>" id="pnk-list">PnK</a></li>
                        <li><a href="<?php echo e(url('/depor')); ?>" id="depor-list">Depor</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
</body>
</html>
