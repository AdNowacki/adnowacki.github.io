var params = {};
window.location.href.replace(/[?#&]+([^=&]+)=([^&]*)/gi, function(m,key,value) { 
	params[key] = decodeURIComponent(value);
});

var clickTag = (params['click'] === undefined) ? 'http://onet.pl' : params['click'];