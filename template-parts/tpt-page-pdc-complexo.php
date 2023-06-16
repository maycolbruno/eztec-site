<?php
/*
 * Template Name: Parque da Cidade - Complexo
 * Template Post Type: page
 */

get_header(); ?>


<?php 

$imovel_ref = get_field("imovel_ref");

$imovel_id = get_field("imovel_id",$imovel_ref);

$tpt_pdc_banner_video_show = get_field("tpt_pdc_banner_video_show");
$tpt_pdc_video_mp4 = get_field("tpt_pdc_video_mp4");
$tpt_pdc_video_webm = get_field("tpt_pdc_video_webm");
$tpt_pdc_video_ogg = get_field("tpt_pdc_video_ogg");
$tpt_pdc_video_3gp = get_field("tpt_pdc_video_3gp");
$tpt_pdc_banner_titulo = get_field("tpt_pdc_banner_titulo");
$tpt_pdc_banner_subtitulo = get_field("tpt_pdc_banner_subtitulo");
$tpt_pdc_video_url = get_field("tpt_pdc_video_url");
$tpt_pdc_banner_img = get_field("tpt_pdc_banner_img");


$tpt_pdc_home_logo = get_field("tpt_pdc_home_logo",$imovel_ref);
$tpt_pdc_home_logo_mobile = get_field("tpt_pdc_home_logo_mobile",$imovel_ref);
$tpt_pdc_home_video_play = get_field("tpt_pdc_home_video_play",$imovel_ref);
$tpt_pdc_home_chat_txt = get_field("tpt_pdc_home_chat_txt",$imovel_ref);
$tpt_pdc_home_email_txt = get_field("tpt_pdc_home_email_txt",$imovel_ref);
$tpt_pdc_home_whats_txt = get_field("tpt_pdc_home_whats_txt",$imovel_ref);
$tpt_pdc_home_phone_txt = get_field("tpt_pdc_home_phone_txt",$imovel_ref);
$tpt_pdc_home_corretor_txt = get_field("tpt_pdc_home_corretor_txt",$imovel_ref);
$tpt_pdc_home_chat_icon = get_field("tpt_pdc_home_chat_icon",$imovel_ref);
$tpt_pdc_home_email_icon = get_field("tpt_pdc_home_email_icon",$imovel_ref);
$tpt_pdc_home_whats_icon = get_field("tpt_pdc_home_whats_icon",$imovel_ref);
$tpt_pdc_home_phone_icon = get_field("tpt_pdc_home_phone_icon",$imovel_ref);
$tpt_pdc_home_corretor_icon = get_field("tpt_pdc_home_corretor_icon",$imovel_ref);
$num_tel = get_field("num_ligacao_telefone",311);
$count = 0;
$c = 0;
if( have_rows('tpt_pdc_home_menu_itens',$imovel_ref) ):
	while ( have_rows('tpt_pdc_home_menu_itens',$imovel_ref) ) : the_row();
		$url_page = "";
		$menu_pdc_itens[$count]['titulo'] = get_sub_field("tpt_pdc_home_menu_item_titulo");
		$titulo_pai = get_sub_field("tpt_pdc_home_menu_item_titulo");
		$menu_pdc_itens[$count]['has_sub'] = get_sub_field("tpt_pdc_home_menu_has_sub");
		$url_page = get_sub_field("tpt_pdc_home_menu_item_url");
		$menu_pdc_itens[$count]['url'] = get_permalink($url_page);
		if( have_rows('tpt_pdc_home_menu_subitens') ):
			while ( have_rows('tpt_pdc_home_menu_subitens') ) : the_row();
				$menu_pdc_subitens[$c]['titulo_pai'] = $titulo_pai;
				$menu_pdc_subitens[$c]['titulo'] = get_sub_field("tpt_pdc_home_menu_subitem_titulo");
				$url_sub_item = get_sub_field("tpt_pdc_home_menu_subitem_url");
				$menu_pdc_subitens[$c]['url'] = get_permalink($url_sub_item);
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
<div class="container-fluid wrapper-imovel pdc pdc-complexo p-0">

	<?php
	// Pop Up
	$exibir_popup = get_field("exibir_popup",$imovel_ref);
	if ($exibir_popup == 1){
		$titulo_popup = get_field("titulo_popup",$imovel_ref);
		$icone_popup = get_field("icone_popup",$imovel_ref);
		$imagem_popup = get_field("imagem_popup",$imovel_ref);
		$txt_1_popup = get_field("txt_1_popup",$imovel_ref);
		$txt_2_popup = get_field("txt_2_popup",$imovel_ref);
		$btn_cta_popup = get_field("btn_cta_popup",$imovel_ref);
		$usar_direc_popup = get_field("usar_direc_popup",$imovel_ref);
		$url_popup = get_field("url_popup",$imovel_ref);
	}
	if($exibir_popup == 1){

		$current_post_type = get_post_type($imovel_ref);
		if($current_post_type == "imovel"){
			$id_chat_param = get_the_ID($imovel_ref);
		}
		else{
			$id_chat_param = "geral";
		}

		if($usar_direc_popup == 1){
			$url_pop = $url_popup;
			$atributos_url_pop = "";
		}
		else{
			$url_pop = "#contatoChat";
			$atributos_url_pop = 'data-toggle="modal" data-target="#modalChat-' . $id_chat_param . '"';
		}

		echo '
		<div id="pop" class="wrapper-popup">
			<div class="header-popup d-flex align-items-center">
				<img src="' . $icone_popup . '">
				<div class="header-pop-txt d-flex justify-content-between w-100 align-items-center">
					 <span>' . $titulo_popup . '</span> <span class="close-pop" id="close-pop" onclick="closePop()">X</span>
				</div>
			</div>
			<img src="' . $imagem_popup . '">
			<div class="chamadas-pop">
				<p class="chamada-superior-pop">' . $txt_1_popup . '</p>
				<hr class="divisor-chamadas-pop">
				<p class="chamada-inferior-pop">' . $txt_2_popup . '</p>
			</div>
			<div class="cta-pop">
				<a href="' . $url_pop . '" ' . $atributos_url_pop . '">
					<img src="' . $btn_cta_popup . '">
				</a>
			</div>
		</div>
		';
	}
	else{
		echo '
		<div class="btn-top-back align-items-center justify-content-center d-flex" title="Voltar ao topo">
			<i class="seta-base-go-up seta-up" aria-hidden="true"></i>
		</div>
		';
	}
	?>


	<div class="wrapper-menu-interacao">
		<div class="container-fluid menu-interacao menu-interacao-pdc">
			<div class="container wrapper-inner menu-interacao-mobile d-block d-md-none d-sm-block fixed-bottom">
				<div class="row">

					<div class="col-3 col-sm-3 mi-item mi-item-chat d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
								<img src="<?php echo $tpt_pdc_home_chat_icon; ?>" alt="Chat"><br>
								<b><?php echo $tpt_pdc_home_chat_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-email d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
								<img src="<?php echo $tpt_pdc_home_email_icon; ?>" alt="E-mail"><br>
								<b><?php echo $tpt_pdc_home_email_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-whats d-flex align-items-center justify-content-center">
						<div type="button">
							<a href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
								<img src="<?php echo $tpt_pdc_home_whats_icon; ?>" alt="WhatsApp"><br>
								<b><?php echo $tpt_pdc_home_whats_txt; ?></b>
							</a>
						</div>
					</div>

					<div class="col-3 col-sm-3 mi-item mi-item-tel d-flex align-items-center justify-content-center">
						<div type="button">
							<a class="mi-tel" href="tel:<?php echo $num_tel; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
								<img src="<?php echo $tpt_pdc_home_phone_icon; ?>" alt="Telefone"><br>
								<b><?php echo $tpt_pdc_home_phone_txt; ?></b>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid menu-interacao menu-interacao-pdc fixed-top p-0">

			<!-- Menu contato: Desktop -->
			<div class="container wrapper-inner-menu-interacao-pdc d-none d-sm-none d-md-block">

				<div class="row d-flex justify-content-end">

					<div class="mi-item mi-item-chat">
						<div type="button">
							<a class="mi-chat" href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
								<b><?php echo $tpt_pdc_home_chat_txt; ?></b>
								<img src="<?php echo $tpt_pdc_home_chat_icon; ?>" alt="Chat">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-email">
						<div type="button">
							<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
								<b><?php echo $tpt_pdc_home_email_txt; ?></b>
								<img src="<?php echo $tpt_pdc_home_email_icon; ?>" alt="E-mail">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-whats">
						<div type="button">
							<a href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
								<b><?php echo $tpt_pdc_home_whats_txt; ?></b>
								<img src="<?php echo $tpt_pdc_home_whats_icon; ?>" alt="WhatsApp">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-tel">
						<div type="button">
							<a class="mi-tel" href="tel:<?php echo $num_tel; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
								<b><?php echo $tpt_pdc_home_phone_txt; ?></b>
								<img src="<?php echo $tpt_pdc_home_phone_icon; ?>" alt="Telefone">
							</a>
						</div>
					</div>

					<div class="mi-item mi-item-corretor">
						<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
							<img src="<?php echo $tpt_pdc_home_corretor_icon; ?>" alt="Fale com um Consultor">
							<b><?php echo $tpt_pdc_home_corretor_txt; ?></b>
						</a>
					</div>

				</div>
			</div>
		</div>



		<div class="wrapper-geral wrapper-geral-menu-pdc fixed-top">
			<div class="wrapper-inner-menu-pdc">
				<a href="<?php echo get_permalink($imovel_ref); ?>" class="logo-pdc"><img class="logo-pdc-img" src="<?php echo $tpt_pdc_home_logo; ?>" alt="Parque da Cidade"></a>
				<a href="<?php echo get_permalink($imovel_ref); ?>" class="logo-pdc-mobile"><img class="logo-pdc-img-mobile" src="<?php echo $tpt_pdc_home_logo_mobile; ?>" alt="Parque da Cidade"></a>
				<div class="btn-corretor-mobile">
					<a href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
						<b><?php echo $tpt_pdc_home_corretor_txt; ?></b>
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
					    	<?php
					    	$conta_drop = 0;
					    	foreach($menu_pdc_itens as $i){
								if($i["has_sub"] == 1){
									echo '
									<div class="nav-item nav-item-pdc dropdown">
								        <a class="nav-link nav-link-pdc dropdown-toggle" href="#" id="navbarDropdown' . $conta_drop . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          ' . $i["titulo"] . '
								        </a>
								        <div class="dropdown-menu dropdown-menu-pdc" aria-labelledby="navbarDropdown' . $conta_drop . '">';
								        foreach($menu_pdc_subitens as $subi){
								        	if($subi["titulo_pai"] === $i["titulo"]){
								        		echo '
									        	<a class="menu-pdc-dropdown-item dropdown-item" href="' . $subi["url"] . '">' . $subi["titulo"] . '</a>
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
										<div class="nav-item nav-item-pdc">
									        <a class="nav-link nav-link-pdc" href="' . $i["url"] . '">' . $i["titulo"] . '</a>
									    </div>
									';
								}
								$conta_drop ++;
							}
							?>
							<div class="nav-item nav-item-pdc">
							    <a class="nav-link nav-link-pdc" href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">CONTATO</a>
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

	    	<?php if($tpt_pdc_banner_video_show == 1){ ?>
				<div class="wrapper-geral wrapper-geral-h-videopreview">
					<div class="wrapper-inner-h-videopreview">
						<div class="wrapper-videopreview">
							<div class="video-preview-txt-container">
								<div class="wrap-titulo-banner-pdc">
									<h1 class="videopreview-titulo pdc-complexo"><?php echo $tpt_pdc_banner_titulo; ?><div class="detalhe-titulo-pdc"></div></h1>
								</div>
								<p class="videpreview-chamada"><?php echo $tpt_pdc_banner_subtitulo; ?></p>
								<img class="play-pdc-banner" data-toggle="modal" data-target="#modalVideoHeader" src="<?php echo $tpt_pdc_home_video_play; ?>">
							</div>
							<div class="video-review-video-container">
								<video class="videopreview-video" autoplay loop muted>
									<source src="<?php echo $tpt_pdc_video_mp4; ?>" type=video/mp4>
									<source src="<?php echo $tpt_pdc_video_webm; ?>" type="video/webm">
					    			<source src="<?php echo $tpt_pdc_video_ogg; ?>" type=video/ogg> 
									<source src="<?php echo $tpt_pdc_video_3gp; ?>" type=video/3gp>
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
									<iframe id="video-modal" class="embed-responsive-item" src="<?php echo $tpt_pdc_video_url; ?>?rel=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
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
								<div class="wrap-titulo-banner-pdc">
									<h1 class="videopreview-titulo pdc-complexo"><?php echo $tpt_pdc_banner_titulo; ?><div class="detalhe-titulo-pdc"></div></h1>
								</div>
								<p class="videpreview-chamada"><?php echo $tpt_pdc_banner_subtitulo; ?></p>
							</div>
							<div class="video-review-video-container">
								<img class="videopreview-video" src="<?php echo $tpt_pdc_banner_img; ?>" alt="<?php echo $tpt_pdc_banner_titulo; ?>">
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

			<div class="wrapper-geral wrapper-geral-pdc-complexo">
				<div class="wrapper-inner-nav-complexo">
					<div class="wrap-nav-complexo d-flex justify-content-center">
						<a class="item-link-nav-complexo flex-fill" href="#cidade" class="nav-item-complexo">CIDADE DO FUTURO</a>
						<a class="item-link-nav-complexo flex-fill" href="#implantacao" class="nav-item-complexo">IMPLANTAÇÃO</a>
						<a class="item-link-nav-complexo flex-fill" href="#parquelinear" class="nav-item-complexo">PARQUE LINEAR</a>
						<a class="item-link-nav-complexo flex-fill" href="#shopping" class="nav-item-complexo">SHOPPING</a>
						<a class="item-link-nav-complexo flex-fill" href="#hotel" class="nav-item-complexo">HOTEL</a>
						<a class="item-link-nav-complexo flex-fill" href="#corporativo" class="nav-item-complexo">CENÁRIO CORPORATIVO</a>
					</div>
				</div>
			</div>

			<?php
			$tpt_pdc_complexo_cidade_titulo = get_field("tpt_pdc_complexo_cidade_titulo");
			$tpt_pdc_complexo_cidade_chamada = get_field("tpt_pdc_complexo_cidade_chamada");
			$tpt_pdc_complexo_cidade_desc = get_field("tpt_pdc_complexo_cidade_desc");
			$tpt_pdc_complexo_cidade_citacao = get_field("tpt_pdc_complexo_cidade_citacao");
			$tpt_pdc_complexo_cidade_img_topo = get_field("tpt_pdc_complexo_cidade_img_topo");
			$tpt_pdc_complexo_cidade_img_948x600 = get_field("tpt_pdc_complexo_cidade_img_948x600");
			$tpt_pdc_complexo_cidade_img_440x638 = get_field("tpt_pdc_complexo_cidade_img_440x638");
			$tpt_pdc_complexo_cidade_img_377x288 = get_field("tpt_pdc_complexo_cidade_img_377x288");
			?>
			<div class="wrapper-geral wrapper-geral-pdc-complexo">
				<div id="apresentacao" class="wrapper-inner-pdc-complexo-apresentacao">
					<div class="contaner-fluid wrap-img-topo-complexo-apresentacao">
						<div class="col-12">
							<img class="img-topo-complexo-apresentacao" src="<?php echo $tpt_pdc_complexo_cidade_img_topo; ?>">
						</div>
					</div>
					<div id="cidade" class="container-fluid container-complexo-apresentacao" id="cidadedofuturo">
						<div class="row p-0">
							<div class="complexo-apresentacao-info col-xl-6 col-lg-6 col-12">
								<div class="wrap-complexo-apresentacao-txt">
									<h2 class="apresentacao-info-titulo"><?php echo $tpt_pdc_complexo_cidade_titulo; ?></h2>
									<div class="apresentacao-divisor-pdc"></div>
									<p class="apresentacao-info-chamada"><?php echo $tpt_pdc_complexo_cidade_chamada; ?></p>
									<p class="apresentacao-info-desc"><?php echo $tpt_pdc_complexo_cidade_desc; ?></p>
									<img class="img-complexo-apresentacao-info" src="<?php echo $tpt_pdc_complexo_cidade_img_440x638; ?>" alt="<?php echo $tpt_pdc_complexo_cidade_titulo; ?>">
								</div>
							</div>
							<div class="complexo-apresentacao-citacao col-xl-6 col-lg-6 col-12">
								<img class="img-fluid img-topo-citacao-complexo-apresentacao" src="<?php echo $tpt_pdc_complexo_cidade_img_948x600; ?>" alt="<?php echo $tpt_pdc_complexo_cidade_titulo; ?>">
								<img src="<?php echo $tpt_pdc_complexo_cidade_img_377x288; ?>" alt="<?php echo $tpt_pdc_complexo_cidade_titulo; ?>">
								<div class="wrap-complexo-apresentacao-citacao">
									<p class="complexo-apresentacao-citacao"><?php echo $tpt_pdc_complexo_cidade_citacao; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
			$tpt_pdc_complexo_implantacao_titulo = get_field("tpt_pdc_complexo_implantacao_titulo");
			$tpt_pdc_complexo_implantacao_chamada = get_field("tpt_pdc_complexo_implantacao_chamada");
			$tpt_pdc_complexo_implantacao_legendas1 = get_field("tpt_pdc_complexo_implantacao_legendas1");
			$tpt_pdc_complexo_implantacao_legendas2 = get_field("tpt_pdc_complexo_implantacao_legendas2");
			$tpt_pdc_complexo_implantacao_img = get_field("tpt_pdc_complexo_implantacao_img");
			?>
			<div id="implantacao" class="wrapper-geral wrapper-geral-pdc-complexo-implantacao">
				<div class="wrapper-inner-pdc-complexo-implantacao">
					<div class="container-fluid container-complexo-implantacao">
						<div class="row p-0">
							<div class="wrap-complexo-implantacao-img col-12">
								<img class="complexo-implantacao-img img-fluid" src="<?php echo $tpt_pdc_complexo_implantacao_img; ?>" alt="<?php echo $tpt_pdc_complexo_implantacao_titulo; ?>">
							</div>
							<div class="wrap-complexo-implantacao-txt col-xl-6 col-lg-6 col-12">
								<div class="wrap-complexo-implantacao-titulo">
									<h2 class="apresentacao-info-titulo"><?php echo $tpt_pdc_complexo_implantacao_titulo; ?></h2>
									<div class="apresentacao-divisor-pdc"></div>
									<p class="apresentacao-info-chamada"><?php echo $tpt_pdc_complexo_implantacao_chamada; ?></p>
								</div>
							</div>
							<div class="wrap-complexo-implantacao-desc col-xl-3 col-lg-3 col-md-6 col-12">
								<p class="complexo-implantacao-desc"><?php echo $tpt_pdc_complexo_implantacao_legendas1; ?></p>
							</div>
							<div class="wrap-complexo-implantacao-desc col-xl-3 col-lg-3 col-md-6 col-12">
								<p class="complexo-implantacao-desc"><?php echo $tpt_pdc_complexo_implantacao_legendas2; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
			$tpt_pdc_complexo_linear_titulo = get_field("tpt_pdc_complexo_linear_titulo");
			$tpt_pdc_complexo_linear_chamada = get_field("tpt_pdc_complexo_linear_chamada");
			$tpt_pdc_complexo_linear_desc = get_field("tpt_pdc_complexo_linear_desc");
			$tpt_pdc_complexo_linear_img_topo = get_field("tpt_pdc_complexo_linear_img_topo");
			$tpt_pdc_complexo_linear_img_257x197 = get_field("tpt_pdc_complexo_linear_img_257x197");
			$tpt_pdc_complexo_linear_img_315x448 = get_field("tpt_pdc_complexo_linear_img_315x448");
			$tpt_pdc_complexo_linear_txt_legal = get_field("tpt_pdc_complexo_linear_txt_legal");
			$count = 0;
			if( have_rows('tpt_pdc_complexo_linear_galeria') ):
				while ( have_rows('tpt_pdc_complexo_linear_galeria') ) : the_row();
					$itens_galeria_linear[$count]["img"] = get_sub_field("tpt_pdc_complexo_linear_galeria_item_img");
					$itens_galeria_linear[$count]["img_big"] = get_sub_field("tpt_pdc_complexo_linear_galeria_item_img_big");
					$count ++;
				endwhile;
			endif;
			?>
			<div id="parquelinear" class="wrapper-geral wrapper-geral-pdc-complexo">
				<img class="img-fluid img-topo-complexo" src="<?php echo $tpt_pdc_complexo_linear_img_topo; ?>">
				<div id="linear" class="wrapper-inner-pdc-complexo-linear">
					<div class="container-fluid container-complexo-linear">
						<div class="row p-0">
							<div class="wrap-complexo-linear-img-menor col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
								<img class="complexo-linear-img-menor img-fluid" src="<?php echo $tpt_pdc_complexo_linear_img_257x197; ?>" alt="<?php echo $tpt_pdc_complexo_linear_titulo; ?>">
							</div>
							<div class="wrap-complexo-linear-img-maior col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
								<img class="complexo-linear-img-maior img-fluid" src="<?php echo $tpt_pdc_complexo_linear_img_315x448; ?>" alt="<?php echo $tpt_pdc_complexo_linear_titulo; ?>">
							</div>
							<div class="complexo-linear-info col-xl-6 col-lg-6 col-12">
								<h2 class="apresentacao-info-titulo"><?php echo $tpt_pdc_complexo_linear_titulo; ?></h2>
								<div class="apresentacao-divisor-pdc"></div>
								<p class="apresentacao-info-chamada"><?php echo $tpt_pdc_complexo_linear_chamada; ?></p>
								<p class="apresentacao-info-desc"><?php echo $tpt_pdc_complexo_linear_desc; ?></p>
							</div>
						</div>
					</div>

					<div class="container wrapper-inner-pdc-apto">

						<div class="row">
							<div class="col-12">
								<div class="section-content-header d-flex align-items-center flex-column">
									<h2 class="section-content-title text-center"><?php echo $tpt_pdc_complexo_linear_titulo; ?></h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="row d-flex justify-content-center">
									<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
										<div class="image-gallery-box">
											<ul id="galeria-apartamentos" class="gallery list-unstyled">
												<?php
												foreach($itens_galeria_linear as $img){
													$imagem = wp_get_attachment_metadata( $img["img"], true );
													$upload_dir = wp_upload_dir();
													$path_img =  dirname($imagem["file"]);
													$url_img_xs = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["545x319"]["file"];
													$url_img_sm = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["737x431"]["file"];
													$url_img_lg = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["795x466"]["file"];
													echo '
													<li class="lslide" data-thumb="' . wp_get_attachment_url($img["img"]) . '" data-src="' . wp_get_attachment_url($img["img_big"]) . '" data-sub-html="' . wp_get_attachment_caption( $img["img"]) . '">

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
							<div class="wrap-texto-legal-galeria-complexo col-12">
								<p class="texto-legal-galeria-complexo"><?php echo $tpt_pdc_complexo_linear_txt_legal; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
			$tpt_pdc_complexo_shopping_titulo = get_field("tpt_pdc_complexo_shopping_titulo");
			$tpt_pdc_complexo_shopping_subtitulo = get_field("tpt_pdc_complexo_shopping_subtitulo");
			$tpt_pdc_complexo_shopping_chamada = get_field("tpt_pdc_complexo_shopping_chamada");
			$tpt_pdc_complexo_shopping_desc = get_field("tpt_pdc_complexo_shopping_desc");
			$tpt_pdc_complexo_shopping_txt_legal = get_field("tpt_pdc_complexo_shopping_txt_legal");
			$tpt_pdc_complexo_shopping_img_topo = get_field("tpt_pdc_complexo_shopping_img_topo");
			$tpt_pdc_complexo_shopping_img_630x448 = get_field("tpt_pdc_complexo_shopping_img_630x448");
			$tpt_pdc_complexo_shopping_img_227x322 = get_field("tpt_pdc_complexo_shopping_img_227x322");
			$tpt_pdc_complexo_shopping_img_375x288 = get_field("tpt_pdc_complexo_shopping_img_375x288");
			?>
			<div id="shopping" class="wrapper-geral wrapper-geral-pdc-complexo">
				<img class="img-fluid img-topo-complexo" src="<?php echo $tpt_pdc_complexo_shopping_img_topo; ?>">
				<div class="wrapper-inner-pdc-complexo-shopping">
					<div class="container-fluid container-complexo-shopping">
						<div class="row p-0">
							<div class="complexo-shopping-imgs col-xl-6 col-lg-6 col-12">
								<img class="img-fluid complexo-shopping-img-maior" src="<?php echo $tpt_pdc_complexo_shopping_img_630x448; ?>" alt="<?php echo $tpt_pdc_complexo_shopping_titulo; ?>">
								<img class="complexo-shopping-img-menor" src="<?php echo $tpt_pdc_complexo_shopping_img_227x322; ?>" alt="<?php echo $tpt_pdc_complexo_shopping_titulo; ?>">
							</div>
							<div class="complexo-shopping-info col-xl-6 col-lg-6 col-12">
								<div class="complexo-shopping-info">
									<h2 class="apresentacao-info-titulo"><?php echo $tpt_pdc_complexo_shopping_titulo; ?></h2>
									<div class="apresentacao-divisor-pdc"></div>
									<p class="apresentacao-info-chamada"><?php echo $tpt_pdc_complexo_shopping_chamada; ?></p>
									<p class="apresentacao-info-subtitulo"><?php echo $tpt_pdc_complexo_shopping_subtitulo; ?></p>
									<p class="apresentacao-info-desc"><?php echo $tpt_pdc_complexo_shopping_desc; ?></p>
									<p class="apresentacao-texto-legal"><?php echo $tpt_pdc_complexo_shopping_txt_legal; ?></p>
								</div>
								<img src="<?php echo $tpt_pdc_complexo_shopping_img_375x288; ?>" alt="<?php echo $tpt_pdc_complexo_shopping_titulo; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
			$tpt_pdc_complexo_hotel_titulo = get_field("tpt_pdc_complexo_hotel_titulo");
			$tpt_pdc_complexo_hotel_chamada = get_field("tpt_pdc_complexo_hotel_chamada");
			$tpt_pdc_complexo_hotel_desc = get_field("tpt_pdc_complexo_hotel_desc");
			$tpt_pdc_complexo_hotel_img_topo = get_field("tpt_pdc_complexo_hotel_img_topo");
			$tpt_pdc_complexo_hotel_img_375x288 = get_field("tpt_pdc_complexo_hotel_img_375x288");
			$tpt_pdc_complexo_hotel_img_630x448 = get_field("tpt_pdc_complexo_hotel_img_630x448");
			$tpt_pdc_complexo_hotel_img_227x322 = get_field("tpt_pdc_complexo_hotel_img_227x322");
			?>
			<div id="hotel" class="wrapper-geral wrapper-geral-pdc-complexo">
				<img class="img-fluid img-topo-complexo" src="<?php echo $tpt_pdc_complexo_hotel_img_topo; ?>">
				<div class="wrapper-inner-pdc-complexo-hotel">
					<div class="container-fluid container-complexo-hotel">
						<div class="row p-0">
							<div class="complexo-hotel-imgs col-xl-6 col-lg-6 col-12">
								<img class="complexo-hotel-img-menor" src="<?php echo $tpt_pdc_complexo_hotel_img_375x288; ?>" alt="<?php echo $tpt_pdc_complexo_hotel_titulo; ?>">
								<img class="img-fluid complexo-hotel-img-maior" src="<?php echo $tpt_pdc_complexo_hotel_img_630x448; ?>" alt="<?php echo $tpt_pdc_complexo_hotel_titulo; ?>">
							</div>
							<div class="complexo-hotel-info col-xl-6 col-lg-6 col-12">
								<div class="complexo-hotel-info">
									<h2 class="apresentacao-info-titulo"><?php echo $tpt_pdc_complexo_hotel_titulo; ?></h2>
									<div class="apresentacao-divisor-pdc"></div>
									<p class="apresentacao-info-chamada"><?php echo $tpt_pdc_complexo_hotel_chamada; ?></p>
									<p class="apresentacao-info-subtitulo"><?php echo $tpt_pdc_complexo_hotel_subtitulo; ?></p>
									<p class="apresentacao-info-desc"><?php echo $tpt_pdc_complexo_hotel_desc; ?></p>
								</div>
								<img src="<?php echo $tpt_pdc_complexo_hotel_img_227x322; ?>" alt="<?php echo $tpt_pdc_complexo_hotel_titulo; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
			$tpt_pdc_complexo_corporativo_titulo = get_field("tpt_pdc_complexo_corporativo_titulo");
			$tpt_pdc_complexo_corporativo_chamada = get_field("tpt_pdc_complexo_corporativo_chamada");
			$tpt_pdc_complexo_corporativo_desc = get_field("tpt_pdc_complexo_corporativo_desc");
			$tpt_pdc_complexo_corporativo_txt = get_field("tpt_pdc_complexo_corporativo_txt");
			$tpt_pdc_complexo_corporativo_img_topo = get_field("tpt_pdc_complexo_corporativo_img_topo");
			?>
			<div id="corporativo" class="wrapper-geral wrapper-geral-pdc-complexo">
				<img class="img-fluid img-topo-complexo" src="<?php echo $tpt_pdc_complexo_corporativo_img_topo; ?>">
				<div class="wrapper-inner-pdc-complexo-corporativo">
					<div class="container-fluid container-complexo-corporativo">
						<div class="row p-0">
							<div class="wrap-complexo-corporativo-info col-xl-6 col-lg-6 col-12">
								<div class="complexo-corporativo-info">
									<h2 class="apresentacao-info-titulo"><?php echo $tpt_pdc_complexo_corporativo_titulo; ?></h2>
									<div class="apresentacao-divisor-pdc"></div>
									<p class="apresentacao-info-chamada"><?php echo $tpt_pdc_complexo_corporativo_chamada; ?></p>
									<p class="apresentacao-info-desc"><?php echo $tpt_pdc_complexo_corporativo_desc; ?></p>
								</div>
							</div>
							<div class="complexo-corporativo-info-mais col-xl-6 col-lg-6 col-12">
								<p class="corporativo-txt-mais">
									<?php echo $tpt_pdc_complexo_corporativo_txt; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			


















			<?php // Seção Contato 
			// Captura informações do CMS
			$titulo_contato = get_field("tpt_pdc_home_contato_titulo",$imovel_ref);
			$subtitulo_contato = get_field("tpt_pdc_home_contato_subtitulo",$imovel_ref);
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
			<div class="wrapper-geral wrapper-geral-pdc-contato">
				<div class="container wrapper-inner wrapper-contato-body contato-form pt-0 pb-0">
					<div class="wrapper-contato-content">
						<form name="emailForm" id="emailForm" data-target="ws-produto" data-isintegrado=true method="post" action="#">
							<input type="hidden" name="idEmpreendimento" id="idEmpreendimento" value="<?php echo $imovel_id; ?>" id="utm_source">
							<input type="hidden" name="idForm" value="3" />

							<div class="contato-content-header">
								<div class="contato-content-title">
									<h2 class="titulo-section-pdc"><?php echo $titulo_contato; ?></h2>
									<div class="titulo-detalhe-pdc"></div>
									<p class="contato-pdc-subtitulo"><?php echo $subtitulo_contato; ?></p>
								</div>
								<div class="contato-content-title-separator"></div>
							</div>

							<div class="contato-content-body">
								<p class="contato-instrucoes"><?php echo $txt_intro; ?></p>

								<div class="form-group">
									<label for="nome"><?php echo $label_nome; ?></label>
									<input type="text" class="form-control" name="nome" id="nome">
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="email"><?php echo $label_email; ?></label>
										<input type="email" class="form-control" name="email" id="email">
									</div>
									<div class="form-group col-3 col-sm-2">
										<label for="ddd"><?php echo $label_telefone; ?></label>
										<input type="text" class="form-control" name="ddd" id="ddd" alt="ddd" maxlength="2" autocomplete="off">
									</div>
									<div class="form-group col-9 col-sm-10 col-md-4">
										<label for="fone">&nbsp;</label>
										<input type="text" class="form-control" name="fone" id="fone" alt="fone" maxlength="10" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="mensagem"><?php echo $label_mensagem; ?></label>
									<textarea class="form-control" name="mensagem" id="mensagem" rows="7"></textarea>
								</div>
								<div class="form-group">
									<div class="form-check">
										<label class="form-check-label d-flex align-items-center">
											<input class="form-check-input" name="info" value="on" type="checkbox"> <?php echo $txt_aceitar_news; ?>
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
										<button type="submit" class="form-control btn btn-primary" id="btnEnviar"><?php echo $txt_btn_enviar; ?></button>
									</div>
								</div>
								<div class="form-group pdc-pbrigatorios">
									<small class="form-text text-message-required">
										<?php echo $txt_obrigatorios; ?>
									</small>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>



	    	<?php // FOOTER
	    	$count = 0;
			if( have_rows('redes_sociais_pdc',$imovel_ref) ):
				while ( have_rows('redes_sociais_pdc',$imovel_ref) ) : the_row();
					$sociais_pdc[$count]['titulo'] = get_sub_field("nome_ro_rede_social_pdc");
					$sociais_pdc[$count]['show'] = get_sub_field("show_ro_rede_social_pdc");
					$sociais_pdc[$count]['icon'] = get_sub_field("icone_ro_rede_social_pdc");
					$sociais_pdc[$count]['url'] = get_sub_field("url_ro_rede_social_pdc");
					$count ++;
				endwhile;
			endif;
			$tpt_pdc_footer_address = get_field("tpt_pdc_footer_address",$imovel_ref);
			$tpt_pdc_footer_copyright = get_field("tpt_pdc_footer_copyright",$imovel_ref);
			$tpt_pdc_home_footer_ri = get_field("tpt_pdc_home_footer_ri",$imovel_ref);
			$logo = wp_get_attachment_url(get_field("logo_topo",311));
			?>
			<div class="wrapper-geral wrapper-geral-footer-pdc">
				<div class="wrapper-inner-pdc">
					<hr class="hr-divisor-footer-pdc">
					<div class="wrapper-inner wrapper-inner-footer-pdc">
						<div class="container-fluid">
							<div class="row">
								<div class="logo-ez-footer-pdc col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<img src="<?php echo $logo; ?>" alt="Eztec">
									</a>
								</div>
								<div class="sociais-footer-pdc col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6">
									<?php foreach($sociais_pdc as $so){
										if( $so["show"] == 1){
											echo '
											<a href="' . $so["url"] . '" target="_blank" rel="noopener">
												<img src="' . $so["icon"] . '" alt="' . $so["titulo"] . '">
											</a>
											';
										}
									} ?>
								</div>
								<div class="text-footer-pdc col-xl-7 col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<p class="address-footer-pdc"><?php echo $tpt_pdc_footer_address; ?></p>
									<p class="copyright-footer-pdc"><?php echo $tpt_pdc_footer_copyright; ?></p>
								</div>
								<div class="footer-ri col-12">
									<p><?php echo $tpt_pdc_home_footer_ri; ?></p>
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

<script>
		function closePop() { 
		    var myPop = document.getElementById("pop");
			myPop.style.display = "none";
		}
		setInterval(function() {
		  var myPop = document.getElementById("pop");
		  if (myPop.style.display == "none"){
		 	myPop.style.display = "block";
		 	myPop.style.animationDirection = "normal";
		 	myPop.style.animationDelay = "2s";
		 	myPop.style.animationTimingFunction = "ease-out";
		 	myPop.style.animationDuration = "1s";
		  }
		}, 120000);
</script>


<?php
get_footer();