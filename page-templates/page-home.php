<?php  
/*  
Template Name: Home
*/  

get_header(); ?>


<div id="hero">
	<?php if ( ! dynamic_sidebar( 'hero' ) ) : ?>
	<?php endif; ?>
</div>

<div class="row" id="roles">
	<?php if ( ! dynamic_sidebar( 'top-a' ) ) : ?>
	<?php endif; ?>
</div>

<main>

	<section id="latest">

	<h1>Latest from Rookie Rugby</h1>


	<script type="text/javascript" class="rebelmouse-embed-script" src="https://www.rebelmouse.com/static/js-build/embed/embed.js?site=usayouthrugby&height=1500&flexible=1&theme=162"></script>

	</section> 


</main>

<script>

$( document ).ready(function() {

var $container = $('#latest .posts').isotope({
    itemSelector: '.post',
    masonry: {
    columnWidth: '.grid-sizer'
    }
});

});

</script>


<?php get_footer(); ?>