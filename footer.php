<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package USA Wheel Chair Rugby
 */
?>


	<footer>

	</footer>

<?php wp_footer(); ?>


<?php
if ( is_home() ) { ?>

<script>


      $(function () { 
            var slider = $(".royalSlider").data('royalSlider');
                slider.ev.on('rsVideoPlay', function() {
                    // video start
                    $( ".rsGCaption, .bottom-mask" ).fadeOut(200);
                });
                slider.ev.on('rsVideoStop', function() {
                   $( ".rsGCaption, .bottom-mask" ).fadeIn(200);
                });
            });
</script>

<?php } ?>
</div>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>

</html>


