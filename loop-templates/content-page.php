<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header container <?php if (is_page_template('page-templates/foliopage.php')) { echo is_page_template('foliopage.php');?> hidden-xl-down<?php } ?> ">

		<?php if (! is_front_page() ) { the_title( '<h1 class="entry-title doobydoo">', '</h1>' ); } ?>

	</header><!-- .entry-header -->

	

	<div class="entry-content text-justify">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
