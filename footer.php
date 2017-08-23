<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kxxx
 */

?>

    </div><!-- row -->
	</div><!-- #container -->


    <footer class="footer" id="kxxx-footer">
        <div class="container">
            <div class="row footer-top">
                <div class="col-sm-12 col-lg-12 center-block">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kxxx' ) ); ?>"><?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Proudly powered by %s', 'kxxx' ), 'WordPress' );
                        ?></a>
                    <span class="sep"> | </span>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'kxxx' ), 'kxxx', '<a href="https://automattic.com/">Jerry</a>' );
                    ?>
                </div>
            </div>
        </div>
    </footer>


</div><!-- #page -->

<?php wp_footer(); ?>


<!-- Baidu 统计-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8a184dc7b7274513d5a932478a4bdb1f";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>


</body>
</html>
