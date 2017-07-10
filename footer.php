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
<!--            <div class="row footer-bottom">-->
<!--                <ul class="list-inline text-center">-->
<!--                    <li><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></li><li>京公网安备11010802014853</li>-->
<!--                </ul>-->
<!--            </div>-->
        </div>
    </footer>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
