/*blokowanie wyświetlania w iframe*/
if (top.location != self.location) {
    top.location.href = self.location;
}

function productIntro() {
    var b = $("body").width();
    $(".cs").width(380);
    var lr = ( b - 380 ) / 2;
    $(".rs, .ls").width(lr);
}

var im = [
    "./public/images/det-img1.png",
    "./public/images/det-img2.png",
    "./public/images/det-img3.png",
    "./public/images/det-img4.png",
    "./public/images/det-img5.png",
    "./public/images/det-imgw1.png",
    "./public/images/det-imgw2.png",
    "./public/images/det-imgw3.png",
    "./public/images/det-imgw4.png",
];

for (j = 0; j < im.length; j++) {
    var _i = new Image();
    _i.src = im[j];
}

var CONFIG = CONFIG || {};
/**
 *   CONFIG.userAgent
 *   OBIEKT PRZECHOWUJĄCY I DODAJĄCY DO BODY ID Z NAZWĄ PRZEGLĄDARKI
 */
CONFIG.userAgent = function() {
    this.userAg; // Nazwa przeglądarki
    this.setBodyId = function(ctrl) {
        var nav = navigator.userAgent;
        if (nav.indexOf('Firefox') != -1) {
            this.userAg = 'firefox';
        } else if (nav.indexOf('Opera') != -1) {
            this.userAg = 'opera';
        } else if (nav.indexOf('Chrome') != -1) {
            this.userAg = 'chrome';
        } else if (nav.indexOf('MSIE 10') != -1) {
            this.userAg = 'ie10';
        } else if (nav.indexOf('MSIE 9') != -1) {
            this.userAg = 'ie9';
        } else if (nav.indexOf('MSIE 8') != -1) {
            this.userAg = 'ie8';
        } else if (nav.indexOf('Safari') != -1) {
            this.userAg = 'safari';
        };
        if (ctrl == true) {
            document.body.setAttribute('id', this.userAg);
        };
    };
};

/**
 *   CONFIG.userAgent
 *   OBIEKT PRZECHOWUJĄCY ROZMIARY OKNA
 */
CONFIG.window = function() {
    this.windowWidth = null, // Szerokość okna przeglądarki
    this.windowHeight = null, // Wysokość okna przeglądarki
    this.screenWidth = null, // Szerokość monitora
    this.screenHeight = null, // Wysokość monitora

    this.setWindow = function() {
        this.windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        this.windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        this.screenWidth = screen.width;
        this.screenHeight = screen.height;
    };
};

/**
 *   CONFIG.paralax
 *   OBIEKT OBSŁUGUJĄCY EFEKT PARALAKSY
 *
 *   @menuIconSelector - selektor obrazkowego menu
 *   @paralaxSelector - selektor pierwszego elementu paralaksy
 *   @paralax1Height - wyskość pierwszego elementu paralaksy
 *
 *   checkParalaxHeight - ustawia wysokość elementu paralaxSelector
 *   changeMenuIcon - zmienia obrazek elementu menuIconSelector
 *   changeBackgroundPosition - zmienia ustawienie tła obrazkowego strony page4 dla ekranu < 1100
 */
