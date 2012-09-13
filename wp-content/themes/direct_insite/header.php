<?php

/**

 * The Header for our theme.

 *

 * @package WordPress

 * @subpackage Direct_Insite

 * @since Direct Insite 1.0

 */

?><!DOCTYPE html>

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

<link rel="Stylesheet" href="<?php bloginfo('template_url'); ?>/css/nivo-slider.css" media="screen" />

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



	/* Always have wp_head() just before the closing </head>

	 * tag of your theme, or you will break many plugins, which

	 * generally use this hook to add elements to <head> such

	 * as styles, scripts, and meta tags.

	 */

	wp_head();

?>

    <script src="<?php bloginfo('template_url'); ?>/js/jquery-1.6.2.min.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/cufon-yui.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/fonts/bank-gothic-medium-bt.font.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/fonts/bank-gothic-light-bt.font.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/fonts/interstate-light.font.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/fonts/interstate-light-italic.font.js"></script>

    <script>

        $(function() {

            Cufon.replace('.slogan span, .sb-text, ', {

                fontFamily: 'bank-gothic-medium-bt'

            });

			Cufon.replace('.ot-links a', {

				fontFamily: 'bank-gothic-medium-bt',

				hover: true

			});

            Cufon.replace('#menu-topnav > li > a, .content h1', {

                fontFamily: 'bank-gothic-light-bt',

                hover: true

            });

            Cufon.replace('.interstate-light', {

                fontFamily: 'interstate-light',

                hover: true

            });

            Cufon.replace('.interstate-light-i', {

                fontFamily: 'interstate-light-italic'

            });

        });

    </script>

    <script src="<?php bloginfo('template_url'); ?>/js/jquery.nivo.slider.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/mouseover.js"></script>    

	<style>

		.sb-contact-button {width: 156px; height: 122px; background: url('<?php bloginfo('template_url'); ?>/img/contact-us-sb.png') no-repeat; text-decoration: none}

		.sb-contact-button:hover {background-position: 0 -122px}

		.sb-send-us-button {width: 157px; height: 136px; background: url('<?php bloginfo('template_url'); ?>/img/send-us-sb.png') no-repeat; text-decoration: none}

		.sb-send-us-button:hover {background-position: 0 -136px}

	</style>

</head>



