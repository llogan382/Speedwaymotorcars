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

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav class="lwd-nav navbar navbar-expand-md navbar-light" role="navigation">
  <div class="container">
	  <div class="col-4">
	  <?php
			the_custom_logo();?>
	  </div>
	  
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
			'menu_class'        => 'nav navbar-nav lwd-menu-ul',
			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			'walker'            => new WP_Bootstrap_Navwalker(),
	  ) );
	  ?>
  </div>
</nav>
<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>

<form role="search" method="get" id="searchform" class="searchform" >
  <div class="row pr-4">
    <div class="col-2">
	  <input type="text" class="form-control" placeholder="Make">
	  <input type="hidden" value="makers_models"/>
	  <label class="screen-reader-text" for="s">Search for:</label>
		<input type="text" value="" name="s"/>


    </div>
    <div class="col-2">
      <input type="text" class="form-control" placeholder="Model">
	</div>
	<div class="col-2">
      <input type="text" class="form-control" placeholder="Year">
	</div>
	<div class="col-2">
      <input type="text" class="form-control" placeholder="Price">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>