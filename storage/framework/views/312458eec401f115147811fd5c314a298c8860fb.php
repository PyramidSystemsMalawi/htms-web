<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="css/login.css">
<div class="container-fluid main-wrapper">
        <div class="row" >
            <header class="col-7 mx-auto text-center text-white">
                <h3 class=" mt-5 mb-0 login_title">TRAFFICKING IN-PERSONS MANAGEMENT INFORMATION</h3>
                <h1 class="text-center login_title mt-0">SYSTEM</h1>
                <div class="image ui m-0">
                    <img src="img/logo-main.png" alt="Application Logo">
                </div>
            </header>
            <div class="col-6 mx-auto">
                          <?php if($errors->first('email') != null && !empty($errors->first('email'))): ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Access Denied: </strong>  <?php echo e($errors->first('email')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php endif; ?>
                          <?php if($errors->first('password') != null && !empty($errors->first('password'))): ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Access Denied: </strong>  <?php echo e($errors->first('password')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php endif; ?>
                         <?php if($errors->first('access_denied') != null && !empty($errors->first('access_denied'))): ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Access Denied: </strong>  <?php echo e($errors->first('access_denied')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php endif; ?>
                    </div>
            <main class="col-12" id="central_container">
                <div class="row">

                    <div class=" col-md-10 col-lg-4 mx-auto mt-10">
                        <div class="login login_pad" augmented-ui="tl-clip-y br-clip exe">
                            <form class="ui form" d="loginForm" method="POST" action="users/login" autocomplete="off">
                            <?php echo csrf_field(); ?>
                                <div class="ui icon medium input field fluid">
                                    <input type="email" autocomplete="off" name="email" id="username" placeholder="Username">
                                    <i class="user circle icon"></i>
                                </div>
                                <div class="ui medium icon input field fluid">
                                    <input type="password" autocomplete="off" name="password" id="password" placeholder="Password">
                                    <i class="lock icon"></i>
                                </div>
                                <div class="field fluid">
                                    <button type="submit"  id="loginBtn"
                                    class="btn btn-md float-right negative ui button">Authenticate <i class="sign-in icon"></i></button>
                                </div>
                                <div class="field">
                                    <!-- <div style="color:#018cd6;" class="ui horizontal divider">OR</div> -->
                                </div>
                                <div class="fluid field">

                                    <!-- <label><a style="font-family: monaco;" href="">Forgot Password?</a></label> -->
                                </div>
                            </form>
                        </div>
                        <div class="m-3 p-2 ">
                            <div style="color:red !important;" class="ui horizontal divider"
                            style="font-family: orbitron !important;">NO UNAUTHORIZED USE</div>
                            <div class="row text-center">
                                <div class="col-4 offset-2">
                                    <div class="ui image tiny">
                                        <img src="img/mg-logo.png" alt="" class="ui img">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="ui image tiny">
                                        <img src="img/usaid-logo.png" alt="" class="ui img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="col-12 text-center ">
                <label class="text-white" style="margin-top:5em;font-family: monaco;">Copyright&copy;2021 - Pyramid Systems!</label>
            </footer>
        </div>
   </div>

<style>
    .login_title{
        font-family: roboto !important;
        text-transform: uppercase !important;
    }
</style>
    <script>
        const BaseURL = "http:"
        $(()=>{
            let BaseURL = '<?php echo e(config('app.url')); ?>'
            $("#loginForm").submit(()=>{
                $("#loginBtn").addClass('loading')
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.secondary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/linnos/Projects/Private/Security/Source/htms-web/resources/views/pages/users/login.blade.php ENDPATH**/ ?>