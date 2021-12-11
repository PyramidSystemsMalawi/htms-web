const baseURL = `http://localhost:4000`;

function load(text){
    $("#loadingText").html(text);
    $('#loadingDimmer').dimmer({
        closeable:false
    }).dimmer('show');
    $("#body").click();
  }

function stopLoad(){
    $("#body").click();
    $('#loadingDimmer').dimmer('hide');
}

function resize(){
    window.onresize = displayWindowSize;
    window.onload = displayWindowSize;

    let myWidth = window.innerWidth;
    let myHeight = window.innerHeight;
}