<?php
/*
 * Template Name: Agendamento de Visitas
 * Template Post Type: page
 */

// Captura informações do CMS
$banner = get_field("banner");
$titulo = get_field("titulo");
$label_data = get_field("label_data");
$label_hora = get_field("label_hora");
$label_produto = get_field("label_produto");
$icon_data = get_field("icon_data");
$icon_hora = get_field("icon_hora");
$icon_produto = get_field("icon_produto");
$btn_submit = get_field("btn_submit");
$bg_form = get_field("bg_form");
$txt_auxiliar = get_field("txt_auxiliar");
$cta_auxiliar = get_field("cta_auxiliar");

get_header();

?>
<style>
body{
	padding-top:0;
	background-color: #d3cfd0;
}
.banner-agendamento {
	height: 480px;
	background-repeat: no-repeat;
	background-position: center;
	/*-webkit-box-shadow: 0px 5px 37px -6px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 5px 37px -6px rgba(0,0,0,0.75);
	box-shadow: 0px 5px 37px -6px rgba(0,0,0,0.75);*/
}
.agendamento-content {
	background-position: center 15px;
	background-repeat: no-repeat;
	padding: 30px 0;
}
.agendamento-content h1 {
	font-size: 40px;
	margin-bottom: 26px;
	padding: 0 5%;
	color: #4c0407;
	text-align: center;
}
.agendamento-content p {
	padding: 0 5%;
}
.form-agendamento {
	margin: 0 3%;
}
.box-auxiliar {
	background-color: #eeeeee;
	padding: 20px;
	max-width: 520px;
	margin: 34px auto;
}
.box-auxiliar p {
	margin: 0;
	color: #4c0407;
	font-size: 19px;
}
.box-auxiliar a {
	color: #4c0407;
	text-decoration: underline;
}
.wrapper-form {
	text-align: center;
}
.agendamento-content {
	background-position: center -200px;
	background-repeat: no-repeat;
}
.btn-agendamento {
	width: 362px;
	height: 90px;
	font-size: 0;
	border: 0;
	background-position: center;
	background-repeat: no-repeat;
	margin: 20px 0 10px;
}
.label-text-agendamento {
	padding-left: 18px;
}
.agendamento-label {
	width: 100%;
	background-image: url(https://www.eztec.com.br/wp-content/uploads/institucional/agendamento/bg-label-form.png);
	color: #ffffff;
	font-size: 22px;
	height: 58px;
	line-height: 49px;
	background-repeat: repeat-X;
	max-width: 842px;
}
.agendamento-wrap-label-content {
	width: 100%;
	text-align: center;
}
.agendamento-input {
	width: 100%;
	font-size: 20px;
	line-height: 56px;
	padding: 0 12px;
	max-width: 842px;
	border: 1px solid #a9a9a8;
	margin-bottom: 20px;
}
.selectpicker {
	line-height: 56px;
	max-width: 842px;
	height: 58px;
	margin-bottom: 20px;
	border: 1px solid #a9a9a8;
	width: 100%;
	font-weight: 600;
	font-size: 20px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	-webkit-appearance: none;
	-moz-appearance: none;
	background-image: url("https://www.eztec.com.br/wp-content/uploads/institucional/agendamento/select-arrow.png");
	background-repeat: no-repeat;
	background-position: right 20px center;
	padding: 0 12px;
}
@media (max-width: 991px) {
	.banner-agendamento {
		height: 480px;
		background-position: -740px center;
	}
}
@media (max-width: 767px) {
	.banner-agendamento {
		height: 211px;
		background-position: -310px center;
		background-size: 1130px;
	}
}
@media (max-width: 575px) {
	.banner-agendamento {
		height: 151px;
		background-position: -190px center;
		background-size: 810px;
	}
	.agendamento-content h1 {
		font-size: 17px;
	}
	.agendamento-content p {
		font-size: 13px;
	}
	.btn-agendamento {
		width: 290px;
		height: 72px;
	}
	.label-text-agendamento {
		padding-left: 5px;
		font-size: 13px;
	}
	.selectpicker {
		font-size: 14px;
	}
	.agendamento-input {
		font-size: 14px;
	}
}
</style>





<div class="wrapper-geral wrapper-geral-agendamento">

	<header>
		<div class="banner-agendamento" style="background-image:url(<?php echo $banner; ?>);"></div>
	</header>

	<div class="agendamento-content wrapper-geral" style="background-image:url(<?php echo $bg_form; ?>)">
		<div class="wrapper-inner">
			<h1><?php echo $titulo; ?></h1>
		</div>

		<div class="wrapper-inner wrapper-form">
			<form class="form-agendamento" name="agendamento" method="post" action="https://www.pages03.net/eztec/visita-agendada/Visita_agendada" pageId="11226636" siteId="442140" parentPageId="11226634">
				<label class="agendamento-label">
					<div class="agendamento-wrap-label-content">
						<img src="<?php echo $icon_data; ?>">

						<span class="label-text-agendamento"><?php echo $label_data; ?></span>
					</div>
				</label>
				<input class="agendamento-input data" type="date" name="data=" id="data" value="DD/MM/YYYY" onchange="updateDate()" required>

				<label class="agendamento-label">
					<div class="agendamento-wrap-label-content">
						<img src="<?php echo $icon_hora; ?>">
						<span class="label-text-agendamento"><?php echo $label_hora; ?></span>
					</div>
				</label>
				<select class="selectpicker" name="Horário da visita" id="control_COLUMN49" label="Horário da visita" required>
					<option value="9h">9h</option>
					<option value="10h">10h</option>
					<option value="11h">11h</option>
					<option value="12h">12h</option>
					<option value="13h">13h</option>
					<option value="14h">14h</option>
				</select>

				<label class="agendamento-label">
					<div class="agendamento-wrap-label-content">
						<img src="<?php echo $icon_produto; ?>">
						<span class="label-text-agendamento"><?php echo $label_produto; ?></span>
					</div>
				</label>
				<select class="selectpicker" name="empreendimento" id="empreendimento" label="empreendimento" onchange="updateImovel()" required>
					<?php
					$args = array(
						'post_type'  => 'imovel',
						'orderby' => 'title',
						'posts_per_page'   => -1,
						'order'   => 'ASC',
						'meta_query' => array(
				        'relation' => 'OR',
				        array(
				            'key' => 'imovel_status',
				            'value' => '01',
				            'compare' => '='
				        ),
				        array(
				            'key' => 'imovel_status',
				            'value' => '02',
				            'compare' => '='
				        ),
				        array(
				            'key' => 'imovel_status',
				            'value' => '03',
				            'compare' => '='
				        ),
				        array(
				            'key' => 'imovel_status',
				            'value' => '04',
				            'compare' => '='
				        ),
				        array(
				            'key' => 'imovel_status',
				            'value' => '05',
				            'compare' => '='
				        ),
				        array(
				            'key' => 'imovel_status',
				            'value' => '06',
				            'compare' => '='
				        )
				    )
					);
					$count = 0;
					$att_selected = "";
					$imovel_q = new WP_Query( $args );
					if ( $imovel_q->have_posts() ) {
						while ( $imovel_q->have_posts() ) {
							if($count == 0){
								$att_selected = " SELECTED";
							}
							else{
								$att_selected = "";
							}
							$imovel_q->the_post();
							echo '<option value="' . get_the_title() . '"' . $att_selected . '>' . get_the_title() . '</option>';
						}
					}
					// Reseta WP_query
					wp_reset_postdata();
					?>
				</select>
				<input type="hidden" name="formSourceName" value="StandardForm">
				<input type="hidden" name="sp_exp" value="yes">
				<input type="hidden" name="CODPROSPECT" id="control_COLUMN3" label="CODPROSPECT" value="<?php echo $w_prospect_print; ?>">
				<input type="hidden" name="imovel" id="control_COLUMN50" label="Escolha um empreendimento">
				<input type="hidden" name="datavisita" id="control_COLUMN51" label="Data da visita" value="MM/DD/YYYY">
				<div class="form-group">
					<div class="form-privacidade">
						<?php echo get_field("msg_privacidade",311); ?>
					</div>
				</div>
				<input type="submit" class="btn-agendamento" value="Submit" style="background-image:url(<?php echo $btn_submit; ?>)">
			</form>
		</div>

		<div class="footer-content">
			<div class="box-auxiliar">
				<p><?php echo $txt_auxiliar; ?> <span><a href="#contatoChat" data-toggle="modal" data-target="#modalChatAgendamento"><?php echo $cta_auxiliar; ?></a></span></p>
			</div>
		</div>
	</div>

</div>

<script>

function updateImovel(){
	var e = document.getElementById("empreendimento").value;
	form.elements.imovel.value = e;
	
}

function updateDate(){
	var vvv = document.getElementById("data").value;
	var res = vvv.split("-");
	var ano = res[0];
	var mes = res[1];
	var dia = res[2];
	var result = mes.concat("/",dia,"/",ano);
    form.elements.datavisita.value = result;
}

var form = document.forms.agendamento;
    form.onsubmit = function() {
    	var vvv = document.getElementById("control_COLUMN51").value;
		var res = vvv.split("-");
		var ano = res[0];
		var mes = res[1];
		var dia = res[2];
		var result = mes.concat("/",dia,"/",ano);
        form.elements.datavisita.value = result;
    }; 
</script>








<?php

// Modal: Chat Online
$imovel_code_id = get_field("imovel_id", $imovel_id["imovel_id"]);
$is_carac_form = "";
$chat_id = "geral";


$html = "";


$titulo_chat_modal = get_field("chat_modal_titulo",1661);
$intro_msg_chat = get_field("chat_modal_intro_msg",1661);
$label_nome_chat = get_field("chat_modal_label_nome",1661);
$label_email_chat = get_field("chat_modal_label_email",1661);
$label_tel_chat = get_field("chat_modal_label_telefone",1661);
$label_imovel_chat = get_field("chat_modal_label_imovel",1661);
$txt_obrigatorios_chat = get_field("chat_modal_txt_obrigatorios",1661);
$txt_news_chat = get_field("chat_modal_txt_news",1661);
$txt_btn_chat = get_field("chat_modal_btn_iniciar",1661);
$ip = "";
if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
}
$chat_action = "https://sgc.eztec.com.br/wcc/UserLoginSubmit.do";
$dominio = parse_url(get_option('siteurl'), PHP_URL_HOST);
if ( strcmp($dominio, "eztec.com.br") == 0 ||  strcmp($dominio, "www.eztec.com.br") == 0  ){
	$chat_action = "https://www.eztec.com.br/wcc/UserLoginSubmit.do";
}
$html .= '
<div class="modal fade" id="modalChatAgendamento" tabindex="-1" role="dialog"  >
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form name="chatFormAgendamento" data-isIntegrado=true id="chatFormAgendamento" method="post" action="' . $chat_action  . '" class="mi-chat-online" target="_blank" rel="noopener">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
				<div class="modal-header align-items-center flex-column">
					<span class="modal-title text-center">' . $titulo_chat_modal . '</span>
					<div class="modal-title-separator"></div>
				</div>
				<div class="modal-body">
					<p class="contato-instrucoes">' . $intro_msg_chat . '</p>
					<input name="ip" value="'. $ip . '" id="ip" type="hidden">
					<input name="virtual_obj" id="virtual_obj" type="hidden">
					<input name="idGoogle" value="direto" id="idGoogle" type="hidden">
					<input name="idFacebook" value="direto" id="idFacebook" type="hidden">

					<div class="form-group">
						<label for="nome">' . $label_nome_chat . '</label>
						<input type="text" class="form-control" name="nome" id="nome">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email">' . $label_email_chat . '</label>
							<input type="email" class="form-control" name="email" id="email">
						</div>
						<div class="form-group col-3 col-sm-2">
							<label for="ddd">' . $label_tel_chat . '</label>
							<input type="text" class="form-control" name="ddd" alt="ddd" id="ddd">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="email">&nbsp;</label>
							<input type="text" class="form-control" name="fone" id="fone" alt="fone" >
						</div>
					</div>
					<div class="form-group" id="divEmpre">
						<label for="codempreendimento">' . $label_imovel_chat . '</label>
						<select class="form-control custom-select" name="idEmpreendimento" id="idEmpreendimento">
							<option value="">Selecione</option>';
							$args = array(
								'post_type'  => 'imovel',
								'orderby' => 'title',
								'posts_per_page'   => -1,
								'order'   => 'ASC',
								'meta_query' => array(
						        'relation' => 'OR',
						        array(
						            'key' => 'imovel_status',
						            'value' => '01',
						            'compare' => '='
						        ),
						        array(
						            'key' => 'imovel_status',
						            'value' => '02',
						            'compare' => '='
						        ),
						        array(
						            'key' => 'imovel_status',
						            'value' => '03',
						            'compare' => '='
						        ),
						        array(
						            'key' => 'imovel_status',
						            'value' => '04',
						            'compare' => '='
						        ),
						        array(
						            'key' => 'imovel_status',
						            'value' => '05',
						            'compare' => '='
						        ),
						        array(
						            'key' => 'imovel_status',
						            'value' => '06',
						            'compare' => '='
						        )
						    )
							);
							$imovel_q = new WP_Query( $args );
							if ( $imovel_q->have_posts() ) {
								while ( $imovel_q->have_posts() ) {
									$imovel_q->the_post();
									$imovel_id_value = get_field('imovel_id');
									if ($imovel_code_id == $imovel_id_value){
										$html .= '<option value="' . $imovel_id_value . '" selected="selected">' . get_the_title() . '</option>';
									}
									else{
										$html .= '<option value="' . $imovel_id_value . '">' . get_the_title() . '</option>';
									}
								}
							}
							// Reseta WP_query
							wp_reset_postdata();
						$html .='
						</select>
					</div>
					<div class="form-group">
						<div class="form-privacidade">
							<?php echo get_field("msg_privacidade",311); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<label class="form-check-label d-flex align-items-center">
								<input class="form-check-input" name="info" value="on" type="checkbox"> ' . $txt_news_chat . '
							</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-row">
						<div class="form-group col-12">
							<button type="submit" style="display: none;" id="btnSubmitChat"></button>
							<button type="submit" class="form-control btn btn-primary" id="btnIniciar">' . $txt_btn_chat . '</button>
						</div>
					</div>
					<div class="form-group">
						<small class="form-text text-message-required">
							' . $txt_obrigatorios_chat . '
						</small>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>';
echo $html;



get_footer();  ?>