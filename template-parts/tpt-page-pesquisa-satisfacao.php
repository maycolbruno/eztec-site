<?php
/*
 * Template Name: Pesquisa de Satisfação
 * Template Post Type: page
 */

// Captura informações do CMS
$logo = wp_get_attachment_url(get_field("logo_topo",311));
$banner = get_field("banner");
$titulo = get_field("titulo");
$desc = get_field("desc");
$label_nivel_empreendimento = get_field("label_nivel_empreendimento");
$label_nivel_corretor = get_field("label_nivel_corretor");
$label_tipo_qualificacao = get_field("label_tipo_qualificacao");
$disallow_header = 0;
$disallow_header = get_field("disallow_header");
$detalhe_footer = get_field("detalhe_footer");
$icon_pouco_satisfeito = get_field("icon_pouco_satisfeito");
$icon_satisfeito = get_field("icon_satisfeito");
$icon_insatisfeito = get_field("icon_insatisfeito");
$icon_muito_insatisfeito = get_field("icon_muito_insatisfeito");
$icon_muito_satisfeito = get_field("icon_muito_satisfeito");

get_header();

global $w_prospect_print;

?>
<style>
body{
	padding-top:0;
	background-color: #cfcdcd;
}
.eztec-logo-satisfacao {
	background-color: #141b21;
	height: 146px;
	text-align: center;
	padding: 34px 0;
}
.eztec-logo-satisfacao img {
	width: 232px;
}
.banner-pesquisa-satisfacao {
	height: 480px;
	background-repeat: no-repeat;
	background-position: center;
	-webkit-box-shadow: 0px 5px 37px -6px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 5px 37px -6px rgba(0,0,0,0.75);
	box-shadow: 0px 5px 37px -6px rgba(0,0,0,0.75);
}
.pesquisa-satisfacao-content {
	text-align: center;
	padding: 50px 0px 0;
}
.pesquisa-satisfacao-content h1 {
	font-size: 20px;
	margin-bottom: 26px;
	padding: 0 5%;
}
.pesquisa-satisfacao-content p {
	padding: 0 5%;
}
.footer-content img {
	max-width: 1189px;
	width: 80%;
}
.box-form-satisfacao {
	background-color: #bbb;
	padding: 42px 0;
	text-align: left;
	-webkit-box-shadow: 0px 11px 12px -10px rgba(0,0,0,0.45);
	-moz-box-shadow: 0px 11px 12px -10px rgba(0,0,0,0.45);
	box-shadow: 0px 11px 12px -10px rgba(0,0,0,0.45);
	margin: 30px 0;
}
.wrapper-radio-box-form-satisfacao {
	display: inline-block;
	width: 33%;
	margin: 6px 0;
	text-transform: uppercase;
	font-size: 13px;
}
.wrapper-radio-box-form-satisfacao img {
	margin: 0 5px;
}
.label-box-form-satisfacao p {
	padding: 23px 0 0 40px;
}
.form-satisfacao {
	margin: 0 3%;
}
.btn-pesquisa-satisfacao {
	margin: 10px 0 70px;
	background-color: #bd3533;
	border: 0;
	color: #fff;
	border-radius: 12px;
	padding: 13px 60px;
	font-size: 16px;
}
@media (max-width: 991px) {
	.banner-pesquisa-satisfacao {
		height: 330px;
		background-position: -810px center;
	}
	.wrapper-radio-box-form-satisfacao {
		width: 48%;
		padding-left: 40px;
	}
	.box-form-satisfacao {
		padding: 20px 0 40px;
	}
}
@media (max-width: 767px) {
	.banner-pesquisa-satisfacao {
		height: 211px;
		background-position: -310px center;
		background-size: 1130px;
	}
}
@media (max-width: 575px) {
	.banner-pesquisa-satisfacao {
		height: 151px;
		background-position: -250px center;
		background-size: 810px;
	}
	.eztec-logo-satisfacao {
		height: 71px;
		padding: 15px 0;
	}
	.eztec-logo-satisfacao img {
		width: 122px;
	}
	.pesquisa-satisfacao-content h1 {
		font-size: 17px;
	}
	.pesquisa-satisfacao-content p {
		font-size: 13px;
	}
	.wrapper-radio-box-form-satisfacao {
		width: 100%;
		padding-left: 20px;
	}
	.label-box-form-satisfacao p {
		padding: 0 0 0 20px;
	}
}

</style>

<div class="wrapper-geral wrapper-geral-pesquisa-satisfacao">

<header>
	<div class="eztec-logo-satisfacao">
		<img src="<?php echo $logo; ?>">
	</div>
	<div class="banner-pesquisa-satisfacao" style="background-image:url(<?php echo $banner; ?>);"></div>
</header>

