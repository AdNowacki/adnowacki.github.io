// vars

var vBody = document.body,
    vPlayListBtn = document.getElementById('playlist__btn'),
    vPlayListBtnClose = document.getElementById('playlist__btn-close'),
    vPlayBtn = document.getElementById('play');


// functions

// Slider
function Slider() {
    this.slider = document.getElementsByClassName('slider')[0];
    this.track = document.getElementsByClassName('slider__track')[0];
    this.sliderItem = document.getElementsByClassName('slider__item');
    this.sliderItems = this.sliderItem.length;
    this.slideItemInit = 1;
    this.player = document.getElementById('mplayer');
    this.songTitle = document.querySelector('.slider-title__title');
    this.songArtist = document.querySelector('.slider-title__artist');
    this.marginLeft;
    this.currentTimeBar = document.getElementById("current-time");
    this.totalTimeBar = document.getElementById("total-time");
    this.nextClick = document.getElementById('next');
    this.prevClick = document.getElementById('prev');
    this.options = document.getElementsByClassName('toggle-btn');

    this.init = function () {
        if (!this.slider || !this.sliderItem)
            return;

        this.centerSlider();
        
        let sub = this.slideItemInit-1;
        let margin = -sub * this.sliderItem[0].offsetWidth - (this.sliderItem[0].offsetWidth/2);
        this.marginLeft = margin;

        this.sliderOffset(margin);
    }

    this.centerSlider = function () {
        if (this.sliderItems % 2 != 0) {
            this.slideItemInit = this.sliderItems / 2;
        } else {
            this.slideItemInit = (this.sliderItems / 2) - 1;
        }

            
            this.slideItemInit = Math.floor(this.slideItemInit);

        if (this.sliderItem[this.slideItemInit]) 
            this.sliderItem[this.slideItemInit].classList.add('slide-active');

        this.changeSource(this.slideItemInit);

        this.setTitle(this.sliderItem[this.slideItemInit].getAttribute('data-name'), this.sliderItem[this.slideItemInit].getAttribute('data-artist'));
    }

    this.setTitle = function( t, a ) {
        let title = document.createElement('span');
        title.innerHTML = t;
        title.style.position = 'absolute';
        this.songTitle.appendChild(title);
        
        let artist = document.createElement('span');
        artist.style.position = 'absolute';
        artist.innerHTML = a;
        this.songArtist.appendChild(artist);
        
        let show = setTimeout(() => {
            title.style.position = 'static';
            artist.style.position = 'static';
            title.classList.add('add');
            artist.classList.add('add-artist');
        }, 620);
    }

    this.removeTitle = function (t, a) {

        let title = document.querySelector('.slider-title__title span');
        title.classList.add('remove');

        let artist = document.querySelector('.slider-title__artist span');
        artist.classList.add('remove-artist');

        let show = setTimeout(() => {
            title.parentElement.removeChild(title);
            artist.parentElement.removeChild(artist);
        }, 620);
    }

    this.changeSource = function( item ) {
        let mp3 = this.sliderItem[item].querySelector('a').getAttribute('data-mp');
        this.player.querySelector('source').src = 'mp3/' + mp3 + '.mp3';
        this.player.load();
        this.player.addEventListener('canplaythrough',()=>{
            this.currentTimeBar.innerHTML = "0:00";
            let sec = parseInt(this.player.duration);
            let min;
            let s;
            if( sec >= 60 ) {
                let t = sec/60;
                min = Math.floor(t);
                s = ( min - t ) * 60;
            } else {
                min = 0;
                s = sec;
            }

            if( s < 10 )
                s = "0" + s;

            let inserTime = this.totalTimeBar.innerHTML = min + ":" + s;
            
        });

        this.changeCurrentTime();
    }

    this.changeCurrentTime = function() {
        let sec = parseInt(this.currentTime);
        let min;
        let s;
        if (sec >= 60) {
            let t = sec / 60;
            min = Math.floor(t);
            s = (min - t) * 60;
        } else {
            min = 0;
            s = sec;
        }

        if (s < 10)
            s = "0" + s;
    }    

    this.sliderOffset = function (offset) {
        this.track.style.marginLeft = this.marginLeft + 'px';
         let showSlider = setTimeout(() => {
             this.slider.classList.add('init-slider');
             clearTimeout(showSlider);
         }, 400);
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
            s.changeSource(s.slideItemInit);
            s.playerReset();
            s.removeTitle();
            s.setTitle(s.sliderItem[s.slideItemInit].getAttribute('data-name'), s.sliderItem[s.slideItemInit].getAttribute('data-artist'));

            
        });
    }

    this.swipeActive = function() {
        [...this.sliderItem].forEach(function(el){
            el.classList.remove('slide-active');
        });

        this.sliderItem[this.slideItemInit].classList.add('slide-active');
    }

    this.playerReset = function() {
        this.player.pause();
        this.player.currentTime = 0;
    }

    this.navNext = function() {
        this.slideItemInit++;
        if (this.slideItemInit >= this.sliderItems) {
            this.slideItemInit = this.sliderItems - 1;
            return;
        }
        this.marginLeft -= this.sliderItem[0].offsetWidth;
        margin = this.marginLeft;        
        this.sliderOffset(margin);
        this.swipeActive();
        this.changeSource(this.slideItemInit);
        this.playerReset();
        this.removeTitle();
        this.setTitle(this.sliderItem[this.slideItemInit].getAttribute('data-name'), this.sliderItem[this.slideItemInit].getAttribute('data-artist'));
    }

    this.navPrev = function () {
        this.slideItemInit--;
        if (this.slideItemInit < 0) {
            this.slideItemInit = 0;
            return;
        }
        this.marginLeft += this.sliderItem[0].offsetWidth;
        this.sliderOffset(margin);
        this.swipeActive();
        this.changeSource(this.slideItemInit);
        this.playerReset();
        this.removeTitle();
        this.setTitle(this.sliderItem[this.slideItemInit].getAttribute('data-name'), this.sliderItem[this.slideItemInit].getAttribute('data-artist'));
    }

    
}
// włączanie / wyłączanie playera
function playerStatus() {
    if( vBody.classList.contains('play_start') ) 
        vBody.classList.add('play_stop');

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
var slider_ = new Slider();
slider_.init();
slider_.swipe();
slider_.nextClick.addEventListener('click', slider_.navNext.bind(slider_));
slider_.prevClick.addEventListener('click', slider_.navPrev.bind(slider_));
[...slider_.options].forEach((el)=>{
    el.addEventListener('click', function () {
        this.classList.toggle('on');
    })
})




if( vPlayBtn ) {
    vPlayBtn.addEventListener( 'click', playerStatus );
}


if( vPlayListBtn ) {
    vPlayListBtn.addEventListener('click', showPlaylist );
}

if( vPlayListBtnClose ) {
    vPlayListBtnClose.addEventListener('click', hidePlaylist);
}