CONFIG.paralax = function() {
    this.menuIconSelector = "#show_menu";
    this.paralaxSelector = "#paralax1";
    this.page1 = "#page1, #page12, .tekst",
    this.page1Height = 767,
    this.lastPage = "#page6, #page15";
    this.paralax1Height = 767;
    this.offset;
    this.yPosition = [1267, 1767, 2267];
    this.bg = ["background-position:0px 0px;", "background-position:0px -50px;", "background-position:0px 0px;"];
    this.checkParalaxHeight = function() {
        this.page1Height = $(this.page1).outerHeight(true);
        $(this.lastPage).height(CONFIG.obStorage.window.windowHeight);
        return this;
    };
    this.changeMenuIcon = function(mob) {
        if (mob == true) {
            var scroll = $("#skrollr-body").position().top;
            if (scroll < -718) {
                $(this.menuIconSelector).css("color", "#d95100");
                $(this.menuIconSelector).find("span").addClass("change");
            } else {
                $(this.menuIconSelector).css("color", "#fff");
                $(this.menuIconSelector).find("span").removeClass("change");
            }
        } else {
            var scroll = $(window).scrollTop();
            // if (scroll >= this.page1Height - 50) {
            if (scroll >= 718) {
                // $(this.menuIconSelector).css("background-position", "right bottom");
                $(this.menuIconSelector).css("color", "#d95100");
                $(this.menuIconSelector).find("span").addClass("change");
            } else {
                // $(this.menuIconSelector).css("background-position", "right top");
                $(this.menuIconSelector).css("color", "#fff");
                $(this.menuIconSelector).find("span").removeClass("change");
            }
        }
        return this;
    };
    this.changeBackgroundPosition = function() {
        if (CONFIG.obStorage.window.windowWidth < 1100) {
            $("#page4 .paralax").css("background-position", "-200px -60px");
            $("#page4 .paralax").attr("data-1400", "background-position:-200px -60px;");
            $("#page4 .paralax").attr("data-1800", "background-position:-200px -190px;");
        };
        return this;
    };
    this.setOptionsMenuBox = function() {
        var w = (CONFIG.obStorage.window.windowWidth - $("#top").width()) / 2;
        if (w < 0) {
            w = 0
        }
        if (CONFIG.obStorage.window.windowWidth < 1200) {
            var set = 180;
        } else {
            var set = 106;
        }
        this.offset = w + set;
        $("#menu").width(w + set);
        return this;
    };
    this.proportionImg = function() {
        var f = $(".r_img:eq(0)").width();
        $(".row").height(f);
        return this;
    }
    this.stratParalax = function() {
        var nData = "data-" + (this.yPosition[0] - CONFIG.obStorage.window.windowHeight - 160).toString();
        var nData1 = "data-" + (this.yPosition[1] - CONFIG.obStorage.window.windowHeight - 20).toString();
        var nData2 = "data-" + (this.yPosition[2] - CONFIG.obStorage.window.windowHeight - 160).toString();
        var nData3 = "data-" + (this.yPosition[3] - CONFIG.obStorage.window.windowHeight).toString();
        // $("#page3 .paralax, #paralax2-2").removeAttr("data-1100");
        // $("#page3").removeAttr("data-1100");
        // $("#page4 .paralax").removeAttr("data-1400");
        $("#splash_back, #splash_front, #bottle").removeAttr("data-1900");
        // $("#page3 .paralax, #paralax2-2").attr(nData, this.bg[0]);
        // $("#page3").attr(nData, this.bg[0]);
        // $("#page4 .paralax").attr(nData1, this.bg[1]);
        $("#splash_back, #splash_front, #bottle").attr(nData2, this.bg[2]);
    }
    this.page6set = function(resize) {
        var lPos = (CONFIG.obStorage.window.windowWidth - 911) / 2;
        var tPos = (CONFIG.obStorage.window.windowHeight - 438) + 50;
        var tPosEnd = (CONFIG.obStorage.window.windowHeight - 438);
        $("#page6 .paralax").attr("data-top", "background-position-y:" + tPosEnd + "px");
        $("#page6 .paralax").attr("data-40-top", "background-position-y:" + tPos + "px");
    }

};

CONFIG.init = function() {
    CONFIG.obStorage.window.setWindow();
    CONFIG.obStorage.userAgent.setBodyId(true);
};

var Products = function() {
    this.selector = ".prod";
    this.idElement;
    this.idP = 1;
    this.click = function(element) {
        this.idElement = $(element).attr("id").substr(2);
        $(this.selector).removeClass("click");
        $(element).addClass("click");
        return this;
    }
    this.showDet = function(ob) {
        this.idP = $(ob).attr("id").substr(2);
        if ($(ob).hasClass("w")) {
            var page = "#page11";
            var pre = "#ph";
        } else {
            var page = "#page9";
            var pre = "#ps";
        }
        if ($(page).css("display") == "none") {
            $(page).slideDown(300);
        }
        $(page + " .content > div").fadeOut(200);
        var showP = setTimeout(function() {
            $(pre + CONFIG.obStorage.products.idP).fadeIn(200);
            clearTimeout(showP);
        }, 360);
    }
    this.move = function(selector, event, mob) {
        var rel = $(selector);
        var mouse = event.pageY - rel.offset().top;
        if (mob == true) {
            var mouse = event.originalEvent.targetTouches[0].pageY - rel.offset().top;
        }
        var moveImg = Math.floor(mouse * 1.4);
        $("#det_img" + this.idP + ", #det_w_img" + this.idP).css("top", "-" + moveImg + "px");

    }
};

