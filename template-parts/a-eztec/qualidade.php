<?php
// Seção Qualidade



// Captura informações do CMS
$titulo_qualidade = get_field("titulo_secao_qualidade");
$count = 0;
if( have_rows('itens_de_qualidade') ):
	while ( have_rows('itens_de_qualidade') ) : the_row();
		$qualidades[$count]['titulo'] = get_sub_field("titulo_item_qualidade");
		$qualidades[$count]['desc'] = get_sub_field("desc_item_qualidade");
		$count ++;
	endwhile;
endif;
$bg_quantidades = wp_get_attachment_url(get_field("bg_secao_quantidades"));
$titulo_res = get_field("titulo_residenciais_quantidades");
$qtde_res = get_field("qtde_residenciais_quantidades");
$icon_res = wp_get_attachment_url(get_field("icon_residenciais_quantidades"));
$alt_icon_res = get_post_meta( get_field('icon_residenciais_quantidades'), '_wp_attachment_image_alt', true);
$titulo_com = get_field("titulo_comerciais_quantidades");
$qtde_com = get_field("qtde_comerciais_quantidades");
$icon_com = wp_get_attachment_url(get_field("icon_comerciais_quantidades"));
$alt_icon_com = get_post_meta( get_field('icon_comerciais_quantidades'), '_wp_attachment_image_alt', true);
$titulo_qtde_call = get_field("titulo_call_to_action_quantidades");
$desc_qtde_call = get_field("desc_call_to_action_quantidades");
$txt_qtde_call = get_field("txt_btn_call_to_action_quantidades");
$url_qtde_call = get_field("pagina_de_imoveis");
?>

<section id="qualidade" class="container-fluid wrapper-a-eztec-section wrapper-a-eztec-qualidade">
	<div class="container wrapper-inner a-eztec-qualidade">
		<div class="row">
			<div class="col-12">
				<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
					<h2 class="section-content-title text-left"><?php echo $titulo_qualidade; ?></h2>
				</div>
				<div class="row">
					<?php
						foreach($qualidades as $qualidade){
							echo '<div class="a-eztec-qualidade-item col-12 col-md-6">
										<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
											<h3 class="section-content-pre-title text-left">' . $qualidade["titulo"] . '</h3>
											<div class="section-content-title-separator"></div>
										</div>
										<p class="a-eztec-qualidade-item-desc">' . $qualidade["desc"] . '</p>
									</div>';
						}
					?>
				</div>
				<?php
				// Bloco Quantidades
				if (get_field("show_quantidades") == 1): ?>
					<div class="row a-eztec-qualidade-wrap-qtdes-bg" style="background-image:url(<?php echo $bg_quantidades; ?>);">
						<div class="a-eztec-qualidade-wrap-qtdes-box col-12 col-lg-4 d-flex justify-content-center align-items-center">
							<div class="row a-eztec-qualidade-wrap-qtdes-item d-flex justify-content-center align-items-center">
								<div class="col-4 col-sm-5 text-right">
									<img src="<?php echo $icon_res; ?>" alt="<?php echo $alt_icon_res; ?>">
								</div>
								<div class="col-8 col-sm-7">
									<p class="a-eztec-qualidade-wrap-qtdes-item-qtda"><?php echo $qtde_res; ?></p>
									<p class="a-eztec-qualidade-wrap-qtdes-item-text"><?php echo $titulo_res; ?></p>
								</div>
							</div>
						</div>
						<div class="a-eztec-qualidade-wrap-qtdes-box col-12 col-lg-4 d-flex justify-content-center align-items-center">
							<div class="row a-eztec-qualidade-wrap-qtdes-item d-flex justify-content-center align-items-center">
								<div class="col-4 col-sm-5 text-right">
									<img src="<?php echo $icon_com; ?>" alt="<?php echo $alt_icon_com; ?>">
								</div>
								<div class="col-8 col-sm-7">
									<p class="a-eztec-qualidade-wrap-qtdes-item-qtda"><?php echo $qtde_com; ?></p>
									<p class="a-eztec-qualidade-wrap-qtdes-item-text"><?php echo $titulo_com; ?></p>
								</div>
							</div>
						</div>
						<div class="a-eztec-qualidade-wrap-qtdes-box col-12 col-lg-4 d-flex justify-content-center align-items-center">
							<div class="row a-eztec-qualidade-wrap-qtdes-item">
								<div class="col-12 a-eztec-qualidade-wrap-qtdes-item-call">
									<p class="a-eztec-qualidade-wrap-qtdes-item-call-titulo"><?php echo $titulo_qtde_call; ?></p>
									<p class="a-eztec-qualidade-wrap-qtdes-item-call-desc"><?php echo $desc_qtde_call; ?></p>
									<a class="btn btn-primary btn-lg" href="<?php echo $url_qtde_call; ?>">
										<?php echo $txt_qtde_call; ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>