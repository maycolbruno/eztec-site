<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Eztec
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container-fluid wrapper-busca-simples p-0">

				<header class="wrapper-banner">
					<?php
					// Monta cabeçalho de banner
					get_template_part( 'template-parts/header/banner-busca-simples', 'page' );

					// Monta breadcrumb
					get_template_part( 'template-parts/header/breadcrumb-busca-simples', 'page' );
					?>
				</header><!-- .page-header -->

				<div class="container wrapper-inner busca-simples">


					<?php if ( have_posts() ) { ?>
						<div class="row">
							<div class="col-12">
								<p class="busca-simples-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Resultados para: %s', 'eztec' ), '<span>' . get_search_query() . '</span>' );
									?>
								</p>
							</div>
						</div>

						<div class="row">
							<div class="col-12 wrapper-imovel pt-0">
							<div class="container wrapper-inner wrapper-imovel-content">
								<div class="row imovel-resulta-busca">
									<div class="col-12">
										<div class="row imovel-item">
											<?php
											/* Start the Loop */
											$valida_post_type = 0;
											$rtb_house_array = array();
											$count_rtb_house_array = 0;
											while ( have_posts() ) : the_post();

												/**
												 * Run the loop for the search to output the results.
												 * If you want to overload this in a child theme then include a file
												 * called content-search.php and that will be used instead.
												 */
												$tipo_de_post = get_post_type();
												if($tipo_de_post === "imovel" | $tipo_de_post === "campanha"){
													get_template_part( 'template-parts/content', 'search' );
													$valida_post_type ++;
													if($tipo_de_post === "imovel"){
														$id_produto = get_field("imovel_id");
														$rtb_house_array[$count_rtb_house_array] = $id_produto;
														$count_rtb_house_array ++;
													}
												}
											endwhile;
											if ($valida_post_type === 0){
												echo '
												<div class="col-12 wrapper-imovel pt-0">
													<p class="busca-simples-title">';
														get_template_part( 'template-parts/content', 'none' );
													echo '</p>
												</div>
												';						
											}
											$rtb_string = "";
											foreach($rtb_house_array as $rtb){
												if ($rtb !== ""){
													$rtb_string .= $rtb;
													$rtb_string .= ",";
												}
											}
											$rtb_string = substr($rtb_string, 0, -1);
											echo '
											<iframe src="//us.creativecdn.com/tags?id=pr_tCSAS4wYI5FdWBCdovLP_listing_' . $rtb_string . '" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>
											';
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="row">
							<div class="col-12 wrapper-imovel pt-0">
								<p class="busca-simples-title">
									<?php get_template_part( 'template-parts/content', 'none' ); ?>
								</p>
							</div>
						</div>
					<?php } ?>

				</div>

			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
