<?php
// Seção Contato


// Captura informações do CMS
$titulo_contato = get_field("titulo_secao_contato");
$subtitulo_contato = get_field("subtitulo_secao_contato");
$instrucoes_contato = get_field("instrucoes_secao_contato");
$icone_contato_tel = wp_get_attachment_url(get_field("icone_telefone"));
$alt_icone_contato_tel = get_post_meta( get_field('icone_telefone'), '_wp_attachment_image_alt', true);
$titulo_tel_vendas = get_field("titulo_telefone_vendas");
$txt_tel_vendas = get_field("txt_n_telefone_vendas");
$num_tel_vendas = get_field("n_telefone_vendas");
$titulo_tel_pabx = get_field("titulo_telefone_pabx");
$txt_tel_pabx = get_field("txt_n_telefone_pabx");
$num_tel_pabx = get_field("n_telefone_pabx");
$titulo_tel_sac = get_field("titulo_telefone_sac");
$txt_tel_sac = get_field("txt_n_telefone_sac");
$num_tel_sac = get_field("n_telefone_sac");
$titulo_tel_atecnica = get_field("titulo_telefone_atecnica");
$txt_tel_atecnica = get_field("txt_n_telefone_atecnica");
$num_tel_atecnica = get_field("n_telefone_atecnica");
if( have_rows('itens_de_contato') ):
	while ( have_rows('itens_de_contato') ) : the_row();
		$contatos[$count]['titulo'] = get_sub_field("titulo_item_contato");
		$contatos[$count]['icone'] = wp_get_attachment_url(get_sub_field("icone_item_contato"));
		$contatos[$count]['alt'] = get_post_meta( get_sub_field('icone_item_contato'), '_wp_attachment_image_alt', true);
		$contatos[$count]['desc'] = get_sub_field("desc_item_contato");
		$contatos[$count]['url'] = get_sub_field("url_item_contato");
		$contatos[$count]['tem-link-externo'] = get_sub_field("usar_um_link_externo");
		$contatos[$count]['link-externo'] = get_sub_field("link_externo");
		$count ++;
	endwhile;
endif;
?>

<section id="contato" class="container-fluid wrapper-a-eztec-section wrapper-a-eztec-contato">
	<div class="container wrapper-inner a-eztec-contato">
		<div class="row">
			<div class="col-12">
				<div class="section-content-header d-flex align-items-center flex-column">
					<p class="section-content-title text-center"><?php echo $titulo_contato; ?></p>
					<div class="section-content-title-separator"></div>
				</div>

				<div class="row a-eztec-contato-intro">
					<div class="a-eztec-contato-intro-item a-eztec-contato-intro-text col-12 col-md-6 d-flex justify-content-center align-items-start flex-column">
						<span class="a-eztec-contato-intro-text-desc"><?php echo $subtitulo_contato; ?></span>
						<span class="a-eztec-contato-intro-text-instrucoes"><?php echo $instrucoes_contato; ?></span>
					</div>
					<div class="a-eztec-contato-intro-item a-eztec-contato-intro-contatos col-12 col-md-6 d-flex justify-content-center align-items-center">
						<div class="row d-flex justify-content-center align-items-center w-100">
							<div class="a-eztec-contato-intro-contatos-img col-2 text-right">
								<img src="<?php echo $icone_contato_tel; ?>" alt="<?php echo $alt_icone_contato_tel; ?>">
							</div>
							<div class="a-eztec-contato-intro-contatos-tels col-5">
								<p class="a-eztec-contato-intro-contatos-tels-text"><?php echo $titulo_tel_vendas; ?></p>
								<a class="a-eztec-contato-intro-contatos-tels-tel" onclick="dataLayer.push({'event': 'telefone_vendas'})" href="tel:<?php echo $num_tel_vendas; ?>"><?php echo $txt_tel_vendas; ?></a>
								<p class="a-eztec-contato-intro-contatos-tels-text"><?php echo $titulo_tel_pabx; ?></p>
								<a class="a-eztec-contato-intro-contatos-tels-tel" onclick="dataLayer.push({'event': 'telefone_pabx'})" href="tel:<?php echo $num_tel_pabx; ?>"><?php echo $txt_tel_pabx; ?></a>
							</div>
							<div class="a-eztec-contato-intro-contatos-tels col-5">
								<p class="a-eztec-contato-intro-contatos-tels-text"><?php echo $titulo_tel_sac; ?></p>
								<a class="a-eztec-contato-intro-contatos-tels-tel" onclick="dataLayer.push({'event': 'telefone_sac'})" href="tel:<?php echo $num_tel_sac; ?>"><?php echo $txt_tel_sac; ?></a>
								<p class="a-eztec-contato-intro-contatos-tels-text"><?php echo $titulo_tel_atecnica; ?></p>
								<a class="a-eztec-contato-intro-contatos-tels-tel" onclick="dataLayer.push({'event': 'telefone_atecnica'})" href="tel:<?php echo $num_tel_atecnica; ?>"><?php echo $txt_tel_atecnica; ?></a>
							</div>
						</div>
					</div>
				</div>

				<div class="row a-eztec-contato-box">
					<?php
						foreach($contatos as $contato){
							if($contato["tem-link-externo"] == 1){
								$url_contato = $contato["link-externo"];
								$contato_target = ' target="_blank" rel="noopener"';
							}
							else{
								$url_contato = $contato["url"];
								$contato_target = "";
							}
							$onclickCheck = ($contato["titulo"] == "JÁ SOU CLIENTE EZTEC") ? ' onclick="dataLayer.push({\'event\': \'contato_ja_sou_cliente\'})"' : '';
							echo '<div class="col-12 col-md-6">
										<a class="a-eztec-contato-box-item" ' . $onclickCheck . ' href="' . $url_contato . '"' . $contato_target . '>
											<div class="a-eztec-contato-box-item-icon d-flex justify-content-center align-items-center">
												<img src="' . $contato["icone"] . '" alt="' . $contato["alt"] . '">
											</div>
											<div class="a-eztec-contato-box-item-info">
												<h3 class="a-eztec-contato-box-item-info-titulo">' . $contato["titulo"] . '</h3>
												<p class="a-eztec-contato-box-item-info-desc">' . $contato["desc"] . '</p>
											</div>
										</a>
									</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>