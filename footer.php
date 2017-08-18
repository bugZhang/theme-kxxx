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

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"slide":{"type":"slide","bdImg":"5","bdPos":"right","bdTop":"100"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8a184dc7b7274513d5a932478a4bdb1f";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8912822468255347",
    enable_page_level_ads: true
  });
</script>

</body>
</html>
