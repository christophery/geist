/* ------------------------------------------------------------

This is a development JS file which is built to a minified
production file in built/main.js

*/

jQuery(function($) {

    /* search overlay */
    $( ".search-button" ).on( "click", function() {
        //toggle search overlay
        $('.search-overlay').toggleClass('search-overlay-visible');

        //on transitionend focus on search field
        $('.search-overlay').one('transitionend', function() {
            $( '.search-field' ).focus();
        });
    });

    $( ".search-overlay-close" ).on( "click", function() {
        //toggle search overlay
        $('.search-overlay').toggleClass('search-overlay-visible');
    });

    //close search overlay on esc key
    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            //check if search overlay is open
            if( $('.search-overlay').css('opacity') == 1 ){
                //hide search overlay
                $('.search-overlay').removeClass('search-overlay-visible');
            }
        }
    });

    //fitvids
    //https://github.com/davatron5000/FitVids.js
    $(".post-full-content").fitVids();

    if($(".single-post").length){
        var progressBar = document.querySelector('#reading-progress');
        var header = document.querySelector('.floating-header');
        var title = document.querySelector('.post-full-title');

        var lastScrollY = window.scrollY;
        var lastWindowHeight = window.innerHeight;
        var lastDocumentHeight = $(document).height();
        var ticking = false;

        function onScroll() {
            lastScrollY = window.scrollY;
            requestTick();
        }

        function onResize() {
            lastWindowHeight = window.innerHeight;
            lastDocumentHeight = $(document).height();
            requestTick();
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(update);
            }
            ticking = true;
        }

        function update() {
            var trigger = title.getBoundingClientRect().top + window.scrollY;
            var triggerOffset = title.offsetHeight + 35;
            var progressMax = lastDocumentHeight - lastWindowHeight;

            // show/hide floating header
            if (lastScrollY >= trigger + triggerOffset) {
                header.classList.add('floating-active');
            } else {
                header.classList.remove('floating-active');
            }

            progressBar.setAttribute('max', progressMax);
            progressBar.setAttribute('value', lastScrollY);

            ticking = false;
        }

        //check if post title exists
        if( title ){
            window.addEventListener('scroll', onScroll, {passive: true});
            window.addEventListener('resize', onResize, false);

            update();
        }

    }

});