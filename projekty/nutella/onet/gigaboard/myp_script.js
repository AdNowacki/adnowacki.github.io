var mypVideo = document.querySelector( "#myp_video" );
var mypPoster = document.querySelector( "#myp_poster" );

document.addEventListener("DOMContentLoaded", function(){
	mypVideo.addEventListener( "ended", function() {
		mypVideo.style.display = "none";
		mypPoster.style.display = "block";
	} );
});

var params = {};
window.location.href.replace(/[?#&]+([^=&]+)=([^&]*)/gi, function
(m,key,value) { params[key] = decodeURIComponent(value);});
var clickTag = (params['click'] === undefined) ? 'http://onet.pl' : params['click'];