(function(){
    var body = document.body,
        html = document.documentElement,
        formCloseBtn = document.getElementById("form-close"),
        formOpenBtn = document.getElementById("form-open"),
        expandBtn = document.querySelectorAll(".expand");



    var formCloseAction = function(e) {
        e.preventDefault();
        body.classList.remove('open-search');
    }

    var formOpenAction = function() {
        body.classList.add('open-search');
    }

    var showExpandContent = function() {
        [].forEach.call( expandBtn, function( el, ind ) {
            el.nextElementSibling.style.height = '0px';
            el.classList.remove("show");
        });
        this.classList.add("show");
        var descriptionCtn = this.nextElementSibling;
        var cHeight = descriptionCtn.children[0].clientHeight;
        descriptionCtn.style.height = cHeight + 'px';
    }



    if( formCloseBtn )
        formCloseBtn.addEventListener('click',formCloseAction);
    if( formOpenBtn )
        formOpenBtn.addEventListener('click',formOpenAction);
    if( expandBtn ) {
        [].forEach.call( expandBtn, function( el, ind ) {
            el.addEventListener('click',showExpandContent);
        });
    }

    body.addEventListener('click', function(e){
        if( !e.target.classList.contains('d-close') )
            formCloseAction(e);
    });


    window.addEventListener('scroll',function(){
        if( html.scrollTop > 400 )
            body.classList.add('totop');
        else
            body.classList.remove('totop');
    })

})();