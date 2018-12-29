<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package speedwaymotorcars
 */

get_header();
// tl_slide_images = Gallery Field
function themeprefix_lightslider_thumbslider() {
	$images = get_field('vehicle_images'); //add your correct field name
		if( $images ): ?>
	
			<ul id="light-slider" class="image-gallery">
			
			<?php foreach( $images as $image ): ?>
			
				<li data-thumb="<?php echo $image['url']; ?>">
					<a href=""><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
				</li>
	
			<?php endforeach; ?>
			</ul>
		<?php endif; 
	}
?>



<?php
$type = get_term_link( get_query_var( 'vehicle_type' ), get_query_var( 'taxonomy' ) );

$makers = get_term_link('makers_models');

$ext_color = get_term_link('lwd_vehicle_colors');
$int_features = get_term_link('lwd_interior_features');
$safety_features = get_term_link('lwd_safety_features');

$ext_features = get_term_link('lwd_exterior_features');


$extra_features = get_term_link('lwd_extra_features');

$veh_trans = get_term_link('lwd_vehicle_trans');


?>



<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                ?>



<div class="container lwd-container-tax" style="width:80%">

    <div class="row">
        <div class="col-6">
 

				<?php
				

					if ( is_singular() ) :
						the_title( '<h1 class="lwd-title-single">', '</h1>' );
					else :
						the_title( '<h2 class="lwd-title-single"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;?>
				<?php themeprefix_lightslider_thumbslider();?>

			</div><!-- end col -->
			<div class="col-6">
			<?php  
				$price = get_field('vehicle_price');
				$formatted_price = number_format( $price, 0, '.', ',' );
				$miles = get_field('vehicle_mileage');
				$miles_format = number_format( $miles, 0, '.', ',' );
				?>
					<div class="single-price"><?php echo "$" . $formatted_price ?></div>
					<div class="row pt-4">
					<ul class="single-features">
						<?php if( get_field('vin_number') ): ?>
							<li>
								<span class="spec_value">
									Vin Number
								</span>
								<span class="spec_name">
									<?php the_field('vin_number'); ?>
								</span>
							</li>
						<?php endif; ?>
						<?php if( get_field('stock_number') ): ?>
							<li>
								<span class="spec_value">
									Stock Number
								</span>
								<span class="spec_name">
									<?php the_field('stock_number'); ?>
								</span>
							</li>
						<?php endif; ?>

						<?php if( get_field('vehicle_mileage') ): ?>
							<li>
								<span class="spec_value">
									Miles
								</span>
								<span class="spec_name">
									<?php echo $miles_format;?>
								</span>
							</li>
						<?php endif; ?>
						<?php if( get_field('engine_size') ): ?>
							<li>
								<span class="spec_value">
									Engine
								</span>
								<span class="spec_name">
									<?php the_field('engine_size'); ?>
								</span>
							</li>
						<?php endif; ?>
						<?php if( get_field('city_mpg') ): ?>
							<li>
								<span class="spec_value">
									City

								</span>
								<span class="spec_name">
									<?php the_field('city_mpg'); ?>
								</span>
							</li>
						<?php endif; ?>

						<?php if( get_field('highway_mpg') ): ?>
							<li>
								<span class="spec_value">
									Highway
								</span>
								<span class="spec_name">
									<?php the_field('highway_mpg'); ?>
								</span>
							</li>
						<?php endif; ?>
						<?php if( get_field('year') ): ?>
							<li>
								<span class="spec_value">
									Year
								</span>
								<span class="spec_name">
									<?php the_field('year'); ?>
								</span>
							</li>
						<?php endif; ?>
						<?php if( get_field('interior_color') ): ?>
							<li>
								<span class="spec_value">
									Int Color
								</span>
								<span class="spec_name">
									<?php the_field('interior_color'); ?>
								</span>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div><!-- end col --> 

				
				
	

		</div><!--end row -->

	</div><!-- end container -->






</div>

<div class="container">
	<div class="row mt-5">
		<div class="col align-self-center">
			<nav>
				<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
					<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Description</a>
					<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
				</div>
			</nav>
		</div>
	</div>
</div>


<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	<div class="container">
		<div class="row">
			<div class="col col-md-6 offset-md-3">
					<?php 
			$args = array(
				//default to current post
				'post' => 0,
				'before' => '<br>',
				//this is the default
				'sep' => '<br>',
				'after' => '</br>',
				//this is the default
				'template' => '%s: %l.'
			);
			the_taxonomies( $args ); 
			?> 
			</div>
		</div>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<p class="text-center">
					<?php the_content();?>

				</p>
			</div>
		</div>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  </div>
</div>







		</div>
	</div>


</div>


	
<style>
.single-features > li{background:#fff;}
.single-features > li:nth-child(even){background:#e0e4e7}
</style>

</div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<div class="entry-content">
		

	<footer class="entry-footer">
		<?php speedwaymotorcars_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php
			endwhile;

			the_posts_navigation();

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
