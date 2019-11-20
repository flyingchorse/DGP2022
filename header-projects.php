<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand d-flex justify-content-center mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand d-flex justify-content-center" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->
			</div>
			<nav class="navbar navbar-expand-md navbar-light justify-content-center">
					
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse justify-content-center',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 3,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
		<!-- .container -->
			<?php endif; ?>

		</nav>
		<?php if ( $post->ID ) {
    $foliolink = wp_list_pages( array(
        'title_li' => '',
        'depth' => 0,
        'css_class' => 'nav-item',
        'post_type' => 'page',
        'include' => $post->ID,
        'echo'     => 0,
        'walker'	=> new BS_Page_Walker()
    ) );
}
		$key = "linked_project";		
		$projects =  get_post_meta($post->ID, $key, true);
	
	
	if ( $projects ) {
    $projectlink = wp_list_pages( array(
        'title_li' => '',
        'depth' => 0,
        'css_class' => 'nav-item',
        'post_type' => 'projects',
        'include' => $projects,
        'echo'     => 0,
        'walker'	=> new BS_Page_Walker()
    ) );
}
?>
<nav class="navbar navbar-expand-md navbar-light justify-content-center">
	
    <ul class="navbar-nav">
	    <?php echo $foliolink; ?>
	    
	    <?php
		    if ( $projects ) :  echo $projectlink;  
		    
		endif;  ?>
       
    </ul>
</div>

				
				<div class="slide-buttons-cont hidden-md-down">
				<div class="slide-buttons"><a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					  	-
					  	<span class="sr-only">Previous</span>
  					</a></div>
  					
  					<div class="slide-buttons"><a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  						+
  						<span class="sr-only">Next</span>
  					</a></div>
				</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->