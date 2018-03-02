var CONFIG = CONFIG || {};

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
}

CONFIG.init = function() {
    CONFIG.obStorage.window.setWindow();
    CONFIG.obStorage.userAgent.setBodyId(true);
    CONFIG.obStorage.slider;
}

CONFIG.slider = function() {
    this.start = 1,
    this.slides = 7,
    this.slidesWidth = 1003,
    this.containerWidth = this.slides * this.slidesWidth;
    this.setWidth = function() {
        if ($(".animate_box").length > 0) {
            this.slides = $(".animate_box > div").length;
            this.containerWidth = this.slides * this.slidesWidth;
            $(".animate_box").width(this.containerWidth);
        }
    }
    this.copyFirstDiv = function() {
        var div = $(".animate_box div:first-child").clone();
        $(".animate_box").append(div);
    }
    this.prevNext = function(direction) {
        if (direction == "next") {
            var current = this.start;
            this.start++;
            if (this.start > this.slides) {
                this.start = 1;
            }
            var ch = this.start - 1;
            $(".animate_box > div").eq(current - 1).stop().animate({
                "left": "-" + this.slidesWidth + "px"
            }, {
                duration: 600,
                queue: false,
                easing: "easeOutCirc",
                complete: function() {
                    $(".animate_box > div").eq(current - 1).css({
                        "display": "none",
                        "top": "0",
                        "left": "0",
                        "transform": "scale(0)"
                    });
                    $(".animate_box > div").eq(ch).fadeIn(300).css("transform", "scale(1)");
                }
            });
        } else {
            var current = this.start;
            this.start--;
            if (this.start < 1) {
                this.start = this.slides;
            }
            var ch = this.start - 1;
            $(".animate_box > div").eq(current - 1).stop().animate({
                "left": "+" + this.slidesWidth + "px"
            }, {
                duration: 600,
                queue: false,
                easing: "easeOutCirc",
                complete: function() {
                    $(".animate_box > div").eq(current - 1).css({
                        "display": "none",
                        "top": "0",
                        "left": "0",
                        "transform": "scale(0)"
                    });
                    $(".animate_box > div").eq(ch).fadeIn(300).css("transform", "scale(1)");
                }
            });
        }
        $(".b_nav").removeClass("act");
        $("#b" + this.start).addClass("act");
    }
    this.navigation = function(obj) {
        var dir = null;
        var id = $(obj).attr("id").substr(1);
        if (id > this.start) {
            var dir = "-";
        } else if (id < this.start) {
            var dir = "+";
        }
        var current = this.start - 1;
        this.start = id;

        if (dir != null) {
            $(".b_nav").removeClass("act");
            $("#b" + id).addClass("act");
            $(".animate_box > div").eq(current).stop().animate({
                "left": dir + this.slidesWidth + "px"
            }, {
                duration: 600,
                queue: false,
                easing: "easeOutCirc",
                complete: function() {
                    $(".animate_box > div").eq(current).css({
                        "display": "none",
                        "top": "0",
                        "left": "0",
                        "transform": "scale(0)"
                    });
                    $(".animate_box > div").eq(id - 1).fadeIn(300).css("transform", "scale(1)");
                }
            });
        }

    }
}








CONFIG.obStorage = {
    window: new CONFIG.window(),
    userAgent: new CONFIG.userAgent(),
    slider: new CONFIG.slider(),
}




$(document).ready(function() {
    CONFIG.init();
    CONFIG.obStorage.slider.setWidth();
    $("#next").click(function(e) {
        e.preventDefault();
        CONFIG.obStorage.slider.prevNext("next");
    });
    $("#prev").click(function(e) {
        e.preventDefault();
        CONFIG.obStorage.slider.prevNext("prev");
    });
    $(".b_nav").click(function(e) {
        e.preventDefault();
        CONFIG.obStorage.slider.navigation(this);
    });
});