var timer = 15;     //en secondes

function startTimer(duration) {
    var timer = duration,
        seconds;
    timerInterval = setInterval(function() {
        seconds = parseInt(timer % 60, 10);
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $("#timer").html("<i class='fa fa-clock-o' aria-hidden='true'></i> " + seconds);
        if (--timer < 0) {
            //uncomment for release
            //document.getElementById("userAnswer").submit();
            timer = duration;
        }
    }, 1000);
}

$(document).ready(function(){
    $("#timer").html("<i class='fa fa-clock-o' aria-hidden='true'></i> 15");
    startTimer(timer);
    $("input[type=radio]").click(function () {
        document.getElementById("userAnswer").submit();
    });
});