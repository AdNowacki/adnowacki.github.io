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



$('.slider-container').slick({
    dots: true,
});



