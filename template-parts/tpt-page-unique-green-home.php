<?php
/*
 * Template Name: Unique Green - Home
 * Template Post Type: page
 */

get_header(); ?>


<?php 
$tpt_uniquegreen_home_logo = get_field("tpt_uniquegreen_home_logo");
$tpt_uniquegreen_home_logo_mobile = get_field("tpt_uniquegreen_home_logo_mobile");
$tpt_uniquegreen_home_video_mp4 = get_field("tpt_uniquegreen_home_video_mp4");
$tpt_uniquegreen_home_video_webm = get_field("tpt_uniquegreen_home_video_webm");
$tpt_uniquegreen_home_video_ogg = get_field("tpt_uniquegreen_home_video_ogg");
$tpt_uniquegreen_home_video_3gp = get_field("tpt_uniquegreen_home_video_3gp");
$tpt_uniquegreen_home_video_play = get_field("tpt_uniquegreen_home_video_play");
$tpt_uniquegreen_home_video_url = get_field("tpt_uniquegreen_home_video_url");
$tpt_uniquegreen_home_chat_txt = get_field("tpt_uniquegreen_home_chat_txt");
$tpt_uniquegreen_home_email_txt = get_field("tpt_uniquegreen_home_email_txt");
$tpt_uniquegreen_home_whats_txt = get_field("tpt_uniquegreen_home_whats_txt");
$tpt_uniquegreen_home_phone_txt = get_field("tpt_uniquegreen_home_phone_txt");
$tpt_uniquegreen_home_corretor_txt = get_field("tpt_uniquegreen_home_corretor_txt");
$tpt_uniquegreen_home_chat_icon = get_field("tpt_uniquegreen_home_chat_icon");
$tpt_uniquegreen_home_email_icon = get_field("tpt_uniquegreen_home_email_icon");
$tpt_uniquegreen_home_whats_icon = get_field("tpt_uniquegreen_home_whats_icon");
$tpt_uniquegreen_home_phone_icon = get_field("tpt_uniquegreen_home_phone_icon");
$tpt_uniquegreen_home_corretor_icon = get_field("tpt_uniquegreen_home_corretor_icon");
$tpt_uniquegreen_banner_titulo = get_field("tpt_uniquegreen_banner_titulo");
$tpt_uniquegreen_banner_subtitulo = get_field("tpt_uniquegreen_banner_subtitulo");
$tpt_uniquegreen_banner_video_show = get_field("tpt_uniquegreen_banner_video_show");
$tpt_uniquegreen_banner_img = get_field("tpt_uniquegreen_banner_img");
$num_tel = get_field("num_ligacao_telefone",311);
$count = 0;
$c = 0;
if( have_rows('tpt_uniquegreen_home_menu_itens') ):
	while ( have_rows('tpt_uniquegreen_home_menu_itens') ) : the_row();
		$url_page = "";
		$menu_uniquegreen_itens[$count]['titulo'] = get_sub_field("tpt_uniquegreen_home_menu_item_titulo");
		$titulo_pai = get_sub_field("tpt_uniquegreen_home_menu_item_titulo");
		$menu_uniquegreen_itens[$count]['has_sub'] = get_sub_field("tpt_uniquegreen_home_menu_has_sub");
		$url_page = get_sub_field("tpt_uniquegreen_home_menu_item_url");
		$menu_uniquegreen_itens[$count]['url'] = get_permalink($url_page);
		if( have_rows('tpt_uniquegreen_home_menu_subitens') ):
			while ( have_rows('tpt_uniquegreen_home_menu_subitens') ) : the_row();
				$menu_uniquegreen_subitens[$c]['titulo_pai'] = $titulo_pai;
				$menu_uniquegreen_subitens[$c]['titulo'] = get_sub_field("tpt_uniquegreen_home_menu_subitem_titulo");
				$url_sub_item = get_sub_field("tpt_uniquegreen_home_menu_subitem_url");
				$menu_uniquegreen_subitens[$c]['url'] = get_permalink($url_sub_item);
				$c ++;
			endwhile;
		endif;
		$count ++;
	endwhile;
endif;


global $string_whats;

