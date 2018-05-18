let animationElements = document.querySelectorAll("[data-animation]:not(.animationstart)");
let offer = document.getElementsByClassName("offer")[0];
let triangleImg = document.querySelectorAll('.triangle img');
let scrollTopWindow = 0;
let direction = 3;

var br = {
    langBtn: document.querySelector(".nav__langactive"),
    topPos: 0,
    newTopPos: 0,
    elPosition: 0,
    
    // animacje elementów
    showElements : function() {
        let aInd = 1;
        [...animationElements].forEach(function(el, ind){
            let delay = el.dataset.animation;
            let rect = el.getBoundingClientRect();
            let elemTop = rect.top;
            let elemBottom = rect.bottom;
            if( ind <= 3 ) {
                var isVisible = (window.innerHeight - elemTop >= ( window.innerHeight/3 ) );
                
            } else {
                var isVisible = (window.innerHeight - elemTop >= ( window.innerHeight/4 ) );
                el.style.transitionDelay = (aInd * .4) + 's';
                aInd++;
            }
            
            if( isVisible ) {
                
                // let anim = setTimeout(function(){
                    el.classList.add('animationstart');
                    // clearTimeout(anim);
                    // }, delay);
                }
            });
        },
        triangle: function() {
            br.newTopPos = document.documentElement.scrollTop;

            scrollTopWindow = document.documentElement.scrollTop;
            let elemTop = offer.getBoundingClientRect().top;
            if( elemTop <= window.innerHeight/1.2) {
                let dir = "";
                offer.classList.add('triangle-show');

                triangleImg.forEach( function( el ) {
                    if( br.newTopPos < br.topPos ) {
                        br.elPosition -= 0.1;
                    } else {
                        br.elPosition += 0.1;
                    }
                    el.style.transform = "translateY("+br.elPosition+"px)";


                    
                    
                    
                             
                                    
                } );
                                
                br.topPos = br.newTopPos;
                

            }
        }
    }
    
    // br.showElements();
    // window.addEventListener('scroll', br.showElements);
    // window.addEventListener('scroll', br.triangle);
    
    
    
    // nawigacja
    br.langBtn.addEventListener('click',function(e){
        e.preventDefault();
        let parent = this.parentElement;
        parent.classList.toggle('nav__langbox--open');
    });

    document.getElementById('nav-btn').addEventListener('click',function(){
        document.body.classList.toggle('opennav');
    });

    // $('.nav__linksbox a').on('click', function(e){
    //     e.preventDefault();
    //     let h = this.hash;
    //     let pos = $(h).offset().top;
    //     $('html,body').animate({scrollTop: pos},400);
    //     $('.nav__linksbox a').removeClass('active');
    //     $(this).addClass('active');
    //     $('body').removeClass('opennav');
    // });


// viewportchecker
// $('.show-elem').viewportChecker({
//     callbackFunction: function(elem, action){
//         setTimeout(function(){
//             console.log(elem);
//             elem.addClass('show-elem-end');
//         },100);
//     },
//     scrollBox: "body"
// });

$('.show-elem').viewportChecker({
    classToAdd: 'show-elem-end',
});

// slider
$('.slider-container').slick({
    dots: true,
});

$(window).on('scroll',function(){
    if( $(window).width() < 800 )
        return;
    let wt = $(this).scrollTop();
    if( wt >= 200 ) {
        $('body').addClass('nav-stick');
    } else {
        $('body').removeClass('nav-stick');
    }
});

// kategorie

let categories = document.querySelectorAll('[data-category]');
if( categories ) {
    [...categories].forEach((el,ind) => {
        let cName = el.getAttribute('data-category');
        let cTarget = el.getAttribute('data-target');

        let titleBindEl = document.querySelector('[data-title="'+ cTarget +'"]');
        if( titleBindEl ) {
            titleBindEl.innerHTML = cName;
        }
    });
}



var Slider = {
    slider: document.querySelector('.team__slider'),
    firstSlide: document.querySelector('.team__slider-item'),
    firstSlideWidth: 100,
    selectorItems: '.team__slider-item',
    itemsElements: null,
    selectorAction: '.team-info__image a',
    actionElements: null,
    clickAction: 0,
    elements: 0,
    current: 1,
    sliderWidth: 100,
    sliderHeight: 100,
    nextBtn: document.querySelector('.next'),
    prevBtn: document.querySelector('.prev'),
    init: function() {
        this.itemsElements = document.querySelectorAll( this.selectorItems );
        this.actionElements = document.querySelectorAll( this.selectorAction );
        this.sliderWidth = this.slider.offsetWidth;
        this.sliderHeight = this.slider.offsetHeight;
        this.firstSlideWidth = this.firstSlide.offsetWidth;
        this.elements = this.itemsElements.length;

        console.log( this );
    },
    callAction: function() {
        let thisObject = this;
        [...this.actionElements].forEach(function(elem, ind){
            elem.addEventListener('click', function(e){
                e.preventDefault();
                let current = elem.getAttribute('data-slide');
                if( !current ) 
                    return;

                this.current = current;
                thisObject.firstSlide.style.marginLeft = -(this.current-1)*thisObject.firstSlideWidth + 'px';
                thisObject.openSlider();
            });
        });
    },
    openSlider: function() {
        document.body.classList.add('slideropen');
    },
    closeSlider : function() {
        let thisObject = this;
        document.querySelector('.close').addEventListener('click',function(){
            document.body.classList.remove('slideropen');
            this.thisObject.current = 1;
        });
    },
    next: function() {
        let thisObject = this;
        this.nextBtn.addEventListener('click',function(){
            thisObject.current++;
            if( thisObject.current > thisObject.elements ) {
                thisObject.nextBtn.classList.add('off');
                thisObject.current = thisObject.elements;
                return;
            }
            console.log(thisObject.current, thisObject.elements);
            thisObject.nextBtn.classList.remove('off');
            thisObject.firstSlide.style.marginLeft = -(thisObject.current-1)*thisObject.firstSlideWidth + 'px';
        });
    },
    prev: function() {
        let thisObject = this;
        this.prevBtn.addEventListener('click',function(){
            thisObject.current--;
            if( thisObject.current < 1 ) {
                thisObject.prevBtn.classList.add('off');
                thisObject.current = 1;
                return;
            }
            console.log(thisObject.current, thisObject.elements);
            thisObject.prevBtn.classList.remove('off');
            thisObject.firstSlide.style.marginLeft = -(thisObject.current-1)*thisObject.firstSlideWidth + 'px';
        });
    },

}

Slider.init();
Slider.callAction();
Slider.closeSlider();
Slider.next();
Slider.prev();








