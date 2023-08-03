$(document).ready(function () {
    /**
     * Zoom for Devices with viewport width 320px
     */
    let g = document.documentElement.clientWidth;
    let f = document.querySelector("meta[name=viewport]");

    if (g < 768 && f) {
        f.setAttribute("content", "width=360, maximum-scale=1.0, user-scalable=0");
    }
    if (g < 1280 && f) {
        f.setAttribute('content', 'width=device-width,initial-scale=1.0,maximum-scale=10.0,user-scalable=1');
    }
    window.addEventListener("orientationchange", function () {
        location.reload();
    });

    let $navIcon = $('#nav-icon');
    $navIcon.click(function () {
        $(this).toggleClass('open');
        // $('nav#menu-main').toggleClass('open');
        $('.menu-main').toggleClass('d-none');
        $('nav#menu-main').slideToggle("slow");
        $('body').toggleClass('hidden');
    });
    if (g < 1200) {
        $('.menu-main_item__link').click(function () {
            $('.menu-main').toggleClass('d-none');
            $('nav#menu-main').slideToggle("slow");
            $('body').toggleClass('hidden');
            $navIcon.removeClass('open');
        });
    }
    $(window).scroll(function () {
        let position = window.pageYOffset;
        let navHeight = $('#header').height();
        console.log(navHeight);
        $('.section').each(function () {
            let target = $(this).offset().top - 10;
            let id = $(this).attr('id');
            let navLinks = $('.menu-main_item__link');
            if (position >= target - navHeight) {
                navLinks.removeClass('active');
                $('.menu-main_item a[href="/#' + id + '"]').addClass('active');
            }
        });
    });

    const sections = document.querySelectorAll(".section");
    const navLi = document.querySelectorAll(".menu-main_item__link");
    window.onscroll = () => {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("header").classList.add("header-small");
        } else {
            document.getElementById("header").classList.remove("header-small");
        }
    }

    function activateGoogleMaps() {
        let mapPlaceholder = $('.map-placeholder');
        let mapPlaceholderWidth = mapPlaceholder.attr('data-width');
        let mapPlaceholderHeight = mapPlaceholder.attr('data-height');
        let mapPlaceholderSrc = mapPlaceholder.attr('data-iframe-src');
        // Build iframe
        let mapIFrame = '<iframe src="' + mapPlaceholderSrc + '" width="' + mapPlaceholderWidth + '" height="' + mapPlaceholderHeight + '" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        // Add iFrame and remove placeholder
        mapPlaceholder.after(mapIFrame);
        mapPlaceholder.hide();
    }

    $(document).ready(function () {
        $('#map-privacy-check-once').click(function () {
            activateGoogleMaps();
        });
    });

    $('.menu-main_item__link').click(function () {
        $('.menu-main_item__link').removeClass('active');
        $(this).addClass('active');
    });
    if (g >= 768) {
        $(function () {
            $('.card').matchHeight();
        });
    }

});


