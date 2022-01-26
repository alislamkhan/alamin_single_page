$(document).ready(function(){

    function blink(){
        $(".headtext").fadeOut(500);
        $(".headtext").fadeIn(500);
    }
    setInterval(blink,1);

});