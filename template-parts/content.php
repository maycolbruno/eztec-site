<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eztec
 */

$categorias = get_the_category();
$total_cats = count($categorias);
?>
<style>
	.wrapper-cta-contato {
		display: none !important;
	}
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
	<div class="wrapper-geral wrapper-geral-blog">
		<div class="blog-main blog-main-post">

			<?php get_template_part( 'template-parts/blog/header-blog', 'page' ); ?>

			<div class="wrapper-blog-breadcrumb">
				<div class="container wrapper-inner wrapper-breadcrumb">
					<ul class="breadcrumb">
						<li class="link-breadcrumb"><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li class="separador-breadcrumb"> / </li>
						<li class="link-breadcrumb"><a href="<?php echo get_home_url() . '/blog'; ?>">Blog</a></li>
						<li class="separador-breadcrumb"> / </li>
						<li class="no-link-breadcrumb"><?php echo get_the_title(); ?></li>
					</ul>
				</div>
			</div>

			<div class="wrapper-inner">
				<div class="container-fluid">
					<div class="row wrapper-tags-social">
						<div class="col-12">
							<div class="post-status">
								
								<?php 
								$conta_cat = 1;
								foreach ($categorias as $i){
									echo $i->cat_name;
									if($total_cats !== $conta_cat){
										echo ", ";
									}
									$conta_cat ++;
								}
								?>
							</div>
							<h1 class="post-title">
								<?php echo get_the_title(); ?>
							</h1>
							<div class="post-date">
								<?php the_date("j");
								echo " de ";
								echo get_the_date("F");
								echo " de ";
								echo get_the_date("Y"); ?>

							</div>
							<div class="post-content">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-12">
							<div class="wrapper-tags">
								<?php the_tags($before="", $sep=""); ?>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-12">
							<div class="wrapper-sociais">
								<div class="sharing-text">Gostou? O que acha de compartilhar?</div>
								<?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				$post_blog_cta_show = get_field("post_blog_cta_show");
				if($post_blog_cta_show == 1){
					$post_blog_cta_txt = get_field("post_blog_cta_txt");
					$post_blog_cta_url = get_field("post_blog_cta_url");
					?>
					<section class="blog-cta wrapper-geral">
						<div class="wrapper-inner">
							<div class="container-fluid">
								<div class="row">
									<div class="section-cta-txt col-12">
										<p class="section-content-title"><?php echo $post_blog_cta_txt; ?></p>
									</div>
									<div class="section-cta-btn col-12">
										<a href="<?php echo $post_blog_cta_url; ?>">
											<div class="wrapper-btn-triangle">
										    	<button class="btn btn-primary btn-lg">SAIBA MAIS</button>
										    	<div class="triangle-top-right"></div>
										    </div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				<?php }	?>

				<div class="section-recomendados">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<p class="section-content-title text-left">VOCÊ PODE GOSTAR TAMBÉM</p>
								<div class="section-content-title-separator"></div>
							</div>
							<?php
							$blog_args = array(
						        'post_type' => 'post',
						        'post_status' => 'publish',
						        'order' => 'DESC',
						        'posts_per_page' => 3,
						    );
							$blog_query = new WP_Query( $blog_args );
							$conta_posts = 1;
							// The Loop
							if ( $blog_query->have_posts() ) {
							    while ( $blog_query->have_posts() ) {
							    	$blog_query->the_post();
							    	$img_id = get_post_thumbnail_id();
							    	$imagem = wp_get_attachment_metadata( $img_id, true );
									$upload_dir = wp_upload_dir();
									$path_img =  dirname($imagem["file"]);
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
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</article><!-- #post-<?php the_ID(); ?> -->
