<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Altadena
 * @since Altadena 1.0
 */
?>
</div><!-- main -->
<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
<div id="footer"><p id="copyright">&COPY; <?php echo date('Y'); ?> <?php bloginfo('title'); ?> All Rights Reserved</p></div>
</div><!-- container -->
</div><!-- border -->
</div><!-- page -->
<?php wp_footer(); ?>
</body>
</html>
<!-- end of html -->