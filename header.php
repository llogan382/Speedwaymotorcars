<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package speedwaymotorcars
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

</head>

<div class="container">
	<div class="row">
		<div class="col header-logo">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
			
			$speedwaymotorcars_description = get_bloginfo( 'description', 'display' );
			if ( $speedwaymotorcars_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $speedwaymotorcars_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		
		</div><!-- End Col-->

		<div class="col">
			<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<a class="navbar-brand" href="#"></a>
						<?php
						wp_nav_menu( array(
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'bs-example-navbar-collapse-1',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
						) );
						?>
				</div><!-- End Container-->

			</nav>
		
		
		</div><!-- End Col-->
	
	</div><!-- end row -->
		
</div>


	<div id="content" class="site-content">