<div class="pesquisa-satisfacao-content">
	<div class="wrapper-inner">
		<h1><?php echo $titulo; ?></h1>
		<p><?php echo $desc; ?></p>
	</div>



	<div class="wrapper-inner wrapper-form">
		<form class="form-satisfacao" method="post" action="https://www.pages03.net/eztec/pesquisa-de-satisfacao/pesquisa_de_satisfacao" pageId="11226632" siteId="442139" parentPageId="11226630">
			<div class="container-fluid box-form-satisfacao">
				<div class="row">
					<div class="label-box-form-satisfacao col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<p><?php echo $label_nivel_empreendimento; ?></p>
					</div>
					<div class="itens-box-form-satisfacao col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Empreendimento" id="control_COLUMN46_0" label="Satisfação Empreendimento" value="Muito satisfeito" checked> <img src="<?php echo $icon_muito_satisfeito; ?>"> Muito Satisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Empreendimento" id="control_COLUMN46_1" label="Satisfação Empreendimento" value="Satisfeito"> <img src="<?php echo $icon_satisfeito; ?>"> Satisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Empreendimento" id="control_COLUMN46_2" label="Satisfação Empreendimento" value="Pouco satisfeito"> <img src="<?php echo $icon_pouco_satisfeito; ?>"> Pouco Satisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Empreendimento" id="control_COLUMN46_3" label="Satisfação Empreendimento" value="Insatisfeito"> <img src="<?php echo $icon_insatisfeito; ?>"> Insatisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Empreendimento" id="control_COLUMN46_4" label="Satisfação Empreendimento" value="Muito insatisfeito"> <img src="<?php echo $icon_muito_insatisfeito; ?>"> Muito Insatisfeito
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid box-form-satisfacao">
				<div class="row">
					<div class="label-box-form-satisfacao col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<p><?php echo $label_nivel_corretor; ?></p>
					</div>
					<div class="itens-box-form-satisfacao col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">

						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Corretor" id="control_COLUMN45_0" label="Satisfação Corretor" value="Muito satisfeito" checked> <img src="<?php echo $icon_muito_satisfeito; ?>"> Muito Satisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Corretor" id="control_COLUMN45_1" label="Satisfação Corretor" value="Satisfeito"> <img src="<?php echo $icon_satisfeito; ?>"> Satisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Corretor" id="control_COLUMN45_2" label="Satisfação Corretor" value="Pouco satisfeito"> <img src="<?php echo $icon_pouco_satisfeito; ?>"> Pouco Satisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Corretor" id="control_COLUMN45_3" label="Satisfação Corretor" value="Insatisfeito"> <img src="<?php echo $icon_insatisfeito; ?>"> Insatisfeito
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="radio" name="Satisfação Corretor" id="control_COLUMN45_4" label="Satisfação Corretor" value="Muito insatisfeito"> <img src="<?php echo $icon_muito_insatisfeito; ?>"> Muito Insatisfeito
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid box-form-satisfacao">
				<div class="row">
					<div class="label-box-form-satisfacao col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<p><?php echo $label_tipo_qualificacao; ?></p>
					</div>
					<div class="itens-box-form-satisfacao col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">

						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Gentil" label="Satisfação Corretor  QUALIFICACAO"> Gentil
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Prestativo" label="Satisfação Corretor  QUALIFICACAO"> Prestativo
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Indiferente" label="Satisfação Corretor  QUALIFICACAO"> Indiferente
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Rude" label="Satisfação Corretor  QUALIFICACAO"> Rude
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Capacitado" label="Satisfação Corretor  QUALIFICACAO"> Capacitado
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Confuso" label="Satisfação Corretor  QUALIFICACAO"> Confuso
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Incapacitado" label="Satisfação Corretor  QUALIFICACAO"> Incapacitado
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Ágil" label="Satisfação Corretor  QUALIFICACAO"> Ágil
						</div>
						<div class="wrapper-radio-box-form-satisfacao">
							<input type="checkbox" name="Satisfação Corretor  QUALIFICACAO" value="Assertivo" label="Satisfação Corretor  QUALIFICACAO"> Assertivo
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="formSourceName" value="StandardForm">
			<input type="hidden" name="sp_exp" value="yes">
			<input type="hidden" name="CODPROSPECT" id="control_COLUMN3" label="CODPROSPECT" value="<?php echo $w_prospect_print; ?>">
			<div class="form-group">
				<div class="form-privacidade">
					<?php echo get_field("msg_privacidade",311); ?>
				</div>
			</div>
			<input type="submit" class="btn-pesquisa-satisfacao" value="Submit">
		</form>
	</div>

	<div class="footer-content">
		<img src="<?php echo $detalhe_footer; ?>">
	</div>
</div>

</div>


<?php
get_footer();  ?>