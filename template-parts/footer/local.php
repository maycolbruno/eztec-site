<?php



// Bloco de localização para o rodapé


	// Captura as informações do CMS (Contidas em Componentes / Rodapé - aba Localização)
	$nome_sede = get_field("nome_ro_box_sede",310);
	$endereco_sede = get_field("txt_ro_endereco_sede",310);
	$link_google_maps_sede = get_field("txt_ro_link_google_maps_sede",310);
	$icon_sede = wp_get_attachment_url(get_field("icone_ro_endereco_sede",310));

	$nome_empresa = get_field("nome_ro_box_empresa_vendas",310);
	$endereco_empresa = get_field("txt_ro_empresa_vendas",310);
	$link_google_maps_vendas = get_field("txt_ro_link_google_maps_vendas",310);
	$icon_empresa = wp_get_attachment_url(get_field("icone_ro_empresa_vendas",310));

	$nome_vendas = get_field("nome_ro_box_tel_vendas",310);
	$icon_vendas = wp_get_attachment_url(get_field("icone_ro_telefone_vendas",310));
	$telefones = array();
	$cont_tel = 0;
	if( have_rows('ro_telefones',310) ):
		while ( have_rows('ro_telefones',310) ) : the_row();
			$telefones[$cont_tel]['txt'] = get_sub_field("txt_ro_num_telefone");
			$telefones[$cont_tel]['num'] = get_sub_field("num_ro_telefone");
			$cont_tel ++;
		endwhile;
	endif;
?>

<section class="container-fluid section-footer-local">
	<div class="wrapper-inner">
		<div class="wrap-localizacao-footer">
			<div class="sociais-footer row">
				<div class="vendas-local vendas-local-desk col-lg-3 col-md-6 col-12">
					<p class="nome-local-footer"><?php echo $nome_vendas; ?></p>
					<?php
					$cont_tel = 0;
					foreach ($telefones as $tel){
						echo '<a href="tel:' . $tel["num"] . '" class="link-footer">
								<p class="footer-item-contato-tel">' . $tel["txt"] . '</p>
								</a>';
						$cont_tel ++;
					}
					?>
				</div>
				<div id="accordionFooterContato" class="vendas-local vendas-local-mobile col-lg-3 col-md-6 col-12">
				  <div class="card">
				    <div class="" id="headingFooterContato">
				        <div class="" data-toggle="collapse" data-target="#collapseFooterContato" aria-expanded="true" aria-controls="collapseFooterContato">
				          <div class="wrapper-titlulo-footer-contato d-flex justify-content-between">
				          	<p class="nome-local-footer"><?php echo $nome_vendas; ?></p>
				          	<i class="seta-footer-contato" id="SetaFooterContato" aria-hidden="true"></i>
				          </div>
				          <div class="divisor-contato-footer"></div>
				        </div>
				    </div>

				    <div id="collapseFooterContato" class="collapse" aria-labelledby="headingFooterContato" data-parent="#accordionFooterContato">
				      <div class="">
				        <?php
						$cont_tel = 0;
						foreach ($telefones as $tel){
							echo '<a href="tel:' . $tel["num"] . '" class="link-footer">
									<p class="footer-item-contato-tel">' . $tel["txt"] . '</p>
									</a>';
							$cont_tel ++;
						}
						?>
				      </div>
				    </div>
				    <script>
				    	$('#collapseFooterContato').on('show.bs.collapse', function () {
						  document.getElementById("SetaFooterContato").style.transform = "rotate(225deg)";
						  document.getElementById("SetaFooterContato").style.marginTop = "40px";
						})
						$('#collapseFooterContato').on('hide.bs.collapse', function () {
						  document.getElementById("SetaFooterContato").style.transform = "rotate(45deg)";
						  document.getElementById("SetaFooterContato").style.marginTop = "30px";
						})
				    </script>
				  </div>
				</div>
				<div class="sede-local col-lg-3 col-md-6 col-12">
					<p class="nome-local-footer"><?php echo $nome_sede; ?></p>
					<a class="endereco-local-footer" href="<?php echo $link_google_maps_sede; ?>" target="_blank" rel="noopener">
						<p><?php echo $endereco_sede; ?></p>
					</a>
				</div>
				<div class="empresa-local col-lg-3 col-md-6 col-12">
					<p class="nome-local-footer"><?php echo $nome_empresa; ?></p>
					<a class="endereco-local-footer" href="<?php echo $link_google_maps_vendas; ?>" target="_blank" rel="noopener">
						<p><?php echo $endereco_empresa; ?></p>
					</a>
				</div>
				<div class="sociais-local col-lg-3 col-md-6 col-12">
					<p class="nome-local-footer sociais-no-border"><?php echo get_field("footer_fl_redes_sociais_titulo",310); ?></p>
					<ul class="sociais-footer-lista list-unstyled list-inline">
						<?php
						if( have_rows('redes_sociais',310) ):
							while ( have_rows('redes_sociais',310) ) : the_row();
								$mostrar_social = get_sub_field('show_ro_rede_social');
								$image_alt = get_post_meta( get_sub_field('icone_ro_rede_social_fl'), '_wp_attachment_image_alt', true);
								if ($mostrar_social == 1){
									echo '<li class="social-footer-item list-inline-item">
											<a href="' . get_sub_field('url_ro_rede_social') . '" target="_blank" rel="noopener">
												<img src="' . wp_get_attachment_url(get_sub_field('icone_ro_rede_social_fl')) . '" alt="' . $image_alt . '">
											</a>
										  </li>';
								}
							endwhile;
						endif;
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>