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

    $frequency = 2;
    $firstShow = false;
    if($n == 0 && $firstShow){
        echo kxxx_get_pc_index_ad();
    }else if($n > $frequency && $n % $frequency == 0){
        echo kxxx_get_pc_index_ad();
    }

}

function kxxx_get_pc_index_ad(){
    $n = rand(0,2);
    $ads = array(
        //华为广告
        '<a href="https://c.duomai.com/track.php?site_id=70635&lid=866092&aid=387&euid=首页推广&t=https%3A%2F%2Fwww.vmall.com%2F" target="_blank"><img border="0" src="http://www.duomai.com/Public/Uploads/2017-05-31/1496207626/9617996eaab070a978be2deb5ad4d473.jpg" alt="【华为商城】nova2/nova2 puls 高颜值 爱自拍" /></a>',

        //京东橱窗广告
        '<script type="text/javascript">var jd_union_unid="1000349370",jd_ad_ids="506:6",jd_union_pid="CJfCycDhKxC6vYDdAxoAILC+mdcDKgA=";var jd_width=760;var jd_height=90;var jd_union_euid="";var p="ChsOVR1cFQQWNwpfBkgyTUMIRmtKRk9aZV8ETVxNNwpfBkgyFAEceyxNAGxlAxwFSVlwejJCPxMBcgtZK1MTChAEVhlZFzISBlQaWRAKEAFUK2tKRk9aZVA1FDJNQwhGaxUGEwVSHlgQAhIEXRprFDIiNw%3D%3D";</script><script type="text/javascript" charset="utf-8" src="//u-x.jd.com/static/js/auto.js"></script>',

        //京东旅行
        '<script type="text/javascript">var jd_union_pid="988178169";var jd_union_euid="";</script><script type="text/javascript" src="//ads-union.jd.com/static/js/union.js"></script>',

    );
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