;(function(){

	var nespresso = {
		divs : 0,
		divsLength : 0,
		navOb : null,
		topWindow : 0,
		navPosY : 0,
		backgroundNav : "#c41026",
		colorNav : "#fff",
		lightColor : false,
		scrollNav : function() {
			this.topWindow = jQuery(window).scrollTop();
			this.navOb.style.top = this.navPosY + this.topWindow + "px";
		},
		changeColor : function(target) {
			$(".np-color button").removeClass("scale");
			$(target).addClass("scale");

			var thisColor = "#" + jQuery(target).attr("data-color");
			this.backgroundNav = thisColor;

			$(".np-product-view img").removeClass("act");
			$(".np-product-view img[data-color='" + thisColor.substr(1) + "']").addClass("act");

			jQuery(".change-color button:not(.act)").css( "background-color", thisColor );
			jQuery(".change-color button").css( "border-color",  thisColor );
			jQuery(".change-color button.act").css( "color",  thisColor );
			jQuery(".np-det._np2 > div").css( "background-color",  thisColor );

			if( thisColor.match(/e4d9b7/) || thisColor.match(/f8f7f2/) ) {
				this.lightColor = true;
				jQuery(".change-color button").css( "color",  "#000" );
			} else {
				this.lightColor = false;
				jQuery(".change-color button:not(.act)").css( "color",  "#fff" );
				jQuery(".change-color button.act").css( "color",  thisColor );
			}
		},
		scrollTo : function() {
			jQuery(".np-nav-flow button").removeClass("act2");
			jQuery(this).addClass("act2");
			var target = jQuery(this).attr("data-action")
				offset = jQuery("._np"+target).offset().top;
				jQuery('html,body').animate({scrollTop: offset}, 350);
		},
		changeNavigationCurrent : function() {
			var that = this;
			jQuery(nespresso.divs).each(function(i,v) {
				if( jQuery("html, body").scrollTop() >= (jQuery(this).offset().top - 1) ) {
					it = jQuery(this).attr("data-content");
					var scrollColor1 = ( that.lightColor ) ? "#000" : that.backgroundNav,
						scrollColor2 = ( that.lightColor ) ? "#000" : "#fff";
					jQuery(".np-nav-flow button").removeClass("act").css( {"background-color": that.backgroundNav, "color" : scrollColor2 });
					jQuery(".np-nav-flow button[data-action='"+it+"']").addClass("act").css({"color" : scrollColor1});
				}
			});
		}
	}

	jQuery(document).ready(function(){
		var i = 0,
			it = null;

		nespresso.divs = jQuery(".np-det");
		nespresso.divsLength = nespresso.divs.length;
		nespresso.navOb = document.querySelector(".np-nav-flow");
		nespresso.navPosY = nespresso.navOb.offsetTop;

		jQuery(window).scroll(function(e){
			nespresso.scrollNav();
			nespresso.changeNavigationCurrent.call(nespresso);
		});

		jQuery(".np-color button").click(function(){
			nespresso.changeColor.call( nespresso, this );
		});

		jQuery(".np-nav-flow button").click(nespresso.scrollTo);

	});

})();