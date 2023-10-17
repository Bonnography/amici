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


    if (g < 1200) {
        let $navIcon = document.getElementById('nav-icon');
        $navIcon.addEventListener("click", function () {
            $navIcon.classList.toggle('open');

            let navMenu = document.getElementById('menu-main');
            let menu = document.querySelector('.menu-main');
            menu.classList.toggle('d-none');

            if (!navMenu.classList.contains('open')) {
                navMenu.classList.add('open');
                let height = "100vh";

                setTimeout(function () {
                    navMenu.style.display = 'flex';
                    navMenu.style.height = height;
                }, 0);
            } else {
                navMenu.style.height = '0px';
                navMenu.style.display = 'none';
                navMenu.classList.remove('open');
            }
            // $('nav#menu-main').toggleClass('open');
            //$('.menu-main').toggleClass('d-none');
            //$('nav#menu-main').slideToggle("slow");
            //$('body').toggleClass('hidden');
        });

        let $subMenuOpener = document.querySelectorAll('.w-submenu__opener');

        $subMenuOpener.forEach((subMenuOpener) => {
            subMenuOpener.addEventListener('click', function () {
                let mainSub = subMenuOpener.closest('.menu-main_item.lvl1').querySelector('.menu-main__sub.lvl2');

                subMenuOpener.classList.toggle('open');
                mainSub.classList.toggle('open');

            });
        });

        let $menuMainActiveSwitcherMobile = document.querySelectorAll('.menu-main_item.lvl1.w-submenu');
        for (let i = 0, len = $menuMainActiveSwitcherMobile.length; i < len; i++) {
            if ($menuMainActiveSwitcherMobile[i].classList.contains('active')) {
                $menuMainActiveSwitcherMobile[i].querySelector('.menu-main__sub.lvl2').classList.add('open');
            } else {
                $menuMainActiveSwitcherMobile[i].querySelector('.menu-main__sub.lvl2').classList.remove('open');
            }
        }

    }
    document.addEventListener('scroll', function () {
        let headerEl = document.querySelector(".header");
        let body = document.body;
        let scrollUp;
        let scrollDown;
        if (g < 768 && f) {
            scrollDown = 80;
            scrollUp = 100;
        }
        if (g > 1023 && f) {
            scrollDown = 100;
            scrollUp = 120;
        }
        if (typeof (headerEl) != 'undefined' && headerEl != null) {
            headerScrollFunc(headerEl, body, scrollDown, scrollUp);
        }
    });
    function headerScrollFunc(headerEl, body, scrollDown, scrollUp) {
        if (document.body.scrollTop > scrollDown || document.documentElement.scrollTop > scrollUp) {
            headerEl.classList.add("header-small");
            body.classList.add("header-is-small");
        } else {
            headerEl.classList.remove("header-small");
            body.classList.remove("header-is-small");
        }
    }

    let slider = document.getElementById("splide");

    if (typeof (slider) != 'undefined' && slider != null)
    {
        new Splide('#splide', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            autoplay: true,
            interval: 8000,
            updateOnMove: true,
            pagination: false,
            throttle: 300,
            breakpoints: {
                1440: {
                    perPage: 1,
                }
            }
        }).mount();
    }

    // concerts expander
    let $concertExpander = document.querySelectorAll('.description-expander');

    if ( $concertExpander !== 'undefined' ) {
        for(let i =0; i< $concertExpander.length; i++){
            $concertExpander[i].onclick = function(){
                let expanderParent = this.closest('article');
                let expander = expanderParent.querySelector('.expand');
                let expandBtn = expanderParent.querySelector('.description-expander .more');
                let unExpandBtn = expanderParent.querySelector('.description-expander .less');
                expander.classList.toggle('closed');
                expanderParent.classList.toggle('expanded');
                expandBtn.classList.toggle('d-inline-block');
                expandBtn.classList.toggle('d-none');
                unExpandBtn.classList.toggle('d-none');
                unExpandBtn.classList.toggle('d-inline-block');
            };
        }
    }

    const year = document.getElementById('year');
    const elements = document.querySelectorAll('.article-concert');
    const concertWrapper = document.querySelector('.concerts');
    const categorySelector = document.getElementById('category');

    if (typeof (year) != 'undefined' && year != null)
    {
        [document.getElementById('year'), document.getElementById('category')].forEach(filter => {
            filter.addEventListener('change', function () {
                let yearValue = year.value;
                let categoryValue = categorySelector.value;
                //handle click


                [...elements].forEach((element) => {
                    if (yearValue === '' && categoryValue === '') {
                        element.classList.remove('hidden');
                        element.classList.add('show');
                        //console.log('zerosetting');
                    }
                    else {
                        const elementYearData = element.dataset.year;
                        const elementCategoryData = element.dataset.category;

                        if (yearValue && categoryValue) {
                            if ((!elementYearData || elementYearData < yearValue || elementYearData > yearValue) && (!elementCategoryData.includes(categoryValue))) {
                                element.classList.add('hidden');
                                element.classList.remove('show');
                                //console.log('bothfilters');
                            } else if (elementYearData === yearValue && elementCategoryData.includes(categoryValue)) {
                                element.classList.add('show');
                                element.classList.remove('hidden');
                            }
                            else {
                                element.classList.add('hidden');
                                element.classList.remove('show');
                            }
                        } else if (categoryValue && !yearValue) {
                            if (!elementCategoryData.includes(categoryValue)) {
                                element.classList.add('hidden');
                                element.classList.remove('show');
                                //console.log('categoryfilter');
                            }
                            else {
                                element.classList.remove('hidden');
                                element.classList.add('show');
                            }
                        }
                        else if (yearValue && !categoryValue) {
                            if (!elementYearData || elementYearData < yearValue || elementYearData > yearValue) {
                                element.classList.add('hidden');
                                element.classList.remove('show');
                                //console.log('ratingfilter');
                            }
                            else {
                                element.classList.remove('hidden');
                                element.classList.add('show');
                            }
                        }
                    }
                });
                if (document.querySelectorAll('.article-concert.show').length <= 1)
                {
                    concertWrapper.classList.add('one');
                } else {
                    concertWrapper.classList.remove('one');
                }
            });
        });
    }
    GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: false,
        selector: ".glightbox"
    });
    const lightbox = GLightbox({
        openEffect: "zoom",
        closeEffect: "fade",
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
    });


    function setHeight(el, val) {
        if (typeof val === "function") val = val();
        if (typeof val === "string") el.style.height = val;
        else el.style.height = val + "px";
    }

    let equalheight = function(container){
        let currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;

        Array.from(document.querySelectorAll(container)).forEach((el,i) => {
            el.style.height = "auto";
            topPostion = el.offsetTop;
            if(currentRowStart != topPostion){
                for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                    setHeight(rowDivs[currentDiv], currentTallest);
                }
                rowDivs.length = 0;
                currentRowStart = topPostion;
                currentTallest = parseFloat(getComputedStyle(el, null).height.replace("px", ""));
                rowDivs.push(el);
            } else {
                rowDivs.push(el);
                currentTallest = (currentTallest < parseFloat(getComputedStyle(el, null).height.replace("px", ""))) ? (parseFloat(getComputedStyle(el, null).height.replace("px", ""))) : (currentTallest);
            }
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                setHeight(rowDivs[currentDiv], currentTallest);
            }
        });
    };
    if (g >= 768 && f) {
        window.addEventListener("load", function(){
            equalheight('.content-column-item .bodytext');
        });
        window.addEventListener("resize", function(){
            setTimeout(function(){
                equalheight('.content-column-item .bodytext');
            });
        });
    }

});
