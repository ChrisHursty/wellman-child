<?php 
get_header(); ?>

<div class="hero">
	<div class="container-fluid">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/apache-hero-full.jpg" alt="">
	</div>
</div>
<div class="about-wdc">
	<div class="container-fluid">
		<div class="container">
			<h2>PREMIUM GRADE ALUMINUM &amp; MAGNESIUM CASTINGS</h2>
			<div class="row">
				<div class="col">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/key-process-icon.png" alt="">
					</div>
					<div class="content">
						<h4>KEY PROCESSES</h4>
						<p>Our state of the art foundry has been recognized for delivering only the highest quality precision aerospace castings and extending the envelope of aluminum and magnesium precision dry sand, low pressure sand.</p>
						<button>Read More</button>
					</div>
				</div>
				<div class="col">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/in-house-cap-icon.png" alt="">
					</div>
					<div class="content">
						<h4>IN-HOUSE CAPABILITIES</h4>
						<p>Wellman Dynamics provides our customers with a host of special services ranging from Shape and Geometrical Complexity to Mechanical Properties and value added operations such as machining and assembly.</p>
						<button>Read More</button>
					</div>
				</div>
				<div class="col">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/employee-opp-icon.png" alt="">
					</div>
					<div class="content">
						<h4>EMPLOYMENT OPPORTUNITIES</h4>
						<p>Wellman Dynamics is proud that its skilled workforce is able to produce mission critical products including the largest and most complex precision castings in the aerospace industry. Click the link below for employment opportunities at our company.</p>
						<button>Read More</button>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>


<!-- Carousel
============================================= -->
<div class="section nobg clearfix wdc-carousel">

	<div id="oc-features" class="owl-carousel owl-carousel-full image-carousel carousel-widget">
		<div class="oc-item">
			<div class="row cleafix">
				<div class="col-xl-8">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/css/canvas/images/carousel/carousel1.jpg" alt="">
				</div>
				<div class="col-xl-4" style="padding: 20px 0 0 20px;">
					<h3>Aluminum</h3>
					<p>Uniquely plagiarize dynamic convergence after equity invested experiences. Holisticly repurpose installed base infomediaries before web-enabled methods of empowerment.</p>
					<a href="#" class="button-link">Read More</a>
				</div>
			</div>
		</div>
		<div class="oc-item">
			<div class="row cleafix">
				<div class="col-xl-8">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/css/canvas/images/carousel/carousel2.jpg" alt="">
				</div>
				<div class="col-xl-4" style="padding: 20px 0 0 20px;">
					<h3>Magnesium</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor mollitia dignissimos, assumenda consequuntur consectetur! Laborum reiciendis, accusamus possimus et similique nisi obcaecati ex doloremque ea odio.</p>
					<a href="#" class="button-link">Read More</a>
				</div>
			</div>
		</div>
		<div class="oc-item">
			<div class="row cleafix">
				<div class="col-xl-8">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/css/canvas/images/carousel/carousel1.jpg" alt="">
				</div>
				<div class="col-xl-4" style="padding: 20px 0 0 20px;">
					<h3>Aerospace</h3>
					<p>Dolor mollitia dignissimos, assumenda consequuntur consectetur! Laborum reiciendis, error explicabo consectetur adipisci, accusamus possimus et similique nisi obcaecati ex doloremque ea odio.</p>
					<a href="#" class="button-link">Read More</a>
				</div>
			</div>
		</div>
	</div>
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
		'post_type'      => 'carousel_small',
		'posts_per_page' => 10
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

<?php get_footer();