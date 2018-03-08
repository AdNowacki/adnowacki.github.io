var BASE = 'http://aparthotel.oberza.pl/';
var del = $('.show-link-off');

del.on('click',function(e){
    e.preventDefault();
    var i = $(this).attr('data-i'),
        t = $(this).attr('data-tab'),
        m = $(this).attr('data-message'),
        ac = $(this).attr('data-action');

    ac = (ac != undefined) ? ac : 'usun';

    var html = "<div class='confirm-layer'><div class='confirm-b'>";
        html += "<h4>" + m + "</h4>";
        html += "<div class='action'><a href='" + BASE + t + "/" + ac + "/" + i + "/confirm'>TAK</a> <a href='#' class='n'>NIE</a></div>";
    html += "</div></div>";
    $('body').append( html );
});

$('body').on('click', '.n', function(e){
    e.preventDefault();
    $('.confirm-layer').remove();
});

$('.close-btn').on('click', function(e) {
    e.preventDefault();
    $(this).parents('.system-info').remove();
});

$('.sub-nav').on('click', function(e){
    e.preventDefault();
    $('.sub').css('display', 'none');
    $(this).next('.sub').css('display', 'block');
    $('#admin-nav a').removeClass('act');
    $(this).addClass('act');
});


let fileInput = document.getElementById( 'image_upload' ) || null;
var filePrev = document.getElementById( 'image-prev' );

if( fileInput ) {
    fileInput.addEventListener('change', function() {
        var fThis = this;
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            filePrev.innerHTML = "";
            var img = new Image();
            img.src = reader.result;
            if( fThis.dataset.minwidth ) {
                img.onload = function(ev) {
                    if( img.width < fThis.dataset.minwidth ) {
                        filePrev.innerHTML = '<p class="file-info-error">Szerokość obrazka jest za mała.</p>';
                        fileInput.value = '';
                    } else {
                        filePrev.appendChild(img);
                    }
                }
            } else {
                filePrev.appendChild(img);
            }

        }
        reader.readAsDataURL(file);
    })
};

function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz#$*-+ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

var generate = document.querySelector( '#generate' ) || null;
var password = document.querySelector( '#haslo' );
var password2 = document.querySelector( '#haslo2' );
if( generate ) {
    generate.addEventListener('click', function(e){
        var pass = randomPassword(8);
        password.value = pass;
        password2.value = pass;
        return false;
    })
}

$('#edit-b').on( "click", function(e) {
    $('input').prop( 'readonly', false );
    $('.or-link').prop( 'disabled', false );
} );

$('.uedit input[type="text"], .uedit textarea, .uedit select').on( {
    input : function() {
        $(this).parents('.form-field').addClass('focus');
    },
    focus : function() {
        $(this).parents('.form-field').addClass('focus');
    },
    blur : function() {
        $(this).parents('.form-field').removeClass('focus');
    }
} );


var inputs = $('[maxlength]');
for( var i=0; i<inputs.length; i++ ) {
    var attr = inputs.eq(i).attr('maxlength');
    var strlen = attr - inputs.eq(i).val().length;
    inputs.eq(i).parents('.form-field').find('.strlen').text( strlen + '/' + attr );
}

inputs.on( 'keyup', function() {
    var attr = $(this).attr('maxlength');
    var strlen = attr - $(this).val().length;
    $(this).parents('.form-field').find('.strlen').text( strlen + '/' + attr );
});

var $adminBtnNav = $('#admin-nav-btn');
$adminBtnNav.on('click', function() {
    $('body').toggleClass('open-nav-admin');
});

$('[name=add]').on('click', function(){
    $('.image-input').removeClass('empty-image')
    var inpFile = $(this).parents('form').find('input[type=file][required]');
    if( inpFile ) {
        inpFile.parents('.image-input').addClass('empty-image')
    }
})

var galleryInput = document.getElementById('image_upload_multiple');
if( galleryInput ) {
    galleryInput.addEventListener('change', function() {
        var fThis = this;
        var file = this.files;
        var filesLength = file.length;
        filePrev.innerHTML = "";
        for( var k=0; k<filesLength; k++ ) {

            (function(kid){
                console.log(kid);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.src = reader.result;
                    filePrev.appendChild(img);
                }
                reader.readAsDataURL(file[kid]);
            })(k);
        }

    })
};

$('[for=inny]').on('click',function(){
    if( $(this).find('input').is(':checked') ) {
        $('.other-disabled input').prop('disabled', false);
        $('.other-disabled input').prop('required', true);
    } else {
        $('.other-disabled input').prop('disabled', true);
        $('.other-disabled input').prop('required', false);
    }
})