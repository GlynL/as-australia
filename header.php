<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package as-australia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'as-australia' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
        <img class='aligncenter' src="<?php echo get_theme_file_uri('/img/as-logo.PNG'); ?>" alt="AS Australia">
				<?php
			else :
				?>
        <img class='aligncenter' src="<?php echo get_theme_file_uri('/img/as-logo.PNG'); ?>" alt="AS Australia">
				<?php
			endif;
			$as_australia_description = get_bloginfo( 'description', 'display' );
			if ( $as_australia_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $as_australia_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
    
    <div class='container container--wide'>
      <nav id="site-navigation" class="main-navigation">
        <ul>
          <li class='nav-item'>Home</li>
          <li class='nav-item'>About Us</li>
          <li class='nav-item'>Contact</li>
          <li class='nav-item'>Events</li>
          <li class='nav-item'>Membership</li>
          <li class='nav-item nav-item--right'>Register</li>
          <li class='nav-item nav-item--right'>Log-In</li>
        </ul>
      </nav><!-- #site-navigation -->
    </div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">




<!-- included menu -->

  <!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'as-australia' ); ?></button>
  <?php
        wp_nav_menu( array(
          'theme_location' => 'menu-1',
          'menu_id'        => 'primary-menu',
        ) );
        ?> -->