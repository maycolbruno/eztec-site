<?php
// PÁGINA DE CAMPANHA

// Pop Up
$exibir_popup = get_field("exibir_popup");
if ($exibir_popup == 1){
	$titulo_popup = get_field("titulo_popup");
	$icone_popup = get_field("icone_popup");
	$imagem_popup = get_field("imagem_popup");
	$txt_1_popup = get_field("txt_1_popup");
	$txt_2_popup = get_field("txt_2_popup");
	$btn_cta_popup = get_field("btn_cta_popup");
	$usar_direc_popup = get_field("usar_direc_popup");
	$url_popup = get_field("url_popup");
}

$template = get_field("template_campanha");
if ($template == "livre"){
	$path_livre = get_field("path_template");
	$template_path = 'template-parts/' . $path_livre;
	$nav_to_top = "";
}
else{
	$template_path = 'template-parts/campanha/template-' . $template;
}
?>

<div class="container-fluid wrapper-campanha">

	<?php
	if($exibir_popup == 1){

		$current_post_type = get_post_type();
		if($current_post_type == "imovel"){
			$id_chat_param = get_the_ID();
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
		echo $nav_to_top;
	}
	?>

	<header class="wrapper-banner">
		<?php
		switch (get_field("tipo_de_banner")) {

			case 'is_image':
				$headerTemplate = 'template-parts/header/banner-imagens';
				break;

			case 'is_html':
				$headerTemplate = 'template-parts/header/banner-html';
				break;

			case 'is_video':
				$headerTemplate = 'template-parts/header/banner-video';
				break;

		}
		// Monta header template
		get_template_part( $headerTemplate, 'page' );
		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<?php
	// Monta template escolhido
	get_template_part( $template_path, 'page' );
	?>

</div>