<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package speedwaymotorcars
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				speedwaymotorcars_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php speedwaymotorcars_post_thumbnail(); ?>

	<!-- Add Vehicle Gallery -->
	<?php 

$images = get_field('vehicle_images');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
    <ul>
        <?php foreach( $images as $image ): ?>
            <li>
            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

	<div class="entry-content">

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


		if( get_field('vin_number') ): ?>
		<ul>
		<li>Vin Number:<?php the_field('vin_number'); ?></li>
	<?php endif; 

if( get_field('stock_number') ): ?>
<li>Stock Number: <?php the_field('stock_number'); ?></li>
<?php endif; 
		if( get_field('vehicle_price') ): ?>
		<li>Price:<?php the_field('vehicle_price'); ?></li>
	<?php endif; 
			if( get_field('vehicle_mileage') ): ?>
			<li>Miles:<?php the_field('vehicle_mileage'); ?></li>
		<?php endif; 
				if( get_field('engine_size') ): ?>
				<li>Engine:<?php the_field('engine_size'); ?></li>
			<?php endif; 
					if( get_field('city_mpg') ): ?>
					<li>City MPG:<?php the_field('city_mpg'); ?></li>
				<?php endif; 
						if( get_field('highway_mpg') ): ?>
						<li>Hwy MPG:<?php the_field('highway_mpg'); ?></li>
					<?php endif; 
							if( get_field('year') ): ?>
							<li>Year:<?php the_field('year'); ?></li>
						<?php endif; 
								if( get_field('interior_color') ): ?>
								<li>Interior Color:<?php the_field('interior_color'); ?></li>
		</ul>

							<?php endif; 


		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'speedwaymotorcars' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php speedwaymotorcars_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
