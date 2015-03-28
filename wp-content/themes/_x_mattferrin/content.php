<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			<?php if ( is_single() ) : ?>
			<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
				<?php the_content() ;?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		</footer><!-- .entry-meta -->
	</article><!-- #post -->
