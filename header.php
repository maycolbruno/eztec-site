<?php
/**
 * @package Eztec
 */


// Captura informações do menu de interação do CMS


// CMS = Contato
$txt_btn_contato_fl = get_field("txt_btn_contato_fl",311);
$txt_titulo_modal_contato = get_field("txt_titulo_modal_contato_fl",311);
$txt_chat = get_field("txt_chat_fl",311);
$icone_chat = wp_get_attachment_url(get_field("icone_interacao_chat_fl",311));
$alt_icone_chat = get_post_meta(get_field('icone_interacao_chat_fl',311), '_wp_attachment_image_alt', true);
$txt_email = get_field("txt_email_fl",311);
$icone_email = wp_get_attachment_url(get_field("icone_interacao_email_fl",311));
$alt_icone_email = get_post_meta(get_field('icone_interacao_email_fl',311), '_wp_attachment_image_alt', true);
$url_email = get_field("url_email",311);
$txt_whats = get_field("txt_whats_fl",311);
$icone_whats = wp_get_attachment_url(get_field("icone_interacao_whats_fl",311));
$alt_icone_whats = get_post_meta(get_field('icone_interacao_whats_fl',311), '_wp_attachment_image_alt', true);
$txt_tel = get_field("txt_telefones_fl",311);
$icone_tel = wp_get_attachment_url(get_field("icone_interacao_telefone_fl",311));
$alt_icone_tel = get_post_meta(get_field('icone_interacao_telefone_fl',311), '_wp_attachment_image_alt', true);
$num_tel = get_field("num_ligacao_telefone",311);

// CMS = Menu geral
$logo = wp_get_attachment_url(get_field("logo_topo",311));
$alt_logo = get_post_meta(get_field('logo_topo',311), '_wp_attachment_image_alt', true);
$logo_mobile = wp_get_attachment_url(get_field("logo_mobile",311));
$alt_logo_mobile = get_post_meta( get_field("logo_mobile",311), "_wp_attachment_image_alt", true);
$count = 0;
$count_sub = 0;
if( have_rows('pages_menu',311) ):
	while ( have_rows('pages_menu',311) ) : the_row();
		$pages[$count]['title']       = get_sub_field("txt_link_menu_geral");
		$pages[$count]['url_page']    = get_sub_field("url_page_menu_geral");
		$pages[$count]['tem_externo'] = get_sub_field("tem_link_externo_menu_geral");
		$pages[$count]['url_externa'] = get_sub_field("url_externo_menu_geral");
		$pages[$count]['menu_tem_subitem'] = get_sub_field("menu_tem_subitem");
		$pages[$count]['id_pai'] = $count;
		$tem_sub = get_sub_field("menu_tem_subitem");
		if($tem_sub == 1){
			if( have_rows('subitens_de_menu') ):
				while ( have_rows('subitens_de_menu') ) : the_row();
					$pages_sub[$count_sub]['id_pai'] = $count;
					$pages_sub[$count_sub]['titulo'] = get_sub_field("menu_subitem_txt");
					$pages_sub[$count_sub]['externa'] = get_sub_field("menu_subitem_externa");
					$pages_sub[$count_sub]['url_externa'] = get_sub_field("menu_subitem_url_externa");
					$pages_sub[$count_sub]['url'] = get_sub_field("menu_subitem_url");
					$count_sub ++;
				endwhile;
			endif;
		}
		$count ++;
	endwhile;
endif;
$n = 0;

// Chat Online
$current_post_type = get_post_type();
global $id_chat_param;
if($current_post_type == "imovel"){
	$id_chat_param = get_the_ID();
}
else{
	$id_chat_param = "geral";
}



// Configuração de Cookies para Busca Avançada de páginas de resultado de busca

$time_busca = time()+60*60*24*30;// Tempo de cookies para itens de escolha de busca

$paginado = 0;
$paginado = get_query_var('paged'); // verifica se a página atual é de paginação, se $paginado é maior que zero, sifgnifica que é

