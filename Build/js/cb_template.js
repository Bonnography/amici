document.addEventListener("DOMContentLoaded", function(event) {
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
});