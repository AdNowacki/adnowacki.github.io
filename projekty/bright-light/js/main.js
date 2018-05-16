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

    $('.nav__linksbox a').on('click', function(e){
        e.preventDefault();
        let h = this.hash;
        let pos = $(h).offset().top;
        $('html,body').animate({scrollTop: pos},400);
        $('.nav__linksbox a').removeClass('active');
        $(this).addClass('active');
        $('body').removeClass('opennav');
    });



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

// paralax
// let elems = document.querySelectorAll('.triangle img');
// let move = [0.5, 0.3, 0.6, 0.5, 0.8, 0.3];
// let oldPosition = 0;
// window.onscroll = function(){
//     let dir = (oldPosition < document.documentElement.scrollTop)
//     [...elems].forEach(function(el, ind){
//         let speed = ( ind % 2 == 0 ) ? 1 : 3;
//         if( oldPosition < document.documentElement.scrollTop )
//             move[ind] += speed;
//         else
//             move[ind] -= speed;
//         console.log(move[ind]);
//         el.style.transform = "translateY("+ parseInt(move[ind]) +"px)";
//     });
//     oldPosition = document.documentElement.scrollTop;
// }







