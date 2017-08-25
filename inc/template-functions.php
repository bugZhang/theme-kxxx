<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package kxxx
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function kxxx_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'kxxx_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function kxxx_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'kxxx_pingback_header' );

/**
 * PC端广告展示
 * @param $n
 * @return string
 */
function kxxx_get_pc_index_ad_tpl($n){

    if(is_mobile()){
        return '';
    }

    $frequency = 3;
    $firstShow = false;
    if($n == 1 && $firstShow){
        echo kxxx_get_pc_index_ad();
    }else if($n > $frequency && $n % $frequency == 0){
        echo kxxx_get_pc_index_ad();
    }

}

function kxxx_get_pc_index_ad(){

    static $isShow = array();

    $ads = array(
        //华为广告
//        '<iframe marginwidth=\'0\' marginheight=\'0\' hspace=\'0\' frameborder=\'0\' scrolling=\'no\' src=\'http://c.duomai.com/show.php?site_id=70635&aid=387&lid=826149&euid=pc主页华为&short=\' width=\'990\' height=\'106\'></iframe>',

        //京东橱窗广告
        '<script type="text/javascript">var jd_union_unid="1000349370",jd_ad_ids="506:6",jd_union_pid="CJfCycDhKxC6vYDdAxoAILC+mdcDKgA=";var jd_width=760;var jd_height=90;var jd_union_euid="";var p="ChsOVR1cFQQWNwpfBkgyTUMIRmtKRk9aZV8ETVxNNwpfBkgyFAEceyxNAGxlAxwFSVlwejJCPxMBcgtZK1MTChAEVhlZFzISBlQaWRAKEAFUK2tKRk9aZVA1FDJNQwhGaxUGEwVSHlgQAhIEXRprFDIiNw%3D%3D";</script><script type="text/javascript" charset="utf-8" src="//u-x.jd.com/static/js/auto.js"></script>',

        //京东旅行
        '<script type="text/javascript">var jd_union_pid="988178169";var jd_union_euid="";</script><script type="text/javascript" src="//ads-union.jd.com/static/js/union.js"></script>',

        //京东数码
        '<script type="text/javascript">var jd_union_pid="988175208";var jd_union_euid="";</script><script type="text/javascript" src="//ads-union.jd.com/static/js/union.js"></script>',

        //京东生鲜
        '<script type="text/javascript">var jd_union_pid="988165187";var jd_union_euid="";</script><script type="text/javascript" src="//ads-union.jd.com/static/js/union.js"></script>',

        //京东奢侈品
        '<script type="text/javascript">var jd_union_pid="988184168";var jd_union_euid="";</script><script type="text/javascript" src="//ads-union.jd.com/static/js/union.js"></script>',

        //多麦 苏宁 最强8点
        '<iframe marginwidth=\'0\' marginheight=\'0\' hspace=\'0\' frameborder=\'0\' scrolling=\'no\' src=\'http://c.duomai.com/show.php?site_id=70635&aid=84&lid=106170&euid=pc主页&short=\' width=\'730\' height=\'123\'></iframe>',

        //多麦 苏宁 百货
        '<script type="text/javascript" language="javascript"> duomai_sid="32562"; duomai_site_id="70635";         duomai_aid="84"; duomai_lid="104343"; duomai_euid="苏宁百货pc主页"; duomai_w = "730"; duomai_h = "123"; duomai_short = ""; </script> <script type="text/javascript" language="javascript" src="http://www.duomai.com/statics/js/show.js"></script>',
    );

    $length = count($ads);
    $n = rand(0, $length - 1);
    if(in_array($n, $isShow)){
        $n = rand(0, $length - 1);
    }
    $isShow[] = $n;

    if(isset($ads[$n])){
        $ad = $ads[$n];
        $adHtml = '<div id="kxxx-pc-index-ad">';
        $adHtml .= $ad;
        $adHtml .= '</div>';
        $adHtml .= '<hr class="kxxx-line">';
        return $adHtml;
    }else{
        return '';
    }

}