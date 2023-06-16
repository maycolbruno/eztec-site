<?php
/*
 * Template Name: EZ Infinity - Obra
 * Template Post Type: page
 */

get_header(); ?>


<?php 

$imovel_ref = get_field("imovel_ref");

$imovel_id = get_field("imovel_id",$imovel_ref);

$tpt_infinity_banner_video_show = get_field("tpt_infinity_banner_video_show");
$tpt_infinity_video_mp4 = get_field("tpt_infinity_video_mp4");
$tpt_infinity_video_webm = get_field("tpt_infinity_video_webm");
$tpt_infinity_video_ogg = get_field("tpt_infinity_video_ogg");
$tpt_infinity_video_3gp = get_field("tpt_infinity_video_3gp");
$tpt_infinity_banner_titulo = get_field("tpt_infinity_banner_titulo");
$tpt_infinity_banner_subtitulo = get_field("tpt_infinity_banner_subtitulo");
$tpt_infinity_video_url = get_field("tpt_infinity_video_url");
$tpt_infinity_banner_img = get_field("tpt_infinity_banner_img");

$tpt_infinity_home_logo = get_field("tpt_infinity_home_logo",$imovel_ref);
$tpt_infinity_home_logo_mobile = get_field("tpt_infinity_home_logo_mobile",$imovel_ref);
$tpt_infinity_home_video_play = get_field("tpt_infinity_home_video_play",$imovel_ref);
$tpt_infinity_home_chat_txt = get_field("tpt_infinity_home_chat_txt",$imovel_ref);
$tpt_infinity_home_email_txt = get_field("tpt_infinity_home_email_txt",$imovel_ref);
$tpt_infinity_home_whats_txt = get_field("tpt_infinity_home_whats_txt",$imovel_ref);
$tpt_infinity_home_phone_txt = get_field("tpt_infinity_home_phone_txt",$imovel_ref);
$tpt_infinity_home_corretor_txt = get_field("tpt_infinity_home_corretor_txt",$imovel_ref);
$tpt_infinity_home_chat_icon = get_field("tpt_infinity_home_chat_icon",$imovel_ref);
$tpt_infinity_home_email_icon = get_field("tpt_infinity_home_email_icon",$imovel_ref);
$tpt_infinity_home_whats_icon = get_field("tpt_infinity_home_whats_icon",$imovel_ref);
$tpt_infinity_home_phone_icon = get_field("tpt_infinity_home_phone_icon",$imovel_ref);
$tpt_infinity_home_corretor_icon = get_field("tpt_infinity_home_corretor_icon",$imovel_ref);
$num_tel = get_field("num_ligacao_telefone",311);
$count = 0;
$c = 0;
if( have_rows('tpt_infinity_home_menu_itens',$imovel_ref) ):
	while ( have_rows('tpt_infinity_home_menu_itens',$imovel_ref) ) : the_row();
		$url_page = "";
		$menu_infinity_itens[$count]['titulo'] = get_sub_field("tpt_infinity_home_menu_item_titulo");
		$titulo_pai = get_sub_field("tpt_infinity_home_menu_item_titulo");
		$menu_infinity_itens[$count]['has_sub'] = get_sub_field("tpt_infinity_home_menu_has_sub");
		$url_page = get_sub_field("tpt_infinity_home_menu_item_url");
		$menu_infinity_itens[$count]['url'] = get_permalink($url_page);
		if( have_rows('tpt_infinity_home_menu_subitens') ):
			while ( have_rows('tpt_infinity_home_menu_subitens') ) : the_row();
				$menu_infinity_subitens[$c]['titulo_pai'] = $titulo_pai;
				$menu_infinity_subitens[$c]['titulo'] = get_sub_field("tpt_infinity_home_menu_subitem_titulo");
				$url_sub_item = get_sub_field("tpt_infinity_home_menu_subitem_url");
				$menu_infinity_subitens[$c]['url'] = get_permalink($url_sub_item);
				$c ++;
			endwhile;
		endif;
		$count ++;
	endwhile;
endif;

global $string_whats;

