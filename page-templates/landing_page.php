<?php
/**
 * Template Name: Landing Page
 * Template Post Type: post, page, event, homepagefeed
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('landingpage');

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
// On WooCommerce pages there is no need for sidebars as they leave
// too little space for WooCommerce itself. We check if WooCommerce
// is active and the current page is a WooCommerce page and we do
?>


<?php
	
	// this template is pulling in the thumbnails from the underlying galleries.
	
	 thumbnail_feed($post->ID);?> 
	 	<div class="wrapper" id="page-wrapper">

<div class="container-fluid px-0" id="content" tabindex="-1">

	<div class="row mx-0">

		<!-- Do the left sidebar check -->
		<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

		<main class="site-main" id="main">

			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'loop-templates/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}
			?>

		</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- #content -->

</div><!-- #page-wrapper -->


<?php 
get_footer(); 