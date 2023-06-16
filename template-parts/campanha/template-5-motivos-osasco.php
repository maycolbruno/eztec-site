<?php
$disable_header_footer = get_field("disable_header_footer");

if($disable_header_footer == 1){
	echo '
	<style>
	#masthead, #colophon, .wrapper-banner{
		display: none;
	}
	</style>
	';
}
?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<style>
body{
	padding:0 !important;
}
.wrapper-campanha{
	padding:0 !important;
}
.wrapper-geral-header-5-motivos {
	background-image: url(https://www.eztec.com.br/marketing/landing-page/5-motivos-osasco/bg_header.jpg);
	height: 695px;
	background-repeat: no-repeat;
	background-position: center;
	font-family:Roboto;
}
.header-5motivos img {
	margin-top: 23px;
	margin-left: 20px;
}
.wrapper-geral-header-5-motivos h1 {
	font-family: Roboto;
	color: #fff;
	font-size: 114px;
	font-weight: 700;
	line-height: 1.1;
	margin: 0;
}
.wrapper-geral-content-5-motivos {
	background-image: url(https://www.eztec.com.br/marketing/landing-page/5-motivos-osasco/bg_content.png);
	height: 944px;
	background-repeat: no-repeat;
	background-position: center;
	font-family:Roboto;
}
.wrapper-geral-fotos-5-motivos {
	position:relative;
}
.wrapper-geral-fotos-5-motivos img {
	width: 100%;
}
.wrap-txt-fotos {
	background-color: rgba(0,0,0,0.7);
	position: absolute;
	top: -24px;
	width: 100%;
	text-transform: uppercase;
	color: #fff;
	letter-spacing: 4px;
	text-align: center;
}
.txt-fotos {
	margin: 0;
}
.wrapper-geral-footer-5-motivos {
	color: #64696e;
	text-align: center;
	padding: 62px 0;
	border-top: 12px solid #bda94c;
}
.wrapper-geral-footer-5-motivos p{
	margin:0;
}
.up-box {
	position: absolute;
	top: -70px;
}
.up-box img {
	margin-left: 60px;
	margin-bottom: 30px;
}
.title-content {
	text-transform: uppercase;
	margin-left: 60px;
	color: #555555;
	font-size: 48px;
}
.wrapper-form {
	background-color: #ffffff;
	width: 100%;
	box-shadow: -2px 3px 13px 0px rgba(0,0,0,0.65);
	padding: 85px 120px;
}
.wrapper-form hr {
	margin: 40px 0 60px;
}
.desc-content {
	color: #555555;
	margin-left: 60px;
	font-size: 19px;
	margin-right: 60px;
}
.title-form {
	color: #555555;
	font-size: 30px;
	text-align: center;
	font-weight: 700;
	line-height: 1.2;
}
.fieldLabel {
	color: #555555;
	text-transform: uppercase;
	font-size: 13px;
	margin-top: 29px;
}
.wrapper-form input {
	background-color: #f9f8f7;
	width: 100%;
	font-size: 20px;
	border: none;
	line-height: 2;
	padding-left: 12px;
	color: #000;
}
.wrapper-form select {
	background-color: #f9f8f7;
	border: none;
	width: 100%;
	font-size: 16px;
	height: 40px;
	background-image: url(https://www.eztec.com.br/marketing/landing-page/5-motivos-osasco/seta-select.png);
	overflow: hidden;
	background-repeat: no-repeat;
	background-position: 96% center;
	-moz-appearance: none;
	-webkit-appearance: none;
	padding-left: 10px;
	color: #000;
}
.defaultText.buttonStyle {
	margin-top: 46px;
	background-color: #bda94c;
	color: #fff;
	padding: 11px 10px;
	text-transform: uppercase;
	font-size: 18px;
}
@media (max-width: 1100px) {
	.title-content {
		font-size: 37px;
	}
	.desc-content {
		font-size: 16px;
	}
	.wrapper-form {
		padding: 85px 30px;
	}
}
@media (max-width: 991px) {
	.wrapper-geral-content-5-motivos {
		background-image: none;
		height: auto;
	}
	.up-box {
		position: relative;
		top: -70px;
	}
	.wrapper-form {
		width: 100%;
	}
	.up-box {
		text-align: center;
	}
	.up-box img {
		margin: 0;
	}
	.title-content {
		margin: 30px 0 0;
		font-size: 28px;
	}
	.desc-content {
		margin: 20px 0;
		font-size: 16px;
	}
	.fieldLabel {
		text-align: left;
	}
	.up-box-form {
		top: 0;
		margin-bottom: 70px;
	}
}

@media (max-width: 767px) {
	.wrapper-geral-header-5-motivos h1 {
		font-size: 64px;
		margin: 130px 0 0;
	}
	.title-form {
		font-size: 21px;
	}
}
@media (max-width: 610px) {
	.wrap-txt-fotos {
		top: -48px;
		height: 48px;
	}
}
@media (max-width: 575px) {
	.wrapper-geral-footer-5-motivos {
		padding: 20px 0;
		font-size: 12px;
	}
	.txt-fotos {
		font-size: 14px;
	}
	.wrapper-form {
		padding: 85px 6%;
	}
	.up-box img {
		width: 80%;
	}
}
</style>
<div class="wrapper-geral wrapper-geral-header-5-motivos">
	<div class="wrapper-inner header-5motivos">
		<img src="https://www.eztec.com.br/marketing/landing-page/5-motivos-osasco/logo_eztec.png">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-4 col-sm-1 col-xm-1"></div>
				<div class="col-xl-6 col-lg-6 col-md-8 col-sm-11 col-xm-11">
					<h1>VOCÊ<br>MERECE<br>TUDO.</h1>
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="wrapper-geral wrapper-geral-content-5-motivos">
	<div class="wrapper-inner content-5motivos">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="up-box">
						<img src="https://www.eztec.com.br/marketing/landing-page/5-motivos-osasco/books.png">
						<h2 class="title-content">A transformação<br>real da sua vida<br>a um clique.</h2>
						<p class="desc-content">
						Descubra como Osasco pode transformar a sua vida e a vida da sua família.<br>
						<br>
						No guia, você encontra:<br>
						<br>
						• Dados sobre o grau de desenvolvimento da cidade;<br>
						• Vantagens da localização estratégica;<br>
						• Qualidade de vida;<br>
						• Custo-benefício;<br>
						• E muito mais!<br>
						</p>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="up-box up-box-form">
						<div class="wrapper-form">
							<p class="title-form">Sim, eu quero transformar<br>a minha vida em Osasco.</p>
							<hr>
							<form method="post" action="https://www.pages03.net/eztec/LP1-FORM/FORM1" pageId="10068395" siteId="392961" parentPageId="10068393" >
								<div class="fieldLabel">Nome<span class="required">*</span></div>
								<input type="text" name="NOME" id="control_COLUMN1" label="Nome" class="textInput defaultText" required="required">
								<div class="fieldLabel">E-mail<span class="required">*</span></div>
								<input type="email" name="Email" id="control_EMAIL" label="Email" class="textInput defaultText" required="required">
								<div class="fieldLabel">Cargo<span class="required">*</span></div>
								<input type="text" name="Cargo" id="control_COLUMN23" label="Cargo" class="textInput defaultText" required="required">
								<div class="fieldLabel">Telefone Celular<span class="required">*</span></div>
								<input type="text" name="FONECEL" id="control_COLUMN6" label="Telefone Celular" class="textInput defaultText" required="required">

								<div class="fieldLabel">Você planeja comprar um imóvel?<span class="required">*</span></div>
								<select name="Voce planeja comprar um imovel" id="control_COLUMN20" label="Você planeja comprar um imóvel?" class="selectInput defaultText">
									<option value="" SELECTED >Selecione um</option>
									<option value="Quero comprar agora">Quero comprar agora</option>
									<option value="Quero comprar em 3 meses">Quero comprar em 3 meses</option>
									<option value="Quero comprar daqui 1 ano">Quero comprar daqui 1 ano</option>
									<option value="Sou cliente EZTEC">Sou cliente EZTEC</option>
									<option value="Não tenho interesse">Não tenho interesse</option>
								</select>

								<div id="errorMessageContainerId" class="formErrorMessages" style="display: none;"></div>
								<div class="form-group">
									<div class="form-privacidade" style="color:#000;">
										<?php echo get_field("msg_privacidade",311); ?>
									</div>
								</div>
								<input type="submit" class="defaultText buttonStyle" value="Baixar o Guia">
								<input type="hidden" name="formSourceName" value="StandardForm">
								<input type="hidden" name="sp_exp" value="yes">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="wrapper-geral wrapper-geral-fotos-5-motivos">
	<div class="wrap-txt-fotos">
		<p class="txt-fotos">qualidade de vida • acessos • lazer • comodidade</p>
	</div>
	<img src="https://www.eztec.com.br/marketing/landing-page/5-motivos-osasco/bg_fotos.jpg" alt="5 Motivos para escolher osasco">
</div>

<div class="wrapper-geral wrapper-geral-footer-5-motivos">
	<div class="wrapper-inner footer-5motivos">
		<p>2018 EZTEC. Todos os direitos reservados.</p>
	</div>
</div>
<script>
$(":input").inputmask();

$("#control_COLUMN6").inputmask({"mask": "(99) 999999999"});
</script>