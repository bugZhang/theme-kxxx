<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kxxx
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-3 hidden-sm hidden-xs">
    <div class="kxxx-sidbar affix">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</div>