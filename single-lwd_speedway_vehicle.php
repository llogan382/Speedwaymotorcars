<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package speedwaymotorcars
 */

get_header();
?>


<div class="container">
	<div class="row">
		<div class="col">

		</div>
		<div class="col">

</div>
	</div>




</div>

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



<div class="container lwd-container" style="width:80%">
    <div class="row">
        <div class="col">
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="lwd-title-single">', '</h1>' );
					else :
						the_title( '<h2 class="lwd-title-single"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;?>
				<?php speedwaymotorcars_post_thumbnail(); ?>
				<?php if( get_field('vehicle_images') ): ?>
					<li><?php the_field('vehicle_images'); ?></li>
				<?php endif; ?>

			</div><!-- end col -->
			<div class="col">
			<?php  
				$price = get_field('vehicle_price');
				$formatted_price = number_format( $price, 0, '.', ',' );
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
									<?php the_field('vehicle_mileage'); ?>
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
	<div class="container">
		<div class="row">
			<div class="col">
			<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'speedwaymotorcars' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'speedwaymotorcars' ),
						'after'  => '</div>',
					) );
					?>
			</div>

		</div>



	</div>

<style>
li{background:#fff;}
li:nth-child(even){background:#e0e4e7}
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
