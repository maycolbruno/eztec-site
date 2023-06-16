<?php
/*
 * Template Name: Estilo EZ - Imóveis
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

<div class="wrapper-geral estiloez estiloez-imoveis">

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
							    <a class="nav-link nav-link-pdc" href="<?php echo esc_url( home_url( '/' ) ); ?>estilo/">ESTILO EZ</a>
							</div>
							<div class="nav-item nav-item-pdc text-center">
							    <a class="nav-link nav-link-pdc" href="<?php echo esc_url( home_url( '/' ) ); ?>estilo/#Imoveis">IMÓVEIS</a>
							</div>
							<div class="nav-item nav-item-pdc text-center">
							    <a class="nav-link nav-link-pdc" href="<?php echo esc_url( home_url( '/' ) ); ?>estilo/#Centrais">CENTRAIS DE ATENDIMENTO</a>
							</div>
							<div class="nav-item nav-item-pdc text-center">
							    <a class="nav-link nav-link-pdc" href="<?php echo esc_url( home_url( '/' ) ); ?>estilo/#Contato">CONTATO</a>
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 imoveis-info-imoveis text-center">
					<div class="wrapper-inner">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="imoveis-titulo"><?php echo $imoveis_titulo; ?></div>
								</div>
								<div class="col-xl-3 col-lg-3 col-6">
									<select id="SelectRegiao" name="regiao" class="select-estiloez" onchange="filtraImovel();">
									  <option value="" selected>Região</option>
									  <option value="zs">Zona Sul</option>
									  <option value="zl">Zona Leste</option>
									  <option value="zo">Zona Oeste</option>
									  <option value="os">Osasco</option>
									</select>
								</div>
								<div class="col-xl-3 col-lg-3 col-6">
									<select id="SelectFase" name="fase" class="select-estiloez" onchange="filtraImovel();">
									  <option value="" selected>Fase</option>
									  <option value="01">Lançamento</option>
									  <option value="02">Em Construção</option>
									  <option value="03">Pronto</option>
									</select>
								</div>
								<div class="col-xl-3 col-lg-3 col-6">
									<select id="SelectPreco" name="preco" class="select-estiloez" onchange="filtraImovel();">
									  <option value="" selected>Faixa de preço</option>
									  <option value="01">Até 500 Mil</option>
									  <option value="02">500 Mil a 1 Milhão</option>
									  <option value="03">1 Milhão a 1,5 Milhão</option>
									  <option value="04">1,5 Milhão a 2 Milhões</option>
									  <option value="05">Acima de 2 Milhões</option>
									</select>
								</div>
								<div class="col-xl-3 col-lg-3 col-6">
									<select id="SelectDorms" name="dorms" class="select-estiloez" onchange="filtraImovel();">
									  <option value="" selected>Dormitórios</option>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper-inner">
			<div class="container-fluid">
				<div class="row">
					<pre><?php // print_r($imoveis); ?></pre>
					<?php 
					foreach($imoveis as $i){
						$class_dorm1 = "";
						$class_dorm2 = "";
						$class_dorm3 = "";
						$class_dorm4 = "";
						foreach($i["dorms"] as $dorm){
							if($dorm == 1){
								$class_dorm1 = " dorms1";
							}
							if($dorm == 2){
								$class_dorm2 = " dorms2";
							}
							if($dorm == 3){
								$class_dorm3 = " dorms3";
							}
							if($dorm == 4){
								$class_dorm4 = " dorms4";
							}
						}

						$class_fase = "";
						if($i["fase"] == "01"){
							$class_fase = " fase01";
						}
						if($i["fase"] == "02"){
							$class_fase = " fase02";
						}
						if($i["fase"] == "03"){
							$class_fase = " fase03";
						}

						$class_preco = "";
						if($i["preco"][0]["value"] == "01"){
							$class_preco = " preco01";
						}
						if($i["preco"][0]["value"] == "02"){
							$class_preco = " preco02";
						}
						if($i["preco"][0]["value"] == "03"){
							$class_preco = " preco03";
						}
						if($i["preco"][0]["value"] == "04"){
							$class_preco = " preco04";
						}
						if($i["preco"][0]["value"] == "05"){
							$class_preco = " preco05";
						}

						$class_regiao = "";
						if($i["regiao"][0]["value"] == "zs"){
							$class_regiao = " regiaozs";
						}
						if($i["regiao"][0]["value"] == "zl"){
							$class_regiao = " regiaozl";
						}
						if($i["regiao"][0]["value"] == "zo"){
							$class_regiao = " regiaozo";
						}
						if($i["regiao"][0]["value"] == "os"){
							$class_regiao = " regiaoos";
						}
						$titulo_para_whats = strtoupper($i["titulo"]);
						echo '
						<div class="imovel-item auxiliar-vazio col-xl-4 col-lg-4 col-md-6 col-12' . $class_regiao . $class_fase . $class_preco . $class_dorm1 . $class_dorm2 . $class_dorm3 . $class_dorm4 . '">
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
					<div id="NoResults" class="no-results d-none">Nenhum imóvel encontrado.</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- 
zs : Zona Sul
zl : Zona Leste
zo : Zona Oeste
os : Osasco

01 : Lançamento
02 : Em Construção
03 : Pronto

01 : Até 500 Mil
02 : 500 Mil a 1 Milhão
03 : 1 Milhão a 1,5 Milhão
04 : 1,5 Milhão a 2 Milhões
05 : Acima de 2 Milhões

1
2
3
4
 -->

<script type="text/javascript">
	
	function filtraImovel(){
		strRegiao = "regiao";
		strPreco = "preco";
		strFase = "fase";
		strDorms = "dorms";
		var Vazio = 0;

		var imovel_ele = document.getElementsByClassName('imovel-item');
		for (var i = 0; i < imovel_ele.length; ++i) {
		    var item = imovel_ele[i];  
		    item.classList.add("d-none");
		}

		var eRegiao = document.getElementById("SelectRegiao");
		var RegiaoSelected = eRegiao.value;
		if(RegiaoSelected == ""){
			strRegiao = "auxiliar-vazio";
		}

		var eFase = document.getElementById("SelectFase");
		var FaseSelected = eFase.value;
		if(FaseSelected == ""){
			strFase = "auxiliar-vazio";
		}

		var ePreco = document.getElementById("SelectPreco");
		var PrecoSelected = ePreco.value;
		if(PrecoSelected == ""){
			strPreco = "auxiliar-vazio";
		}

		var eDorms = document.getElementById("SelectDorms");
		var DormsSelected = eDorms.value;
		if(DormsSelected == ""){
			strDorms = "auxiliar-vazio";
		}


		var imovel_ele = document.getElementsByClassName('imovel-item');
		for (var i = 0; i < imovel_ele.length; ++i) {
		    var item = imovel_ele[i];

		    var RegiaoClass = strRegiao.concat(RegiaoSelected);
		    var PrecoClass = strPreco.concat(PrecoSelected);
		    var DormsClass = strDorms.concat(DormsSelected);
		    var FaseClass = strFase.concat(FaseSelected);

		    if(item.classList.contains(RegiaoClass) && item.classList.contains(FaseClass) && item.classList.contains(DormsClass) && item.classList.contains(PrecoClass)){
		    	item.classList.remove("d-none");
		    	Vazio ++;
		    }
		}

		var noResults = document.getElementById("NoResults");
		if (Vazio == 0){
			noResults.classList.remove("d-none");
		}
		else{
			noResults.classList.add("d-none");
		}
	}

</script>


<!-- Modal: Contato E-mail -->
<?php get_template_part( 'template-parts/forms/mi-produto', 'page' ); ?>
<!-- Modal: Contato Whatsapp -->
<?php get_template_part( 'template-parts/forms/mi-whats', 'page' ); ?>
<!-- Modal: Chat Online -->
<?php
$shortcode_chat = '[mi_chat imovel_id="0" chat_id="' . $id_chat_param . '"]';
echo do_shortcode($shortcode_chat);


get_footer();  ?>