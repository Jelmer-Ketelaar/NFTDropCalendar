(function($) {
    function formatNumber(num) {
        return num < 10 ? "0" + num : num;
    }

    $.fn.showClock = function() {
        var currentDate = new Date();
        var endDate = $(this).data("date").split("-");
        var endTime = [0, 0];

        if ($(this).data("time")) {
            endTime = $(this).data("time").split(":");
        }

        var remainingTime = (new Date(endDate[0], endDate[1] - 1, endDate[2], endTime[0], endTime[1]).getTime() / 1000) - (currentDate.getTime() / 1000);

        if (remainingTime <= 0 || isNaN(remainingTime)) {
            return this.hide();
        }

        var days = Math.floor(remainingTime / 86400);
        remainingTime = remainingTime % 86400;
        var hours = Math.floor(remainingTime / 3600);
        remainingTime = remainingTime % 3600;
        var minutes = Math.floor(remainingTime / 60);
        var seconds = Math.floor(remainingTime % 60);

        var output = '<div class="countdown-container">';

        if (days !== 0) {
            output += '<div class="countdown-block"><div class="countdown-number">' + formatNumber(days) + '</div><div class="countdown-label">Days</div></div>';
        }

        output += '<div class="countdown-block"><div class="countdown-number">' + formatNumber(hours) + '</div><div class="countdown-label">Hours</div></div>';
        output += '<div class="countdown-block"><div class="countdown-number">' + formatNumber(minutes) + '</div><div class="countdown-label">Minutes</div></div>';
        output += '<div class="countdown-block"><div class="countdown-number">' + formatNumber(seconds) + '</div><div class="countdown-label">Seconds</div></div>';
        output += '</div>';

        $(this).html(output);
    }

    $.fn.countdown = function() {
        var element = $(this);
        element.showClock();
        setInterval(function() {
            element.showClock();
        }, 1000);
    }

})(jQuery);

$(document).ready(function() {
    if ($(".countdown").length > 0) {
        $(".countdown").each(function() {
            $(this).countdown();
        });
    }
});
