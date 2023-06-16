<?php
/*
 * Template Name: Estilo EZ
 * Template Post Type: page
 */


// Captura informações do CMS
$id_chat_param = 522;

get_header();

?>

<style>
	.section-footer-newsletter{
		display: none !important;
	}
	.menu-geral {
		display: none !important;
	}
	.wrapper-box-cta-contato {
		display: none;
	}
	body{
		padding-top:151px !important;
	}
	@media (max-width: 767px) {
		body{
			padding-top:78px !important;
		}	
	}
</style>

<div class="wrapper-geral estiloez">

	<div class="wrapper-menu-interacao">
		

		<div class="container-fluid menu-interacao menu-interacao-pdc fixed-top p-0">

			<!-- Menu contato: Desktop -->
			<div class="container wrapper-inner-menu-interacao-pdc d-none d-sm-none d-md-block">

				<div class="row d-flex justify-content-end">

					<div class="mi-item mi-item-chat">
						<div type="button">
							<a class="mi-chat" href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
								<b>CHAT</b>
								<img src="https://www.eztec.com.br/wp-content/uploads/imoveis/ez-infinity/header/icon-chat-branco.png" alt="Chat">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-email">
						<div type="button">
							<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
								<b>E-MAIL</b>
								<img src="https://www.eztec.com.br/wp-content/uploads/imoveis/ez-infinity/header/icon-email-branco.png" alt="E-mail">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-whats">
						<div type="button">
							<a href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
								<b>WHATS</b>
								<img src="https://www.eztec.com.br/wp-content/uploads/imoveis/ez-infinity/header/icon-whats-branco.png" alt="WhatsApp">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-tel">
						<div type="button">
							<a class="mi-tel" href="tel:01150568308" onclick="dataLayer.push({'event': 'telefone_vendas'})">
								<b>5056-8308</b>
								<img src="https://www.eztec.com.br/wp-content/uploads/imoveis/ez-infinity/header/icon-tel-branco.png" alt="Telefone">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-corretor">
						<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
							<img src="https://www.eztec.com.br/wp-content/uploads/imoveis/unique-green/assets/icon-corretor.png" alt="Fale com um Consultor">
							<b>FALE COM UM CONSULTOR</b>
						</a>
					</div>

				</div>
			</div>
		</div>



		<div class="wrapper-geral wrapper-geral-menu-pdc fixed-top">
			<div class="wrapper-inner-menu-pdc d-flex justify-content-between">
				<img class="logo-pdc-img" src="https://www.eztec.com.br/wp-content/uploads/campanhas/estilo-ez/logo-estilo-ez.png" alt="Estilo EZ">
				<div class="btn-corretor-mobile">
					<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
						<b>FALE COM UM CONSULTOR</b>
					</a>
				</div>
				<div class="wrapper-menu-pdc">
					<nav class="navbar navbar-pdc navbar-expand-md">
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
					    <span class="navbar-toggler-icon">
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    </span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
					    <div class="navbar-nav navbar-nav-pdc d-flex align-items-center justify-content-center">
							<div class="nav-item nav-item-pdc text-center">
							    <a class="nav-link nav-link-pdc" href="#Imoveis">IMÓVEIS</a>
							</div>
							<div class="nav-item nav-item-pdc text-center">
							    <a class="nav-link nav-link-pdc" href="#Centrais">CENTRAIS DE ATENDIMENTO</a>
							</div>
							<div class="nav-item nav-item-pdc text-center">
							    <a class="nav-link nav-link-pdc" href="#Contato">CONTATO</a>
							</div>
					    </div>
					  </div>
					</nav>
				</div>
			</div>
		</div>
	</div>


	<?php
	$video_mp4 = get_field("video_mp4");
	$video_webm = get_field("video_webm");
	$video_ogv = get_field("video_ogv");
	$video_3gp = get_field("video_3gp");
	$video_url = get_field("video_url");
	?>

	<div class="wrapper-geral wrapper-geral-h-videopreview">
		<div class="wrapper-inner-h-videopreview">
			<div class="wrapper-videopreview">
				<div class="video-preview-txt-container">
					<img class="play-pdc-banner" data-toggle="modal" data-target="#modalVideoHeader" src="https://www.eztec.com.br/wp-content/uploads/imoveis/parque-da-cidade/home/play.png">
				</div>
				<div class="video-review-video-container">
					<video class="videopreview-video" autoplay loop muted width='100%' height='100%' playsinline>
						<source src="<?php echo $video_webm; ?>" type="video/webm">
						<source src="<?php echo $video_mp4; ?>" type=video/mp4>
						<source src="<?php echo $video_3gp; ?>" type=video/3gp>
						<source src="<?php echo $video_ogg; ?>" type=video/ogg> 
					</video>
				</div>
			</div>
		</div>
	</div>

	<?php // Modal de Vídeo para o Header ?>
	<div class="modal fade" id="modalVideoHeader" tabindex="-1" role="dialog" aria-labelledby="modalVideoHeader" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-content-video-pdc">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
				<div class="modal-body mt-5 mb-5 border-0">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe id="video-modal" class="embed-responsive-item" src="<?php echo $video_url; ?>?rel=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>




	<?php
	$apresentacao_img = get_field("apresentacao_img");
	$apresentacao_conteudo = get_field("apresentacao_conteudo");
	?>

	<div class="wrapper-geral wrapper-geral-apresentacao">
		<div class="wrapper-inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-5 col-lg-5 col-12 text-center">
						<img class="img-fluid img-apresentacao" src="<?php echo $apresentacao_img; ?>">
					</div>
					<div class="col-xl-7 col-lg-7 col-12">
						<div class="contaudo-box">
							<?php echo $apresentacao_conteudo; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<?php
	$imoveis_titulo = get_field("imoveis_titulo");
	$imoveis_subtitulo = get_field("imoveis_subtitulo");
	$imoveis_btn_txt = get_field("imoveis_btn_txt");
	$imoveis_btn_url = get_field("imoveis_btn_url");
	$imoveis_itens = array();
	$imoveis = array();
	$imoveis_itens = get_field("imoveis_itens");
	$count = 0;
	foreach($imoveis_itens as $i){
		$imoveis[$count]["url"] = get_permalink($i);
		$imoveis[$count]["fase"] = get_field("imovel_fase",$i);
		$imoveis[$count]["dorms"] = get_field("imovel_dorms",$i);
		$imoveis[$count]["preco"] = get_field("imovel_preco",$i);
		$imoveis[$count]["regiao"] = get_field("imovel_regiao",$i);
		$imoveis[$count]["thumb"] = wp_get_attachment_url(get_field("img_qdo_relacionado",$i));
		$imoveis[$count]["box"] = get_field("box_qdo_relacionado",$i);
		$imoveis[$count]["status"] = get_field("status_qdo_relacionado",$i);
		$imoveis[$count]["bairro"] = get_field("bairro_qdo_relacionado",$i);
		$imoveis[$count]["titulo"] = get_field("nome_qdo_relacionado",$i);
		$count ++;
	}
	?>

	<div id="Imoveis" class="wrapper-geral wrapper-geral-imoveis">
		<div class="wrapper-inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 imoveis-info text-center">
						<div class="imoveis-titulo"><?php echo $imoveis_titulo; ?></div>
						<div class="imoveis-subtitulo"><?php echo $imoveis_subtitulo; ?></div>
					</div>

					<?php 
					foreach($imoveis as $i){
						$titulo_para_whats = strtoupper($i["titulo"]);
						echo '
						<div class="imovel-item col-xl-4 col-lg-4 col-md-6 col-12">
							<div class="wrap-imovel-item">
								<div class="imovel-thumb">
									<img class="thumb-img img-fluid" src="' . $i["thumb"] . '" alt="' . $i["titulo"] . '" title="' . $i["titulo"] . '">
									<div class="imovel-status">' . $i["status"] . '</div>
									<div class="imovel-box-info">
										<div class="imovel-titulo">' . $i["titulo"] . '</div>
										<div class="imovel-bairro">' . $i["bairro"] . '</div>
										<div class="imovel-box">' . $i["box"] . '</div>
									</div>
								</div>
								<div class="whats-cta">
									<a class="d-flex justify-content-between" href="' . $string_whats . '-' . $titulo_para_whats . "-" . '" rel="noopener" target="_blank">
										<div class="cta-whats-txt">FALE COM UM CORRETOR</div>
										<img src="https://www.eztec.com.br/wp-content/uploads/2023/01/icon-whats.png" alt="WhatsApp" title="WhatsApp">
									</a>
								</div>
								<a class="imovel-cta" href="' . $i["url"] . '">
									SAIBA MAIS
								</a>
							</div>
						</div>
						';
					}
					?>

					<div class="col-12 imoveis-btn text-center">
						<a href="<?php echo $imoveis_btn_url; ?>" class="imoveis-btn btn btn-primary"><?php echo $imoveis_btn_txt; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$central_titulo = get_field("central_titulo");
	$central_subtitulo = get_field("central_subtitulo");
	$central_video_url = get_field("central_video_url");
	$count = 1;
	if( have_rows('central_itens') ):
		while ( have_rows('central_itens') ) : the_row();
			$centrais[$count]['titulo'] = get_sub_field("titulo");
			$centrais[$count]['endereco'] = get_sub_field("endereco");
			$count ++;
		endwhile;
	endif;
	?>

	<div id="Centrais" class="wrapper-geral wrapper-geral-centrais">
		<div class="wrapper-inner wrapper-inner-estilo">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="estiloez-titulo"><?php echo $central_titulo; ?></div>
						<div class="divisor-estiloez"></div>
						<div class="estiloez-subtitulo"><?php echo $central_subtitulo; ?></div>
					</div>
					<?php
					foreach($centrais as $i){
						echo '
						<div class="central-item col-xl-6 col-md-6 col-12">
							<div class="central-titulo">' . $i["titulo"] . '</div>
							<div class="central-endereco">' . $i["endereco"] . '</div>
						</div>
						';
					}
					?>
					<div class="central-video col-12">
						<div class="embed-responsive embed-responsive-16by9">
						  <iframe class="embed-responsive-item" src="<?php echo $central_video_url; ?>"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$contato_titulo = get_field("contato_titulo");
	$contato_subtitulo = get_field("contato_subtitulo");
	?>

	<div id="Contato" class="wrapper-geral wrapper-geral-contato">
		<div class="wrapper-inner wrapper-inner-estilo">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="estiloez-titulo"><?php echo $contato_titulo; ?></div>
						<div class="divisor-estiloez"></div>
						<div class="estiloez-subtitulo"><?php echo $contato_subtitulo; ?></div>
					</div>
					<div class="col-12">
						<div class="wrap-form-contato">
							<form name="emailForm" id="emailForm" data-target="ws-produto" data-isintegrado=true method="post" action="#">
								<input type="hidden" name="idEmpreendimento" id="idEmpreendimento" value="<?php echo $id_chat_param; ?>" id="utm_source">
								<input type="hidden" name="idForm" value="3" />

								<div class="contato-content-body">

									<div class="form-group">
										<label for="nome">Nome*</label>
										<input type="text" class="form-control" name="nome" id="nome">
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="email">E-mail*</label>
											<input type="email" class="form-control" name="email" id="email">
										</div>
										<div class="form-group col-3 col-sm-2">
											<label for="ddd">Telefone*</label>
											<input type="text" class="form-control" name="ddd" id="ddd" alt="ddd" maxlength="2" autocomplete="off">
										</div>
										<div class="form-group col-9 col-sm-10 col-md-4">
											<label for="fone">&nbsp;</label>
											<input type="text" class="form-control" name="fone" id="fone" alt="fone" maxlength="10" autocomplete="off">
										</div>
									</div>
									<div class="form-group">
										<label for="mensagem">Mensagem*</label>
										<textarea class="form-control" name="mensagem" id="mensagem" rows="7"></textarea>
									</div>
									<div class="form-group">
										<div class="form-check">
											<label class="form-check-label d-flex align-items-center">
												<input class="form-check-input" name="info" value="on" type="checkbox">Desejo receber mais informações sobre a EZTEC e seus empreendimentos.
											</label>
										</div>
									</div>
									<div class="form-group">
										<div class="form-privacidade">
											<?php echo get_field("msg_privacidade",311); ?>
										</div>
									</div>
								</div>

								<div class="contato-content-footer">
									<div class="form-row">
										<div class="form-group col-12">
											<button type="submit" class="form-control btn btn-primary" id="btnEnviar">ENVIAR</button>
										</div>
									</div>
									<div class="form-group pdc-pbrigatorios">
										<small class="form-text text-message-required">
											*Campos obrigatórios
										</small>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Modal: Contato E-mail -->
<?php get_template_part( 'template-parts/forms/mi-produto', 'page' ); ?>
<!-- Modal: Contato Whatsapp -->
<?php get_template_part( 'template-parts/forms/mi-whats', 'page' ); ?>
<!-- Modal: Chat Online -->
<?php
$shortcode_chat = '[mi_chat imovel_id="0" chat_id="' . $id_chat_param . '"]';
echo do_shortcode($shortcode_chat);


get_footer();  ?>