<?php
/**
 * Template Name: Moving Image Page Template
 * Template Post Type: post, page, event, projects
 * Template for displaying a page without a sidebar.
 *
 * @package understrap
 */

get_header( 'automotive' );

preg_match_all( '/([0-9])\w+/', $post->post_content, $ids );
$thumbnailelement = '';

if ( ! empty( $ids[0] ) ) :
	?>

	<div class="wrapper collapse" id="wrapper-hero">
		<div class="container-fluid" id="hero-slides">
			<div id="carouselExampleControls" class="carousel slide" data-interval="false">

				<div class="carousel-inner" role="listbox">
					<?php
					$loopcount = 0;

					foreach ( $ids[0] as $id ) :
						$id = esc_attr( $id );
						?>

						<div class="carousel-item <?php if ( $loopcount == 1 ) { echo 'active'; }; ?>">
							<div class="container carousel-image-holder align-middle">
								<div class="row justify-content-center">
									<div class="slide-buttons-cont hidden-md-down">
										<div class="thumb-button">
											<a class="nav-link" href="#" data-toggle="collapse" data-target="#multic-2">THUMBNAILS</a>
										</div>
										<div class="slide-buttons"><a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">-<span class="sr-only">Previous</span></a></div>
										<div class="slide-buttons"><a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">+<span class="sr-only">Next</span></a></div>
									</div><!-- END OF slide-buttons-cont -->
								</div><!-- END OF ROW -->

								<div class="embed-container">
									<iframe src="https://player.vimeo.com/video/<?php echo $id; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
								</div>
							</div>
						</div>

						<?php
						$thumbnailelement .= "<div class='col-md-4 col-xl-4 thumb-video-card' title='' ><a class='thumbnail-image' href='#' data-target='#carouselExampleControls' change-slide-to='" . $loopcount . "' ><div class='embed-container'><iframe src='https://player.vimeo.com/video/" . $id . "?background=1' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></a></div>";
						$loopcount++;
					endforeach;
					?>
				</div>

			</div>
		</div>

	</div>

	<?php // Thumbnail output for the collapse panel above. ?>
	<div class="collapse show container-fluid video-thumb-grid" id="multic-2">
		<div class="row thumb-collapse"><?php echo $thumbnailelement; ?></div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