// ID para Chat Online
$id_chat_param = get_the_ID($imovel_ref);
?>
<div class="container-fluid wrapper-imovel infinity infinity-obra p-0">


	<div class="wrapper-menu-interacao">
		<div class="container-fluid menu-interacao menu-interacao-infinity">
			<div class="container wrapper-inner menu-interacao-mobile d-block d-md-none d-sm-block fixed-bottom">
				<div class="row">

					<div class="col-3 col-sm-3 mi-item mi-item-chat d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
								<img src="<?php echo $tpt_infinity_home_chat_icon; ?>" alt="Chat"><br>
								<b><?php echo $tpt_infinity_home_chat_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-email d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
								<img src="<?php echo $tpt_infinity_home_email_icon; ?>" alt="E-mail"><br>
								<b><?php echo $tpt_infinity_home_email_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-whats d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
								<img src="<?php echo $tpt_infinity_home_whats_icon; ?>" alt="WhatsApp"><br>
								<b><?php echo $tpt_infinity_home_whats_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-tel d-flex align-items-center justify-content-center">
						<div type="button">
							<a class="mi-tel" href="tel:<?php echo $num_tel; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
								<img src="<?php echo $tpt_infinity_home_phone_icon; ?>" alt="Telefone"><br>
								<b><?php echo $tpt_infinity_home_phone_txt; ?></b>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid menu-interacao menu-interacao-infinity fixed-top p-0">

			<!-- Menu contato: Desktop -->
			<div class="container wrapper-inner-menu-interacao-infinity d-none d-sm-none d-md-block">

				<div class="row d-flex justify-content-end">

					<div class="mi-item mi-item-chat">
						<div type="button">
							<a class="mi-chat" href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
								<b><?php echo $tpt_infinity_home_chat_txt; ?></b>
								<img src="<?php echo $tpt_infinity_home_chat_icon; ?>" alt="Chat">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-email">
						<div type="button">
							<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
								<b><?php echo $tpt_infinity_home_email_txt; ?></b>
								<img src="<?php echo $tpt_infinity_home_email_icon; ?>" alt="E-mail">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-whats">
						<div type="button">
							<a href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
								<b><?php echo $tpt_infinity_home_whats_txt; ?></b>
								<img src="<?php echo $tpt_infinity_home_whats_icon; ?>" alt="WhatsApp">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-tel">
						<div type="button">
							<a class="mi-tel" href="tel:<?php echo $num_tel; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
								<b><?php echo $tpt_infinity_home_phone_txt; ?></b>
								<img src="<?php echo $tpt_infinity_home_phone_icon; ?>" alt="Telefone">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-corretor">
						<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
							<img src="<?php echo $tpt_infinity_home_corretor_icon; ?>" alt="Fale com um Consultor">
							<b><?php echo $tpt_infinity_home_corretor_txt; ?></b>
						</a>
					</div>

				</div>
			</div>
		</div>



		<div class="wrapper-geral wrapper-geral-menu-infinity fixed-top">
			<div class="wrapper-inner-menu-infinity">
				<a href="<?php echo get_permalink($imovel_ref); ?>" class="logo-infinity"><img class="logo-infinity-img" src="<?php echo $tpt_infinity_home_logo; ?>" alt="Parque da Cidade"></a>
				<a href="<?php echo get_permalink($imovel_ref); ?>" class="logo-infinity-mobile"><img class="logo-infinity-img-mobile" src="<?php echo $tpt_infinity_home_logo_mobile; ?>" alt="Parque da Cidade"></a>
				<div class="btn-corretor-mobile">
					<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
						<b><?php echo $tpt_infinity_home_corretor_txt; ?></b>
					</a>
				</div>
				<div class="wrapper-menu-infinity">
					<nav class="navbar navbar-infinity navbar-expand-md">
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
					    <span class="navbar-toggler-icon">
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    	<div class="navbar-toggler-icon-detalhe"></div>
					    </span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
					    <div class="navbar-nav navbar-nav-infinity d-flex align-items-center justify-content-center">
					    	<?php
					    	$conta_drop = 0;
					    	foreach($menu_infinity_itens as $i){
								if($i["has_sub"] == 1){
									echo '
									<div class="nav-item nav-item-infinity dropdown">
								        <a class="nav-link nav-link-infinity dropdown-toggle" href="#" id="navbarDropdown' . $conta_drop . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          ' . $i["titulo"] . '
								        </a>
								        <div class="dropdown-menu dropdown-menu-infinity" aria-labelledby="navbarDropdown' . $conta_drop . '">';
								        foreach($menu_infinity_subitens as $subi){
								        	if($subi["titulo_pai"] === $i["titulo"]){
								        		echo '
									        	<a class="menu-infinity-dropdown-item dropdown-item" href="' . $subi["url"] . '">' . $subi["titulo"] . '</a>
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
										<div class="nav-item nav-item-infinity">
									        <a class="nav-link nav-link-infinity" href="' . $i["url"] . '">' . $i["titulo"] . '</a>
									    </div>
									';
								}
								$conta_drop ++;
							}
							?>
							<div class="nav-item nav-item-infinity">
							    <a class="nav-link nav-link-infinity" href="https://www.eztec.com.br/wp-content/uploads/imoveis/ez-infinity/downloads/folder-ez-infinity-1.pdf" target="_blank">BOOK</a>
							</div>
							<div class="nav-item nav-item-infinity">
							    <a class="nav-link nav-link-infinity" href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">CONTATO</a>
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

	    	<?php if($tpt_infinity_banner_video_show == 1){ ?>
				<div class="wrapper-geral wrapper-geral-h-videopreview">
					<div class="wrapper-inner-h-videopreview">
						<div class="wrapper-videopreview">
							<div class="video-preview-txt-container">
								<div class="wrap-titulo-banner-infinity">
									<h1 class="videopreview-titulo infinity-obra"><?php echo $tpt_infinity_banner_titulo; ?><div class="detalhe-titulo-infinity"></div></h1>
								</div>
								<p class="videpreview-chamada"><?php echo $tpt_infinity_banner_subtitulo; ?></p>
								<img class="play-infinity-banner" data-toggle="modal" data-target="#modalVideoHeader" src="<?php echo $tpt_infinity_home_video_play; ?>">
							</div>
							<div class="video-review-video-container">
								<video class="videopreview-video" autoplay loop muted>
									<source src="<?php echo $tpt_infinity_video_mp4; ?>" type=video/mp4>
									<source src="<?php echo $tpt_infinity_video_webm; ?>" type="video/webm">
					    			<source src="<?php echo $tpt_infinity_video_ogg; ?>" type=video/ogg> 
									<source src="<?php echo $tpt_infinity_video_3gp; ?>" type=video/3gp>
								</video>
							</div>
						</div>
					</div>
				</div>

				<?php // Modal de Vídeo para o Header ?>
				<div class="modal fade" id="modalVideoHeader" tabindex="-1" role="dialog" aria-labelledby="modalVideoHeader" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content modal-content-video-infinity">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
							<div class="modal-body mt-5 mb-5 border-0">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe id="video-modal" class="embed-responsive-item" src="<?php echo $tpt_infinity_video_url; ?>?rel=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }
			else{ ?>
				<style>
					body{
						padding-top:151px !important;
					}
					@media (max-width: 767px){
						body{
							padding-top:77px !important;
						}	
					}
				</style>
				<div class="wrapper-geral">
					<div class="wrapper-inner-h-videopreview">
						<div class="wrapper-videopreview">
							<div class="video-preview-txt-container">
								<div class="wrap-titulo-banner-infinity">
									<h1 class="videopreview-titulo infinity-obra"><?php echo $tpt_infinity_banner_titulo; ?><div class="detalhe-titulo-infinity"></div></h1>
								</div>
								<p class="videpreview-chamada"><?php echo $tpt_infinity_banner_subtitulo; ?></p>
							</div>
							<div class="video-review-video-container">
								<img class="videopreview-video" src="<?php echo $tpt_infinity_banner_img; ?>" alt="<?php echo $tpt_infinity_banner_titulo; ?>">
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php 
			$titulo_fundacao = get_field("titulo_obra_fundacao");
			$icon_fundacao = wp_get_attachment_url(get_field("icon_obra_fundacao"));
			$alt_icon_fundacao = get_post_meta( get_field('icon_obra_fundacao'), '_wp_attachment_image_alt', true);
			$titulo_estrutura = get_field("titulo_obra_estrutura");
			$icon_estrutura = wp_get_attachment_url(get_field("icon_obra_estrutura"));
			$alt_icon_estrutura = get_post_meta( get_field('icon_obra_estrutura'), '_wp_attachment_image_alt', true);
			$titulo_alvenaria = get_field("titulo_obra_alvenaria");
			$icon_alvenaria = wp_get_attachment_url(get_field("icon_obra_alvenaria"));
			$alt_icon_alvenaria = get_post_meta( get_field('icon_obra_alvenaria'), '_wp_attachment_image_alt', true);
			$titulo_instalacoes = get_field("titulo_obra_instalacoes");
			$icon_instalacoes = wp_get_attachment_url(get_field("icon_obra_instalacoes"));
			$alt_icon_instalacoes = get_post_meta( get_field('icon_obra_instalacoes'), '_wp_attachment_image_alt', true);
			$titulo_rev_interno = get_field("titulo_obra_rev_interno");
			$icon_rev_interno = wp_get_attachment_url(get_field("icon_obra_rev_interno"));
			$alt_icon_rev_interno = get_post_meta( get_field('icon_obra_rev_interno'), '_wp_attachment_image_alt', true);
			$titulo_rev_externo = get_field("titulo_obra_rev_externo");
			$icon_rev_externo = wp_get_attachment_url(get_field("icon_obra_rev_externo"));
			$alt_icon_rev_externo = get_post_meta( get_field('icon_obra_rev_externo'), '_wp_attachment_image_alt', true);
			$titulo_piso = get_field("titulo_obra_piso");
			$icon_piso = wp_get_attachment_url(get_field("icon_obra_piso"));
			$alt_icon_piso = get_post_meta( get_field('icon_obra_piso'), '_wp_attachment_image_alt', true);
			$titulo_pintura = get_field("titulo_obra_pintura");
			$icon_pintura = wp_get_attachment_url(get_field("icon_obra_pintura"));
			$alt_icon_pintura = get_post_meta( get_field('icon_obra_pintura'), '_wp_attachment_image_alt', true);
			$titulo_paisagismo = get_field("titulo_obra_paisagismo");
			$icon_paisagismo = wp_get_attachment_url(get_field("icon_obra_paisagismo"));
			$alt_icon_paisagismo = get_post_meta( get_field('icon_obra_paisagismo'), '_wp_attachment_image_alt', true);

			$titulo_obra = get_field("imovel_titulo_obra");
			$percent_fundacao = get_field("obra_percent_fundacao");
			$percent_estrutura = get_field("obra_percent_estrutura");
			$percent_alvenaria = get_field("obra_percent_alvenaria");
			$percent_instalacoes = get_field("obra_percent_instalacoes");
			$percent_rev_interno = get_field("obra_percent_rev_interno");
			$percent_rev_externo = get_field("obra_percent_rev_externo");
			$percent_piso = get_field("obra_percent_piso");
			$percent_pintura = get_field("obra_percent_pintura");
			$percent_paisagismo = get_field("obra_percent_paisagismo");
			$count = 1;
			if( have_rows('galeria_imovel_obra') ):
				while ( have_rows('galeria_imovel_obra') ) : the_row();
					$imgs_obra[$count]['img'] = get_sub_field("img_imovel_obra");
					$count ++;
				endwhile;
			endif;
			?>


			<div class="wrapper-geral wrapper-geral-infinity-obra">
				<div class="wrapper-inner wrapper-inner-infinity-obra">
					<section id="obra" class="container-fluid wrapper-imovel wrapper-imovel-obra" style="background-color:<?php echo get_field("imoveis_bg_color_obra") ?>;">
						<div class="container wrapper-inner imovel-obra">
							<div class="row">
								<div class="col-12">
									<div class="section-content-header d-flex align-items-center flex-column">
										<h2 class="section-content-title text-center"><?php echo $titulo_obra; ?></h2>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="row d-flex justify-content-center">
										<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
											<div class="image-gallery-box">
												<ul id="galeria-obra" class="gallery list-unstyled">
													<?php
													foreach($imgs_obra as $img){
														$imagem = wp_get_attachment_metadata( $img["img"], true );
														$upload_dir = wp_upload_dir();
														$path_img =  dirname($imagem["file"]);
														$url_img_xs = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["545x319"]["file"];
														$url_img_sm = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["737x431"]["file"];
														$url_img_lg = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["795x466"]["file"];
														echo '
														<li class="lslide" data-thumb="' . wp_get_attachment_url($img["img"]) . '" data-sub-html="' . wp_get_attachment_caption( $img["img"]) . '">

															<img class="img-fluid"
																src="' . wp_get_attachment_url($img["img"]) . '"
																alt="' . get_post_meta( $img["img"], "_wp_attachment_image_alt", true) . '"
																srcset="
																	' . $url_img_xs . ' 575w,
																	' . $url_img_sm . ' 767w,
																	' . $url_img_lg . ' 1199w,
																	' . wp_get_attachment_url($img["img"]) . ' 1200w"
															/>

															<p class="caption">' . wp_get_attachment_caption( $img["img"]) . '</p>
														</li>
														';
													}
													?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="status-obra row">
								<div class="col-12">
									<ul class="status-obra-list d-flex justify-content-center align-content-start flex-wrap p-0 m-0">
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_fundacao; ?>" alt="<?php echo $alt_icon_fundacao; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_fundacao; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_fundacao) ? ' active' : ''; ?>"><?php echo $percent_fundacao; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_estrutura; ?>" alt="<?php echo $alt_icon_estrutura; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_estrutura; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_estrutura) ? ' active' : ''; ?>"><?php echo $percent_estrutura; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_alvenaria; ?>" alt="<?php echo $alt_icon_alvenaria; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_alvenaria; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_alvenaria) ? ' active' : ''; ?>"><?php echo $percent_alvenaria; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_instalacoes; ?>" alt="<?php echo $alt_icon_instalacoes; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_instalacoes; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_instalacoes) ? ' active' : ''; ?>"><?php echo $percent_instalacoes; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_rev_interno; ?>" alt="<?php echo $alt_icon_rev_interno; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_rev_interno; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_rev_interno) ? ' active' : ''; ?>"><?php echo $percent_rev_interno; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_rev_externo; ?>" alt="<?php echo $alt_icon_rev_externo; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_rev_externo; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_rev_externo) ? ' active' : ''; ?>"><?php echo $percent_rev_externo; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_piso; ?>" alt="<?php echo $alt_icon_piso; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_piso; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_piso) ? ' active' : ''; ?>"><?php echo $percent_piso; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_pintura; ?>" alt="<?php echo $alt_icon_pintura; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_pintura; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_pintura) ? ' active' : ''; ?>"><?php echo $percent_pintura; ?></p>
										</li>
										<li class="status-obra-list-item d-flex justify-content-center flex-column">
											<div class="status-obra-list-item-icon"><img src="<?php echo $icon_paisagismo; ?>" alt="<?php echo $alt_icon_paisagismo; ?>"></div>
											<p class="status-obra-list-item-titulo"><?php echo $titulo_paisagismo; ?></p>
											<p class="status-obra-list-item-percent<?php echo ('100%' == $percent_paisagismo) ? ' active' : ''; ?>"><?php echo $percent_paisagismo; ?></p>
										</li>
									</ul>
								</div>
							</div>
							
								
						</div>
					</section>
				</div>
			</div>





			<?php // Seção Contato 
			// Captura informações do CMS
			$titulo_contato = get_field("tpt_infinity_home_contato_titulo",$imovel_ref);
			$subtitulo_contato = get_field("tpt_infinity_home_contato_subtitulo",$imovel_ref);
			$label_nome = get_field("label_nome",$imovel_ref);
			$label_email = get_field("label_email",$imovel_ref);
			$label_telefone = get_field("label_telefone",$imovel_ref);
			$label_mensagem = get_field("label_mensagem",$imovel_ref);
			$txt_aceitar_news = get_field("txt_aceitar_news",$imovel_ref);
			$txt_mala = get_field("txt_aceitar_mala_direta",$imovel_ref);
			$label_cep = get_field("label_cep",$imovel_ref);
			$label_cidade = get_field("label_cidade",$imovel_ref);
			$label_endereco = get_field("label_endereco",$imovel_ref);
			$label_num = get_field("label_numero",$imovel_ref);
			$label_bairro = get_field("label_bairro",$imovel_ref);
			$label_complemento = get_field("label_complemento",$imovel_ref);
			$txt_btn_enviar = get_field("txt_btn_enviar",$imovel_ref);
			$txt_btn_limpar = "Limpar";
			$txt_obrigatorios = get_field("txt_obrigatorios",$imovel_ref);
			?>
			<div class="wrapper-geral wrapper-geral-infinity-contato">
				<div class="container wrapper-inner wrapper-contato-body contato-form pt-0 pb-0">
					<div class="wrapper-contato-content">
						<form name="emailForm" id="emailForm" data-target="ws-produto" data-isintegrado=true method="post" action="#">
							<input type="hidden" name="idEmpreendimento" id="idEmpreendimento" value="<?php echo $imovel_id; ?>" id="utm_source">
							<input type="hidden" name="idForm" value="3" />

							<div class="contato-content-header">
								<div class="contato-content-title">
									<h2 class="titulo-section-infinity"><?php echo $titulo_contato; ?></h2>
									<div class="titulo-detalhe-infinity"></div>
									<p class="contato-infinity-subtitulo"><?php echo $subtitulo_contato; ?></p>
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
								<div class="form-group infinity-pbrigatorios">
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
	    	$count = 0;
			if( have_rows('redes_sociais_infinity',$imovel_ref) ):
				while ( have_rows('redes_sociais_infinity',$imovel_ref) ) : the_row();
					$sociais_infinity[$count]['titulo'] = get_sub_field("nome_ro_rede_social_infinity");
					$sociais_infinity[$count]['show'] = get_sub_field("show_ro_rede_social_infinity");
					$sociais_infinity[$count]['icon'] = get_sub_field("icone_ro_rede_social_infinity");
					$sociais_infinity[$count]['url'] = get_sub_field("url_ro_rede_social_infinity");
					$count ++;
				endwhile;
			endif;
			$tpt_infinity_footer_address = get_field("tpt_infinity_footer_address",$imovel_ref);
			$tpt_infinity_footer_copyright = get_field("tpt_infinity_footer_copyright",$imovel_ref);
			$tpt_infinity_home_footer_ri = get_field("tpt_infinity_home_footer_ri",$imovel_ref);
			$logo = wp_get_attachment_url(get_field("logo_topo",311));
			?>
			<div class="wrapper-geral wrapper-geral-footer-infinity">
				<div class="wrapper-inner-infinity">
					<hr class="hr-divisor-footer-infinity">
					<div class="wrapper-inner wrapper-inner-footer-infinity">
						<div class="container-fluid">
							<div class="row">
								<div class="logo-ez-footer-infinity col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<img src="<?php echo $logo; ?>" alt="Eztec">
									</a>
								</div>
								<div class="sociais-footer-infinity col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6">
									<?php foreach($sociais_infinity as $so){
										if( $so["show"] == 1){
											echo '
											<a href="' . $so["url"] . '" target="_blank" rel="noopener">
												<img src="' . $so["icon"] . '" alt="' . $so["titulo"] . '">
											</a>
											';
										}
									} ?>
								</div>
								<div class="text-footer-infinity col-xl-7 col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<p class="address-footer-infinity"><?php echo $tpt_infinity_footer_address; ?></p>
									<p class="copyright-footer-infinity"><?php echo $tpt_infinity_footer_copyright; ?></p>
								</div>
								<div class="footer-ri col-12">
									<p><?php echo $tpt_infinity_home_footer_ri; ?></p>
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
$shortcode_chat = '[mi_chat imovel_id="' . $imovel_ref . '" chat_id="' . $id_chat_param . '"]';
echo do_shortcode($shortcode_chat);
?>


<?php
get_footer();