<body <?php body_class(); ?>>

    <div class="wrapper">

        <div class="header">

            <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="logo"><span><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></span></a>

            <div class="slogan"><span class="blue">Accelerating</span> <span class="green">Your</span> <span class="green">Cash Flow</span></div>

            <?php

                if (is_front_page()) {

                    $posts_array = get_posts(array(

                        'numberposts' => 1,

                        'category' => 8

                    ));

                    echo $posts_array[0]->post_content;

                }

            ?>

        </div>

        <div class="over-content clear">

            <?php

            wp_nav_menu(array('theme_location' => 'topnav', 'container' => 'ul'));

            

            global $wp_query;

            $page_id = $wp_query->get_queried_object_id();

            if (is_page() && !is_front_page()) {

                $pot_values = get_post_custom_values('page-over-text', $page_id);

                $poi_values = get_post_custom_values('page-over-image', $page_id);

                $sbt_values = get_post_custom_values('sb-text', $page_id);

                $sbi_values = get_post_custom_values('sb-image', $page_id);

            }

            else if (is_front_page()) {

                $pot_values = get_post_custom_values('page-over-text', $page_id);

                $pov_values = get_post_custom_values('page-over-video', $page_id);

                /*$posts_array = get_posts(array(

                    'numberposts' => 999,

                    'category' => 7

                ));

                $pd_int = rand(0, count($posts_array) - 1);

                $pot_text = $posts_array[$pd_int]->post_content;

				$poi_values = get_post_custom_values('page-over-image', $page_id);

				$sbi_values = get_post_custom_values('sb-image', $page_id);*/

            }

            ?>

			<?php

				if (!is_page(46)) {

			?>

            <div class="page-over-text is_main_<?=is_front_page()?>">

                <?php 

                    if (is_page() && !empty($pot_values)) {

                        foreach ($pot_values as $key => $value) {

                            echo '<div style="text-align: left; font-size: 18px; line-height: 23px; color: #008c99; width: 370px; margin-top: 40px;" class="homepagetext">' . $value . '</div>';

                        }

                    }

                ?>

            </div>

			<?php

				}

			?>

            <?php

				if (!is_front_page()) {

					if (is_page() && !empty($poi_values) && !is_page(46)) {

			?>

			<div class="page-over-images">

			<?php

						foreach ($poi_values as $key => $value) {

							echo '<img src="' . $value . '" alt="" />';

						}

			?>

			</div>

			<?php

			}

			if (is_page(46)) {

				?>

				<a href="<?php echo home_url('/invoices-online-payment-portal-video'); ?>" title="" class="video-player-link"><img src="/wp-content/uploads/2012/01/videoplayer-icon.jpg" alt="" height="202" width="332" /></a>

				<?php

			}

		}	elseif (!is_front_page())	{

					// Links on services

			?>

				<div class="ot-links clear">

					<a href="/wp-content/themes/direct_insite/img/action-buttons/solutions/accounts-receivable" title="Receivables" class="receivables-link">Receivables</a>

					<a href="/wp-content/themes/direct_insite/img/action-buttons/solutions/payments" title="Payments" class="payments-link">Payments</a>

					<a href="/wp-content/themes/direct_insite/img/action-buttons/solutions/accounts-payable" title="Payables" class="payables-link">Payables</a>

				</div>	

			<?php	

			} else {

				echo '<div class="page-over-video">';

				foreach ($pov_values as $key => $value) {

					echo $value;

				}

				echo '</div>';

			}

			?>

        </div>

        <div class="main-part clear">

            <div class="left-sb" <?php /* if (is_front_page()) { ?>style="height: 500px!important"<?php }*/?>>

                <div class="sb-images">

                    <?php

                        if (is_page() && !empty($sbi_values)) {

                            foreach ($sbi_values as $key => $value) {

								// Get image size

								list($width, $height, $type, $attr) = getimagesize(ABSPATH . $value);

                                echo '<img src="' . $value . '" alt="" ' . $attr . '/>';

                            }

                        }

                    ?>

                </div>

				<?php

					if ($page_id != 80) {

				?>

				<!--Contact us button-->

				<div class="sb-button" style="text-align: center; background: #a7a9ac; line-height: 1px; padding: 45px 0 5px; <?php if (is_front_page()) { ?>padding-top: 0<?php } ?>">

					<?php

						if ($page_id != 17 && $page_id != 19 && $page_id != 33 && $page_id != 46 && $page_id != 50) {

                                                    

                                                    if (is_front_page()) {

                                        ?>

										

										

					<div class="diri_stock" align="center">

						<strong>DIRI (Common Stock)</strong>

						<br />

						<?php get_stock_quote("DIRI"); ?>

					</div>

					<div style="height: 35px"></div>


                    <a href="/staging/matthew-e-oakes-interview-marcum-microcap-conference-2012-snnwire" title="Matthew E Oakes Interview with SNNWIRE" style="display: inline-block; line-height: 1px"><img src="/staging/wp-content/uploads/Matthew-Oakes-Interview-2012-snnwire.jpg" width="150" height="113"></a>
										

										

                  

                                        <?php        

                                            }

                                                    

					?>



					<a href="/contact-us/feedback/" title="Contact Us" style="display: inline-block; line-height: 1px" class="sb-contact-button">&nbsp;</a>
                    
                                        <a href="http://aberdeen.com/survey/0510_E-Payables/" title="Aberdeen Group Benchmark Study"  target="_blank"><img src="/wp-content/themes/direct_insite/img/1-BeyondPayables_200x200c.jpg" alt="Aberdeen Group Benchmark Study" height="150" width="150" /></a>

                                        					<div style="height: 10px"></div>


                                        <a href="http://www.aberdeen.com/link/sponsor.asp?spid=30411715&cid=7498" title="Aberdeen Group" style="display: inline-block; line-height: 1px; <?php if (is_front_page()) { ?> margin-bottom: 20px <?php } ?>" target="_blank"><img src="/wp-content/themes/direct_insite/img/boombox_sidebar.png" alt="Aberdeen Group" height="120" width="150" /></a>

                                        <?php

                                            

					

						}

						else {

					?>

					<a href="/send-us-your-rfp/" title="Send Us Your RFP" style="display: inline-block; line-height: 1px" class="sb-send-us-button">&nbsp;</a>

                                        <a href="http://aberdeen.com/survey/0510_E-Payables/" title="Aberdeen Group Benchmark Study" style="display: inline-block; line-height: 1px" target="_blank"><img src="/wp-content/themes/direct_insite/img/1-BeyondPayables_200x200c.jpg" alt="Aberdeen Group Benchmark Study" height="150" width="150" /></a>
<div style="height: 10px"></div>

                                        <a href="http://www.aberdeen.com/link/sponsor.asp?spid=30411715&cid=7498" title="Averdeen Group" style="display: inline-block; line-height: 1px" target="_blank"><img src="/wp-content/themes/direct_insite/img/boombox_sidebar.png" alt="Averdeen Group" height="120" width="150" /></a>

					<?php

						}

					?>

				</div>

				<!--/Contact us button-->

				<?php

					}

				?>

                <div class="sb-text" <?php if (is_front_page()) {?>style="height: 221px!important"<?php } ?>>

                    <?php

                        if (is_front_page() && is_page()) {

                            $posts_array = get_posts(array(

                                'numberposts' => 999,

                                'category' => 5

                            ));

                            foreach ($posts_array as $post => $value) {

                                echo '<div class="sbt-inner">' . $value->post_content . '</div>';

                            }

                        }

                        else if (is_page() && !empty($sbt_values)) {

                            foreach ($sbt_values as $key => $value) {

                                echo '<div class="sbt-inner">' . $value . '</div>';

                            }

                        }

                    ?>

                </div>

				<?php

					if ($page_id == 17 || $page_id == 9) {

				?>

				<div class="sb-youtube-link">

					<a href="/about-us/corporate-overview/direct-insite-intro-video/" title="YouTube">&nbsp;</a>

				</div>

				<?php

					}

				?>

            </div>

            <div class="content">