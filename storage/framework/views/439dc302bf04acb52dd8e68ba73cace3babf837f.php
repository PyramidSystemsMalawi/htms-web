<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="css/login.css">
<div class="container-fluid main-wrapper ">
        <div class="row">
            <header class="col-8 mx-auto text-center text-secondary">
                <h3 class=" mt-5 mb-0" id="login_title">OS1 Dot Intelligence<br> <span style="font-family: 'Yu Gothic UI'; font-size:35px;"></span> </h3>

                <div class="image ui m-0">
                    <img src="img/logo-main.png" alt="Application Logo">
                </div>
            </header>

            <main class="col-12" id="central_container">
                <div class="row">
                    <div class=" col-md-10 col-lg-4 mx-auto mt-10">
                        <div class="login login_pad" augmented-ui="tl-clip-y br-clip exe">
                            <form class="ui form" autocomplete="off">
                                <div class="field fluid">
                                    <input type="email" autocomplete="off" id="username" placeholder="Username">
                                </div>
                                <div class="field fluid">
                                    <input type="password" autocomplete="off" id="password" placeholder="Password">
                                </div>
                                <div class="field fluid">
                                    <a href="/dashboard" id="loginBtn" class="btn btn-md float-right btn-secondary">Authenticate <i class="icon lock"></i></a>
                                </div>
                                <div class="field">
                                    <div style="color:#018cd6;" class="ui horizontal divider">OR</div>
                                </div>
                                <div class="fluid field">

                                    <label><a style="font-family: monaco;" href="">Forgot Password?</a></label>
                                </div>
                            </form>
                        </div>
                        <div class="m-3 p-2 ">
                            <div class="ui horizontal divider text-danger" style="font-family: orbitron !important;">NO UNAUTHORIZED USE</div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="col-12 text-center ">
                <label class="text-white" style="margin-top:5em;font-family: monaco;">Copyright&copy;2021 - Pyramid Systems!</label>
            </footer>
        </div>
   </div>


    <script>
        const BaseURL = "http:"
        $(()=>{
            let BaseURL = '<?php echo e(config('app.url')); ?>'
            $("#loginBtn").click(async ()=>{
                const credentials = {
                    'email':$("#username").val(),
                    'password':$("#password").val()
                }

                const options = {
                    method:"POST",
                    headers:{
                        'Content-Type':'application/json'
                    },
                    body:JSON.stringify(credentials)
                }
                try{
                    let response = await fetch(`${BaseURL}/api/v1/users/auth`, options)
                    let data = await response.json()
                    if(data.status == 'success'){
                        location.href = `dashboard`
                    }else{
                        alert(data.message)
                    }
                }catch(e){
                    console.log(e)

                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.secondary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\htms-beta\resources\views/pages/users/login.blade.php ENDPATH**/ ?>