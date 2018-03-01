'use strict';
// CSS support
var supportsCSS = !!((window.CSS && window.CSS.supports) || window.supportsCSS || false);
if( supportsCSS ) {
    var supportsFlexAndAppearance = CSS.supports("(display: flex) and (-webkit-appearance: caret)");
}

/*blokowanie wyświetlania w iframe*/
if (top.location != self.location) {
    top.location.href = self.location;
}

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
}

CONFIG.obStorage = {
    window: new CONFIG.window(),
    userAgent: new CONFIG.userAgent(),
}



$(document).ready(function() {
    CONFIG.init();
});