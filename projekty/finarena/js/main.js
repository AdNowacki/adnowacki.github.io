window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

var Config, Result, _Range, next, steps, graph, hideSteps, pathStep, result;

var BodyUserAgent = function() {
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

// ustawienia slidera
var Config = {
  sliderTime : 5000,
}

window.addEventListener( 'load' , function() {
var bua = new BodyUserAgent();
bua.setBodyId(true);
// slidery
     $('.slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: false,
      dots: false,
      draggable: false,
      autoplay: true,
      speed: 600,
      autoplaySpeed: Config.sliderTime,
      cssEase: 'ease'
    });

    $('.aside-slider-items').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: false,
      dots: false,
      draggable: false,
      speed: 240,
      cssEase: 'ease'
    });

    $('.recomm-slider').each(function(i,v){
        var initial = $(this).attr('data-active-step') - 1;
        $(this).slick({
          initialSlide: initial,
          dots: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          fade: false,
          draggable: false,
          speed: 240,
          cssEase: 'ease'
        });

        var dots = $(this).find('.slick-dots').find('li');
        for( var i=0; i<initial; i++ ) {
          dots.eq(i).addClass('act');
        }
    });
// slidery


// datepicker
    $('.form-input-date input').datetimepicker({
        theme:'dark',
        timepicker:false,
        format:'d/m/Y',
        formatDate:'d/m/Y',

    });
// datepicker

}, false);


next = document.querySelectorAll( ".form-input-btn button[name='next']" ),
steps = document.querySelectorAll( "div[data-step]" ),
graph = document.querySelectorAll( ".input-step-graph" ),
hideSteps = function() {
    [].forEach.call(steps,function(v){
        v.style.display = 'none';
    })
},
pathStep = function(i) {
    i--;
    var prev = i-1;
    [].forEach.call(graph, function(v,ind) {
        if( ind<=prev ) {
            // console.log(document.querySelectorAll('.input-step-label')[prev]);
            document.querySelectorAll('.input-step-label')[prev].classList.add('show-ico');
        }
        if( ind<=i ) {
            v.classList.add('act');
        }

    })
};


[].forEach.call(next,function(v){
    v.addEventListener('click',function(e){
        e.preventDefault();
        var toV = v.dataset.next;
        hideSteps();
        var current = document.querySelector('div[data-step="'+toV+'"]');
        current.style.display = 'block';
        pathStep(toV);
    })
});


