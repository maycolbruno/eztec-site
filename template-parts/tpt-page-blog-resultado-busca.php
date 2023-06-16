<?php
/*
 * Template Name: Blog-Resultado de Busca
 * Template Post Type: page
 */

get_header();

?>
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
			<?php
			// Monta breadcrumb
			get_template_part( 'template-parts/header/breadcrumb', 'page' );
			?>
		</div>

		<section class="section-blog-posts wrapper-geral">
			<div class="wrapper-inner">
				<div class="container-fluid">
					<div class="row">
						<?php
						if (isset($_GET['termo'])) {
						    $termos_busca = $_GET['termo'];
							$blog_args = array(
						        'post_type' => 'post',
						        'post_status' => 'publish',
						        'order' => 'DESC',
						        's' => $termos_busca,
						    );
							$blog_query = new WP_Query( $blog_args );
							$conta_posts = 1;
							// The Loop
							echo '
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<p>Resultados de busca para: ' . $termos_busca . '</p>
									</div>
								</div>
							</div>';
							if ( $blog_query->have_posts() ) {
							    while ( $blog_query->have_posts() ) {
							    	$blog_query->the_post();
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
							    }
							}
						} 
						else {
						    echo '<p>Nenhum termo de busca utilizado.</p>';
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</section>
		


		<?php

		$blog_cta_fl_show = get_field("blog_cta_fl_show");
		if($blog_cta_fl_show == 1){
			$blog_cta_fl_txt = get_field("blog_cta_fl_txt");
			$blog_cta_fl_url = get_field("blog_cta_fl_url");
			$blog_cta_fl_txt_btn = get_field("blog_cta_fl_txt_btn");
			?>
			<section class="blog-cta wrapper-geral">
				<div class="wrapper-inner">
					<div class="container-fluid">
						<div class="row">
							<div class="section-cta-txt col-xl-9 col-lg-9 col-md-9 col-12">
								<p class="section-content-title text-left"><?php echo $blog_cta_fl_txt; ?></p>
								<div class="section-content-title-separator"></div>
							</div>
							<div class="section-cta-btn col-xl-3 col-lg-3 col-md-3 col-12">
								<a href="<?php echo $blog_cta_fl_url; ?>">
									<div class="wrapper-btn-triangle">
								    	<button class="btn btn-primary btn-lg" href="<?php echo $blog_cta_fl_url; ?>"><?php echo $blog_cta_fl_txt_btn; ?></button>
								    	<div class="triangle-top-right"></div>
								    </div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php }	?>

	</div>

</div>


<?php
get_footer();  ?>