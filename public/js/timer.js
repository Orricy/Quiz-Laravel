var timer = 15;     //en secondes

function startTimer(duration) {
    var timer = duration,
        seconds;
    //retrieve value of input time
    var timerVal = $("input[name=time]").val();
    timerInterval = setInterval(function() {
        seconds = parseInt(timer % 60, 10);
        seconds = seconds < 10 ? "0" + seconds : seconds;
        //$("#timer").html(seconds);
        $(".timer").html(seconds);
        //send value to input time (inform of how long does the player is on the quiz)
        $("input[name=time]").val((parseInt(timerVal) + 15) - seconds);
        if (--timer < 0) {
            //uncomment for release
            document.getElementById("userAnswer").submit();
            timer = duration;
        }
    }, 1000);
}

$(document).ready(function(){
    //$("#timer").html("15");
    startTimer(timer);
    $("input[type=radio]").click(function () {
        document.getElementById("userAnswer").submit();
    });

    $("#test-circle").circliful({
        foregroundColor: "#456680",
        backgroundColor: "none",
        pointColor: "#c1712f",
        pointSize: 30,
        fillColor: "transparent",
        fontColor: "white",
        animationStep: 1,
        foregroundBorderWidth: 35,
        backgroundBorderWidth: 0,
        percentageTextSize: 30,
        percent: 100
    });
    $(".timer").html(15);
});