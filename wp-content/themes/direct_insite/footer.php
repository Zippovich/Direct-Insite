<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Direct_Insite
 * @since Direct Insite 1.0
 */
?>
            </div>
        </div>
        <div class="footer-nav clear">
            <ul class="fn-ul">
            <?php
                wp_nav_menu(array(
                    'container' => false,
                    'theme_location' => 'footer',
                    'depth' => 1,
                    'items_wrap' => '%3$s'));
            ?>
            </ul>
        </div>
        <div class="footer clear">
            <div class="f-left">
                © <?php echo date("Y") ?> Direct Insite<br />
                <a href="http://www.facebook.com/DirectInsite" title="Facebook" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/facebook-icon.png" alt="Facebook" height="19" width="19" /></a>
                <a href="http://twitter.com/DirectInsite" title="Twitter" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/twitter-icon.png" alt="Twitter" height="19" width="19" /></a>
                <a href="http://www.linkedin.com/company/direct-insite" title="LinkedIn" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/linkedin-icon.png" alt="LinkedIn" height="19" width="19" /></a>
                <a href="http://directinsite.wordpress.com/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/wordpress-icon.png" alt="Blog" height="19" width="19" /></a>                
                <a href="about-us/investor-relations/" title="Investor Relations"><img src="<?php bloginfo('template_url'); ?>/img/di-social-icon.png" alt="Investor Relations" height="19" width="19" /></a>			                <a href="direct-insite-intro-video" title="Direct Insite Intro Video"><img src="<?php bloginfo('template_url'); ?>/img/youtube-icon.png" alt="Direct Insite Intro Video" height="19" width="19" /></a>
            </div>
            <div class="f-center">
                Direct Insite, Inc. 13450 W. Sunrise Blvd. Suite 510 Sunrise, Florida 33323<br />
                Telephone: +1-631-873-2900  Fax: +1-631-563-8085<br />
              <a href="mailto:info@directinsite.com">info@directinsite.com</a></div>
      <div class="f-right">
                <a target="_blank" title="AlertSite - Web Site Monitoring, Server Monitoring, Security Vulnerability Scanning, Web Load Testing" href="https://www.alertsite.com/security_seal/verify/www.directinsite.com/"><img width="128" vspace="0" hspace="0" height="54" border="0" align="top" title="AlertSite is a leading provider of web site monitoring and performance management solutions that help businesses ensure optimum web experiences for their customers." alt="AlertSite is a leading provider of web site monitoring and performance management solutions that help businesses ensure optimum web experiences for their customers." src="http://www.alertsite.com/security_seal/get/www.directinsite.com/2.png"></a>
            </div>
        </div>
    </div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

</body>
</html>