<?php
/**
 * The template for displaying all single posts for Facilities.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
$container     = get_theme_mod( 'understrap_container_type' );
$location = get_field('event_location');
if( !empty($location) ):
?>
<div class="container-fluid header-image">
	<div class="acf-map">
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
	</div>
</div>
<?php endif; ?>
<div class="wrapper" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
			<main class="site-main event-content" id="main">
				<h1><?php the_title(); ?></h1>
				<h5 class="date">Date &amp; Time<br>
					<span><?php the_field('event_date'); ?></span>
				</h5>
				<p><?php the_field('event_details'); ?></p>

			</main><!-- #main -->
			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #single-wrapper -->
<?php get_footer(); ?>
