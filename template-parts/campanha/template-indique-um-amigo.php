<?php
// Template 1 para Campanhas


// Captura informações do CMS
$mostrar_pres = get_field("show_presentation_indique");
$pre_pres = get_field("pre_presentation_indique");
$status_pres = get_field("status_presentation_indique");
$titulo_pres = get_field("titulo_presentation_indique");
$desc_pres = get_field("desc_presentation_indique");
$bg_color_pres = get_field("bg_color_presentation_indique");
$area_pres = get_field("area_presentation_indique");
$pos_pres = get_field("pos_presentation_indique");
$txt_legal = get_field("txt_legal_indique");
$regulamento = get_field("regulamento_indique");

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

<section class="wrapper-inner indique-um-amigo">
	<div class="wrap-box-form-indique-um-amigo">
		<br><br>
		<div class="wrapper-brinde" style="max-width:800px; margin:0 auto;">
			<div style="margin:0 4%;">

				<form name="liveForm" id="liveForm"  data-target="ws-indiqueamigo" data-isintegrado="true" method="post" action="#"  class="brinde-form" >
					<div class="modal-body container-fluid">
						<input type="hidden" name="idForm" value="5" id="idForm">

						<p class="subtitlulo-label-indique"><strong>SEUS DADOS:</strong></p>
						<div class="form-group">
							<label for="nome">Empreendimento<sup>*</sup></label>
							<input type="text" class="form-control" name="nomeEmpreendimento" id="nomeEmpreendimento">
						</div>
						<div class="form-group">
							<label for="nome">Torre<sup>*</sup></label>
							<input type="text" class="form-control" name="torre" id="torre">
						</div>
						<div class="form-group">
							<label for="nome">Unidade<sup>*</sup></label>
							<input type="text" class="form-control" name="unidade" id="unidade">
						</div>
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
								<label class="tel-form" style="margin:0;">Telefone<sup>*</sup></label>
							</div>
							<div class="form-group col-3 col-sm-2">
								<input type="text" class="form-control" name="ddd" id="ddd"  maxlength="2">
							</div>
							<div class="form-group col-9 col-sm-10 col-md-4">
								<input type="text" class="form-control" name="fone" alt="celular" id="fone"  maxlength="10" >
							</div>
						</div>
						<div class="form-group">
							<label for="nome">CPF<sup>*</sup></label>
							<input type="text" class="form-control" alt="cpf" name="cpf" id="cpf">
						</div>

						<br><br>
						<p class="subtitlulo-label-indique"><strong>DADOS DA PESSOA INDICADA:</strong></p>
						<div class="form-group">
							<label for="nome">Nome Completo<sup>*</sup></label>
							<input type="text" class="form-control" name="nomeIndicado" id="nomeIndicado">
						</div>
						<div class="form-row">
							<div class="form-group col-12">
								<label>E-mail<sup>*</sup></label>
								<input type="email" class="form-control" name="emailIndicado" id="emailIndicado">
							</div>
							<div class="form-group col-12">
								<label class="tel-form" style="margin:0;">Telefone<sup>*</sup></label>
							</div>
							<div class="form-group col-3 col-sm-2">
								<input type="text" class="form-control" name="dddIndicado" id="dddIndicado"  maxlength="2">
							</div>
							<div class="form-group col-9 col-sm-10 col-md-4">
								<input type="text" class="form-control" name="foneIndicado" alt="celular" id="foneIndicado"  maxlength="10" >
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

		<br><br>
		<div class="wrap-regulamento-indique wrapper-inner">
			<div id="accordion">
			  <div class="card" style="background-color:#131b20;">
			    <div class="card-header" id="headingOne" style="background-color:#1c2939;">
			      <h5 class="mb-0">
			        <button style="color:#fff !important;" class="btn btn-link" data-toggle="collapse" data-target="#collapseRegulamento" aria-expanded="false" aria-controls="collapseRegulamento">
			          Clique aqui para ver o regulamento
			        </button>
			      </h5>
			    </div>

			    <div id="collapseRegulamento" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
			      <div class="card-body">
			        <?php echo $regulamento; ?>
			      </div>
			    </div>
			  </div>
			  </div>
			</div>
		</div>
		<br><br>

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

