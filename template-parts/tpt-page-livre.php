<?php
/*
 * Template Name: Livre
 * Template Post Type: page
 */


// Captura informações do CMS
$show_banner = 0;
$show_banner = get_field("show_banner");
$show_breadcrumb = 0;
$show_breadcrumb = get_field("show_breadcrumb");
$conteudo = "";
$conteudo = get_field("conteudo");

get_header();

?>

<div class="wrapper-geral wrapper-geral-livre">

	<header class="wrapper-banner">
		<?php
			// Monta cabeçalho de banner
			if($show_banner == 1){
				get_template_part( 'template-parts/header/banner', 'page' );
			}

			// Monta breadcrumb
			if($show_breadcrumb == 1){
				get_template_part( 'template-parts/header/breadcrumb', 'page' );
			}	
		?>
	</header>

	<section class="wrapper-inner livre">
		<?php
		if($conteudo !== ""){
			echo '<div class="livre-content">' . $conteudo . '</div>';
		}
		?>
	</section>

</div>


<?php
get_footer();  ?>