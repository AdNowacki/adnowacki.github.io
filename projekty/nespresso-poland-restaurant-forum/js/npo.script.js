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


var user = new CONFIG.userAgent();

var NPO = function() {
	this.windowWidth;
	this.windowHeight;
	this.navHeight;
	this.npoNav;
	this.sectionActive = 1;
	this.main;
	this.sections = [];
	this.cursor = document.querySelector(".npo-cursor");
	this.relacja = document.querySelector("#npo-relacja");
	this.layer = document.querySelector(".npo-show-layer");
	this.gallery = document.querySelectorAll(".npo-gallery-box a");
	this.scrollStatus = 0;

	this.setSections = function() {
		var sections = document.querySelectorAll( ".npo-section" ),
			sectionsLength = sections.length;

		for( var i=0; i<sectionsLength; i++ ) {
			if( document.body.getAttribute("id") == "chrome" || document.body.getAttribute("id") == "safari" ) {
		 		sections[i].style.minHeight = this.windowHeight + "px";
			} else {
		 		sections[i].style.height = this.windowHeight + "px";
			}
		} 
	}

	this.cursorPosition = function( pos, direction ) {
		var ind = pos-1;
		console.log(direction);
		if( direction == '-' ) {
			ind--;
		} else if( direction == '+' ) {
			ind++;
		}
		this.cursor.style.top = 91 + (31*ind) + "px";
	}
}

var npo = new NPO();
window.addEventListener("load", function(){
	var slider = null;
	user.setBodyId(true);
	npo.sections[0] = document.querySelector(".npo-section-1");
	npo.sections[1] = document.querySelector(".npo-section-2");
	npo.sections[2] = document.querySelector(".npo-section-3");
	npo.sections[3] = document.querySelector(".npo-section-4");
	npo.sections[4] = document.querySelector(".npo-section-5");
	npo.main = document.querySelector(".npo-main");
	npo.npoNav = document.querySelector(".npo-navigation");
	npo.windowWidth = innerWidth;
	npo.windowHeight = innerHeight;
	npo.navHeight = 61+68+32;
	npo.setSections();


	$(".npo-gallery-box a").click(function(e){
		e.preventDefault();
		var modal = $(this).attr("href").substr(1);
		$(".npo-slider, .npo-slider-2, .npo-slider-nav, .npo-slider-nav-2").slick("unslick");
		$("#npo-gallery-"+modal).fadeIn(600);
			$('.npo-slider, .npo-slider-2').slick({
			  dots: false,
			  infinite: true,
			  speed: 300,
			  slidesToShow: 1,
			});

			$('.npo-slider-nav').slick({
			  dots: false,
			  infinite: true,
			  speed: 300,
			  slidesToShow: 6,
			  asNavFor: ".npo-slider",
		  	  focusOnSelect: true,
			});

			$('.npo-slider-nav-2').slick({
			  dots: false,
			  infinite: true,
			  speed: 300,
			  slidesToShow: 6,
			  asNavFor: ".npo-slider-2",
		  	  focusOnSelect: true,
			});

	})

	$('.npo-slider, .npo-slider-2').slick({
	  dots: false,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 1,
	});

	$('.npo-slider-nav').slick({
	  dots: false,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 6,
	  asNavFor: ".npo-slider",
  	  focusOnSelect: true,
	});

	$('.npo-slider-nav-2').slick({
	  dots: false,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 6,
	  asNavFor: ".npo-slider-2",
  	  focusOnSelect: true,
	});


},false);


window.addEventListener("resize", function(){
	npo.windowWidth = innerWidth;
	npo.windowHeight = innerHeight;
	npo.setSections();
	var topPosition = 0;
	topPosition = $(".npo-section-" + npo.sectionActive).offset().top;
	$("html, body").animate({ scrollTop: topPosition+"px" }, 110);
},false);

