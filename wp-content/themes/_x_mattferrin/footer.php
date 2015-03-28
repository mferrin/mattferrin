<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="break"></div>
		<div id="footer-info">
			<div id="footer-left-info">
				<img src="<?php echo get_template_directory_uri();?>/images/logo-grey.png" height="40" />
				<p>&copy; <?php echo date( "Y" ); ?> Matt Ferrin.<br/>
					All Rights Reserved.<br/>
					Site Design by Matt Ferrin<br/>
					Site programmed by <a href="http://weatetheweb.com" target="_blank">We Ate The Web</a>
				</p>
			</div>
			<div id="footer-right-info">
				<p>
					Creative Director<br/>
					Art Director<br/>
					Filmmaker<br/>
					Photographer<br/>
					Graphic Designer<br/>
					Hot Sauce Maker<br/>
				</p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>