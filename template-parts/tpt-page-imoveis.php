<?php
/*
 * Template Name: Imóveis
 * Template Post Type: page
 */



get_header();

$show_apenas_comerciais = get_field("show_apenas_comerciais");

if($show_apenas_comerciais == 1){
	get_template_part( 'template-parts/imoveis/comerciais', 'page' );	
}
else{
	get_template_part( 'template-parts/imoveis/imoveis', 'page' );
}

get_footer();  ?>