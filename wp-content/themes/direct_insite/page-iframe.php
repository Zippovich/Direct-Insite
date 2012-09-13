<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="Stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css" />
<!--[if lte IE 8]><link rel="Stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie8.css" /><![endif]-->
<!--[if lte IE 7]><link rel="Stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" /><![endif]-->
<link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon"/>
<link rel="icon" href="/favicon.ico" type="image/x-ico"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

?>
<style>
    .content {width: auto; float: none; padding: 0}
</style>
</head>

<body <?php body_class(); ?>>
<div class="content">

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = get_post($id);
    echo $post->post_content;
}

?>
</div>
</body>
</html>