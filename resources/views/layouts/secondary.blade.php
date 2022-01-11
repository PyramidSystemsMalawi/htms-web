<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
    <link rel="stylesheet"  type="text/css" href="lib/augmented-ui/augmented.css">
    <link rel="shortcut icon" href="img/browserlogo.png">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/semantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="lib/sweetalerts/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
    <script src="lib/semantic/dist/semantic.min.js"></script>
    <script src="lib/sweetalerts/sweetalert.min.js"></script>
    <script src="js/app.jsx"></script>

</head>
<body class="ui dimmable" style="background-color:whitesmoke !important;">



    <div class="container-fluid main-wrapper ">
        <div class="row">
            <div class="wrapper wrapper0 col-12 " augmented-ui="tl-clip-x tl-clip br-clip-x exe">
                @yield('content')
            </div>
        </div>
    </div>

     <div class="ui dimmer" id="loadingDimmer">
    <div class="ui text loader" id="loadingText">Loading...</div>
    <div class="container">
        <div class="loader">

          <div class="l0"></div>
          <div class="l1 spin duration40s reverse"></div>
          <div class="l2 spin duration10s"></div>
          <div class="scaler scale duration1s alternate">
            <div class="l3 spin duration10s reverse"></div>
           </div>
           <div class="scaler scale duration10s alternate">
             <div class="l4 spin duration20s"></div>
           </div>
         </div>
        </div>
    </div>
</body>

</html>
