<?php
/**
 * The template for displaying blog archive.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>
<div class="container-fluid header-image" style="background: url('<?php bloginfo('stylesheet_directory'); ?>/images/news-hero.jpg') no-repeat; background-size: cover; background-position: 50% 50%;">
</div>
<div class="blog-archive wrapper" id="archive-wrapper">
	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-12 col-md-6">
					<div class="card-container">
						<a href="<?php echo the_permalink(); ?>">
							<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
								<div class="blog-details">
									<div class="page-title">
										<a href="<?php echo the_permalink(); ?>">
											<h2><?php the_title(); ?></h2>
										</a>
									</div>
									<h5 class="date"><span class="entry-date"><?php echo get_the_date(); ?></span></h5>
									<a href="<?php echo the_permalink(); ?>">Read More >></a>
								</div>
								<div class="blog-img">
									<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
								</div>
							</article><!-- #post-## -->
						</a>
					</div>
				</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'loop-templates/content', 'none' ); ?>
			<?php endif; ?>
		</div> <!-- .row -->
		<!-- The pagination component -->
		<?php understrap_pagination(); ?>
	</div><!-- #content -->
</div><!-- #archive-wrapper -->
<?php get_footer(); ?>
