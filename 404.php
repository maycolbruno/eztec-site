<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Eztec
 */

// Página 404

// Captura informações genéricas do CMS
$msg_404 = get_field("no-results",1977);
$titulo_section = get_field("titulo_secao",1977);
$mostrar_sugestoes = get_field("show_session",1977);


// Captura informações específicas deste layout
$count = 0;
if( have_rows('itens_sugestao',1977) ):
	while ( have_rows('itens_sugestao',1977) ) : the_row();
		$sugest[$count]['titulo'] = get_sub_field("titulo_item_sugestao");
		$sugest[$count]['subtitulo'] = get_sub_field("subtitulo_item_sugestao");
		$sugest[$count]['status'] = get_sub_field("status_item_sugestao");
		$sugest[$count]['bg_status'] = get_sub_field("bg_color_status_item_sugestao");
		$sugest[$count]['txt_superior'] = get_sub_field("txt_info_superior_sugestao");
		$sugest[$count]['txt_inferior'] = get_sub_field("txt_info_inferior_sugestao");
		$sugest[$count]['url'] = get_sub_field("url_item_sugestao");
		$sugest[$count]['call'] = get_sub_field("txt_call_item");
		$sugest[$count]['img'] = get_sub_field("image_item_sugestao");
		$count ++;
	endwhile;
endif;

get_header();
?>



	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container-fluid wrapper-error-404 p-0">

				<header class="wrapper-banner">
					<?php
					// Monta cabeçalho de banner
					get_template_part( 'template-parts/header/banner-404', 'page' );

					// Monta breadcrumb
					get_template_part( 'template-parts/header/breadcrumb-404', 'page' );
					?>
				</header><!-- .page-header -->

				<section class="container wrapper-inner error-404">

					<div class="row error-404-section error-404-mensagem">
						<div class="col-12">
							<p><?php echo $msg_404; ?></p>
						</div>
					</div>

					<div class="row error-404-section error-404-sugestoes">
						<div class="col-12">
							<div class="row">
								<div class="col-12">
									<div class="section-content-header">
										<h2 class="section-content-title text-left"><?php echo $titulo_section; ?></h2>
										<div class="section-content-title-separator"></div>
									</div>
								</div>
							</div>
							<div class="row error-404-sugestoes-box">
								<?php
								$n = 1;
								foreach($sugest as $item){
									echo '
										<div class="error-404-sugestoes-item col-sm-12 col-md-4">
											<div class="row d-flex justify-content-center">
												<div class="section-item-box col-8 col-sm-6 col-md-11 p-0">
													<a href="' . $item["url"] . '">
														<div class="section-item-img d-flex justify-content-center align-items-center">
															<img class="img-fluid w-100" src="' . wp_get_attachment_url($item["img"]) . '" alt="' . get_post_meta( $item["img"], "_wp_attachment_image_alt", true) . '">
															<div class="section-over d-flex justify-content-center align-items-center flex-column">
																<p>' . $item["txt_superior"] . '</p>
																<p>' . $item["txt_inferior"] . '</p>
															</div>
															<div class="section-status-box w-100 d-flex justify-content-center position-absolute">
																<div class="section-status" style="background-color: '. $item["bg_status"] . ';">
																	' . $item["status"] . '
																</div>
															</div>
														</div>
														<div class="section-item-txt d-flex justify-content-center align-items-center flex-column">
															<p>' . $item["titulo"] . '</p>
															<h3>' . $item["subtitulo"] . '</h3>
															<small>' . $item["call"] . '</small>
														</div>
													</a>
												</div>
											</div>
										</div>
									';
									$n++;
								}
								?>
							</div>
						</div>
					</div>

				</section>

			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
