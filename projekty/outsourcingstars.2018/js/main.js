    var windowParams = {
        width: null,
        height: null,
        setParams: function () {
            this.width = window.innerWidth;
            this.height = window.innerHeight;
        }
    }

    var langBtn = document.getElementById('menu__llink-active'),
        langCtn = document.querySelector('.menu__langs'),
        body = document.body,
        lastLine = document.querySelector('.line--5'),
        navBtn = document.querySelector('.hamburger'),
        nav = document.querySelector('.menu'),
        navHeight = nav.getBoundingClientRect(),
        doc = document.documentElement,
        iarena = document.querySelectorAll('.imagearena'),
        idea = document.querySelector('.idea__ctn');

    windowParams.setParams();

    window.addEventListener('load', function () {
        [].forEach.call(iarena, function (el, i) {
            if (windowParams.width < 768)
                return;
            var elw = el.getBoundingClientRect().width;
            console.log(i);
            var win = ((windowParams.width - idea.getBoundingClientRect().width) / 2);
            var imgW = elw + win;
            el.style.width = imgW + 20 + 'px';
            if (i == 0)
                el.style.left = '-' + win - 20 + 'px';
        })

    });

    langBtn.addEventListener('click', function (e) {
        langCtn.classList.toggle('change');
    }, false);

    body.addEventListener('click', function (e) {
        var el = e.target;
        if (el.id != 'menu__llink-active' && !el.classList.contains('menu__llink-active') && !el.classList.contains('menu__langs'))
            langCtn.classList.remove('change');
    }, false);

    navBtn.addEventListener('click', function () {
        navBtn.classList.toggle('is-active');
        body.classList.toggle('opennav');
    }, false);

    $('[data-link]').on('click', function (e) {
        e.preventDefault();
        $('[data-link]').removeClass('act');
        $(this).addClass('act');
        var el = $(this).attr('data-link');
        var elPos = $('[data-target="' + el + '"]').offset().top;
        var b = $("html, body");
        b.stop().animate({
            scrollTop: elPos - 80
        }, 500, 'swing');
        body.classList.remove('opennav');
    });
    var tar = $('[data-target]');
    var tarCount = tar.length;
    window.addEventListener('scroll', function () {
        for (var i = tarCount; i >= 1; i--) {
            if ((window.scrollY + 120) >= $('[data-target="' + i + '"]').offset().top) {
                $('[data-link]').removeClass('act');
                $('[data-link="' + i + '"]').addClass('act');
                return;

            }
        }
    });