var Modal = function() {
    this.t = 400;
    this.initial = "scale(0)";
    this.stop = "scale(1)";
    this.rotate = ".modal_content";
    this.modal = ".modal";
    this.modalItemPrefix = "#mod";
    this.current = 1;
    this.all = 6;
    this.id = 1;
    this.setAll = function() {
        this.all = $(this.rotate).length;
    }
    this.setId = function(ob) {
        this.id = $(ob).attr("id").substr(4);
        return this.id;
    }
    this.showModal = function(ob) {
        var _id = this.setId(ob);
        var _initial = this.initial;
        var _t = this.t;
        var _rotate = this.rotate;
        var _prefix = this.modalItemPrefix;
        var _stop = this.stop;

        $(this.modal).fadeIn(this.t, function() {
            if (CONFIG.obStorage.userAgent.userAg != "ie9") {
                $(_rotate).removeClass("transition");
                $(_prefix + _id).addClass("transition");
            } else {
                $(_rotate).fadeOut(300);
                $(_prefix + _id).fadeIn(300);
            }
        });
    }
    this.closeModal = function() {
        $(this.rotate).removeClass("transition");
        var sM = setTimeout(function() {
            $(CONFIG.obStorage.games.modal).fadeOut(CONFIG.obStorage.games.t);
            clearTimeout(sM);
        }, 500);
    }
    this.anim = function() {
        if (CONFIG.obStorage.userAgent.userAg != "ie9") {
            $(this.rotate).removeClass("transition");
            var an = setTimeout(function() {
                $(CONFIG.obStorage.games.modalItemPrefix + CONFIG.obStorage.games.id).addClass("transition");
                clearTimeout(an);
            }, 460);
        } else {
            $(this.rotate).fadeOut(300);
            var an = setTimeout(function() {
                $(CONFIG.obStorage.games.modalItemPrefix + CONFIG.obStorage.games.id).fadeIn(300);
                clearTimeout(an);
            }, 460);
        }
    }
    this.next = function() {
        this.id++;
        if (this.id > this.all) {
            this.id = 1;
        }
        this.anim();
    }
    this.prev = function() {
        this.id--;
        if (this.id < 1) {
            this.id = this.all;
        }
        this.anim();
    }
}

CONFIG.obStorage = {
    window: new CONFIG.window(),
    userAgent: new CONFIG.userAgent(),
    paralax: new CONFIG.paralax(),
    products: new Products(),
    games: new Modal(),
}




