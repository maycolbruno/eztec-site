<?php
/*
 * Template Name: Sitemap
 * Template Post Type: page
 */



get_header();

echo '<div class="wrapper-geral" style="margin-top:130px;">
		<div class="wrapper-inner">';
echo do_shortcode('[wp_sitemap_page]');
echo '</div></div>';

get_footer();  ?>