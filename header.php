<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	
	<!-- TERTIARY MENU -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<nav class="navbar navbar-expand-md navbar-dark bg-primary" id="tertiary-menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'tertiary_menu',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'tertiaryNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'tertiary',
						'depth'           => 1,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			?>
		</nav>

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
		
		
		<!-- PRIMARY MENU -->
		<nav class="navbar navbar-expand-md navbar-dark bg-primary" id="primary-menu">

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown, #secondaryNavDropdown, #tertiaryNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
				
				<!-- MOBILE MENU -->
				<div id="mobile-menu">
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'mobile_menu',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'mobile',
								'depth'           => 1,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						);
					?>
				</div>
				
		</nav><!-- .site-navigation -->	

		
		<!-- SECONDARY MENU -->
		<nav class="navbar navbar-expand-md navbar-dark bg-secondary" id="secondary-menu">
			<div class="be-more-active"> </div><div class="arrow-right"></div>
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'secondary_menu',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'secondaryNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'secondary',
						'depth'           => 1,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			?>
		</nav>
		
	</div><!-- #wrapper-navbar end -->

<script type="text/javascript">
	var tertiaryMenu = document.getElementById("tertiary-menu");
	var secondaryMenu = document.getElementById("secondary-menu");
	var primaryMenu = document.getElementById("main-menu");
	var mobileMenu = document.getElementById("mobile-menu");
	
	if (screen.width < 640) {
		primaryMenu.style.display = "none";
		secondaryMenu.style.display = "none";
		tertiaryMenu.style.display = "none";
		mobileMenu.style.display = "flex";
	}
	else {
		primaryMenu.style.display = "flex";
		secondaryMenu.style.display = "flex";
		tertiaryMenu.style.display = "flex";
		mobileMenu.style.display = "none";
	}
</script>

