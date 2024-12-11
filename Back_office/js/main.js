(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 500); // Adjusted timeout to 500ms
    };
    spinner();

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop : 0 }, 1500, 'easeInOutExpo');
        return false;
    });

    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });

    // Progress Bar
    if ($('.pg-bar').length) {
        $('.pg-bar').waypoint(function () {
            $('.progress .progress-bar').each(function () {
                $(this).css("width", $(this).attr("aria-valuenow") + '%');
            });
        }, { offset: '80%' });
    }

    // Calendar
    if ($('#calender').length) {
        $('#calender').datetimepicker({
            inline: true,
            format: 'L'
        });
    }

    // Testimonials Carousel
    if ($(".testimonial-carousel").length) {
        $(".testimonial-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            items: 1,
            dots: true,
            loop: true,
            nav: false
        });
    }

    // Chart Global Settings
    if (typeof Chart !== 'undefined') {
        Chart.defaults.color = "#6C7293";
        Chart.defaults.borderColor = "#000000";

        // Worldwide Sales Chart
        if ($("#worldwide-sales").length) {
            var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
            new Chart(ctx1, {
                type: "bar",
                data: {
                    labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
                    datasets: [
                        { label: "USA", data: [15, 30, 55, 65, 60, 80, 95], backgroundColor: "rgba(235, 22, 22, .7)" },
                        { label: "UK", data: [8, 35, 40, 60, 70, 55, 75], backgroundColor: "rgba(235, 22, 22, .5)" },
                        { label: "AU", data: [12, 25, 45, 55, 65, 70, 60], backgroundColor: "rgba(235, 22, 22, .3)" }
                    ]
                },
                options: { responsive: true }
            });
        }

        // Other charts omitted for brevity, but follow the same corrected structure
    }
})(jQuery);


