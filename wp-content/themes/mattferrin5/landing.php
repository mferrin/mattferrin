<?php
/**
 * Template Name: Landing Page
 *
 * @package WordPress
 * @subpackage mattferrin5
 * @since mattferrin5 1.0
 */

get_header(); ?>

<?php wp_register_script( "isotope", get_template_directory_uri() . "/js/jquery.isotope.min.js" ); ?>
<?php wp_enqueue_script( "isotope" ); ?>

<?php wp_register_script( "landing", get_template_directory_uri() . "/js/landing.js" ); ?>
<?php wp_enqueue_script( "landing" ); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
		<?php 
		$args = array(
              'post_type' => 'post',
              'orderby'   => 'date',
              'order'     => 'DESC',
              'posts_per_page' => -1,
            ); ?>
            
    <div class="wrapper">
    	
    	<section id="work">
			  
		  	<nav id="work-menu-wrapper">
					<?php nav_work_menu(); ?>
		  	</nav>		
    		
		    <div id="work-wrapper" name="work" role="">
				<?php $my_query = new WP_Query($args); ?>
				<?php /* Start the Loop */ ?>
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php 
					$post_categories = wp_get_post_categories( $post->ID );
					$class = '';					
					foreach($post_categories as $c){
						$cat = get_category( $c );
						$class .= $cat->slug . ' ';
					} 
					?>
					<a href="<?php the_permalink(); ?>">
					<div class="work-item all <?php echo $class; ?>">
						<?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
						<div class="work-image-wrapper">
							<div class="work-title-wrapper">
								<span class="work-title"><?php the_title(); ?></span>
							</div>
							<img src="<?php echo $url; ?>" />
						</div>
					</div>
					</a>
				<?php endwhile; ?>
			</div><!-- #work-wrapper -->
		</section>
		
		<section id="resume" name="resume" class="landing-section">
			<div class="section-title">Resum&Eacute;</div>
			<img id="res-graphic" src="<?php echo get_template_directory_uri() . '/images/resume.svg'; ?>" />
			<div id="res-text" class="section-text">
				<?php $about_page = get_page( 600 ); ?>
				<?php $content = $about_page->post_content; ?>
				<?php echo apply_filters( 'the_content', $content ); ?>
			</div>
		</section>
		
		<section id="bio" name="bio" class="landing-section">
			<div class="section-title">Bio</div>
			<div class="section-text" id="bio-text">
				<?php $about_page = get_page( 606 ); ?>
				<?php $content = $about_page->post_content; ?>
				<?php echo apply_filters( 'the_content', $content ); ?>
			</div>
		</section>
		
		<section id="clients" name="clients" class="landing-section">
			<div class="section-title">Selected Clients</div>
			<div class="section-text" id="client-images">
				<?php $about_page = get_page( 614 ); ?>
				<?php echo trim($about_page->post_content); ?>
			</div>
		</section>	
		
		<section id="recognition" name="recognition" class="landing-section">
			<div class="section-title">Recognition</div>
			<div class="section-text" id="recognition-text">
				<?php $recognition_page = get_page( 659 ); ?>
				<?php $content = $recognition_page->post_content; ?>
				<?php echo apply_filters( 'the_content', $content ); ?>
			</div>
		</section>					
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>