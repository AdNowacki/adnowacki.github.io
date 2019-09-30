console.log('%cSohaus', 'color: #fff; background-color: #04acda; font-size: 25px; padding: 20px;');
console.log('%chttps://sohaus.pl', 'color: #fff; background-color: #04acda; font-size: 15px; padding: 20px;');
var Views = [
  'home',
  'home',
  'fruits',
  'vegetables',
  'porridge',
  'soup'
];

var activeView = 'home';

var WindowOptions = {
  width: null,
  height: null,
  topScroll: 0,
  animateSwingPoint: window.innerHeight / 1.7,
  fadePoint: window.innerHeight / 1.6
}

var ProductsDetailsSlider = {
  'fruits': {
    activeSlide: 1,
    slides: 5
  },
  'vegetables': {
    activeSlide: 1,
    slides: 2
  },
  'porridges': {
    activeSlide: 1,
    slides: 3
  },
  'soup': {
    activeSlide: 1,
    slides: 5
  }
}

// initial all DOM references
var DOMReferences = {
  'navBtnAction': document.querySelector('#nav-action'),
  'navContainer': document.querySelector('.mnav'),
  'viewScroll': document.querySelector('#view-container'),
  'allViews': document.querySelectorAll('[data-view]'),
  'sliderNavigationContainer': document.querySelector('.view-navigation'),
  'sliderNavigation': document.querySelectorAll('[data-slider-action]'),
  'sliderNewsNavigation': document.querySelectorAll('[data-news-slider-action]'),
  'currentSlide': document.querySelector('.view-navigation__current'),
  'moreBtn': document.querySelectorAll('.mslider__more'),
  'productsSliderContainer': document.querySelector('.pslider'),
  'openProductFruitDetailBtn': document.querySelectorAll('.mslider__open-fruit-details'),
  'productDetailsLinks': document.querySelectorAll('.products-list__show'),
  'closeProductsSliderBtn': document.querySelector('#nav-action-back'),
  'nextProductsBtns': document.querySelectorAll('[data-next-products]'),
  'scrollToTopBtn': document.querySelector('#scroll-to-top'),
  'scrollToFooterBtn': document.querySelector('[data-scroll="footer"]'),
  'categoriesNavigation': document.querySelectorAll('.mnav__link[data-category-number]'),
  'drawLines': document.querySelector('[data-draw-lines]')
}

var paralaxSpeed = [.1, .2, .23, .05];
var isScrolling;
var viewSliderState = false;
var autoSlider = false;
var inActive = true;


