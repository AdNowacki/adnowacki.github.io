// nawigacja
// var navLinks = document.getElementsByClassName('mainnav__link');
// [].forEach.call( navLinks, function(el, ind) {
//     if( !el.classList.contains('mainnav__link--active') ) {
//         el.addEventListener( 'mouseenter', function() {
//             el.classList.add('mainnav__link--hover');
//             el.classList.remove('mainnav__link--leave');
//         });
//         el.addEventListener('mouseleave', function () {
//             el.classList.remove('mainnav__link--hover');
//             el.classList.add('mainnav__link--leave');
//         });
//     }
// } );

// mobilna nawigacja
let openNavigation = () => {
    let body = document.body;
    body.classList.toggle('opennav');
}
let btnNavMobile = document.getElementById('opennav');
btnNavMobile.addEventListener('click',openNavigation);