// ID para Chat Online
$current_post_type = get_post_type();
if($current_post_type == "imovel"){
	$id_chat_param = get_the_ID();
}
else{
	$id_chat_param = "geral";
}
?>



<div class="container-fluid wrapper-imovel uniquegreen p-0">


	<div class="wrapper-menu-interacao">
		<div class="container-fluid menu-interacao menu-interacao-uniquegreen">
			<div class="container wrapper-inner menu-interacao-mobile d-block d-md-none d-sm-block fixed-bottom">
				<div class="row">

					<div class="col-3 col-sm-3 mi-item mi-item-chat d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
								<img src="<?php echo $tpt_uniquegreen_home_chat_icon; ?>" alt="Chat"><br>
								<b><?php echo $tpt_uniquegreen_home_chat_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-email d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
								<img src="<?php echo $tpt_uniquegreen_home_email_icon; ?>" alt="E-mail"><br>
								<b><?php echo $tpt_uniquegreen_home_email_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-whats d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
								<img src="<?php echo $tpt_uniquegreen_home_whats_icon; ?>" alt="WhatsApp"><br>
								<b><?php echo $tpt_uniquegreen_home_whats_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-tel d-flex align-items-center justify-content-center">
						<div type="button">
							<a class="mi-tel" href="tel:<?php echo $num_tel; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
								<img src="<?php echo $tpt_uniquegreen_home_phone_icon; ?>" alt="Telefone"><br>
								<b><?php echo $tpt_uniquegreen_home_phone_txt; ?></b>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid menu-interacao menu-interacao-uniquegreen fixed-top p-0">

			<!-- Menu contato: Desktop -->
			<div class="container wrapper-inner-menu-interacao-uniquegreen d-none d-sm-none d-md-block">

				<div class="row d-flex justify-content-end">

					<div class="mi-item mi-item-chat">
						<div type="button">
							<a class="mi-chat" href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
								<b><?php echo $tpt_uniquegreen_home_chat_txt; ?></b>
								<img src="<?php echo $tpt_uniquegreen_home_chat_icon; ?>" alt="Chat">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-email">
						<div type="button">
							<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
								<b><?php echo $tpt_uniquegreen_home_email_txt; ?></b>
								<img src="<?php echo $tpt_uniquegreen_home_email_icon; ?>" alt="E-mail">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-whats">
						<div type="button">
							<a href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
								<b><?php echo $tpt_uniquegreen_home_whats_txt; ?></b>
								<img src="<?php echo $tpt_uniquegreen_home_whats_icon; ?>" alt="WhatsApp">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-tel">
						<div type="button">
							<a class="mi-tel" href="tel:<?php echo $num_tel; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
								<b><?php echo $tpt_uniquegreen_home_phone_txt; ?></b>
								<img src="<?php echo $tpt_uniquegreen_home_phone_icon; ?>" alt="Telefone">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-corretor">
						<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
							<img src="<?php echo $tpt_uniquegreen_home_corretor_icon; ?>" alt="Fale com um Consultor">
							<b><?php echo $tpt_uniquegreen_home_corretor_txt; ?></b>
						</a>
					</div>

				</div>
			</div>
		</div>



		<div class="wrapper-geral wrapper-geral-menu-uniquegreen fixed-top">
			<div class="wrapper-inner-menu-uniquegreen">
				<a href="<?php echo get_permalink(); ?>" class="logo-uniquegreen"><img class="logo-uniquegreen-img" src="<?php echo $tpt_uniquegreen_home_logo; ?>" alt="Unique Green"></a>
				<a href="<?php echo get_permalink(); ?>" class="logo-uniquegreen-mobile"><img class="logo-uniquegreen-img-mobile" src="<?php echo $tpt_uniquegreen_home_logo_mobile; ?>" alt="Unique Green"></a>
				<div class="btn-corretor-mobile">
					<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
						<b><?php echo $tpt_uniquegreen_home_corretor_txt; ?></b>
					</a>
				</div>
				<div class="wrapper-menu-uniquegreen">
					<nav class="navbar navbar-uniquegreen navbar-expand-md">
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
					    <span class="navbar-toggler-icon">
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    </span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
					    <div class="navbar-nav navbar-nav-uniquegreen d-flex align-items-center justify-content-center">
					    	<?php
					    	$conta_drop = 0;
					    	foreach($menu_uniquegreen_itens as $i){
								if($i["has_sub"] == 1){
									echo '
									<div class="nav-item nav-item-uniquegreen dropdown">
								        <a class="nav-link nav-link-uniquegreen dropdown-toggle" href="#" id="navbarDropdown' . $conta_drop . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          ' . $i["titulo"] . '
								        </a>
								        <div class="dropdown-menu dropdown-menu-uniquegreen" aria-labelledby="navbarDropdown' . $conta_drop . '">';
								        foreach($menu_uniquegreen_subitens as $subi){
								        	if($subi["titulo_pai"] === $i["titulo"]){
								        		echo '
									        	<a class="menu-uniquegreen-dropdown-item dropdown-item" href="' . $subi["url"] . '">' . $subi["titulo"] . '</a>
									        	';
								        	}
								        }
								        echo '	
								        </div>
							      	</div>
									';
								}
								else{
									echo '
										<div class="nav-item nav-item-uniquegreen">
									        <a class="nav-link nav-link-uniquegreen" href="' . $i["url"] . '">' . $i["titulo"] . '</a>
									    </div>
									';
								}
								$conta_drop ++;
							}
							?>
							<div class="nav-item nav-item-uniquegreen">
							    <a class="nav-link nav-link-uniquegreen" href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">CONTATO</a>
							</div>
					    </div>
					  </div>
					</nav>
				</div>
			</div>
		</div>
	</div>




	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="wrapper-geral wrapper-geral-h-videopreview">
				<div class="wrapper-1920">
					<div class="wrapper-inner-h-videopreview">
						<div class="wrapper-videopreview">
							<div class="video-review-video-container">
								<video class="videopreview-video" autoplay loop muted width='100%' height='100%' playsinline>
									<source src="<?php echo $tpt_uniquegreen_home_video_mp4; ?>" type=video/mp4>
									<source src="<?php echo $tpt_uniquegreen_home_video_webm; ?>" type="video/webm">
									<source src="<?php echo $tpt_uniquegreen_home_video_3gp; ?>" type=video/3gp>
									<source src="<?php echo $tpt_uniquegreen_home_video_ogg; ?>" type=video/ogg> 
								</video>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php // Seção Projeto
			$tpt_uniquegreen_home_projeto_titulo = get_field("tpt_uniquegreen_home_projeto_titulo");
			$tpt_uniquegreen_home_projeto_desc = get_field("tpt_uniquegreen_home_projeto_desc");
			$tpt_uniquegreen_home_projeto_img_detalhe = get_field("tpt_uniquegreen_home_projeto_img_detalhe");
			?>
			<div class="wrapper-geral wrapper-geral-uniquegreen-home">
				<div class="wrapper-1920 uniquegreen-apresentacao" style="background-image:url(<?php echo $tpt_uniquegreen_home_projeto_img_detalhe; ?>);">
					<div class="wrapper-inner">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-3 col-12"></div>
								<div class="col-xl-9 col-12">
									<h2 class="apresentacao-info-titulo"><?php echo $tpt_uniquegreen_home_projeto_titulo; ?></h2>
									<div class="wrap-inner-content-projeto">
										<p class="apresentacao-info-desc projeto"><?php echo $tpt_uniquegreen_home_projeto_desc; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php // Seção Região
			$tpt_uniquegreen_home_regiao_titulo = get_field("tpt_uniquegreen_home_regiao_titulo");
			$tpt_uniquegreen_home_regiao_chamada = get_field("tpt_uniquegreen_home_regiao_chamada");
			$tpt_uniquegreen_home_regiao_btn_icon = get_field("tpt_uniquegreen_home_regiao_btn_icon");
			$tpt_uniquegreen_home_regiao_btn_img = get_field("tpt_uniquegreen_home_regiao_btn_img");
			$tpt_uniquegreen_home_regiao_img_mobile = get_field("tpt_uniquegreen_home_regiao_img_mobile");
			$tpt_uniquegreen_home_regiao_img = get_field("tpt_uniquegreen_home_regiao_img");
			$tpt_uniquegreen_home_regiao_btn_url = get_field("tpt_uniquegreen_home_regiao_btn_url");
			?>
			<div class="wrapper-geral wrapper-geral-uniquegreen-home-regiao" style="background-image:url(<?php echo $tpt_uniquegreen_home_regiao_img; ?>);">
				<div class="wrapper-inner-uniquegreen-home-regiao">
					<div class="container-fluid container-regiao">
						<div class="row">
							<div class="wrap-artdesign-txt col-xl-8 col-12">
								<div class="wrap-txt-regiao">
									<h2 class="apresentacao-info-titulo"><?php echo $tpt_uniquegreen_home_regiao_titulo; ?></h2>
									<p class="apresentacao-info-chamada"><?php echo $tpt_uniquegreen_home_regiao_chamada; ?></p>
								</div>
							</div>
							<div class="col-xl-2 col-12">
								<a href="<?php echo $tpt_uniquegreen_home_regiao_btn_url; ?>">
									<img class="btn-regiao" src="<?php echo $tpt_uniquegreen_home_regiao_btn_img; ?>" alt="Região">
								</a>
							</div>
							<img class="img-regiao-mobile img-fluid" src="<?php echo $tpt_uniquegreen_home_regiao_img_mobile; ?>">
						</div>
					</div>
				</div>
			</div>

			<?php // Seção Tourmaline
			$tpt_uniquegreen_tourmaline_logo = get_field("tpt_uniquegreen_tourmaline_logo");
			$tpt_uniquegreen_tourmaline_box = get_field("tpt_uniquegreen_tourmaline_box");
			$tpt_uniquegreen_tourmaline_chamada = get_field("tpt_uniquegreen_tourmaline_chamada");
			$tpt_uniquegreen_tourmaline_btn_img = get_field("tpt_uniquegreen_tourmaline_btn_img");
			$tpt_uniquegreen_tourmaline_btn_url = get_field("tpt_uniquegreen_tourmaline_btn_url");
			$tpt_uniquegreen_tourmaline_img = get_field("tpt_uniquegreen_tourmaline_img");
			?>
			<div class="wrapper-geral wrapper-geral-uniquegreen-home-imovel tourmaline-bg">
				<div class="wrapper-1920">
					<div class="wrapper-inner-uniquegreen-home-imovel">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-9 col-12 imagem">
									<img class="img-fluid" src="<?php echo $tpt_uniquegreen_tourmaline_img; ?>" alt="tourmaline">
								</div>
								<div class="col-xl-3 col-12 d-flex align-items-center">
									<div class="box-info">
										<img class="img-logo" src="<?php echo $tpt_uniquegreen_tourmaline_logo; ?>" alt="tourmaline">
										<div class="box"><?php echo $tpt_uniquegreen_tourmaline_box; ?></div>
										<hr class="barra">
										<div class="chamada"><?php echo $tpt_uniquegreen_tourmaline_chamada; ?></div>
										<a href="<?php echo $tpt_uniquegreen_tourmaline_btn_url; ?>">
											<img src="<?php echo $tpt_uniquegreen_tourmaline_btn_img; ?>" alt="Saiba Mais">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php // Seção emerald
			$tpt_uniquegreen_emerald_logo = get_field("tpt_uniquegreen_emerald_logo");
			$tpt_uniquegreen_emerald_box = get_field("tpt_uniquegreen_emerald_box");
			$tpt_uniquegreen_emerald_chamada = get_field("tpt_uniquegreen_emerald_chamada");
			$tpt_uniquegreen_emerald_btn_img = get_field("tpt_uniquegreen_emerald_btn_img");
			$tpt_uniquegreen_emerald_btn_url = get_field("tpt_uniquegreen_emerald_btn_url");
			$tpt_uniquegreen_emerald_img = get_field("tpt_uniquegreen_emerald_img");
			?>
			<div class="wrapper-geral wrapper-geral-uniquegreen-home-imovel emerald-bg">
				<div class="wrapper-1920">
					<div class="wrapper-inner-uniquegreen-home-imovel">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-3 col-12 d-flex align-items-center">
									<div class="box-info">
										<img class="img-logo" src="<?php echo $tpt_uniquegreen_emerald_logo; ?>" alt="emerald">
										<div class="box"><?php echo $tpt_uniquegreen_emerald_box; ?></div>
										<hr class="barra">
										<div class="chamada"><?php echo $tpt_uniquegreen_emerald_chamada; ?></div>
										<a href="<?php echo $tpt_uniquegreen_emerald_btn_url; ?>">
											<img src="<?php echo $tpt_uniquegreen_emerald_btn_img; ?>" alt="Saiba Mais">
										</a>
									</div>
								</div>
								<div class="col-xl-9 col-12 imagem">
									<img class="img-fluid" src="<?php echo $tpt_uniquegreen_emerald_img; ?>" alt="emerald">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php
			// Seção Mapa
			$map = get_field("mapa");
			?>
				<div class="wrapper-geral wrapper-geral-uniquegreen-regiao">
					<div class="wrapper-map">
						<?php echo $map; ?>
					</div>
					<style>
						.wrapper-map iframe {
							width: 100% !important;
						}
					</style>
				</div>



			<?php // Seção Contato 
			// Captura informações do CMS
			$imovel_id = 484;
			$titulo_contato = get_field("tpt_uniquegreen_home_contato_titulo");
			$subtitulo_contato = get_field("tpt_uniquegreen_home_contato_subtitulo");
			?>
			<div class="wrapper-geral wrapper-geral-uniquegreen-contato">
				<div class="container wrapper-inner wrapper-contato-body contato-form pt-0 pb-0">
					<div class="wrapper-contato-content">
						<form name="emailForm" id="emailForm" data-target="ws-produto" data-isintegrado=true method="post" action="#">
							<input type="hidden" name="idEmpreendimento" id="idEmpreendimento" value="<?php echo $imovel_id; ?>" id="utm_source">
							<input type="hidden" name="idForm" value="3" />

							<div class="contato-content-header">
								<div class="contato-content-title">
									<h2 class="titulo-section-uniquegreen"><?php echo $titulo_contato; ?></h2>
									<div class="titulo-detalhe-uniquegreen"></div>
									<p class="contato-uniquegreen-subtitulo"><?php echo $subtitulo_contato; ?></p>
								</div>
								<div class="contato-content-title-separator"></div>
							</div>

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
								<div class="form-group uniquegreen-pbrigatorios">
									<small class="form-text text-message-required">
										* Campos de preenchimento obrigatório. 
									</small>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>



	    	<?php // FOOTER
			$tpt_uniquegreen_footer_address = get_field("tpt_uniquegreen_footer_address");
			$tpt_uniquegreen_footer_copyright = get_field("tpt_uniquegreen_footer_copyright");
			$tpt_uniquegreen_home_footer_ri = get_field("tpt_uniquegreen_home_footer_ri");
			$logo = wp_get_attachment_url(get_field("logo_topo",311));
			?>
			<div class="wrapper-geral wrapper-geral-footer-uniquegreen">
				<div class="wrapper-inner-uniquegreen">
					<hr class="hr-divisor-footer-uniquegreen">
					<div class="wrapper-inner wrapper-inner-footer-uniquegreen">
						<div class="container-fluid">
							<div class="row">
								<div class="logo-ez-footer-uniquegreen col-xl-4 col-lg-4 col-12">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<img src="<?php echo $logo; ?>" alt="Eztec">
									</a>
								</div>
								<div class="text-footer-uniquegreen col-xl-8 col-lg-8 col-12">
									<p class="address-footer-uniquegreen"><?php echo $tpt_uniquegreen_footer_address; ?></p>
									<p class="copyright-footer-uniquegreen"><?php echo $tpt_uniquegreen_footer_copyright; ?></p>
								</div>
								<div class="footer-ri col-12">
									<p><?php echo $tpt_uniquegreen_home_footer_ri; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>







		</main>
	</div>
</div> <!-- wrapper-imovel -->

<!-- Modal: Contato E-mail -->
<?php get_template_part( 'template-parts/forms/mi-produto', 'page' ); ?>
<!-- Modal: Contato Whatsapp -->
<?php get_template_part( 'template-parts/forms/mi-whats', 'page' ); ?>
<!-- Modal: Chat Online -->
<?php
$shortcode_chat = '[mi_chat imovel_id="0" chat_id="' . $id_chat_param . '"]';
echo do_shortcode($shortcode_chat);
?>



<?php
get_footer();