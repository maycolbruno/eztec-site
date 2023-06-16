<?php
/*
 * Template Name: Imóvel - Unique Green
 * Template Post Type: imovel
 */

get_header(); ?>

<?php 
$page_ref = get_field("page_ref");
$tpt_uniquegreen_home_logo = get_field("tpt_uniquegreen_home_logo",$page_ref);
$tpt_uniquegreen_home_logo_mobile = get_field("tpt_uniquegreen_home_logo_mobile",$page_ref);
$tpt_uniquegreen_home_chat_txt = get_field("tpt_uniquegreen_home_chat_txt",$page_ref);
$tpt_uniquegreen_home_email_txt = get_field("tpt_uniquegreen_home_email_txt",$page_ref);
$tpt_uniquegreen_home_whats_txt = get_field("tpt_uniquegreen_home_whats_txt",$page_ref);
$tpt_uniquegreen_home_phone_txt = get_field("tpt_uniquegreen_home_phone_txt",$page_ref);
$tpt_uniquegreen_home_corretor_txt = get_field("tpt_uniquegreen_home_corretor_txt",$page_ref);
$tpt_uniquegreen_home_chat_icon = get_field("tpt_uniquegreen_home_chat_icon",$page_ref);
$tpt_uniquegreen_home_email_icon = get_field("tpt_uniquegreen_home_email_icon",$page_ref);
$tpt_uniquegreen_home_whats_icon = get_field("tpt_uniquegreen_home_whats_icon",$page_ref);
$tpt_uniquegreen_home_phone_icon = get_field("tpt_uniquegreen_home_phone_icon",$page_ref);
$tpt_uniquegreen_home_corretor_icon = get_field("tpt_uniquegreen_home_corretor_icon",$page_ref);
$tpt_uniquegreen_banner_titulo = get_field("tpt_uniquegreen_banner_titulo");
$tpt_uniquegreen_banner_img = get_field("tpt_uniquegreen_banner_img");
$tpt_uniquegreen_banner_img_mobile = get_field("tpt_uniquegreen_banner_img_mobile");
$num_tel = get_field("num_ligacao_telefone",311);
$count = 0;
$c = 0;
if( have_rows('tpt_uniquegreen_home_menu_itens',$page_ref) ):
	while ( have_rows('tpt_uniquegreen_home_menu_itens',$page_ref) ) : the_row();
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
	$id_chat_param = 484;
}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

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
							<a href="<?php echo get_permalink($page_ref); ?>" class="logo-uniquegreen"><img class="logo-uniquegreen-img" src="<?php echo $tpt_uniquegreen_home_logo; ?>" alt="Unique Green"></a>
							<a href="<?php echo get_permalink($page_ref); ?>" class="logo-uniquegreen-mobile"><img class="logo-uniquegreen-img-mobile" src="<?php echo $tpt_uniquegreen_home_logo_mobile; ?>" alt="Unique Green"></a>
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

				<header class="wrapper-banner">
					<?php
					$count = 0;
					if( have_rows('banners_produto_slider_fl') ):
						while ( have_rows('banners_produto_slider_fl') ) : the_row();
							$banners[$count]['titulo']    = get_sub_field("titulo_banner_slider_fl");
							$banners[$count]['subtitulo'] = get_sub_field("subtitulo_banner_slider_fl");
							$banners[$count]['img']       = get_sub_field("img_banner_slider_fl");
							$banners[$count]['img_md']       = get_sub_field("img_banner_slider_md_fl");
							$banners[$count]['img_xs']       = get_sub_field("img_banner_slider_xs_fl");
							$count ++;
						endwhile;
					endif;
					?>

					<div class="banner-slide">

						<?php // Carrossel para formato medium-large-xl ?>
						<div id="carouselBannerSliderMd" class="carousel slide d-none d-md-block" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<?php
								$n = 0;
								foreach ($banners as $banner){
									$active_class = ($n == 0 ? ' active' : '');
								  	echo '
									<div class="carousel-item ml-auto mr-auto ' . $active_class . '">
										<img class="img-fluid" src="' . wp_get_attachment_url($banner["img"]) . '" alt="' . get_post_meta( $banner["img"], "_wp_attachment_image_alt", true) . '">
										<div class="carousel-caption d-flex align-items-center justify-content-center w-100 h-100">
											<div class="carousel-caption-center">
											    <h1 class="banner-slide-title text-center">' . $banner["titulo"] . '</h1>
											    <span class="banner-slide-subtitle text-center">' . $banner["subtitulo"] . '</span>
											</div>
										</div>
									</div>';
									$n ++;
								}
								if ($n > 1){
									echo '
							  		<a class="carousel-control-prev" href="#carouselBannerSliderMd" role="button" data-slide="prev">
									    <span class="carousel-control-prev-icon" aria-hidden="true">
											<i class="seta-base-banner seta-left" aria-hidden="true"></i>
								    	</span>
									    <span class="sr-only">Anterior</span>
									</a>
									<a class="carousel-control-next" href="#carouselBannerSliderMd" role="button" data-slide="next">
									    <span class="carousel-control-next-icon" aria-hidden="true">
											<i class="seta-base-banner seta-right" aria-hidden="true"></i>
									    </span>
									    <span class="sr-only">Próximo</span>
									</a>';
								}
								?>
							</div>
						</div>

						<?php // Carrossel para formato medium ?>
						<div id="carouselBannerSliderSm" class="carousel slide d-none d-sm-block d-md-none" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<?php
								$n = 0;
								foreach ($banners as $banner){
									$active_class = ($n == 0 ? ' active' : '');
								  	echo '
									<div class="carousel-item ' . $active_class . '">
										<img class="img-fluid" src="' . wp_get_attachment_url($banner["img_md"]) . '" alt="' . get_post_meta( $banner["img_md"], "_wp_attachment_image_alt", true) . '">
										<div class="carousel-caption d-flex align-items-center justify-content-center w-100 h-100">
											<div class="carousel-caption-center">
											    <span class="banner-slide-title text-center">' . $banner["titulo"] . '</span>
											    <span class="banner-slide-subtitle text-center">' . $banner["subtitulo"] . '</span>
											</div>
										</div>
									</div>';
									$n ++;
								}
								if ($n > 1){
									echo '
							  		<a class="carousel-control-prev" href="#carouselBannerSliderSm" role="button" data-slide="prev">
									    <span class="carousel-control-prev-icon" aria-hidden="true">
											<i class="seta-base-banner seta-left" aria-hidden="true"></i>
								    	</span>
									    <span class="sr-only">Anterior</span>
									</a>
									<a class="carousel-control-next" href="#carouselBannerSliderSm" role="button" data-slide="next">
									    <span class="carousel-control-next-icon" aria-hidden="true">
											<i class="seta-base-banner seta-right" aria-hidden="true"></i>
									    </span>
									    <span class="sr-only">Próximo</span>
									</a>';
								}
								?>
							</div>
						</div>

						<?php // Carrossel para formato extra small ?>
						<div id="carouselBannerSlider" class="carousel slide d-block d-sm-none" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<?php
								$n = 0;
								foreach ($banners as $banner){
									$active_class = ($n == 0 ? ' active' : '');
								  	echo '
									<div class="carousel-item ' . $active_class . '">
										<img class="img-fluid ml-auto mr-auto" src="' . wp_get_attachment_url($banner["img_xs"]) . '" alt="' . get_post_meta( $banner["img_xs"], "_wp_attachment_image_alt", true) . '">
										<div class="carousel-caption d-flex align-items-center justify-content-center w-100 h-100">
											<div class="carousel-caption-center">
											    <span class="banner-slide-title text-center">' . $banner["titulo"] . '</span>
											    <span class="banner-slide-subtitle text-center">' . $banner["subtitulo"] . '</span>
											</div>
										</div>
									</div>';
									$n ++;
								}
								if ($n > 1){
									echo '
							  		<a class="carousel-control-prev" href="#carouselBannerSlider" role="button" data-slide="prev">
									    <span class="carousel-control-prev-icon" aria-hidden="true">
											<i class="seta-base-banner seta-left" aria-hidden="true"></i>
								    	</span>
									    <span class="sr-only">Anterior</span>
									</a>
									<a class="carousel-control-next" href="#carouselBannerSlider" role="button" data-slide="next">
									    <span class="carousel-control-next-icon" aria-hidden="true">
											<i class="seta-base-banner seta-right" aria-hidden="true"></i>
									    </span>
									    <span class="sr-only">Próximo</span>
									</a>';
								}
								?>
							</div>
						</div>

					</div>
				</header>






				<?php
				// Seção Características da página de produto
				$titulo_carac = get_field("imovel_titulo_caracteristicas");
				$logo_carac = get_field("imoveis_logo_caracteristicas_fl");
				$box_carac = get_field("imovel_box_produto_caracteristicas");
				$img_carac = get_field("imovel_img_produto_caracteristicas");
				?>

				<section id="caracteristicas" class="wrapper-caracteristicas pb-0">
					<div class="container-fluid wrapper-imovel-caracteristicas p-0">
						<div class="container wrapper-inner imovel-caracteristicas">
							<div class="row">
								<div class="col-12">
									<h2 class="projeto-titulo text-center"><?php echo $titulo_carac; ?></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="container-fluid p-0">
						<div class="row">
							<div class="col-12">
								<img class="img-fluid img-carac" alt="<?php echo $titulo_carac; ?>" src="<?php echo $img_carac; ?>">
							</div>
						</div>
					</div>
					<div class="wrapper-geral logo-box">
						<div class="container wrapper-inner imovel-caracteristicas">
							<div class="row caracteristicas-intro">
								<div class="col-xl-4 col-lg-4 col-12 wrap-imovel-logo">
									<div class="caracteristicas-description-img">
										<img class="img-fluid" src="<?php echo wp_get_attachment_url($logo_carac); ?>" alt="<?php echo get_the_title(); ?>"/>
									</div>
								</div>
								<div class="col-xl-8 col-lg-8 col-12 wrap-imovel-box">
									<div class="imovel-box-de-produto"><?php echo $box_carac; ?></div>
								</div>
							</div>
						</div>
					</div>
				</section>







				<?php
				// Seção Diferenciais
				$dif_titulo = get_field("dif_titulo");
				$dif_conteudo = get_field("dif_conteudo");
				$dif_texto_legal = get_field("dif_texto_legal");
				$count = 0;
				if( have_rows('dif_itens') ):
					while ( have_rows('dif_itens') ) : the_row();
						$diferenciais[$count]['titulo'] = get_sub_field("dif_item_titulo");
						$diferenciais[$count]['logo'] = get_sub_field("dif_item_logo");
						$count ++;
					endwhile;
				endif;
				?>

				<section id="diferenciais" class="wrapper-diferenciais">
					<div class="container-fluid wrapper-imovel-diferenciais p-0">
						<div class="container wrapper-inner imovel-diferenciais">
							<div class="row">
								<div class="col-12">
									<h2 class="dif-titulo"><?php echo $dif_titulo; ?></h2>
								</div>
								<div class="col-12">
									<div class="dif-conteudo"><?php echo $dif_conteudo; ?></div>
								</div>
								<div class="col-12">
									<div class="dif-texto-legal"><?php echo $dif_texto_legal; ?></div>
								</div>
							</div>
							<div class="row">
								<?php 
								foreach($diferenciais as $i){
									echo '
									<div class="col-xl-3 col-lg-3 col-md-6 col-12 text-center">
										<h3 class="dif-item-titulo">' . $i["titulo"] . '</h3>
										<img class="dif-item-img" src="' . $i["logo"] . '" alt="' . $i["titulo"] . '">
									</div>
									';
								}
								?>
							</div>
						</div>
					</div>
				</section>








				<?php
				// Seção Galeria
				$monta_galeria = 0;
				if (get_field("exibir_apartamentos") == 1){
					$monta_galeria = 1;
				}
				if (get_field("exibir_plantas") == 1){
					$monta_galeria = 1;
				}
				if (get_field("exibir_lazer") == 1){
					$monta_galeria = 1;	
				}

				$monta_videos = 0;
				if (get_field("exibir_videos") == 1){
					$monta_videos = 1;
				}
				if (get_field("exibir_tour") == 1){
					$monta_videos = 1;	
				}
				if ($monta_galeria == 1){
					get_template_part( 'template-parts/produto/galeria', 'page' );
				}

				// Seção Downloads
				if (get_field("exibir_downloads") == 1){
					get_template_part( 'template-parts/produto/downloads', 'page' );
				}



				// Ficha Técnica
				$titulo_ficha = get_field("imovel_titulo_carac_ficha");
				$ficha_tecnica = get_field("imovel_ficha_carac_ficha");
				?>
				<section id="ficha" class="wrapper-ficha-tecnica pb-0">
					<div class="container-fluid wrapper-ficha-tecnica p-0">
						<div class="container wrapper-inner ficha-tecnica">
							<div id="caracteristicasAccordion" data-children=".item">
								<div class="row d-flex justify-content-center">
									<div class="col-12 col-md-8">
										<a class="ficha-tecnica-accordion d-flex justify-content-center collapsed" data-toggle="collapse" data-parent="#caracteristicasAccordion" href="#caracteristicasAccordion1" aria-expanded="false" aria-controls="caracteristicasAccordion1">
											<div class="row ficha-tecnica-box d-flex align-items-center w-100">
												<div class="col-12">
													<div class="wrapper-header-ficha">
														<div class="header-ficha">
															<div class="ficha-tecnica-titulo">
																<?php echo $titulo_ficha; ?>
															</div>
														</div>
														<button class="ficha-tecnica-btn">
															<div class="ficha-tecnica-btn-open justify-content-center align-items-center">
																<i class="seta-unique" aria-hidden="true"></i>
															</div>
															<div class="ficha-tecnica-btn-close justify-content-center align-items-center">
																<span>x</span>
															</div>
														</button>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div id="caracteristicasAccordion1" class="ficha-tecnica-dados collapse" role="tabpanel">
									<?php echo $ficha_tecnica; ?>
								</div>
							</div>
						</div>
					</div>
				</section>





				<?php
				// Seção Contato 
				$imovel_id = get_field("imovel_id");
				$titulo_contato = get_field("titulo_imovel_contato");
				$subtitulo_contato = get_field("subtitulo_imovel_contato");
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
				$tpt_uniquegreen_footer_address = get_field("tpt_uniquegreen_footer_address",$page_ref);
				$tpt_uniquegreen_footer_copyright = get_field("tpt_uniquegreen_footer_copyright",$page_ref);
				$tpt_uniquegreen_home_footer_ri = get_field("tpt_uniquegreen_home_footer_ri",$page_ref);
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
			</div>

			

		</main>
	</div>

<!-- Modal: Contato E-mail -->
<?php get_template_part( 'template-parts/forms/mi-produto', 'page' ); ?>
<!-- Modal: Contato Whatsapp -->
<?php get_template_part( 'template-parts/forms/mi-whats', 'page' ); ?>
<!-- Modal: Chat Online -->
<?php
$shortcode_chat = '[mi_chat imovel_id="0" chat_id="' . $id_chat_param . '"]';
echo do_shortcode($shortcode_chat);
?>

<style>
.site-footer{
	display: none !important;
}
</style>

<?php
get_footer();
