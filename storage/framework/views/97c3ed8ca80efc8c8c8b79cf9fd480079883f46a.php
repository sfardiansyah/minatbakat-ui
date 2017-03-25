<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Minat Bakat UI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

        <!-- Scripts -->
        <script type="text/javascript" src="<?php echo e(URL::asset('js/app.js')); ?>"></script>
    </head>
    <body>
        <div class="row position-abs" style="height: 100%; width: 100%; margin-left: 0;">
            <div class="col-md-4 sect" id="senbud">
            
            </div>
            <div class="col-md-4 sect" id="pnk">
                
            </div>
            <div class="col-md-4 sect" id="depor">
                
            </div>
        </div>

        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Minat Bakat UI
                </div>
            </div>
        </div>
    </body>
</html>
