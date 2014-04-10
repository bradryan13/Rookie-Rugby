

jQuery(document).ready(function ($) {

    //Enable Fancybox
   $(".modal").fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        helpers: {
            overlay: {
                locked: false
            }
        }  
   }); 


   //Enable FitVid
   
   $("#content").fitVids();

    //Enable mobile-menu
    var snapper = new Snap({
        element: document.getElementById('page-content'),
        disable: 'right',
        flickThreshold: 40,
        addBodyClasses: false
    });

    //Get reference to toggle button, the html element with ID "open-left" */

    var myToggleButton = document.getElementById('open-left')

    //Add event listener to our toggle button */
    myToggleButton.addEventListener('click', function() {

        if (snapper.state().state == "left") {
            snapper.close();
        } else {
            snapper.open('left');
        }

    });

    // Prevent Safari opening links when viewing as a Mobile App 
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

    //Close mobile menu on resize

    $(window).on('resize', function() {
      snapper.close();
    });

    //Enable Stellar for Parallax

    $(window).stellar({ 
        horizontalScrolling: false
    });

    //Fix side-menu

    $(window).bind('scroll', function() {
        if ($(window).scrollTop() > 288) {
            $('.menu ').addClass('fixed');
        }
        else {
            $('.menu').removeClass('fixed');
        }
    });


 	//Add Ajax to sidebar menu and pagination
 	
 	$( ".menu a, .page-numbers" ).addClass( "ajax" );

    //Resouces Menu Dropdown
    
    $( ".menu-item-type-custom a" ).attr( 'data-dropdown', 'resource-drop' );
    $( ".menu-item-type-custom ul" ).attr( 'id', 'resource-drop' );


    $( "a[data-dropdown='resource-drop']" ).click(function(){
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
        if($("#content-wrapper").hasClass("drop-open")) {
            $("#content-wrapper").removeClass( "drop-open" );
        } else {
            $("#content-wrapper").addClass( "drop-open" );
        }
    });

  // Remove current-menu-item for ajax loading purposes
    
    $(".menu").click(function(){
        $(".menu li").removeClass("current_page_item");
    });

  // Go Back Button

    $('a.close').click(function(){
        parent.history.back();
        return false;
    });  
  
});

$( document ).ajaxComplete(function() { 
    // Fix for ajax and pagination
    $( ".menu a, .page-numbers" ).addClass( "ajax" );
    $("#content").fitVids();

     $('a.close').click(function(){
        parent.history.back();
        return false;
    });
});
