<?php
/*
 * Template Name: Imóvel - Produto
 * Template Post Type: imovel
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/produto/produto', 'page' );

			endwhile;
			?>

		</main>
	</div>

<?php
get_footer();
