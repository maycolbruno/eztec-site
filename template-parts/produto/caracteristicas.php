<?php
// Seção Características da página de produto
//
//
// Captura informações do CMS
$chamada_carac = get_field("imovel_chamada_caracteristicas");
$desc_carac = get_field("imoveis_desc_caracteristicas");
$logo_carac = get_field("imoveis_logo_caracteristicas_fl");

$usar_preco = get_field("usar_imovel_preco_produto_caracteristicas");

$box_carac = get_field("imovel_box_produto_caracteristicas");
$mostrar_fachada = get_field("mostrar_fachada");
$show_vertical_carac = get_field("usar_fachada_vertical");
$fachada_vertical = get_field("fachada_vertical_xl");
$show_horizontal_carac = get_field("usar_fachada_horizontal");
$fachada_horizontal = get_field("fachada_horizontal_xl");
$item_imovel_id = get_the_ID();
$count = 1;
if( have_rows('itens_de_caracteristicas') ):
	while ( have_rows('itens_de_caracteristicas') ) : the_row();
		$caracteristicas[$count]['txt'] = get_sub_field("titulo_caracteristica");
		$caracteristicas[$count]['icon'] = get_sub_field("icone_caracteristica");
		$count ++;
	endwhile;
endif;
$data_entrega = get_field("data_entrega");
$icon_status = get_field("imovel_icone_status");

?>

<section id="caracteristicas" class="wrapper-caracteristicas pb-0">
	<div class="container-fluid wrapper-imovel-caracteristicas p-0">
		<div class="container wrapper-inner imovel-caracteristicas">
			<div class="row caracteristicas-intro">
				<div class="col-xl-4 col-lg-4 col-12 wrap-imovel-logo">
					<div class="caracteristicas-description-img">
						<img class="img-fluid" src="<?php echo wp_get_attachment_url($logo_carac); ?>" alt="<?php echo get_the_title(); ?>"/>
					</div>
				</div>
				<div class="col-xl-8 col-lg-8 col-12 wrap-imovel-box">
					<div class="imovel-box-de-produto"><?php echo $box_carac; ?></div>
					<div class="detalhe-titulo"></div>
					<div class="imovel-txt-entrega"><?php echo $data_entrega; ?></div>
				</div>
			</div>
		</div>
		<div class="wrapper-caracteristicas-diferenciais">
			<div class="container wrapper-inner imovel-caracteristicas">
				<?php if($mostrar_fachada == 1){ ?>
				<div class="row imovel-caracteristicas-fachada justify-content-md-center">
					<?php
					if ($show_vertical_carac == 1){
					?>
						<div class="imovel-caracteristicas-fachada-vertical col-12 d-flex justify-content-center">
							<div class="row w-100">
								<div class="img-fachada-vertical col-lg-7 col-md-12 d-flex d-md-block align-items-center">
									<img class="img-fluid" src="<?php echo wp_get_attachment_url($fachada_vertical); ?>" alt="<?php echo get_post_meta( $fachada_vertical, "_wp_attachment_image_alt", true); ?>"/>
								</div>
								<div class="col-lg-5 col-md-12">
									<div class="info-caracteristicas-vertical d-flex align-items-center">
										<div class="wrapper-info-caracteristicas">
											<div class="caracteristicas-chamada section-content-header">
												<h2 class="section-content-title"><?php echo $chamada_carac; ?></h2>
												<div class="section-content-title-separator"></div>
											</div>
											<div class="caracteristicas-description align-items-center flex-column">
												<div class="caracteristicas-description-text">
													<p><?php echo $desc_carac; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					if ($show_horizontal_carac == 1){
					?>
						<div class="imovel-caracteristicas-fachada-horizontal col-12">
							<div class="img-fachada-horizontal">
								<img class="img-fluid" src="<?php echo wp_get_attachment_url($fachada_horizontal); ?>" alt="<?php echo get_post_meta( $fachada_horizontal, "_wp_attachment_image_alt", true); ?>"/>
							</div>
							<div class="wrapper-info-caracteristicas">
								<div class="caracteristicas-chamada section-content-header">
									<h2 class="section-content-title"><?php echo $chamada_carac; ?></h2>
									<div class="section-content-title-separator"></div>
								</div>
								<div class="caracteristicas-description align-items-center flex-column">
									<div class="caracteristicas-description-text">
										<p><?php echo $desc_carac; ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="diferenciais-horizontal">
							<ul class="row list-unstyled">
							<?php
							foreach ($caracteristicas as $c){
								echo '
								<li class="diferencial-item d-flex align-items-center col-12 col-lg-4 col-md-6 col-sm-12">
									<div class="container">
										<div class="row d-flex align-items-center">
											<div class="col-2">
												<img src="' . wp_get_attachment_url($c["icon"]) . '" alt="' . get_post_meta( $c["icon"], "_wp_attachment_image_alt", true) . '">
											</div>
											<div class="col-10">
												<p>' . $c["txt"] . '</p>
											</div>
										</div>
									</div>
								</li>
								';
							}
							?>
							</ul>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>