Result = function( options ) {
  this.options = options;
  this.startValue = 0;
  this.rrsoValue = 0;
  this.costValue = 0;
  this.circleImage;
  this.data = {
    rrso : 23.56,
    cost: 2734.31,
    rank: 61,
    finarena: 47,
  };

  this.hideSteps = function() {
    $('div[data-step]').css('display','none');
  };
  this.showResult = function() {
    $('div[data-step="4"]').css('display','block');
    $(".input-step-label").addClass('show-ico');
  };

// canvas circle
  this.circleRankingDraw = function(values) {
    var canvas = document.getElementById("rank-circle");
    var ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    var arcPos = ( result.startValue * 0.75 ) / 100;

    var grd=ctx.createRadialGradient(canvas.width/2,canvas.height/2, 34, canvas.width/2,canvas.height/2,70);
    grd.addColorStop(0,"#000");
    grd.addColorStop(1,this.options.strokeTextColor);

    ctx.beginPath();
    ctx.arc(canvas.width/2,canvas.height/2-3,64,0.75*Math.PI,( 0.75 + 2*arcPos )*Math.PI,false);
    ctx.lineWidth = 30;
    ctx.strokeStyle = grd;
    ctx.stroke();

    ctx.drawImage(this.circleImage,0,0);
    ctx.font = this.options.font;
    ctx.fillStyle = this.options.fontColor;
    ctx.textAlign = this.options.textAlign;
    ctx.lineWidth = this.options.strokeTextWidth;
    ctx.strokeStyle = this.options.strokeTextColor;
    ctx.strokeText(result.startValue, canvas.width/2, canvas.height/2); 
    ctx.fillText(result.startValue, canvas.width/2, canvas.height/2); 

  }

  this.drawCircle = function(){
    if( result.startValue <= result.data.rank ) {
      result.circleRankingDraw();
      result.startValue++;
      setTimeout(function() {
        window.requestAnimFrame(result.drawCircle); 
      }, 1000 / 25);
    }
  }
// canvas circle end
// canvas RRSO
  this.rrsoRankingDraw = function() {
    var canvas = document.getElementById("rank-rrso");
    var ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.font = this.options.fontRRSO;
    ctx.fillStyle = this.options.fontColor;
    ctx.textAlign = this.options.textAlign;
    ctx.lineWidth = this.options.strokeRRSOTextWidth;
    ctx.strokeStyle = this.options.strokeRRSOTextColor;
    var v = result.rrsoValue.toString().replace( '.', ',');
    v = v.toString() + '%';
    ctx.strokeText(v, canvas.width/2, 30); 
    ctx.fillText(v, canvas.width/2, 30); 
  }

  this.drawRrso = function() {
    if( result.rrsoValue >= result.data.rrso ) {
      result.rrsoValue = result.data.rrso;
    }

    if( result.rrsoValue < result.data.rrso ) {
      result.rrsoRankingDraw();
      result.rrsoValue = parseFloat(result.rrsoValue) + 0.11;
      result.rrsoValue = parseFloat(result.rrsoValue);
      result.rrsoValue = result.rrsoValue.toFixed(2);
      setTimeout(function() {
        window.requestAnimFrame(result.drawRrso); 
      }, 1000 / 250);

    } else {
      result.rrsoValue = result.data.rrso;
      result.rrsoRankingDraw();
    }
  }
// canvas RRSO end

// canvas cost
  this.costRankingDraw = function() {
    var canvas = document.getElementById("rank-cost");
    var ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.font = this.options.fontRRSO;
    ctx.fillStyle = this.options.fontColor;
    ctx.textAlign = this.options.textAlign;
    ctx.lineWidth = this.options.strokeRRSOTextWidth;
    ctx.strokeStyle = this.options.strokeRRSOTextColor;
    var v = result.costValue.toString().replace( '.', ',');
    v = v.toString() + 'PLN';
    ctx.strokeText(v, canvas.width/2, 30); 
    ctx.fillText(v, canvas.width/2, 30); 
  }

  this.drawCost = function() {
    if( result.costValue >= result.data.cost ) {
      result.costValue = result.data.cost;
    }

    if( result.costValue < result.data.cost ) {
      result.costRankingDraw();
      result.costValue = parseFloat(result.costValue) + 12.11;
      result.costValue = parseFloat(result.costValue);
      result.costValue = result.costValue.toFixed(2);
      setTimeout(function() {
        window.requestAnimFrame(result.drawCost); 
      }, 1000 / 400);

    } else {
      result.costValue = result.data.cost;
      result.costRankingDraw();
    }
  }

// canvas cost end

this.drawCanvas = function() {
  var canvas = document.querySelectorAll('.canvas-chart');
  var th = this;
  [].forEach.call(canvas,function(v,i,a) {
    var data = v.dataset.value;
    var ctx = v.getContext("2d");
    ctx.clearRect(0, 0, v.width, v.height);

    var arcPos = ( data * 0.75 ) / 100;

    var grd=ctx.createRadialGradient(v.width/2,v.height/2, 34, v.width/2,v.height/2,70);
    grd.addColorStop(0,"#000");
    grd.addColorStop(1,this.options.strokeTextColor);

    ctx.beginPath();
    ctx.arc(v.width/2,v.height/2-3,64,0.75*Math.PI,( 0.75 + 2*arcPos )*Math.PI,false);
    ctx.lineWidth = 30;
    ctx.strokeStyle = grd;
    ctx.stroke();
    ctx.drawImage(th.circleImage,0,0);
    ctx.font = this.options.font;
    ctx.fillStyle = this.options.fontColor;
    ctx.textAlign = this.options.textAlign;
    ctx.lineWidth = this.options.strokeTextWidth;
    ctx.strokeStyle = this.options.strokeTextColor;
    ctx.strokeText(data, v.width/2, v.height/2); 
    ctx.fillText(data, v.width/2, v.height/2); 
  })
}
}


// range
_Range = function() {
  this.width;

  this.setWidth = function() {
    var container = $('.finarena-range').width(),
        start = $('.finarena-start').width(),
        end = $('.finarena-end').width();
        this.width = ( container - (start + end) ) - 30;
        $('.range-bar-container').css('width', this.width+'px');
  }

  this.drawRange = function() {
    $('.range-value').css('width', ( result.data.finarena * ( this.width/100 ) - 54 )+'px');

    var container = $('.range-bar-container').width(),
        valueWidth = result.data.finarena,
        positionWidth = ( $('.range-position').width() / container ) * 100,
        other = 100 - (valueWidth);
    $('.range-other').css('width',  ( other * ( this.width/100 ) - 16 ) +'px');

  }
}
// range end

var options = {
  font : "39px Open Sans, Arial",
  fontColor : "#ffed00",
  textAlign: "center",
  strokeTextWidth : 3,
  strokeTextColor: "#ffed00",
  fontRRSO : "29px Open Sans, Arial",
  strokeRRSOTextWidth : 2,
  strokeRRSOTextColor: "#ffed00",
}

result = new Result( options );
result.circleImage = new Image();
result.circleImage.src = "images/circle-canvas.png";
result.circleImage.addEventListener('load', function(){
  result.drawCanvas.call(result) ;
})
$("button[name='next-result']").on("click", function(e){
    e.preventDefault();
    result.hideSteps();
    result.showResult();
    result.drawCircle();
    result.drawRrso();
    result.drawCost();

    var range = new _Range();
    range.setWidth();
    range.drawRange();
});

// kredyty
$(".credits-panel, .faq-panel").on('click',function(){
    $(".credits-panel, .faq-panel").removeClass('act');
    $(this).addClass('act');

    if (window.matchMedia("(max-width: 658px)").matches) {
        $('html,body').animate({scrollTop : ( $(this).offset().top - 20 )},300);
    }
});
// taby
$('.tab').on('click',function(e){
  e.preventDefault();
  var target_ = $(this).parents('.btn-tab').attr('data-tab');
  $('.tab').removeClass('act');
  $(this).addClass('act');
  $('.tab-target').css('display', 'none');
  $('.tab-target[data-tab-target="'+target_+'"]').css('display', 'block');
})



