$(document).ready(function() {
    $('#gnav li').click(function() {
        if($(window).width() > 767) {
            $("#gnav li").removeClass('focused');
            var className = $(this).attr('class');
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#"+ className).offset().top
            }, 1800);
    
            if (!$(this).hasClass('focused')) {
                $(this).addClass('focused');
            } else {
                $(this).removeClass('focused');
            }
        }
    })

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            $('#gnav li.focused').removeClass('focused');
            $('.contact').addClass('focused');
        } else {
            var scrollDistance = $(window).scrollTop();
            $('.page-section').each(function(i) {
                if ($(this).position().top <= scrollDistance) {
                    $('#gnav li.focused').removeClass('focused');
                    $('#gnav li').eq(i).addClass('focused');
                }
            });
        }
    }).scroll();

    particlesJS.load('particles-js', 'assets/particles.json', function() {});

    const nav = document.querySelector('#nav');
    const menu = document.querySelector('#menu');
    const menuToggle = document.querySelector('.nav__toggle');
    let isMenuOpen = false;

    $(".nav__item").click(function() {
        $('#nav').removeClass('nav--open');
        $('#menu').attr('hidden');
    });

    // TOGGLE MENU ACTIVE STATE
    menuToggle.addEventListener('click', e => {
        e.preventDefault();
        isMenuOpen = !isMenuOpen;
        
        // toggle a11y attributes and active class
        menuToggle.setAttribute('aria-expanded', String(isMenuOpen));
        menu.hidden = !isMenuOpen;
        nav.classList.toggle('nav--open');
    });


    // TRAP TAB INSIDE NAV WHEN OPEN
    nav.addEventListener('keydown', e => {
        // abort if menu isn't open or modifier keys are pressed
        if (!isMenuOpen || e.ctrlKey || e.metaKey || e.altKey) {
            return;
        }
        
        // listen for tab press and move focus
        // if we're on either end of the navigation
        const menuLinks = menu.querySelectorAll('.nav__link');
            if (e.keyCode === 9) {
                if (e.shiftKey) {
                if (document.activeElement === menuLinks[0]) {
                    menuToggle.focus();
                    e.preventDefault();
                }
                } else if (document.activeElement === menuToggle) {
                menuLinks[0].focus();
                e.preventDefault();
                }
            }
    });
})