var Actions = (function() {

  var setViewportWidth = function() {
    if(!DOMReferences.viewScroll) {
      return;
    }

    var viewportWidth = window.innerWidth;
    DOMReferences.viewScroll.style.width = viewportWidth + 'px';
  }

  var ViewSlider = function(active) {
    var options = {
      activeView: 1,
      slides: 5,
      slideAnimated: false
    }

    setTimeout(function() {
      if(DOMReferences.allViews[0]) {
        DOMReferences.allViews[0].classList.add('view--animate-images');
      }
    },100)

    var autoSliderInit = function() {
      autoSlider = setInterval(function(){
        if(DOMReferences.viewScroll.scrollTop < WindowOptions.height/3 && inActive) {
          startSlider('', window)
        }
      }, 10000);
    }

    var startSlider = function(key) {

      DOMReferences.viewScroll.scrollTop = 0;
      clearTimeout(autoSlider);      
      viewSliderState = true;
      setTimeout(function() {
        viewSliderState = false;
      },1500)

      if(key && key.type == 'keyup') {
        if(WindowOptions.topScroll >= WindowOptions.height || options.slideAnimated) {
          return;
        }
        var direction = window.event.key;
        if(direction == 'ArrowLeft') {
          options.activeView--;
          if(options.activeView <= 1) {
            options.activeView = 1;
          }
        } else if(direction == 'ArrowRight') {
          options.activeView++;
          if(options.activeView > options.slides) {
            options.activeView = options.slides;
          }
        }

        options.slideAnimated = true;

      } else {
        if(isNaN(key) || key == '') {
          var _th = (this == window.window) ? arguments[1] : this;
          var direction = (key == 'prev' || key == 'next') ? key : (_th.dataset) ? _th.dataset.sliderAction : null;
          if(direction == 'prev') {
            options.activeView--;
            if(options.activeView < 1) {
              options.activeView = options.slides;
            }
          } else if(direction == 'next' || direction == null) {
            options.activeView++;
            if(options.activeView > options.slides) {
              options.activeView = 1;
            }
          }
        } else {
          options.activeView = key;
        }
      }

      DOMReferences.sliderNavigationContainer.classList.add('disabled');
      DOMReferences.currentSlide.textContent = '0' + options.activeView;

      var active = document.querySelector('.view--active');
      active.classList.add('removed-slide');
      var nextView = document.querySelector('[data-view="' + Views[options.activeView] + '"]');
      setTimeout(function(){

        nextView.classList.add('view--active');
        nextView.style.zIndex = '2';
        nextView.classList.add('view--animated');


        setTimeout(function(){
          DOMReferences.allViews.forEach(function(el) {
            if(el.dataset.view != Views[options.activeView]) {
              el.classList.remove('view--active');
              el.style.zIndex = '1';
              el.classList.remove('removed-slide');
            }
          });
          nextView.classList.remove('view--animated');
          DOMReferences.sliderNavigationContainer.classList.remove('disabled');
          options.slideAnimated = false;
        },800);
  
        var paralaxImages = document.querySelectorAll('[data-paralax]');
        if(paralaxImages.length) {
          paralaxImages.forEach(function(image){
            image.removeAttribute('style');
          })
        }
  
        setTimeout(function() {
          DOMReferences.allViews.forEach(function(el) {
            el.classList.remove('view--animate-images');
          });
          nextView.classList.add('view--animate-images');
        }, 200);
        autoSliderInit();
      },600)
    }

    window.addEventListener('load', autoSliderInit);
    swipeEventCategoryView(startSlider);
    DOMReferences.sliderNavigation.forEach(function(btn){
      var tmpDelay = window.getComputedStyle(btn).getPropertyValue('transition-delay');
      btn.addEventListener('click', function(){
        var _th = this;
        _th.style.transitionDelay = '1.2s';
        var resetST = setTimeout(function(){
          _th.removeAttribute('style');
          clearTimeout(resetST);
        },350)
        startSlider('', this);
      });
      btn.addEventListener('mouseleave', function(){
        this.style.transitionDelay = '0s';
      });
    });

    // window.addEventListener('keyup', startSlider);

    DOMReferences.nextProductsBtns.forEach(function(el){
      el.addEventListener('click', function(ev){
        ev.preventDefault();
        closedProductsSlider();
        setTimeout(startSlider, 100, ev.target.dataset.nextProducts);
      });
    });

    if(DOMReferences.categoriesNavigation.length) {
      DOMReferences.categoriesNavigation.forEach(function(el){
        el.addEventListener('click', Actions.skipToCategory.bind(el, startSlider));
      })
    }

    Actions.skipToCategoryFromPage(startSlider);

  }

  var showProductDetails = function(category) {
    document.body.classList.add('animation-product-slider');
    document.body.classList.add('show-product-details');
    var category = category || this.dataset.initCategory;

    if(typeof ProductsDetailsSlider[category] === 'undefined') {
      return;
    }

    DOMReferences.productsSliderContainer.scrollTop = 0;
    viewSliderState = true;
    document.querySelector('.view--active').classList.add('view-hide-to-top');

    var scrollTop_ = setTimeout(function(){

      var configSlider = ProductsDetailsSlider[category];
      var sliderContainer = document.querySelector('[data-slider-view="'+ category +'"]');
      DOMReferences.productsSliderContainer.classList.add('show-slider');
      sliderContainer.classList.add('show-view');

      var prevSlide = document.querySelector('.show-current-slide');
      var slide = document.querySelector('[data-slider-product="' + category + '-' + configSlider.activeSlide + '"]');


      document.querySelectorAll('[data-slider-product]').forEach(function(el){
        el.style.zIndex = 1;
        el.style.position = 'absolute';
        el.style.left = '0';
        el.style.top = '0';
      });
      slide.style.position = 'relative';
      slide.style.zIndex = 2;
      slide.classList.add('show-current-slide');

      var resetState = setTimeout(function(){
        if(prevSlide) {
          prevSlide.classList.remove('show-current-slide');
        }
        
        document.body.classList.remove('animation-product-slider');
        DOMReferences.viewScroll.style.display = 'none';

         
        clearTimeout(resetState);
      }, 700);
      clearTimeout(scrollTop_)
    }, 400)
  }

  var closedProductsSlider = function() {
    DOMReferences.viewScroll.style.display = 'block';

    var currentViewSlide = document.querySelector('.show-current-slide');
    if(!currentViewSlide) {
      return;
    }
    currentViewSlide.classList.add('hide-product-details');
    var st1 = setTimeout(function(){
      document.body.classList.remove('show-product-details');
      for(var el in ProductsDetailsSlider) {
        ProductsDetailsSlider[el].activeSlide = 1;
      }
  
      viewSliderState = false;
      document.querySelector('.view--active').classList.remove('view-hide-to-top');
  
      var sliderContainer = document.querySelector('.show-view');
      sliderContainer.classList.add('hide-slider');
  
      var st2 = setTimeout(function(){
        sliderContainer.classList.remove('show-view', 'hide-slider');
        DOMReferences.productsSliderContainer.classList.remove('show-slider');
        document.querySelectorAll('[data-slider-product]').forEach(function(el){
          el.style.zIndex = 1;
          el.style.position = 'absolute';
          el.style.left = '0';
          el.style.top = '0';
          el.removeAttribute('style');
        });
  
        document.querySelector('.show-current-slide').classList.remove('show-current-slide');
        DOMReferences.productsSliderContainer.scrollTop = 0;
        currentViewSlide.classList.remove('hide-product-details');
        clearTimeout(st2);
      },1000);
      clearTimeout(st1);
    },400)
  }

  var scrollTopAnimate = function(target) {
    var animate = null;
    var initScrollTop = target.scrollTop;
    animate = setInterval(function(){
      console.log(initScrollTop)
      if(target.scrollTop != 0) {
        initScrollTop = initScrollTop - 400;
        target.scrollTop = initScrollTop;
      } else {
        clearTimeout(animate);
      }
    },30);
  }

  var scrollToTopWindow = function() {
    var productDetails = document.querySelector('.show-current-slide');
    var view = document.querySelector('.view--active');
    var target = (productDetails) ? DOMReferences.productsSliderContainer : (view) ? DOMReferences.viewScroll : document.body;
    scrollTopAnimate(target)
    // target.scrollIntoView({behavior: "smooth", block: "start"});
  }

  var scrollToTopBtnState = function() {
    if(!DOMReferences.scrollToTopBtn) {
      return;
    }

    var eventTarget = (arguments[0].target.id == 'view-container') ? arguments[0].target : document.documentElement;
    var eventTargetScrollTop = eventTarget.scrollTop;
    if(eventTarget.nodeName == 'HTML') {
      eventTargetScrollTop = Math.max(eventTarget.scrollTop, window.scrollY)
    }

    if(eventTargetScrollTop > window.innerHeight ) {
      DOMReferences.scrollToTopBtn.classList.add('btn-show');
    } else {
      DOMReferences.scrollToTopBtn.classList.remove('btn-show');
    }
  }

  var newsSlider = function() {
    var options = {
      slidesReferences: null,
      activeSlide: 1,
      allSlides: 1,
      activeClass: 'news-slider__el--active',
      hideClass: 'news-slider__el--hide'
    }

    options.slidesReferences = document.querySelectorAll('.news-slider__el');
    if(!options.slidesReferences.length || !DOMReferences.sliderNewsNavigation.length) {
      return;
    }

    var changeOldSlideState = function() {
      this.classList.remove(options.hideClass);
      this.classList.remove(options.activeClass);
      document.querySelector('[data-news-slide="' + options.activeSlide + '"]').classList.add(options.activeClass);
    }

    var moveNewsSlider = function() {
      var direction = this.dataset.newsSliderAction;
      if(direction == 'prev') {
        options.activeSlide--;
        if(options.activeSlide < 1) {
          options.activeSlide = options.allSlides;
        }
      } else if(direction == 'next') {
        options.activeSlide++;
        if(options.activeSlide > options.allSlides) {
          options.activeSlide = 1;
        }
      }
      
      DOMReferences.currentSlide.textContent = (options.activeSlide < 10) ? '0' + options.activeSlide : options.activeSlide;

      options.slidesReferences.forEach(function(slide){
        if(slide.dataset.newsSlide != options.activeSlide.toString()) {
          slide.classList.add(options.hideClass);
          slide.addEventListener("webkitTransitionEnd", changeOldSlideState);
          slide.addEventListener("transitionend", changeOldSlideState);
        }
      });

    }
    
    options.allSlides = options.slidesReferences.length;
    document.querySelector('.viev-navigation__all-slides').textContent = (options.allSlides < 10) ? '0' + options.allSlides : options.allSlides;

    DOMReferences.sliderNewsNavigation.forEach(function(el){
      el.addEventListener('click', moveNewsSlider)
    })

  }

  var paralaxImages = function() {
    if(WindowOptions.width < 992) {
      return;
    }

    var activeView = document.querySelector('.view--active');

    if(!activeView) {
      return;
    }
    var activeImages = activeView.querySelectorAll('[data-paralax]');
    if(!activeImages.length) {
      return;
    }
    activeImages.forEach(function(image, index) {
      var speedIndex = index;
      if(speedIndex >= paralaxSpeed.length) {
        speedIndex = 0;
      }

      if(image.getBoundingClientRect().top <= WindowOptions.height) {
        image.classList.add('image-paralax');

        if(DOMReferences.viewScroll.scrollTop < WindowOptions.height) {
          image.style.transform = 'translate(0, ' + (-( DOMReferences.viewScroll.scrollTop  * paralaxSpeed[speedIndex])) + 'px)';
        } else {
            image.style.transform = 'translate(0, ' + (-( ( WindowOptions.height - image.getBoundingClientRect().top ) * .2)) + 'px)';
        }
        setTimeout(function() {
          image.classList.remove('image-paralax');
        },250)
      }
      
    }); 
  }

  var swipeEventCategoryView = function(callback) {
    var views = document.querySelectorAll('.mslider__key');
    if(!views.length) {
      return;
    }

    views.forEach(function(view, index){
      
      var mc = new Hammer(view);
      mc.on("swipeleft", function(ev) {
        if(viewSliderState) {
          return;
        }
        var category = 'next';
        callback(category);

        viewSliderState = true;
        setTimeout(function(){
          viewSliderState = false;
        },1500);
      });

      mc.on("swiperight", function(ev) {
        if(viewSliderState) {
          return;
        }
        var category = 'prev';
        callback(category);

        viewSliderState = true;
        setTimeout(function(){
          viewSliderState = false;
        },1500);
      });
    });

  }


  var animationsTitle = function() {
    var activeView = document.querySelector('.view--active');

    if(!activeView) {
      return;
    }

    var titlesSwing = activeView.querySelectorAll('.swing-hide');
    if(!titlesSwing.length) {
      return;
    }

    titlesSwing.forEach(function(title) {
      if(title.getBoundingClientRect().top < WindowOptions.animateSwingPoint) {
        title.classList.add('swing-show');
      }
    }); 
  }

  var fadeElements = function() {
    var activeView = document.querySelector('.view--active');

    if(!activeView) {
      return;
    }

    var elements = activeView.querySelectorAll('.fade-hide');
    if(!elements.length) {
      return;
    }

    elements.forEach(function(el, index) {
      if(el.getBoundingClientRect().top < WindowOptions.fadePoint) {
        // var matrix = window.getComputedStyle(el).getPropertyValue("transform").match(/(-?[0-9\.]+)/g);
        if(index % 2 == 0) {
          el.style.transitionDelay = '0';
        } else {
          el.style.transitionDelay = '.6';          
        }
        el.style.transitionDuration = '.55s';
        // el.style.transform = 'matrix(' + matrix[0] + ', ' + matrix[1] + ', ' + matrix[2] + ', ' + matrix[3] + ', ' + matrix[4] + ', ' + (0) + ')';
        el.classList.add('fade-show');
      }
    }); 
    
  }

  var cursorParalax = function() {
    if(viewSliderState) {
      return;
    }
    
    var event = arguments[0];
    var offset = {
      x: event.pageX,
      y: event.pageY
    }

    var paralaxImages = document.querySelectorAll('.view--active [data-paralax]');
    paralaxImages.forEach(function(image, index) {
      
      var speed = .008;
      if(index %2 == 0) {
        speed = .03;
      }
      if(index % 3 == 0) {
        speed = .06;
      }
      if(index % 5 == 0) {
        speed = .1;
      }

      if(image.classList.contains('main-animate')) {
        speed = .004;
      }
      image.style.transitionDelay = '0s';
      image.style.transitionDuration = '.1s';
      image.style.transform = 'translate(' + (-offset.x*speed) + 'px, ' + (-offset.y*speed) + 'px)';
    })
  }

  var asyncLoadImages = function() {
    document.querySelectorAll('[data-src]').forEach(function(img){
      img.src = img.dataset.src;
      img.removeAttribute('data-src');
    })
  }

  var moreMorfing = function() {
    var morf = [
      'M18.715,1.390 C39.760,-1.526 78.630,14.369 73.315,36.490 C68.000,58.612 57.830,73.519 52.515,72.890 C47.200,72.261 7.130,65.719 3.115,46.891 C-0.900,28.061 3.158,3.546 18.715,1.390 Z',
      'M20.208,5.868c21.045,-2.916 56.09,19.229 50.775,41.35c-5.315,22.122 -27.668,23.782 -32.983,23.153c-5.315,-0.629 -31.43,-12.208 -35.445,-31.036c-4.015,-18.83 2.096,-31.311 17.653,-33.467Z',
      'M32.614,2.789c21.045,-2.916 45.083,29.49 39.768,51.611c-5.315,22.122 -38.277,17.449 -43.617,17.091c-14.923,-1.002 -22.381,-19.391 -26.396,-38.219c-4.015,-18.83 14.688,-28.327 30.245,-30.483Z',
      'M20.208,5.868c21.045,-2.916 56.09,19.229 50.775,41.35c-5.315,22.122 -27.668,23.782 -32.983,23.153c-5.315,-0.629 -31.43,-12.208 -35.445,-31.036c-4.015,-18.83 2.096,-31.311 17.653,-33.467Z',
      'M18.715,1.390 C39.760,-1.526 78.630,14.369 73.315,36.490 C68.000,58.612 57.830,73.519 52.515,72.890 C47.200,72.261 7.130,65.719 3.115,46.891 C-0.900,28.061 3.158,3.546 18.715,1.390 Z'
    ];

    document.querySelectorAll('.mslider__open-fruit-details, .mslider__more').forEach(function(btn){
      btn.addEventListener('mouseenter', function() {
        var anim = btn.querySelector('.anim');
        anim.setAttribute('values', morf.join(';'));
        anim.beginElement();
      });

      btn.addEventListener('mouseleave', function() {
        var anim = btn.querySelector('.anim');
        anim.removeAttribute('values');
      })
    })
  }

  var closeBtnAnimation = function() {
    var states = {
      'path0': [
        'M14.778,1.97c-4.656,0 -8.472,5.568 -10.464,11.448c-1.056,3.12 -1.632,6.312 -1.632,8.784c0,7.104 6.216,8.592 13.344,8.592c2.4,0 5.28,-0.528 7.944,-2.736c4.92,-4.08 6.504,-11.88 6.936,-16.584c0.384,-4.512 -9.024,-9.504 -16.128,-9.504Zm7.392,16.872l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Zm0,-3.192l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Z',
        'M14.707,1.877c-4.656,0 -8.472,5.568 -10.464,11.448c-1.056,3.12 -1.632,6.312 -1.632,8.784c0,7.104 2.784,4.032 9.528,6.36c3.072,1.056 7.224,3.744 11.76,-0.504c4.68,-4.344 7.608,-7.704 8.04,-12.384c0.384,-4.512 -10.128,-13.704 -17.232,-13.704Zm7.392,16.872l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Zm0,-3.192l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Z',
        'M14.237,2.72c-5.904,-4.248 -10.296,0.744 -12.504,7.368c-1.512,4.536 1.656,7.872 0.888,12c-1.32,6.984 5.04,4.704 9.528,6.36c3.048,1.128 7.224,3.744 11.76,-0.504c4.68,-4.344 8.04,-7.68 8.04,-12.384c-0.024,-13.704 -11.952,-8.688 -17.712,-12.84Zm7.872,16.008l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.36,0.768 -0.768,0.768Zm0,-3.192l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.36,0.768 -0.768,0.768Z',
        'M14.778,1.97c-4.656,0 -8.472,5.568 -10.464,11.448c-1.056,3.12 -1.632,6.312 -1.632,8.784c0,7.104 6.216,8.592 13.344,8.592c2.4,0 5.28,-0.528 7.944,-2.736c4.92,-4.08 6.504,-11.88 6.936,-16.584c0.384,-4.512 -9.024,-9.504 -16.128,-9.504Zm7.392,16.872l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Zm0,-3.192l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Z'
      ],
      'path1': [
        'M2.122,0.595l4.243,4.243c0.375,0.375 0.375,0.982 0,1.357c-0.375,0.375 -0.983,0.375 -1.358,0l-4.242,-4.242c-0.375,-0.375 -0.375,-0.983 0,-1.358c0.375,-0.375 0.982,-0.375 1.357,0Z',
        'M2.559,0.41l3.557,4.832c0.315,0.427 0.224,1.027 -0.203,1.342c-0.427,0.314 -1.028,0.223 -1.343,-0.204l-3.557,-4.831c-0.314,-0.427 -0.223,-1.028 0.204,-1.343c0.427,-0.314 1.028,-0.223 1.342,0.204Z',
        'M2.559,0.41l3.557,4.832c0.315,0.427 0.224,1.027 -0.203,1.342c-0.427,0.314 -1.028,0.223 -1.343,-0.204l-3.557,-4.831c-0.314,-0.427 -0.223,-1.028 0.204,-1.343c0.427,-0.314 1.028,-0.223 1.342,0.204Z',
        'M2.122,0.595l4.243,4.243c0.375,0.375 0.375,0.982 0,1.357c-0.375,0.375 -0.983,0.375 -1.358,0l-4.242,-4.242c-0.375,-0.375 -0.375,-0.983 0,-1.358c0.375,-0.375 0.982,-0.375 1.357,0Z',
      ],
      'path2': [
        'M6.365,0.765c0.375,0.375 0.375,0.982 0,1.357l-4.243,4.243c-0.375,0.375 -0.982,0.375 -1.357,0c-0.375,-0.375 -0.375,-0.983 0,-1.358l4.242,-4.242c0.375,-0.375 0.983,-0.375 1.358,0Z',
        'M6.597,1.017c0.341,0.406 0.288,1.011 -0.118,1.352l-4.594,3.861c-0.406,0.341 -1.01,0.289 -1.352,-0.117c-0.341,-0.406 -0.288,-1.012 0.118,-1.353l4.593,-3.86c0.406,-0.341 1.011,-0.289 1.353,0.117Z',
        'M6.597,1.017c0.341,0.406 0.288,1.011 -0.118,1.352l-4.594,3.861c-0.406,0.341 -1.01,0.289 -1.352,-0.117c-0.341,-0.406 -0.288,-1.012 0.118,-1.353l4.593,-3.86c0.406,-0.341 1.011,-0.289 1.353,0.117Z',
        'M6.365,0.765c0.375,0.375 0.375,0.982 0,1.357l-4.243,4.243c-0.375,0.375 -0.982,0.375 -1.357,0c-0.375,-0.375 -0.375,-0.983 0,-1.358l4.242,-4.242c0.375,-0.375 0.983,-0.375 1.358,0Z',
      ],
      'path3': [
        'M4.31,3.548l3.343,-3.352c0.122,-0.128 0.292,-0.198 0.468,-0.196c0.174,-0.001 0.341,0.069 0.461,0.196l0.387,0.386c0.124,0.122 0.194,0.289 0.194,0.463c0,0.174 -0.07,0.341 -0.194,0.463l-1.505,1.515l3.614,0c0.166,-0.005 0.326,0.066 0.435,0.192c0.11,0.13 0.169,0.295 0.165,0.465l0,0.66c0.004,0.171 -0.055,0.337 -0.165,0.466c-0.108,0.127 -0.268,0.199 -0.435,0.194l-3.614,0l1.505,1.508c0.124,0.124 0.194,0.293 0.194,0.469c0,0.176 -0.07,0.345 -0.194,0.469l-0.387,0.384c-0.255,0.254 -0.674,0.254 -0.929,0l-3.343,-3.35c-0.124,-0.124 -0.192,-0.293 -0.189,-0.468c-0.006,-0.175 0.063,-0.343 0.189,-0.464Z',
        'M2.31,3.548l3.343,-3.352c0.122,-0.128 0.292,-0.198 0.468,-0.196c0.174,-0.001 0.341,0.069 0.461,0.196l0.387,0.386c0.124,0.122 0.194,0.289 0.194,0.463c0,0.174 -0.07,0.341 -0.194,0.463l-1.505,1.515l3.614,0c0.166,-0.005 0.326,0.066 0.435,0.192c0.11,0.13 0.169,0.295 0.165,0.465l0,0.66c0.004,0.171 -0.055,0.337 -0.165,0.466c-0.108,0.127 -0.268,0.199 -0.435,0.194l-3.614,0l1.505,1.508c0.124,0.124 0.194,0.293 0.194,0.469c0,0.176 -0.07,0.345 -0.194,0.469l-0.387,0.384c-0.255,0.254 -0.674,0.254 -0.929,0l-3.343,-3.35c-0.124,-0.124 -0.192,-0.293 -0.189,-0.468c-0.006,-0.175 0.063,-0.343 0.189,-0.464Z',
        'M4.31,3.548l3.343,-3.352c0.122,-0.128 0.292,-0.198 0.468,-0.196c0.174,-0.001 0.341,0.069 0.461,0.196l0.387,0.386c0.124,0.122 0.194,0.289 0.194,0.463c0,0.174 -0.07,0.341 -0.194,0.463l-1.505,1.515l3.614,0c0.166,-0.005 0.326,0.066 0.435,0.192c0.11,0.13 0.169,0.295 0.165,0.465l0,0.66c0.004,0.171 -0.055,0.337 -0.165,0.466c-0.108,0.127 -0.268,0.199 -0.435,0.194l-3.614,0l1.505,1.508c0.124,0.124 0.194,0.293 0.194,0.469c0,0.176 -0.07,0.345 -0.194,0.469l-0.387,0.384c-0.255,0.254 -0.674,0.254 -0.929,0l-3.343,-3.35c-0.124,-0.124 -0.192,-0.293 -0.189,-0.468c-0.006,-0.175 0.063,-0.343 0.189,-0.464Z',
        'M2.31,3.548l3.343,-3.352c0.122,-0.128 0.292,-0.198 0.468,-0.196c0.174,-0.001 0.341,0.069 0.461,0.196l0.387,0.386c0.124,0.122 0.194,0.289 0.194,0.463c0,0.174 -0.07,0.341 -0.194,0.463l-1.505,1.515l3.614,0c0.166,-0.005 0.326,0.066 0.435,0.192c0.11,0.13 0.169,0.295 0.165,0.465l0,0.66c0.004,0.171 -0.055,0.337 -0.165,0.466c-0.108,0.127 -0.268,0.199 -0.435,0.194l-3.614,0l1.505,1.508c0.124,0.124 0.194,0.293 0.194,0.469c0,0.176 -0.07,0.345 -0.194,0.469l-0.387,0.384c-0.255,0.254 -0.674,0.254 -0.929,0l-3.343,-3.35c-0.124,-0.124 -0.192,-0.293 -0.189,-0.468c-0.006,-0.175 0.063,-0.343 0.189,-0.464Z',
        'M4.31,3.548l3.343,-3.352c0.122,-0.128 0.292,-0.198 0.468,-0.196c0.174,-0.001 0.341,0.069 0.461,0.196l0.387,0.386c0.124,0.122 0.194,0.289 0.194,0.463c0,0.174 -0.07,0.341 -0.194,0.463l-1.505,1.515l3.614,0c0.166,-0.005 0.326,0.066 0.435,0.192c0.11,0.13 0.169,0.295 0.165,0.465l0,0.66c0.004,0.171 -0.055,0.337 -0.165,0.466c-0.108,0.127 -0.268,0.199 -0.435,0.194l-3.614,0l1.505,1.508c0.124,0.124 0.194,0.293 0.194,0.469c0,0.176 -0.07,0.345 -0.194,0.469l-0.387,0.384c-0.255,0.254 -0.674,0.254 -0.929,0l-3.343,-3.35c-0.124,-0.124 -0.192,-0.293 -0.189,-0.468c-0.006,-0.175 0.063,-0.343 0.189,-0.464Z',
      ]
    }

    DOMReferences.navBtnAction.addEventListener('mouseenter', function() {
      var menuAnim = DOMReferences.navBtnAction.querySelector('.menu-path');
      var anim1 = DOMReferences.navBtnAction.querySelector('.p1');
      var anim2 = DOMReferences.navBtnAction.querySelector('.p2');

      menuAnim.setAttribute('values', states.path0.join(';'));
      anim1.setAttribute('values', states.path1.join(';'));
      anim2.setAttribute('values', states.path2.join(';'));
      anim1.beginElement();
      anim2.beginElement();
    });

    DOMReferences.navBtnAction.addEventListener('mouseleave', function() {
      var menuAnim = DOMReferences.navBtnAction.querySelector('.menu-path');
      var anim1 = DOMReferences.navBtnAction.querySelector('.p1');
      var anim2 = DOMReferences.navBtnAction.querySelector('.p2');

      menuAnim.removeAttribute('values');
      anim1.removeAttribute('values');
      anim2.removeAttribute('values');
    });

    DOMReferences.closeProductsSliderBtn.addEventListener('mouseenter', function(){
      var anim3 = DOMReferences.closeProductsSliderBtn.querySelector('.p3');
      anim3.setAttribute('values', states.path3.join(';'));
      anim3.beginElement();
    })

    DOMReferences.closeProductsSliderBtn.addEventListener('mouseleave', function(){
      var anim3 = DOMReferences.closeProductsSliderBtn.querySelector('.p3');
      anim3.removeAttribute('values');
    })
  }

  var windowInAction = function() {
    var body = document.body;
    var ia = null;
    var setActive = function() {
      clearTimeout(ia);
      inActive = false;
      
      ia = setTimeout(function(){
        inActive = !inActive;
        clearTimeout(ia);
      }, 9000)
    }

    body.addEventListener('mousemove', setActive);
    body.addEventListener('click', setActive);
    if (window.DeviceOrientationEvent) {
      window.addEventListener("deviceorientation", setActive);
    }
  }

  var drawSummaryLines = function() {
    if(!DOMReferences.drawLines) {
      return;
    }

    if(DOMReferences.drawLines.getBoundingClientRect().top < window.innerHeight/3) {
      DOMReferences.drawLines.classList.add('draw-lines');
    }
  }

  // all methods
  return {
    drawSummaryLines: drawSummaryLines,
    windowInAction: windowInAction,
    asyncLoadImages: asyncLoadImages,
    moreMorfing: moreMorfing,
    closeBtnAnimation: closeBtnAnimation,
    setWindowOption: function() {
      WindowOptions.width = window.innerWidth;
      WindowOptions.height = window.innerHeight;
      WindowOptions.topScroll = DOMReferences.viewScroll ? DOMReferences.viewScroll.scrollTop : document.documentElement.scrollTop;
    },
    navBtnHandle: function() {
      document.body.classList.toggle('open-nav');
      var containerFullHeight = DOMReferences.navContainer.scrollHeight;
      var coconutImage = document.querySelector('[data-fruit="coconut-nav"]');
      coconutImage.style.bottom = 'auto';
      coconutImage.style.top = containerFullHeight - coconutImage.getBoundingClientRect().height + 'px';
    },
    viewSlider: ViewSlider,
    scrollToNextSection: function() {
      DOMReferences.moreBtn.forEach(function(btn){
        btn.addEventListener('click', function(){
          DOMReferences.viewScroll.scrollTop = WindowOptions.height;
        });
      });
    },
    scrollToFooter: function() {
      var targetContainer = document.querySelector('.show-current-slide') || document.querySelector('.view--active');
      if(!targetContainer) {
        return;
      }
      document.body.classList.remove('open-nav');
      setTimeout(function() {
        DOMReferences.viewScroll.scrollTop = targetContainer.querySelector('.mfooter').offsetTop
      },300)
    },
    skipToCategory: function(callback) {
      var event = arguments[1];
      event.preventDefault();
      var category = event.target.dataset.categoryNumber;

      document.body.classList.remove('open-nav');
      if(category == 'footer') {
        Actions.scrollToFooter()
      } else {
        callback(category)
      }
    },
    skipToCategoryFromPage: function(callback) {
      var hash = window.location.hash;
      if(!hash) {
        return;
      }
      var category = hash.substring(1);
      document.body.classList.remove('open-nav');
      if(category == 'gdzie-kupic') {
        var scrollTo = setTimeout(function(){
          Actions.scrollToFooter();
          clearTimeout(scrollTo);
        },500)
        return;
      }
      document.body.classList.remove('open-nav');
      var move = setTimeout(function(){
        callback(category);
        clearTimeout(move)
      },400)
    },
    showProductDetails: showProductDetails,
    closedProductsSlider: closedProductsSlider,
    scrollToTopWindow: scrollToTopWindow,
    scrollToTopBtnState: scrollToTopBtnState,
    newsSlider: newsSlider,
    paralaxImages: paralaxImages,
    animationsTitle: animationsTitle,
    handleMouseMoveActiveViewEvent: function() {
      if(WindowOptions.width < 992) {
        return;
      }
      document.body.addEventListener('mousemove', cursorParalax)
    },
    fadeElements: fadeElements,
    swipeEventCategoryView: swipeEventCategoryView,
    setViewportWidth: setViewportWidth
  }
})();
var mouseMove;
var mouseCoordinates = {
  x: 0,
  y: 0
}