// if(strpos($_SERVER['REQUEST_URI'], '/page/') || strpos($_COOKIE['last_page'], '/page/')){
// 	$paginado = true; // testa se ocorre /page/ na url para identificar se está em paginação
// }




// torna global parametros por url e configura cookies
global $wp_query;
$host = parse_url(get_option('siteurl'), PHP_URL_HOST);


$utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : "";
global $source_print;
global $string_whats;
global $url_referer;
$url_referer = $_SERVER['HTTP_REFERER'];
if (isset($_COOKIE['v_source'])){
	$source_print = $_COOKIE['v_source'];
	$string_whats = 'https://api.whatsapp.com/send?phone=551150568300&text=[' . $source_print . ']+Olá,+gostaria+de+mais+informa%C3%A7%C3%B5es+sobre+a+compra+de+apartamentos';
}
else{
	$source_print = "";
	$source_print = $utm_source;
	if($source_print !== ""){
		setcookie( 'v_source', $source_print, time()+60*60*24*30, COOKIEPATH, $host, false );
		$string_whats = 'https://api.whatsapp.com/send?phone=551150568300&text=[' . $source_print . ']+Olá,+gostaria+de+mais+informa%C3%A7%C3%B5es+sobre+a+compra+de+apartamentos';
	}
	else{
		if($url_referer == ""){
			$string_whats = 'https://api.whatsapp.com/send?phone=551150568300&text=[Site]+Olá,+gostaria+de+mais+informa%C3%A7%C3%B5es+sobre+a+compra+de+apartamentos';	
		}
		else{
			$string_whats = 'https://api.whatsapp.com/send?phone=551150568300&text=[' . $source_print . ']+Olá,+gostaria+de+mais+informa%C3%A7%C3%B5es+sobre+a+compra+de+apartamentos';
		}
	}
}

// torna variáveis globais para uso dos dados de cookies nas páginas de resultado de busca
global $veio_de_busca;

$veio_de_busca = 'desativo';

$manter_cookies = 0;
if ($paginado !== 0) {
    if($_COOKIE['ba_active'] == 'ativo'){
    	$manter_cookies = 1;
    	$veio_de_busca = 'ativo';
	}
}

