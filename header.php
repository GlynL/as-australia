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

	<header id="masthead" class="site-header <?php if(is_front_page()) echo 'site-header--front-page' ?>">
    <?php if (is_front_page()) { ?>
      <div class='container container--wide'>
        <nav id="site-navigation" class="main-navigation main-navigation--front">

          <a class="nav-item nav-item--right menu-toggle">&#9776;</a>

          <ul>
            <li class='nav-item'><a href='<?php echo site_url(); ?>'>Home</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/about-us"); ?>'>About Us</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/contact"); ?>'>Contact</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/events"); ?>'>Events</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/membership"); ?>'>Membership</a></li>
            <!-- right side nav -->
            <?php
              if (is_user_logged_in()) { ?>
                <li class='nav-item nav-item--right nav-item--padding-top'><a href='<?php echo wp_logout_url(get_post_type() !== 'page' ? get_post_type_archive_link(get_post_type()) : get_permalink()); ?>'><i class='fas fa-sign-in-alt'></i>  Log-Out</a></li>
              <?php } else { ?>
                <li class='nav-item nav-item--right nav-item--padding-top'><a href='<?php echo wp_login_url(get_post_type() !== 'page' ? get_post_type_archive_link(get_post_type()) : get_permalink()); ?>'><i class='fas fa-sign-in-alt'></i>  Log-In</a></li>
                <li class='nav-item nav-item--right'><a href='<?php echo wp_registration_url(); ?>'><i class="fas fa-user"></i> Register</a></li>
              <?php }
            ?>
          </ul>

        </nav><!-- #site-navigation -->
      </div><!-- .container -->
    <?php } ?>

		<div class="container container--wide site-branding">
			<?php
      the_custom_logo();
      
			if (!is_front_page()) {
        ?>
        <img class='aligncenter' src="<?php echo get_theme_file_uri('/img/as-logo.PNG'); ?>" alt="AS Australia">
				<?php
      }
				
				?>
				<?php
			$as_australia_description = get_bloginfo( 'description', 'display' );
			if ( $as_australia_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $as_australia_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

    <?php if (!is_front_page() && !is_home()) { ?>
      <div class='container container--wide'>
        <nav id="site-navigation" class="main-navigation">

          <a class="nav-item nav-item--right menu-toggle">&#9776;</a>

          <ul>
            <li class='nav-item'><a href='<?php echo site_url(); ?>'>Home</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/about-us"); ?>'>About Us</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/contact"); ?>'>Contact</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/events"); ?>'>Events</a></li>
            <li class='nav-item'><a href='<?php echo site_url("/membership"); ?>'>Membership</a></li>
            <!-- right side nav -->
            <?php
              if (is_user_logged_in()) { ?>
                <li class='nav-item nav-item--right nav-item--padding-top'><a href='<?php echo wp_logout_url(get_post_type() !== 'page' ? get_post_type_archive_link(get_post_type()) : get_permalink()); ?>'><i class='fas fa-sign-in-alt'></i>  Log-Out</a></li>
              <?php } else { ?>
                <li class='nav-item nav-item--right nav-item--padding-top'><a href='<?php echo wp_login_url(get_post_type() !== 'page' ? get_post_type_archive_link(get_post_type()) : get_permalink()); ?>'><i class='fas fa-sign-in-alt'></i>  Log-In</a></li>
                <li class='nav-item nav-item--right'><a href='<?php echo wp_registration_url(); ?>'><i class="fas fa-user"></i> Register</a></li>
              <?php }
            ?>
            </ul>

        </nav><!-- #site-navigation -->
      </div><!-- .container -->
    <?php } ?>
   
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