$(document).ready(function() {
    CONFIG.init();
    productIntro();


    CONFIG.obStorage.paralax.checkParalaxHeight();
    CONFIG.obStorage.paralax.stratParalax();
    // CONFIG.obStorage.paralax.page6set();
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 780) {
            $("#page2 .content, #page13 .content").removeAttr("data-bottom-top");
            $("#page2 .content, #page13 .content").removeAttr("data-center");
            $("#page2 .content, #page13 .content").addClass("important")
        }
        if ($(window).scrollTop() >= 1480) {
            $(".bbg").addClass("important");
        }
        CONFIG.obStorage.paralax.changeMenuIcon();
        if ($("#disable_layer").css("transform") == "matrix(1, 0, 0, 1, 0, 0)") {
            $(window).scrollTop(0);
        }
    });
    $(window).on({
        "touchmove touchend touchstart": function(e) {
            // setTimeout(function(){
            //     alert($("#skrollr-body").position().top);
            // },1800)
            CONFIG.obStorage.paralax.changeMenuIcon(true);
        }
    })
    // alert(CONFIG.obStorage.window.windowWidth);
    CONFIG.obStorage.paralax.changeBackgroundPosition();
    // CONFIG.obStorage.paralax.setOptionsMenuBox();
    CONFIG.obStorage.paralax.proportionImg();
    var s = skrollr.init({
        edgeStrategy: 'set',
        easing: {
            WTF: Math.random,
            inverted: function(p) {
                CONFIG.obStorage.games.closeModal();
                return 1 - p;
            }
        }
    });

    $(window).resize(function() {
        CONFIG.obStorage.window.setWindow();
        CONFIG.obStorage.paralax.checkParalaxHeight();
        CONFIG.obStorage.paralax.proportionImg();
        productIntro();
        // CONFIG.obStorage.paralax.page6set(true);
        var s = skrollr.init({
            edgeStrategy: 'set',
            easing: {
                WTF: Math.random,
                inverted: function(p) {
                    CONFIG.obStorage.games.closeModal();
                    return 1 - p;
                }
            }
        });
        // CONFIG.obStorage.paralax.changeBackgroundPosition();
        // CONFIG.obStorage.paralax.setOptionsMenuBox();
    });

    $("#show_menu").click(function(e) {
        e.preventDefault();
        // $("#skrollr-body").stop().animate({"margin-left":"-"+CONFIG.obStorage.paralax.offset+"px"},{duration: 600,queue: false,easing: "swing"});
        $("#skrollr-body").stop().animate({
            "left": "-270px"
        }, {
            duration: 400,
            queue: false,
            easing: "swing"
        });
        $("#menu").stop().animate({
            "right": 0
        }, {
            duration: 400,
            queue: false,
            easing: "swing"
        });
    });
    $("#hide_menu").click(function(e) {
        e.preventDefault();
        $("#skrollr-body").stop().animate({
            "left": 0
        }, {
            duration: 400,
            queue: false,
            easing: "swing"
        });
        $("#menu").stop().animate({
            // "right": "-80%"
            "right": "-270px"
        }, {
            duration: 400,
            queue: false,
            easing: "swing"
        });
    });

    // $(".jupik_rollover").mouseenter(function() {
    //     $(this).addClass("roll_effect");
    // });
    // $(".jupik_rollover").mouseleave(function() {
    //     $(this).removeClass("roll_effect");
    // });

    $(".jupik_rollover").on({
        "mouseenter touchstart": function() {
            $(this).addClass("roll_effect");
        }
    });

    $(".jupik_rollover").on({
        "mouseleave touchend": function() {
            $(this).removeClass("roll_effect");
        }
    });


    $(CONFIG.obStorage.products.selector).click(function() {
        CONFIG.obStorage.products.click(this);
    });



    CONFIG.obStorage.games.setAll();

    $(".games_item > a").on({
        "click": function(e) {
            e.preventDefault();
            CONFIG.obStorage.games.showModal(this);
        },
    });

    $(".modal_close").on({
        "click": function(e) {
            e.preventDefault();
            CONFIG.obStorage.games.closeModal();
        },
    })
    $("#m_next").on({
        "click": function() {
            CONFIG.obStorage.games.next();
        }
    });
    $("#m_prev").on({
        "click": function() {
            CONFIG.obStorage.games.prev();
        }
    });
    $(".prod").on({
        "click": function() {
            CONFIG.obStorage.products.showDet(this);
        },
    });
    $("#movie").on({
        "click": function() {
            var h = $(this).height();
            $(this).height(h);
            var movie = $(this).find("img").attr("alt");

            $(this).find("img").fadeOut(300);
            $(this).append('<iframe width="100%" height="' + h + '" src="' + movie + '&autoplay=1&wmode=transparent" frameborder="0" allowfullscreen></iframe>');
        },
    });

    $("#page9,#page11").on({
        "mousemove": function(e) {
            CONFIG.obStorage.products.move(this, e, false);
        },
    });
    // $(".det_img").on({
    //     "touchmove": function(e) {
    //         e.preventDefault();
    //         e.stopPropagation();
    //         CONFIG.obStorage.products.move(this, e,true);
    //     },
    // });
    $(".modal_txt").on({
        "touchmove": function(e) {
            e.preventDefault();
        }
    })
    $("#page9, #page11").on({
        "mouseleave": function(e) {
            $(".det_img").css("top", "-27px");
        },
    });

    $("#up").on({
        "click": function() {
            $("html,body").animate({
                scrollTop: 0
            }, {
                duration: 600
            });
        }
    })

    $(".p_title").on({
        "click": function() {
            if ($(this).hasClass("click")) {
                $(this).removeClass("click");
                $(this).next(".p_content").slideUp("240");
            } else {
                $(this).addClass("click");
                $(this).next(".p_content").slideDown("240");
            }
        }
    })

});