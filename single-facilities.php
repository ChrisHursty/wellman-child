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
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page-header' ); 
?>

<?php if ( has_post_thumbnail() ) { ?>
<div class="container-fluid header-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: 50% 50%;">
	<div class="page-title">
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<?php } else { ?>
<div class="container-fluid header-image" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/default-hero.jpg; ?>') no-repeat; background-size: cover; background-position: 50% 50%;">
	<div class="page-title">
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<?php } ?>
<div class="wrapper" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
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
			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
			<main class="site-main" id="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'single-facilities' ); ?>
					<?php understrap_post_nav(); ?>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #single-wrapper -->
<?php get_footer(); ?>
