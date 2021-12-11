<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DS | {{$title}}</title>
    <link rel="stylesheet" type="text/css" href="lib/augmented-ui/augmented.css">
    <link rel="shortcut icon" href="img/browserlogo.png">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/semantic/dist/semantic.min.css">
    <link rel="stylesheet" href="lib/sweetalerts/sweetalert.css">
    <link rel="stylesheet" href="css/fonts.css">

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
    <script src="lib/semantic/dist/semantic.min.js"></script>
    <script src="lib/sweetalerts/sweetalert.min.js"></script>
    <script src="js/app.jsx"></script>

</head>
<body class="ui dimmable ">

        {{-- <div class="preloader pt-5 bg-white">
        <center>
            <div class="loader" style="margin-bottom: 0;">

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
        </center>
        <h3><span id="loading-msg" style="color:#018cd6;"></span></h3>
    </div> --}}

    <link rel="stylesheet" href="css/dashboard.css">
<div class="container-fluid main-wrapper ">
    <div class="row">
        <div class="wrapper wrapper0 col-12 " augmented-ui="tl-clip-x tl-clip br-clip-x exe">
            <div class="ui grid">
                <div class="three wide column">
                    <div class="leftmenu leftmenu_pad my-3" augmented-ui="tl-clip-y br-clip exe">
                        <div class="ui image bg-theme">
                            <img src="/img/logo-main.png" alt="">
                        </div>
                         {{-- <label style="width:100%;background:#018cd6;" class="text-center text-white p-3 digital-font" augmented-ui="tl-clip-x exe">INTELLIGENCE TOOLS</label> --}}
                        <div class="ui divider text-white"></div>
                        <p style="font-family:" class="text-secondary">We value your feedback. Where can we improve? Click <a href="">here</a> to give your suggestion.</p>
                        <div class="ui divider text-white"></div>
                        <a href="" type="button" style="background:#018cd6;color:white;margin-top:.4em;"class="ui right labeled button  small icon fluid btn-theme" id="quick_search">
                            Dashboard<i class="icon search"></i>
                        </a href="">
                        <a href="" type="button" style="background:#018cd6;color:white;margin-top:.4em;" class="ui right labeled button small icon fluid btn-theme" id="quick_search">
                            Case Files <i class="icon globe"></i>
                        </a href="">
                        <a href="" type="button" style="background:#018cd6;color:white;margin-top:.4em;" class="ui right labeled button small icon fluid btn-theme" id="quick_search">
                            People <i class="users alternate icon"></i>
                        </a href="">
                        <a href="/reports" type="button" style="background:#018cd6;color:white;margin-top:.4em;" class="ui right labeled button small icon fluid btn-theme" id="quick_search">
                            Reports<i class="chart bar outline icon"></i>
                        </a href="">

                        <a type="button" style="background:#018cd6;color:white;margin-top:.4em;" class="ui right labeled button small icon fluid btn-theme" id="quick_search">
                            Help <i class="icon help"></i>
                        </a>
                        <a href="" type="button" style="background:#018cd6;color:white;margin-top:.4em;" class="ui right labeled button small icon fluid btn-theme" id="quick_search">
                            Settings <i class="icon cogs"></i>
                        </a>
                    </div>
                </div>
                <div class="thirteen wide column">
                    <div class="ui grid pt-2">
                        <div class="twelve wide column centralheader centralheader_pad mt-4" augmented-ui="tl-clip br-clip exe text-center">
                            <h1 style="text-transform: uppercase !important;" class="digital-font text-white">{{$title}}</h1>
                        </div>
                        <div class="four wide column">
                            <div class="rightmenu rightmenu_pad text-center" augmented-ui="tr-clip-y bl-clip exe">
                                <p class="text-secondary m-0" style="text-transform: uppercase;">{{$userdata['firstname']}} {{$userdata['lastname']}}</p>
                                <div class="ui divider m-0  text-white"></div>
                                <a href="/logout" class="btn  m-1 btn-mb btn-block text-white" style="background:rgba(255, 217, 0, 0.76);" augmented-ui="bl-clip exe" >
                                    Logout
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="padding:0;">
                        <div class="col-12 pl-0">
                            <div class="folder folder2 mt-3" style="left:0;" augmented-ui="b-clip-x exe">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
<script>
        (function() {
            let outerindex = 0;
            var loaderText = document.getElementById("loading-msg");
            var refreshIntervalId = setInterval(function() {
                loaderText.innerHTML = getLoadingText(outerindex);
                if(outerindex == 4){
                    $('.preloader').hide();
                    clearInterval(refreshIntervalId);
                }
                outerindex++;
            }, 500);

            function getLoadingText(index) {
                var strLoadingText;
                var arrLoadingText = ["Decrypting files", "Aesthesizing your account data", "Connecting to external databases", "Finalizing..."
                ];

                return arrLoadingText[index];
            }
        })();

    </script>
</html>
