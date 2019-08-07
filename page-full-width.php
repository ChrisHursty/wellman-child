<?php
/**
 * Template Name: No Sidebar Full Width Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page-header' ); 
?>
<div class="container-fluid header-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: 50% 50%;">
	<div class="page-title">
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<div class="wrapper" id="full-width-page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row justify-content-md-center">
			<div class="col-sm-12 col-md-10 col-lg-8 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row end -->
	</div><!-- #content -->
</div><!-- #full-width-page-wrapper -->
<?php get_footer(); ?>
