<?php
// Seção Relacionados da página de produto
//
//
// Captura informações do CMS
$titulo_rel = get_field("imovel_titulo_relacionados");
$rel_pages = get_field("produtos_recomendados");

?>

<section id="relacionados" class="container-fluid wrapper-imovel wrapper-imovel-relacionados">
	<div class="container wrapper-inner imovel-relacionados">
		<div class="row">
			<div class="col-12">
				<div class="section-content-header">
					<h2 class="section-content-title"><?php echo $titulo_rel; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
			</div>
		</div>
		<div class="row rel-imovel d-flex justify-content-center">
			<?php
			foreach ($rel_pages as $page) {
				echo '
					<div class="rel-imovel-item col-xl-4 col-lg-4 col-12">
						<div class="row d-flex justify-content-center">
							<div class="rel-imovel-item-box col-12">
								<a href="' . get_permalink($page) . '">
									<div class="rel-imovel-item-img">
										<img class="img-fluid" src="' . wp_get_attachment_url(get_field("img_qdo_relacionado",$page)) . '" alt="' . get_post_meta( get_field('img_qdo_relacionado',$page), '_wp_attachment_image_alt', true) . '">
										<div class="rel-imovel-status">
											<span>' . get_field("status_qdo_relacionado",$page) . '</span>
										</div>
										<div class="rel-imovel-item-txt">
											<h3 class="qdo-rel-nome">' . get_field("nome_qdo_relacionado",$page) . '</h3>
											<p class="qdo-rel-bairro">' . get_field("bairro_qdo_relacionado",$page) . '</p>
											<p class="qdo-rel-box">' . get_field("box_qdo_relacionado",$page) . '</p>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>';
			}
			?>
		</div>
	</div>
</section>