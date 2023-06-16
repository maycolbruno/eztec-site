<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eztec
 */

get_header(); ?>
<style>
	.wrapper-cta-contato {
		display: none !important;
	}
</style>
<div class="wrapper-geral wrapper-geral-blog">

	<div class="blog-main">

		<?php
		// Monta cabçalho de banner
		get_template_part( 'template-parts/blog/header-blog', 'page' );
		?>


		<div class="wrapper-blog-breadcrumb">
			<div class="container wrapper-inner wrapper-breadcrumb">
				<ul class="breadcrumb">
					
					<li class="link-breadcrumb"><a href="<?php echo get_home_url(); ?>">Home</a></li>
					<li class="separador-breadcrumb"> / </li>
					<li class="link-breadcrumb"><a href="<?php echo get_home_url() . '/blog'; ?>">Blog</a></li>
					<li class="separador-breadcrumb"> / </li>
					<li class="no-link-breadcrumb"><?php echo single_cat_title(); ?></li>
							
				</ul>
			</div>
		</div>

		<section class="section-blog-posts wrapper-geral">
			<div class="wrapper-inner">
				<div class="container-fluid">
					<div class="row">
					<?php
					if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							$img_id = get_post_thumbnail_id();
					    	$imagem = wp_get_attachment_metadata( $img_id, true );
							$upload_dir = wp_upload_dir();
							$path_img =  dirname($imagem["file"]);
							$img_url_820 = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["820x537"]["file"];
							$img_url_400 = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["400x262"]["file"];


					    	$categorias = wp_get_post_categories(get_the_id());
					    	$total_categorias = count($categorias);
					    	$count = 0;
					    	$categorias_itens = array();
					    	$lista_de_categorias = "";
					    	foreach($categorias as $i){
					    		$categorias_itens[$count]["titulo"] = get_cat_name($i);
					    		$count ++;
					    	}
					    	$conta = 1;
					    	foreach($categorias_itens as $i){
					    		$lista_de_categorias = $lista_de_categorias . $i["titulo"];
					    		if($total_categorias > $conta ){
					    			$lista_de_categorias = $lista_de_categorias . ", ";
					    		}
					    		$conta ++;
					    	}
					    	
				    		echo '
				    		<div class="blog-post-item col-xl-4 col-lg-4 col-md-6 col-12">
				    			<a href="' . get_permalink() . '">
					    			<div class="blog-page-item">
						    			<img class="img-fluid" src="' . $img_url_400 . '" alt="' . get_the_title() . '"	/>
						    			<div class="blog-page-item-categorias">' . $lista_de_categorias . '</div>
										<h2 class="blog-page-item-titulo">' . get_the_title() . '</h2>
									</div>
								</a>
				    		</div>
				    		';
					        $conta_posts ++;

						endwhile;

						echo '
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">';
								$args_pag = array();
					            $args_pag['prev_text'] = 'PRÓXIMO';
					            $args_pag['next_text'] = 'ANTERIOR';
					            $args_pag['screen_reader_text'] = '';
					            $args_pag['aria_label'] = '';
					            $args_pag['class'] = 'cat-posts-navigation';
								echo get_the_posts_navigation($args_pag);
								echo '
								</div>
							</div>
						</div>
						';

					endif; ?>

	</div>
</div>

<?php
get_footer();
