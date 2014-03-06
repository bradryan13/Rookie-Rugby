

jQuery(document).ready(function ($) {

	//enable mobile-menu

    var snapper = new Snap({
        element: document.getElementById('page-content'),
        disable: 'right',
        flickThreshold: 40,
        addBodyClasses: false
    });

    /* Get reference to toggle button, the html element with ID "open-left" */

    var myToggleButton = document.getElementById('open-left')

    /* Add event listener to our toggle button */
    myToggleButton.addEventListener('click', function() {

        if (snapper.state().state == "left") {
            snapper.close();
        } else {
            snapper.open('left');
        }

    });

    /* Prevent Safari opening links when viewing as a Mobile App */
    (function(a, b, c) {
        if (c in b && b[c]) {
            var d, e = a.location,
                    f = /^(a|html)$/i;
            a.addEventListener("click", function(a) {
                d = a.target;
                while (!f.test(d.nodeName))
                    d = d.parentNode;
                "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d.href)
            }, !1)
        }
    })(document, window.navigator, "standalone");

    // close mobile menu on resize

    $(window).on('resize', function() {
      snapper.close();
    });

    $(window).stellar({ 
        horizontalScrolling: false
    });






	// //enable fitvids.
 //    jQuery('.video').fitVids();

	// //enable foundation.
	// $(document).foundation();
		

	// //enable Fancybox
	// $(".fancybox").fancybox({
 //        padding : 0,
 //        openEffect : 'elastic',
 //        closeEffect : 'elastic',
 //        iframe: { preload: false }
 //    });

            //Fix side-menu

        $(window).bind('scroll', function() {
            if ($(window).scrollTop() > 320) {
                $('.menu').addClass('fixed');
            }
            else {
                 $('.menu').removeClass('fixed');
             }
        });


 	//menu Menu Functionality 
 	
 	$( ".menu a" ).addClass( "ajax" );

    $( "ul.sub-menu" ).attr( 'id', 'drop' );

    $( "ul.sub-menu" ).addClass( "f-dropdown content" );

    $( "ul.sub-menu" ).attr( 'data-dropdown-content', '' ); 

    $( ".menu-item-has-children a" ).attr( 'data-dropdown', 'drop' );

    //menu Dropdown
    $( ".menu-item-type-custom a" ).attr( 'data-dropdown', 'drop2' );
    $( ".menu-item-type-custom ul" ).attr( 'id', 'drop2' );


    $( "a[data-dropdown='drop2']" ).click(function(){
        if($("header").hasClass("drop-open")) {
            $( "header" ).removeClass( "drop-open" );
        } else {
            $( "header" ).addClass( "drop-open" );
        }
        if($(".drop-down").hasClass("drop-open")) {
            $( ".drop-down" ).removeClass( "drop-open" );
        } else {
            $( ".drop-down" ).addClass( "drop-open" );
        }
    });

    $( "a[data='video']" ).click(function(){
        if($("#hero-video").hasClass("open")) {
            $( "#hero-video" ).removeClass( "open" );
        } else {
            $( "#hero-video" ).addClass( "open" );
        }

        if($("#vid-close").hasClass("open")) {
            $( "#vid-close" ).removeClass( "open" );
        } else {
            $( "#vid-close" ).addClass( "open" );
        }
    });



	// Store variables
    var menu_head = $('.menu > li > a'),
        menu_body = $('.menu li > .sub-menu');

    // Click function
    menu_head.on('click', function(event) {

    if ($(this).attr('class') == 'active'){
        menu_body.slideUp('normal');
    }

    // Show and hide the tabs on click
    if ($(this).attr('class') != 'active'){
        menu_body.slideUp('normal');
        $(this).next().stop(true,true).slideToggle('normal');
        menu_head.removeClass('active');
        $(this).addClass('active');
    }


	});

      $('.ajax-modal').fancybox({
            padding : 0,
            openEffect: 'elastic',
            openSpeed: 250,
            closeEffect: 'elastic',
        });



});

