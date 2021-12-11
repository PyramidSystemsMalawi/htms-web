@extends('layouts.secondary')

@section('content')
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
                                    <input type="number" autocomplete="off" id="username" placeholder="Username">
                                </div>
                                <div class="field fluid">
                                    <input type="password" autocomplete="off" id="password" placeholder="Password">
                                </div>
                                <div class="field fluid">
                                    <button type="button" id="loginBtn" class="btn btn-md float-right btn-theme">Authenticate <i class="icon lock"></i></button>
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


    <script src="js/account.jsx"></script>
@endsection
