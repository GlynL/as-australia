<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package as-australia
 */

?>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa quas reiciendis, exercitationem nihil ad corporis vel sequi placeat? Repudiandae veniam amet nesciunt fuga magni impedit deserunt earum enim quis consectetur.</p>
<p>Nemo, sequi vitae voluptate asperiores fugiat inventore nulla ex animi natus eligendi magni quam nesciunt aspernatur quibusdam laboriosam deleniti tenetur officia expedita beatae doloremque quisquam ut? Quibusdam vero facere explicabo!</p>
<p>Architecto, molestias? Consequuntur id autem quam sapiente dignissimos odit. Odit in quasi minima impedit tempore perferendis quos non iste dignissimos, vel sapiente, culpa, sit asperiores ad tempora inventore voluptatibus! In.</p>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php as_australia_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'as-australia' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'as-australia' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