if($_POST['baDoSearch'] == 1) {
    setcookie( 'ba_active', 'ativo', $time_busca, COOKIEPATH, $host, false );
    $veio_de_busca = 'ativo';

    if($_POST['baResidencial'][0] == "Residencial") {
    	setcookie( 'ba_res', $_POST['baResidencial'][0], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_res', '', $time_busca, COOKIEPATH, $host, false );
    }

    if($_POST['baComercial'][0] == "Comercial") {
    	setcookie( 'ba_com', $_POST['baComercial'][0], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_com', '', $time_busca, COOKIEPATH, $host, false );
    }

    if(isset($_POST['baStatus'])) {
    	setcookie( 'ba_status', $_POST['baStatus'], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_status', '', $time_busca, COOKIEPATH, $host, false );
    }

    if(isset($_POST['baDorms'])) {
    	setcookie( 'ba_dorms', $_POST['baDorms'], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_dorms', '', $time_busca, COOKIEPATH, $host, false );
    }

    if(isset($_POST['baSuites'])) {
    	setcookie( 'ba_suites', $_POST['baSuites'], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_suites', '', $time_busca, COOKIEPATH, $host, false );
    }

    if(isset($_POST['baVagas'])) {
    	setcookie( 'ba_vagas', $_POST['baVagas'], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_vagas', '', $time_busca, COOKIEPATH, $host, false );
    }

    if(isset($_POST['baRegiao'])) {
    	setcookie( 'ba_regiao', $_POST['baRegiao'], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_regiao', '', $time_busca, COOKIEPATH, $host, false );
    }

    if(isset($_POST['baFaixasPreco'])) {
    	setcookie( 'ba_preco', $_POST['baFaixasPreco'], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_preco', '', $time_busca, COOKIEPATH, $host, false );
    }

    if(isset($_POST['baMetragem'])) {
    	setcookie( 'ba_metragem', $_POST['baMetragem'], $time_busca, COOKIEPATH, $host, false );
    }
    else{
		setcookie( 'ba_metragem', '', $time_busca, COOKIEPATH, $host, false );
    }
}
else{
	if ($manter_cookies !== 1){
		// deleta cookies se não veio de busca e não pagina vindo de busca
		setcookie( 'ba_active', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_res', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_com', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_status', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_dorms', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_suites', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_vagas', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_regiao', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_preco', '', $time_busca, COOKIEPATH, $host, false );
		setcookie( 'ba_metragem', '', $time_busca, COOKIEPATH, $host, false );
	}
	else{
		$veio_de_busca = 'ativo';
	}
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="TxKlL8AQ-aN9Rty_WMAkzr3zsPIc5sLVBIkTqSOsFh8" />
	<meta name="facebook-domain-verification" content="d4y2azcjs38vjv4hhartyd8ff23n9g" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.1.1/dist/sweetalert2.all.js"></script>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NSQNZ5J');</script>
	<!-- End Google Tag Manager -->

	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins/lightslider.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/js/lightgallery-all.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins/jquery.mousewheel.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins/jquery.singlePageNav.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins/jquery.validate.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins/jquery.inputmask.bundle.js"></script>

	<script type="text/javascript" id="PrivallyApp" src="https://app.privally.global/app.js" pid="83aac2-db48f8" async></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NSQNZ5J"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<div id="page" class="site">

		<?php
		// Esconde header para páginas específicas
		$disallow_header = 0;
		$disallow_header = get_field("disallow_header");
		$page_busca = is_search();
		if($page_busca == TURE){
			$disallow_header = 0;
		}
		if ($disallow_header == 0){
		?>
		<header id="masthead">

			<!-- .menu-geral -->
			<div class="container-fluid p-0 menu-geral">

				<?php if (is_front_page()) { ?>
					<h1 class="site-title sr-only"><?php bloginfo( 'name' ); ?></h1>
				<?php } ?>

				<!-- Menu: Desktop -->
				<div class="container wrapper-inner menu-geral-full d-none d-md-none d-lg-block">

					<!-- Start: .navbar -->
					<nav class="navbar navbar-expand-lg navbar-dark">
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img class="logo-default" src="<?php echo $logo; ?>" alt="EZTEC">
							<img class="logo-mobile" src="<?php echo $logo_mobile; ?>" alt="EZTEC">
						</a>

						<div class="collapse navbar-collapse d-flex justify-content-end">
							<ul class="navbar-nav">
								<?php
								foreach ($pages as $page){
									if($page["menu_tem_subitem"] == 1){
										echo '
										<li class="nav-item">
											<div class="dropdown show">
												<a class="dropdown-pai dropdown-toggle" href="#" role="button" id="dropdownMenuLink' . $n . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											    ' . $page["title"] . '
												</a>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuLink' . $n . '">';
											    	foreach($pages_sub as $i){
											    		if($i["id_pai"] == $page["id_pai"]){
												    		// Verifica se é link externo ou não.
															if ($i['externa'] == 1){
																$url = $i['url_externa'];
																$target = ' target="_blank" rel="noopener"';
															}
															else{
																$url = $i['url'];
																$target = '';
															}
												    		echo '
												    		<a class="dropdown-item" href="' . $url . '"' . $target . '>' . $i["titulo"] . '</a>
												    		';
												    	}
											    	}
												echo '
												</div>
											</div>
										</li>';
									}
									else{
										// Verifica se é link externo ou não.
										if ($page['tem_externo'] == 1){
											$url = $page['url_externa'];
											$target = ' target="_blank" rel="noopener"';
										}
										else{
											$url = $page['url_page'];
											$target = '';
										}

										echo '<li class="nav-item">
												<a href="' . $url . '"' . $target . ' class="nav-link">' . $page["title"] . '</a>
											</li>';
									}
									$n ++;
								}
								?>
							</ul>
							<div class="busca-basica">
								<?php get_search_form(); ?>
							</div>
						</div>
					</nav>
					<!-- End: .navbar -->
				</div>

				<!-- Menu: Mobile -->
				<div class="container wrapper-inner menu-geral-mobile d-block d-lg-none d-md-block p-0">

					<nav class="navbar navbar-expand-lg navbar-dark" id="menuopcoes" role="tablist">
						<div class="container-fluid">
							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img class="logo-mobile" src="<?php echo $logo_mobile; ?>" alt="<?php echo $alt_logo_mobile; ?>">
							</a>
							<button class="navbar-toggler btn-busca" type="button" role="tab" id="menuOpcoesBusca" data-toggle="collapse" data-target="#collapseMenuOpcoesBusca" aria-expanded="false" aria-controls="collapseMenuOpcoesBusca" aria-label="Abre Campo de Busca">
								<i class="lupa-search"><img src="<?php echo wp_get_attachment_url(get_field('icon_busca_fl',311)); ?>" alt="Busca"></i>
							</button>
							<button class="navbar-toggler btn-menu" type="button" role="tab" id="menuOpcoesMenuGeral" data-toggle="collapse" data-target="#collapseMenuOpcoesMenuGeral" aria-expanded="false" aria-controls="collapseMenuOpcoesMenuGeral" aria-label="Abre Menu">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse" role="tabpanel" aria-labelledby="menuOpcoesBusca" id="collapseMenuOpcoesBusca" data-parent="#menuopcoes">
								<div id="buscas" role="tablist">
									<div class="card">
										<button class="btn btn-link btn-opcoes-busca text-left" type="button" role="tab" id="buscaPalavraChave" data-toggle="collapse" data-target="#collapseBuscaPalavraChave" aria-expanded="false" aria-controls="collapseBuscaPalavraChave">
											BUSCAR PALAVRA CHAVE
										</button>
										<div id="collapseBuscaPalavraChave" class="collapse" role="tabpanel" aria-labelledby="buscaPalavraChave" data-parent="#buscas">
											<div class="card-body">
												<div class="busca-basica">
													<?php get_search_form(); ?>
												</div>
											</div>
										</div>
									</div>
									<div class="card">
										<button class="btn btn-link btn-opcoes-busca text-left" type="button" role="tab" id="buscaImovel" data-toggle="collapse" data-target="#collapseBuscaImovel" aria-expanded="false" aria-controls="collapseBuscaImovel">
											BUSCAR IMÓVEL
										</button>
										<div id="collapseBuscaImovel" class="collapse" role="tabpanel" aria-labelledby="buscaImovel" data-parent="#buscas">
											<div class="card-body">
												<?php get_template_part( 'template-parts/header/busca-avancada-mobile', 'page' ); ?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="collapse navbar-collapse" role="tabpanel" aria-labelledby="menuOpcoesMenuGeral" id="collapseMenuOpcoesMenuGeral" data-parent="#menuopcoes">
								<ul class="navbar-nav d-flex">
									<?php
									foreach ($pages as $page){
										if($page["menu_tem_subitem"] == 1){
											echo '
											<li class="nav-item">
												<div class="dropdown show">
													<a class="dropdown-pai dropdown-toggle" href="#" role="button" id="dropdownMenuLink' . $n . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    ' . $page["title"] . '
													</a>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuLink' . $n . '">';
												    	foreach($pages_sub as $i){
												    		if($i["id_pai"] == $page["id_pai"]){
													    		// Verifica se é link externo ou não.
																if ($i['externa'] == 1){
																	$url = $i['url_externa'];
																	$target = ' target="_blank" rel="noopener"';
																}
																else{
																	$url = $i['url'];
																	$target = '';
																}
													    		echo '
													    		<a class="dropdown-item" href="' . $url . '"' . $target . '>' . $i["titulo"] . '</a>
													    		';
													    	}
												    	}
													echo '
													</div>
												</div>
											</li>';
										}
										else{
											// Verifica se é link externo ou não.
											if ($page['tem_externo'] == 1){
												$url = $page['url_externa'];
												$target = ' target="_blank" rel="noopener"';
											}
											else{
												$url = $page['url_page'];
												$target = '';
											}

											echo '<li class="nav-item">
													<a href="' . $url . '"' . $target . ' class="nav-link">' . $page["title"] . '</a>
												</li>';
										}
										$n ++;
									}
									?>
								</ul>
							</div>
						</div>

					</nav>
					<!-- End: .navbar -->
				</div>


			</div><!-- .menu-geral -->


			<?php // CONTATO ?>
			<div class="wrpper-geral">
				<div class="wrpper-inner">
					<div class="wrapper-box-cta-contato">
						<div class="wrapper-cta-contato">
							<div class="wrap-cta-contato">
								<a href="#" data-toggle="modal" data-target="#modalContatoGeral">
									<div class="cta-contato">
										<?php echo $txt_btn_contato_fl; ?>
									</div>
									<div class="triangle-top-right"></div>
								</a>
							</div>
							<div class="detalhe-cta-contato"></div>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal: Contato Geral -->
			<?php get_template_part( 'template-parts/forms/modal-contato', 'page' ); ?>

			<!-- Modal: Contato E-mail -->
			<?php get_template_part( 'template-parts/forms/mi-produto', 'page' ); ?>
			
			<!-- Modal: Chat Online -->
			<?php
			$shortcode_chat = '[mi_chat imovel_id="0" chat_id="' . $id_chat_param . '"]';
			echo do_shortcode($shortcode_chat);
			?>

			<!-- Modal: Busca Avançada -->
			<div class="modal-busca-avancada modal fade" id="modalBuscaAvancada" tabindex="-1" role="dialog" aria-labelledby="modalBuscaAvancadaLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
						<?php get_template_part( 'template-parts/header/busca-avancada-modal', 'page' ); ?>
					</div>
				</div>
			</div>


			<!-- Pill Chat -->
			<?php
			$tipo_post = get_post_type();
			if ($tipo_post == "imovel"){
				$modal_id = "modalChat-" . get_the_ID();
			}
			else{
				$modal_id = "modalChat-geral";
			}
			?>
			<div class="wrapper-pill-chat">
				<div class="pill-chat" id="PillChat">
					<div class="pill-chat-txt" id="chatTxt">
						<a class="back-open-chat" href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
							<img class="img-text-msg" src="https://www.eztec.com.br/wp-content/uploads/institucional/chat-animado/icon-chat-txt-2.png" alt="Olá, como posso te ajudar?" title="Olá, como posso te ajudar?">
						</a>
					</div>
					<div class="pill-chat-circles">
						<div class="front" id="chatFront">
							<img src="https://www.eztec.com.br/wp-content/uploads/institucional/chat-animado/icon-chat-whats2.png">
						</div>
    					<div class="back" id="chatBack">
    						<a class="back-open-chat" href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
    							<img src="https://www.eztec.com.br/wp-content/uploads/institucional/chat-animado/animated-chat-2.png">
    						</a>
    					</div>
					</div>
				</div>
			</div>

			<script>
				$("#chatFront").on("click",function() {
			        $("#chatTxt").css("display", "block");
			        $("#PillChat").css("width", "338px");
			        $("#chatTxt").css("opacity", "1");
			        $("#chatTxt").css("animation", "move 1s");
			        $("#chatBack").css("display", "block");
			        $("#chatFront").css("display", "none");
			    });
			    $("#chatBack").on("click",function() {
			        $("#chatTxt").css("display", "none");
			        $("#PillChat").css("width", "73px");
			        $("#chatTxt").css("opacity", "0");
			        $("#chatBack").css("display", "none");
			        $("#chatFront").css("display", "block");
			    });
			    $("#chatTxt").on("click",function() {
			        $("#chatTxt").css("display", "none");
			        $("#PillChat").css("width", "73px");
			        $("#chatTxt").css("opacity", "0");
			        $("#chatBack").css("display", "none");
			        $("#chatFront").css("display", "block");
			    });
			</script>

		</header><!-- #masthead -->
		<?php } ?>



		<div id="content" class="site-content">
