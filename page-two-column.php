<?php
/**
 * Template Name: Two Column Grid
 *
 * Template for displaying a 2-Column Layout with ACF Pro
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$hero_image = get_field( 'two_column_hero_image' );
?>
<div class="container-fluid header-image" style="background: url('<?php echo $hero_image; ?>') no-repeat; background-size: cover; background-position: 50% 50%;">
	<?php if( get_field('two_column_hero_text') ): ?>
		<div class="page-title">
			<h1><?php the_field('two_column_hero_text'); ?></h1>
		</div>
	<?php endif; ?>
</div>
<div class="two-column wrapper" id="full-width-page-wrapper">
	<div class="container" id="content">
		<div class="container">
			<div class="row">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
			</div>
		</div>
		<div class="row">
				<?php if( have_rows('two_column_category_tiles') ): ?>
					<?php while( have_rows('two_column_category_tiles') ): the_row(); 
						// Repeater Sub Fields
						$tile_image = get_sub_field('tile_image');
						$tile_title = get_sub_field('tile_title');
						$tile_link  = get_sub_field('tile_link');
						?>
						<div class="col-12 col-sm-6 column-container">
							<a href="<?php echo $tile_link; ?>" class="tile-container">
								<div class="tile-title">
									<h2><?php echo $tile_title; ?></h2>
								</div>
								<div class="tile-image">
									<img src="<?php echo $tile_image['url']; ?>" alt="" />
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
		</div><!-- .row end -->
	</div><!-- #content -->
</div><!-- #full-width-page-wrapper -->
<?php get_footer(); ?>
