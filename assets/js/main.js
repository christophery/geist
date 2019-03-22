// NOTE: Scroll performance is poor in Safari
// - this appears to be due to the events firing much more slowly in Safari.
//   Dropping the scroll event and using only a raf loop results in smoother
//   scrolling but continuous processing even when not scrolling
jQuery(function($) {
    // Start fitVids
    var $postContent = $(".post-full-content");
    $postContent.fitVids();
    // End fitVids

    //var progressBar = document.querySelector('#reading-progress');
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
        //var progressMax = lastDocumentHeight - lastWindowHeight;

        // show/hide floating header
        if (lastScrollY >= trigger + triggerOffset) {
            header.classList.add('floating-active');
        } else {
            header.classList.remove('floating-active');
        }

        //progressBar.setAttribute('max', progressMax);
        //progressBar.setAttribute('value', lastScrollY);

        ticking = false;
    }

    window.addEventListener('scroll', onScroll, {passive: true});
    window.addEventListener('resize', onResize, false);

    update();

});