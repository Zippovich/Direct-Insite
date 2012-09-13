<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Direct_Insite
 * @since Direct Insite 1.0
 */

if (have_posts())
    while (have_posts()) : the_post();
?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (!is_front_page()) { 
		$press_releases = '';?>
		<h1 class="entry-title"><?php the_title(); ?></h1> 
	<?php } else {
		global $wp_query;
		$page_id = $wp_query->get_queried_object_id();
		$press_releases = get_post_custom_values('press-releases', $page_id);
		if(!empty($press_releases[0]))
			$press_releases = $press_releases[0];
	}
	?>
		
		<div class="entry-content" >
		<?php if (is_front_page()) {?> 
			<div class="home-content-bg"></div>
			<div class="press_releases">
				<div class="press_releases_header" ></div>
				<iframe scrolling="no" width="373" height="555" src="<?php echo $press_releases?>"></iframe>
			</div>
		<?php } ?>
		<?php the_content(); ?>
		<?php //wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .entry-content -->
    </div><!-- #post-## -->
    <?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>