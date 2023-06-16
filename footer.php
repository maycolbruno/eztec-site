<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eztec
 */

?>

	</div><!-- #content -->


	<?php 
	// Esconde header para páginas específicas
	$disallow_footer = 0;
	$disallow_footer = get_field("disallow_footer");
	$page_busca = is_search();
		if($page_busca == TURE){
			$disallow_footer = 0;
		}
	if ($disallow_footer == 0){
	?>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
			// bloco newsletter para o rodapé
			if (get_field("show_newsletter",310) == 1){
				get_template_part( 'template-parts/footer/newsletter', 'page' );
			}

			// bloco localização para o rodapé
			if (get_field("show_ro_localizacao",310) == 1){
				get_template_part( 'template-parts/footer/local', 'page' );
			}

			// bloco copyright e menu para o rodapé
			if (get_field("show_ro_copyright",310) == 1){
				get_template_part( 'template-parts/footer/menu-footer', 'page' );
			}

			// bloco desenvolvedor para o rodapé
			if (get_field("show_ro_institucional",310) == 1){
				get_template_part( 'template-parts/footer/institucional', 'page' );
			}

			// bloco desenvolvedor para o rodapé
			if (get_field("show_ro_dev",310) == 1){
				get_template_part( 'template-parts/footer/desenvolvedor', 'page' );
			}

			// RTB House
			get_template_part( 'template-parts/footer/rtb-house', 'page' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php } ?>

	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
