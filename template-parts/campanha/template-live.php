<?php
// Template 1 para Campanhas


// Captura informações do CMS
$mostrar_pres = get_field("show_presentation_live");
$pre_pres = get_field("pre_presentation_live");
$status_pres = get_field("status_presentation_live");
$titulo_pres = get_field("titulo_presentation_live");
$desc_pres = get_field("desc_presentation_live");
$bg_color_pres = get_field("bg_color_presentation_live");
$area_pres = get_field("area_presentation_live");
$pos_pres = get_field("pos_presentation_live");
$txt_legal = get_field("txt_legal_live");
$data_live = get_field("data_live");
$txt_data_hora_live = get_field("txt_data_hora_live");

?>

<section class="campanha-presentation" style="background-color:<?php echo$bg_color_pres; ?>;">
	<?php
	if($mostrar_pres == 1){
		if($area_pres == 1280){
			echo '<div class="container wrapper-inner">';
		}
		if ($pre_pres !== ""){
			echo '<div class="campanha-presentation-pre-content">'. $pre_pres . '</div>';
		}
		?>

		<div class="row campanha-presentation-content">
			<div class="col-12">
				<div class="section-content-header">
					<p class="section-content-pre-title"><?php echo $status_pres; ?></p>
					<h1 class="section-content-title"><?php echo $titulo_pres; ?></h1>
					<div class="section-content-title-separator"></div>
				</div>
				<p class="campanha-presentation-descricao"><?php echo $desc_pres; ?></p>
			</div>
		</div>

		<?php
		if ($pos_pres !== ""){
			echo '<div class="campanha-presentation-pos-content">'. $pos_pres . '</div>';
		}
		if($area_pres == 1280){
			echo '</div>';
		}
	}
	?>
</section>

<section class="wrapper-inner cronometro">




	<script>
		var target_date = new Date("<?php echo $data_live; ?>").getTime();
		var dias, horas, minutos, segundos;
		var regressiva = document.getElementById("regressiva");

		setInterval(function () {

		    var current_date = new Date().getTime();
		    var segundos_f = (target_date - current_date) / 1000;

			dias = parseInt(segundos_f / 86400);
		    segundos_f = segundos_f % 86400;
		    
		    horas = parseInt(segundos_f / 3600);
		    segundos_f = segundos_f % 3600;
		    
		    minutos = parseInt(segundos_f / 60);
		    segundos = parseInt(segundos_f % 60);

		    if(segundos < 1){
		    	segundos = 0;
		    }
		    if(minutos < 1){
		    	minutos = 0;
		    }
		    if(horas < 1){
		    	horas = 0;
		    }
		    if(dias < 1){
		    	dias = 0;
		    }

		    document.getElementById('dia').innerHTML = dias;
			document.getElementById('hora').innerHTML = horas;
			document.getElementById('minuto').innerHTML = minutos;
			document.getElementById('segundo').innerHTML = segundos;
		  

		}, 1000);
	</script>

	<p style="text-align: center;"><?php echo $txt_data_hora_live; ?></p>
	


	<div class="contagem">
		<div class="conatianer-fluid">
			<div class="row">
				<div class="col-3">
					<div class="numero" id="dia"></div>
				</div>
				<div class="col-3">
					<div class="numero" id="hora"></div>
				</div>
				<div class="col-3">
					<div class="numero" id="minuto"></div>
				</div>
				<div class="col-3">
					<div class="numero" id="segundo"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<p class="legenda">Dias</p>
				</div>
				<div class="col-3">
					<p class="legenda">Horas</p>
				</div>
				<div class="col-3">
					<p class="legenda">Min</p>
				</div>
				<div class="col-3">
					<p class="legenda">Seg</p>
				</div>
			</div>
		</div>
	</div>

	<style>
		.contagem {
			width: 100%;
			background-color: #1c2939;
			margin: 0 auto;
			max-width: 300px;
			text-align: center;
			border: 1px solid #ccc;
			padding: 20px;
		}

		.numero {
			min-width: 20px;
			max-width: 55px;
			color: #fff;
			font-size: 30px;
			margin: 0;
			text-align: center;
			border-radius: 5px;
			padding: 5px;
		}

		.legenda{
			height: 25px;
			line-height: 10px;
			font-size:12px;
			text-align: center;
			margin: 5px 0 0;
		}
		.wrap-box-form-live {
			background-color: #1c2939;
			max-width: 650px;
			margin: 60px auto;
			box-shadow: 0 0 27px 0 rgba(0,0,0,.25);
			padding-bottom: 30px;
		}
	</style>
</section>

<section class="wrapper-inner brinde">
	<div class="wrap-box-form-live">
		<br><br>
		<p style="margin:30px 4%; text-align:center;">Para se cadastrar, preencha o formulário:</p>


		<div class="wrapper-brinde" style="max-width:800px; margin:0 auto;">
			<div style="margin:0 4%;">

				<form name="liveForm" id="liveForm"  data-target="ws-prelive" data-isintegrado="true" method="post" action="#"  class="brinde-form" >
					<div class="modal-body container-fluid">
						<input type="hidden" name="idForm" value="5" id="idForm">
						<input type="hidden" name="idEmpreendimento" value="411" id="idEmpreendimento">
						<div class="form-group">
							<label for="nome">Nome Completo<sup>*</sup></label>
							<input type="text" class="form-control" name="nome" id="nome">
						</div>
						<div class="form-row">
							<div class="form-group col-12">
								<label>E-mail<sup>*</sup></label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
							<div class="form-group col-12">
								<label class="tel-form" style="margin:0;">Telefone Celular<sup>*</sup></label>
							</div>
							<div class="form-group col-3 col-sm-2">
								<input type="text" class="form-control" name="ddd" id="ddd"  maxlength="2">
							</div>
							<div class="form-group col-9 col-sm-10 col-md-4">
								<input type="text" class="form-control" name="fone" alt="celular" id="fone"  maxlength="10" >
							</div>
						</div>
						<div class="form-group">
							<div class="form-privacidade">
								<?php echo get_field("msg_privacidade",311); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="form-group col-12 p-0">
								<div class="w-100 wrapper-btn-triangle">
							    	<button type="submit" class="form-control btn btn-primary btn-brinde" id="btnEnviar">ENVIAR</button>
							    	<div class="triangle-top-right"></div>
							    </div>
							</div>
						</div>
						<div class="form-group">
						<small class="form-text text-message-required">
							* Campos de preenchimento obrigatório.
						</small>
					</div>
					</div>
				</form>

			</div>
		</div>

	</div>


</section>



<?php

if (!empty($txt_legal)) {
	echo '<div class="container wrapper-inner campanha-texto-legal">
				<div class="row">
					<div class="col-12">
						<p>' . $txt_legal . '</p>
					</div>
				</div>
			</div>';
}
?>

