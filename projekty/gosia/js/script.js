    // /* alert("ddddddddddd");

    var cur = 1;
    var sub = null;
    slider = {
        id: 1,
        time_: 11000,
        sliderName: "#slider",
        slide: "img",
        txt: ".s_txt > div",
        nav: "#s_nav li",
        slideHeight: 408,
        prop: 1.8763736,
        count: 3,
        current: 1,
        width_: null,
        height_: null,
        windowWidth: null,
        windowHeight: null,
        setWidthHeight: function() {
            this.width_ = $(this.sliderName).width();
            this.height_ = $(this.sliderName).height();
        },
        setCount: function() {
            this.count = $(this.sliderName).find(this.slide).length;
        },
        setWindow: function() {
            this.windowWidth = $(window).width();
            this.windowHeight = $(window).height();
        },
        setHSlider: function() {
            var w = $(this.sliderName).width();
            var h = w / this.prop;
            $(this.sliderName).height(h);
        },
        startSlider: function() {
            cur++;
            if (cur > this.count) {
                cur = 1;
            }
            $(this.sliderName).find(this.slide).fadeOut(400);
            $(this.txt).fadeOut(400);
            $(this.nav).removeClass('act');
            $('#s' + cur).fadeIn(400);
            setTimeout(function() {
                $('#t' + cur).fadeIn(200);
            }, 410);
            $('#c' + cur).addClass('act');
        },
        timeout: function() {
            animation = setInterval(function() {
                slider.startSlider();
            }, slider.time_);
        },
        clickAnimSlider: function(elem) {
            id = $(elem).attr('id');
            this.id = id.substr(1);
            cur = this.id;
            return --cur;
        },
        init: function() {
            this.setHSlider();
            this.setWindow();
            this.setWidthHeight();
            this.setCount();
            this.setHSlider();
        }
    };


    porady = {
        tipsWidth: null,
        tipsBox: "#resize",
        setTipsWidth: function() {
            /* if( slider.windowWidth < 2000 ) {$(this.tipsBox).width(1280);} */
            /* if( slider.windowWidth < 1304 ) {$(this.tipsBox).width(978);} */
            /* if( slider.windowWidth < 978 ) {$(this.tipsBox).width(660);} */
            /* if( slider.windowWidth < 660 ) {$(this.tipsBox).width(350);} */
            if (slider.windowWidth < 2000) {
                $(this.tipsBox).width(1280);
            }
            if (slider.windowWidth < 1366) {
                $(this.tipsBox).width(978);
            }
            if (slider.windowWidth < 1024) {
                $(this.tipsBox).width(660);
            }
            if (slider.windowWidth < 765) {
                $(this.tipsBox).width(350);
            }
        }
    };

    submenu = {
        pos: 0,
        menuHeight: 60,
        submenu: "#submenu",
        submenuAction: "#sub_action",
        hideText: "ZWIŃ",
        showText: "WSZYSTKIE RADY",
        checkSubmenu: '#nav_cat',
        setMenuSubmenuH: function() {
            if ($(this.checkSubmenu).length) {
                this.menuHeight = 121;
            }
        },
        setParam: function() {
            this.setMenuSubmenuH();
            hSub = $(this.submenu).outerHeight(true);
            action = $(this.submenuAction).outerHeight(true);
            this.pos = hSub - action - this.menuHeight;
        },
        setPosition: function() {
            this.setParam();
            sub = this.submenu;
            $(this.submenu).css('top', '-' + this.pos + 'px');
            setTimeout(function() {
                $(sub).css('visibility', 'visible');
            }, 400);
        },
        scrollPos: function() {
            if ($(this.submenu).length) {
                if ($(this.submenu).attr('class').indexOf('show') != -1) {
                    $(this.submenu).css('top', this.menuHeight + 'px');
                } else {
                    setTimeout(function() {
                        hSub = $("#submenu").outerHeight(true);
                        action = $("#sub_action").outerHeight(true);
                        pos = hSub - action - this.menuHeight;
                        $('#submenu').css('top', "-" + pos + 'px');
                    }, 80);
                    /* this.setPosition(); */
                }
            }
        },
        leftPosition: function() {
            if (slider.windowWidth >= 1366) {
                wi = slider.windowWidth;
                le = (wi - 1366) / 2;
                $(this.submenu).css('left', le);
            } else {
                $(this.submenu).css('left', 0);
            }
        },
        showMenu: function(selectorAction, show) {
            if ($('#toggleTxt').length) {
                this.showText = $('#toggleTxt').text();
            }
            /* alert($('#toggleTxt').text()); */
            if ($(selectorAction).attr('class').indexOf('show') != -1) {
                $(selectorAction).removeClass('show');
                if (this.pos > 0) {
                    $(this.submenu).animate({
                        'top': '-' + this.pos + 'px'
                    }, 200);
                } else {
                    this.pos = Math.abs(this.pos);
                    $(this.submenu).animate({
                        'top': this.pos + 'px'
                    }, 200);
                }
                $(this.submenuAction).text("");
                $(this.submenuAction).text(this.showText).append("<img src='images/submenu2.png' alt='' />");
                $(this.submenu).css('background', '#7e216f');
            } else {
                $(selectorAction).addClass('show');
                $(this.submenu).animate({
                    'top': this.menuHeight + 'px'
                }, 200);
                $(this.submenuAction).text("");
                $(this.submenuAction).text(this.hideText).append("<img src='images/submenu1.png' alt='' />");
                $(this.submenu).css('background', '#7e216f url(images/sub-bg.jpg) no-repeat');
            }
        }
    };

    kafelki = {
        cSpan: 1,
        find: '.filter_txt span',
        parent_: '.filter_txt',
        vertical: function() {
            this.cSpan = $(this.find).length;
            for (i = 0; i < this.cSpan; i++) {
                par = $(this.parent_).eq(i).height();
                spanTxt = $(this.find).eq(i).height();
                topPos = (par - spanTxt) / 2;
                $(this.find).eq(i).css('top', topPos + 'px');
            }
        }
    };

    prodSubmenu = {
        selector: '.cat_prod #sub_category',
        findSelector: 'a',
        selectorLength: 3,
        sum: 0,
        selectObj: null,
        center: function() {
            setTimeout(function() {
                n = $('.cat_prod #sub_category').find('a').length;
                var cw = 0;
                for (j = 0; j < n; j++) {
                    cw = cw + $('.cat_prod #sub_category').find('a').eq(j).outerWidth(true);
                }
                $('.cat_prod #sub_category').width(cw);
            }, 210);
        }
    }

    function galeria(imgSelector, showBoxSelector, bigImgPrefix, path) {
        this.img_sel = imgSelector;
        this.box = showBoxSelector;
        this.pref = bigImgPrefix;
        this.path = path;
        this.prop = 1.375,
        this.alt = null;
        this.name = null;
        this.format = null;
        this.change = function() {
            this.alt = $(this.img_sel).attr('alt');
            this.name = this.alt.substr(0, this.alt.indexOf("."));
            this.format = this.alt.substr(this.alt.indexOf("."));

            $(showBoxSelector).find('img:not(.loader)').remove();
            $(showBoxSelector).append("<img src='" + this.path + this.pref + this.name + this.format + "' alt='" + this.name + this.format + "' style='opacity: 0' />");
            setTimeout(function() {
                $(showBoxSelector).find('img:not(.loader)').fadeTo(200, 1);
            }, 300);
        };
    };


    function curentImgHeight() {
        setTimeout(function() {
            ciw = $('.current_img').eq(0).width();
            // console.log($('.current_img').eq(0).width());
            $('.current_img').eq(0).height(Math.ceil(ciw / 1.13));
        }, 150);
    };


    $(document).ready(function() {
        curentImgHeight();
        submenu.setMenuSubmenuH();
        slider.init();
        porady.setTipsWidth();
        prodSubmenu.center();

        /* ustawienie rozwijanego submenu */
        if ($(submenu.submenu).length) {
            if ($(submenu.submenu).attr('class').indexOf('show') != -1) {
                $(submenu.submenu).css({
                    'top': submenu.menuHeight + 'px',
                    'visibility': 'visible'
                });
            } else {
                submenu.setPosition();
            }
            submenu.leftPosition();
        }
        /* ustawienie rozwijanego submenu END */

        /* zmiana szerokości okna -skalowanie */
        $(window).resize(function() {
            curentImgHeight();
            slider.setWindow();
            slider.setWidthHeight();
            slider.setHSlider();
            porady.setTipsWidth();
            submenu.setPosition();
            submenu.leftPosition();
            submenu.scrollPos();
            prodSubmenu.center();
        });

        /* animacja slidera */
        slider.timeout();

        /* kliknięcie nawigacji slidera */
        $('#s_nav li').click(function(e) {
            e.preventDefault();
            clearInterval(animation);
            cur = slider.clickAnimSlider(this);
            slider.startSlider();
            slider.timeout();

        });

        /* zatrzymanie slidera */
        $(slider.sliderName).mouseenter(function() {
            clearInterval(animation);
        });
        /* start slidera */
        $(slider.sliderName).mouseleave(function() {
            clearInterval(animation);
            slider.timeout();
        });

        /* rozwinięcie menu */
        $('#sub_action').click(function() {
            /* submenu.scrollPos(); */
            submenu.setParam();
            submenu.showMenu('#submenu', true);
        });

        /* porady niebieski boks */
        $('.filter').mouseenter(function() {
            $(this).find('.filter_txt').animate({
                'top': 0
            }, 300);
        });

        $('.filter').mouseleave(function() {
            $(this).find('.filter_txt').animate({
                'top': '-300px'
            }, 450);
        });

        /* ekrany */
        if (document.getElementById('resize')) {
            var hammertime = Hammer(document.getElementById('resize'));
            hammertime.on("tap", function(ev) {
                // if (ev.target.nodeName == "SPAN") {
                //     var hr = $(ev.target.parentElement).attr('href');
                // } else if (ev.target.nodeName == "A") {
                //     var hr = $(ev.target).attr('href');
                // };
                location.href = hr;
                $('.filter_txt').animate({
                    'top': '-300px'
                }, 450);

                if (ev.target.nodeName == "IMG") {
                    $(ev.target.parentElement).find('.filter_txt').animate({
                        'top': 0
                    }, 210);
                } else if (ev.target.classList[0] == 'filter') {
                    $(ev.target).find('.filter_txt').animate({
                        'top': 0
                    }, 210);
                };
            });
        };





        /* pionowe centrowanie */
        kafelki.vertical();

        /* galeria porady */
        $('.gallery img').click(function() {
            galeriaPorady = new galeria($(this), '.current_img', 'big_', 'images/');
            galeriaPorady.change();
        });


        /* zakładki */
        $('div.prod .acc > h2 + div, div.rel.prod_page .acc2 > h2 + div').hide();
        $('div.prod .acc > h2.show + div, div.rel.prod_page .acc2 > h2.show + div').css('display', 'block');
        setTimeout(function() {
            $('.acc, .acc2').fadeTo(150, 1);
        }, 250);

        $('.acc h2, .acc2 h2').click(function() {
            var ats = $(this).attr('class');
            if (ats != "show") {
                par = $(this).parent('div').attr('class');
                $('.' + par + ' h2+div').slideUp({
                    duration: 200,
                    easing: 'linear',
                    queue: false
                });
                $('.' + par + ' h2').removeClass('show');
                $(this).addClass('show');
                $('.show').next('div').slideDown({
                    duration: 200,
                    easing: 'linear',
                    queue: true
                });
            };
        });

        // alert(slider.windowWidth);



    });



    //     window.addEventListener('load', function(){ // on page load

    //  document.body.addEventListener('touchstart', function(e){
    //   alert(e.changedTouches[0].pageX) // alert pageX coordinate of touch point
    //  }, false)

    // }, false)