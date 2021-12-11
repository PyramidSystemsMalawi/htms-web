"use strict";

$(document).ready(()=>{

    $("#loginBtn").click(()=>{
        user.authenticate();
    });
});

const user = {
    //Authenticate user for login
    authenticate:()=>{
        const credentials = {
            username:$("#username").val(),
            password:$("#password").val()
        }
        // console.log(credentials);
        // load("Authenticating...");

        if(!credentials.username || credentials.username == null || credentials.username == typeof undefined || credentials.username == ""){
            swal("Attention!", "You need to provide your username to login!", "warning");
            return;
        }
        if(!credentials.password || credentials.password == null || credentials.password == typeof undefined || credentials.password == ""){
            swal("Attention!", "You need to provide your password to login!", "warning");
            return;
        }
        $.ajax({
            url:`${baseURL}/user/auth`,
            method:"POST",
            contentType:"application/x-www-form-urlencoded",
            dataType:'json',
            data:credentials,
            beforeSend:()=>{
                load("Authenticating...");
            },success:(response)=>{
                stopLoad();
                swal('',response.message, response.status);
                if(response.status == "success"){
                    setInterval(()=>{
                        window.location.href = "dashboard";
                    }, 1000);
                }
            },error:(e)=>{
                stopLoad();
                swal('Connection Error!', "Check your internet connectivity!", "error");
            }
        })
    }
}