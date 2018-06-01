// vars

var vBody = document.body,
    vPlayListBtn = document.getElementById('playlist__btn'),
    vPlayListBtnClose = document.getElementById('playlist__btn-close'),
    vPlayBtn = document.getElementById('play');


// functions

// Slider
function Slider() {
    this.slider = null;
    this.track = null;
    this.sliderItem = null;
    this.sliderItems = null;
    this.slideItemInit = null;
    this.player = null;
    this.marginLeft;

    this.init = function () {
        if (!this.slider || !this.sliderItem)
            return;

        this.centerSlider();

        let margin = -this.slideItemInit * this.sliderItem[0].offsetWidth;
        margin /= 2;
        this.marginLeft = margin;

        this.sliderOffset(margin);
    }

    this.centerSlider = function () {
        console.log(this.slideItemInit);
        if (this.sliderItems % 2 != 0)
            this.slideItemInit = this.sliderItems / 2;
        else
            this.slideItemInit = (this.sliderItems / 2) - 1;

        this.slideItemInit = Math.floor(this.slideItemInit);

        if (this.sliderItem[this.slideItemInit])
            this.sliderItem[this.slideItemInit].classList.add('slide-active');

        this.changeSource(this.slideItemInit);
    }

    this.changeSource = function( item ) {
        let mp3 = this.sliderItem[item].querySelector('a').getAttribute('data-mp');
        this.player.querySelector('source').src = 'mp3/' + mp3 + '.mp3';
        this.player.load();
    }

    this.sliderOffset = function (offset) {
        this.track.style.marginLeft = this.marginLeft + 'px';
        this.slider.classList.add('init-slider')
    }

    this.swipe = function() {
        let s = this;
        var mc = new Hammer(s.track);
        mc.on("swipeleft swiperight", function (ev) {
            if (ev.type == 'swipeleft' ) {
                s.slideItemInit++;
                if (s.slideItemInit >= s.sliderItems) {
                    s.slideItemInit = s.sliderItems - 1;
                    return;
                }
                s.marginLeft -= s.sliderItem[0].offsetWidth;
            } else {
                s.slideItemInit--;
                if (s.slideItemInit < 0) {
                    s.slideItemInit = 0;
                    return;
                }
                s.marginLeft += s.sliderItem[0].offsetWidth;
            }

            margin = s.marginLeft;

            s.sliderOffset(margin);
            s.swipeActive();
            // s.changeSource(s.slideItemInit);
            // s.player.pause();
            // s.player.currentTime();

            // !
            
        });
    }

    this.swipeActive = function() {
        [...this.sliderItem].forEach(function(el){
            el.classList.remove('slide-active');
        });

        this.sliderItem[this.slideItemInit].classList.add('slide-active');
    }
}
// włączanie / wyłączanie playera
function playerStatus() {
    vBody.classList.toggle('play_start');
}

// rozwijanie playlisty
function showPlaylist() {
    vBody.classList.toggle('show-playlist');
}

// ukrywanie playlisty
function hidePlaylist() {
    vBody.classList.remove('show-playlist');
}

// ************************************************************ //

if( vPlayBtn ) {
    vPlayBtn.addEventListener( 'click', playerStatus );
}

if( vPlayListBtn ) {
    vPlayListBtn.addEventListener('click', showPlaylist );
}

if( vPlayListBtnClose ) {
    vPlayListBtnClose.addEventListener('click', hidePlaylist);
}

var slider_ = new Slider();
slider_.slider = document.getElementsByClassName('slider')[0],
slider_.track = document.getElementsByClassName('slider__track')[0],
slider_.sliderItem = document.getElementsByClassName('slider__item'),
slider_.sliderItems = slider_.sliderItem.length,
slider_.slideItemInit = 1;
slider_.player = document.getElementById('mplayer');
slider_.init();
slider_.swipe();





