<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package speedwaymotorcars
 */

get_header();
?>

<header class="page-header">

			</header><!-- .page-header -->


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



<div class="container lwd-container" style="width:60%">
    <div class="row">
        <div class="col lwd-veh-img">

				<?php speedwaymotorcars_post_thumbnail(); ?>

			</div>
			<div class="col align-self-center">
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="vehicle-title">', '</h1>' );
					else :
						the_title( '<h2 class="vehicle-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							speedwaymotorcars_posted_on();
							speedwaymotorcars_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
				<div class="row">
					<?php if( get_field('vehicle_mileage') ): ?>
					<div class="col"><?php the_field('vehicle_mileage'); ?> Miles</div>
					<?php endif; ?>
					<?php if( get_field('year') ): ?>
						<div class="col"><?php the_field('year'); ?></div>
					<?php endif; ?>
					<?php if( get_field('vehicle_price') ): ?>
						<div class="col vehicle-price">$<?php the_field('vehicle_price'); ?></div>
					<?php endif; ?>
				</div>

						
			</div>

    </div>



</div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<div class="entry-content">
		

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