Actions.windowInAction();
Actions.setWindowOption();
Actions.asyncLoadImages();
Actions.viewSlider();
Actions.newsSlider();
Actions.moreMorfing();
Actions.closeBtnAnimation();
Actions.handleMouseMoveActiveViewEvent();
Actions.scrollToNextSection();
// Actions.setViewportWidth();
DOMReferences.navBtnAction.addEventListener('click', Actions.navBtnHandle);
if(DOMReferences.viewScroll) {
  DOMReferences.viewScroll.addEventListener('scroll', Actions.setWindowOption);
  DOMReferences.viewScroll.addEventListener('scroll', Actions.animationsTitle);
  DOMReferences.viewScroll.addEventListener('scroll', Actions.fadeElements);
  DOMReferences.viewScroll.addEventListener('scroll', Actions.scrollToTopBtnState);
  DOMReferences.viewScroll.addEventListener('scroll', Actions.drawSummaryLines);
}
window.addEventListener('resize', Actions.setWindowOption);
window.addEventListener('resize', Actions.setViewportWidth);
window.addEventListener('scroll', Actions.scrollToTopBtnState);

DOMReferences.openProductFruitDetailBtn.forEach(function(el){
  el.addEventListener('click', Actions.showProductDetails.bind(el, null));
})
DOMReferences.productDetailsLinks.forEach(function(el){
  el.addEventListener('click', function(ev){
    ev.preventDefault();
    var category = el.dataset.initCategory;
    if(typeof ProductsDetailsSlider[category] == 'undefined') {
      return;
    }

    if(ProductsDetailsSlider[category].activeSlide !== el.dataset.product) {
      ProductsDetailsSlider[category].activeSlide = el.dataset.product;
      Actions.showProductDetails(category);
    }
  })
});

DOMReferences.closeProductsSliderBtn.addEventListener('click', Actions.closedProductsSlider);
if(DOMReferences.scrollToTopBtn) {
  DOMReferences.scrollToTopBtn.addEventListener('click', Actions.scrollToTopWindow);
}
if(DOMReferences.scrollToFooterBtn) {
  DOMReferences.scrollToFooterBtn.addEventListener('click', Actions.scrollToFooter);
}

// DOMReferences.viewScroll.addEventListener('scroll', Actions.paralaxImages);

$('.baner-rotator').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3500,
  dots: false,
});

$('.slider-summary').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
});

$(".slider-summary").on('afterChange', function(event, slick, currentSlide){
  document.querySelector('[data-slider="' + slick.$slider[0].dataset.slider + '"]').nextElementSibling.querySelector('.view-navigation__current').textContent = '0' + (+currentSlide+1);
});

window.addEventListener('load', function(){
  document.body.classList.add('page-loaded');
  setTimeout(function(){
    var preloader = document.getElementById('preloader');
    if(preloader) {
      preloader.parentElement.removeChild(preloader);
    }
  },1500)
})


		