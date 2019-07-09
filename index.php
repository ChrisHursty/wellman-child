<?php 
get_header(); ?>

<div class="hero">
	<div class="container-fluid">
		<?php dynamic_sidebar( 'home-page-slider' ); ?>
	</div>
</div>
<div class="about-wdc">
	<div class="container-fluid">
		<div class="container">
			<h2>PREMIUM GRADE ALUMINUM &amp; MAGNESIUM CASTINGS</h2>
			<div class="row">
				<?php dynamic_sidebar( 'under-home-slider' ); ?>
			</div>
		</div>
		
	</div>
</div>


<!-- Carousel
============================================= -->
<div class="section nobg clearfix wdc-carousel">
	<?php
	$args = array(
		//'name'           => 'home-page-carousel',
		'post_type'      => 'home_page_carousel',
		'posts_per_page' => 1
	);
	$big_loop = new WP_Query( $args );
	while ( $big_loop->have_posts() ) : $big_loop->the_post();
	?>
		<?php if( have_rows('carousel') ): ?>

			<div id="oc-features" class="owl-carousel owl-carousel-full image-carousel carousel-widget">

			<?php while( have_rows('carousel') ): the_row(); 

				// Repeater Sub Fields
				$image = get_sub_field('image');
				$heading = get_sub_field('heading');
				$excerpt = get_sub_field('excerpt');
				$link_text = get_sub_field('page_link_text');
				$link_url = get_sub_field('page_link_url');
				?>
				<div class="oc-item">
					<div class="row cleafix">
						<div class="col-xl-8">
							<img src="<?php echo $image['url']; ?>" alt="" />
						</div>
						<div class="col-xl-4" style="padding: 20px 0 0 20px;">
							<h3><?php echo $heading; ?></h3>
							<p><?php echo $excerpt; ?></p>
							<a href="<?php echo $link_url; ?>" class="button-link"><?php echo $link_text; ?></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php endwhile;
	wp_reset_query();
	?>
</div>
<div class="container-fluid section-heading">
	<div class="container">
		<div class="row">
			<h2>Key Customer Programs</h2>
		</div>
	</div>
</div>
<div class="container-fluid carousel-small">
	<?php
	$args = array(
		'name'           => 'home-page-carousel',
		'post_type'      => 'carousel_small',
		'posts_per_page' => 1
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	?>
		<?php if( have_rows('carousel_content') ): ?>

			<div class="owl-carousel owl-theme">

			<?php while( have_rows('carousel_content') ): the_row(); 

				// Repeater Sub Fields
				$image = get_sub_field('bg_image');
				$title = get_sub_field('title');
				?>
				<div class="item">
					<img src="<?php echo $image['url']; ?>" alt="" />
					<h4><?php echo $title; ?></h4>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php endwhile;
	wp_reset_query();
	?>
</div>
<div class="container-fluid section-heading">
	<div class="container">
		<div class="row">
			<h2>WDC Quality Accreditations</h2>
		</div>
	</div>
</div>
<div class="container pre-footer">
	<div class="row">
		<?php dynamic_sidebar( 'pre-footer' ); ?>
	</div>
</div>
<?php get_footer();