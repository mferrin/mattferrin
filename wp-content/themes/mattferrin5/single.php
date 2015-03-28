<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage mattferrin5
 * @since mattferrin5 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content single-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						<?php if ( is_single() ) : ?>
						<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
							<?php the_content() ;?>
						<?php endif; ?>
					</header><!-- .entry-header -->
			
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>