window.addEventListener("scroll",function(e){
	var st = window.scrollY || window.pageYOffset;
	if( st >= ( npo.sections[4].offsetTop - 3 ) ) {
		$(".npo-navigation a").removeClass("npo-active");
		$(".npo-navigation a[data-section='5']").addClass("npo-active");
		npo.sectionActive = 5;
	} else if( st >= ( npo.sections[3].offsetTop - 3 ) ) {
		$(".npo-navigation a").removeClass("npo-active");
		$(".npo-navigation a[data-section='4']").addClass("npo-active");
		npo.sectionActive = 4;
	} else if( st >= ( npo.sections[2].offsetTop - 3 ) ) {
		$(".npo-navigation a").removeClass("npo-active");
		$(".npo-navigation a[data-section='3']").addClass("npo-active");
		npo.sectionActive = 3;
	} else if( st >= ( npo.sections[1].offsetTop - 3 ) ) {
		$(".npo-navigation a").removeClass("npo-active");
		$(".npo-navigation a[data-section='2']").addClass("npo-active");
		npo.sectionActive = 2;
	} else if( st >= ( npo.sections[0].offsetTop - 3 ) ) {
		$(".npo-navigation a").removeClass("npo-active");
		$(".npo-navigation a[data-section='1']").addClass("npo-active");
		npo.sectionActive = 1;
	}
	var p = npo.sectionActive;
	npo.cursorPosition(p);

},false);



$(".npo-navigation a").click(function(e){
	e.preventDefault();
	npo.sectionActive = $(this).attr("data-section"),
		topPosition = 0,
	$(".npo-navigation a").removeClass("npo-active");
	$(this).addClass("npo-active");
	topPosition = $(".npo-section-" + npo.sectionActive).offset().top;
	// $("html, body").animate({ scrollTop: topPosition+"px" }, 400);
	$("#npo-content-translate").css("transform", "translateY("+ - (npo.sectionActive-1) * npo.windowHeight+"px)");
	npo.cursorPosition(npo.sectionActive);

});

// $("#npo-relacja").on("click",function(e){
// 	e.preventDefault();
// 	if( $(".npo-show-layer").hasClass("npo-show-layer-visible") ) {
// 		$(".npo-show-layer").removeClass("npo-show-layer-visible");
// 		$("#npo-relacja").removeClass("npo-relacja-act");
// 	} else {
// 		$(".npo-show-layer").addClass("npo-show-layer-visible");
// 		$("#npo-relacja").addClass("npo-relacja-act");
// 	}
// });

$(".npo-lightbox-content").mCustomScrollbar({
	scrollInertia:400
});

$("#npo-relacja").click(function(e){
	e.preventDefault();
	$("#npo-relacja-modal").fadeIn(400);
});

$("#npo-program").click(function(e){
	e.preventDefault();
	$("#npo-program-modal").fadeIn(400);
});

$("#npo-menu").click(function(e){
	e.preventDefault();
	$("#npo-menu-modal").fadeIn(400);
});



$(".npo-close").click(function(e){
	e.preventDefault();
	$(".npo-lightbox").fadeOut(280);
});

$("body").on("keydown",function(e){
	if( e.which == 27 ) {
		$(".npo-lightbox").fadeOut(280);
	}
});


$('.npo-section').mousewheel(function(event, delta) {
	event.preventDefault();
	var h = npo.windowHeight;
	npo.sectionActive = $(this).attr('data-section');
	var c = npo.sectionActive - 1;

	npo.scrollStatus = h * npo.sectionActive;
	console.log(npo.sectionActive);
	if( delta < 0 ) {
		if( npo.sectionActive != 5 ) {
			var _top = -npo.scrollStatus;
			npo.cursorPosition(npo.sectionActive, '+');
		}
	} else {
		if( npo.sectionActive != 1 ) {
			var _top = -npo.scrollStatus + 2*h;
		}
		if( npo.sectionActive != 1 ) {
			npo.cursorPosition(npo.sectionActive, '-');
		}
	}

	$("#npo-content-translate").css("transform", "translateY("+_top+"px)");
	$(".npo-navigation a").removeClass("npo-active");
	$(".npo-navigation a[data-section='"+npo.sectionActive+"']").addClass("npo-active");

    
});

