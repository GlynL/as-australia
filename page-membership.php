<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package as-australia
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

		<?php
		while (have_posts()) {
      the_post();
    ?>
    <header>
      <h1 class='heading'><?php the_title(); ?></h1>
    </header>
    <section>
      <?php the_content(); ?>
    </section>
    <section>
      <p>if user logged in show membership payment</p>
      <p>if user not logged-in show log-in/register</p>
    </section>
    <?php
    } // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
