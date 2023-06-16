<?php

// Busca Avançada

// Captura informações do CMS
$label_tipo_imovel  = get_field("label_ba_tipo",311);
$txt_res            = get_field("txt_btn_residenciais",311);
$icon_res           = get_field("icon_ba_residenciais",311);
$icon_res_selected  = get_field("icon_ba_residenciais_selected",311);
$txt_com            = get_field("txt_btn_comerciais",311);
$icon_com           = get_field("icon_ba_comerciais",311);
$icon_com_selected  = get_field("icon_ba_comerciais_selected",311);
$label_regiao       = get_field("label_ba_regiao",311);
$label_status       = get_field("label_ba_status",311);
$txt_btn_buscar     = get_field("txt_btn_ba_buscar",311);
$txt_busca_avancada = get_field("label_abre_ba",311);
$label_dorms        = get_field("label_ba_dorms",311);
$label_vagas        = get_field("label_ba_vagas",311);
$label_suites       = get_field("label_ba_suites",311);
$label_preco        = get_field("label_ba_faixa_preco",311);
$label_metragem     = get_field("label_ba_metragem",311);
$txt_limpar         = get_field("txt_ba_btn_limpar_filtros",311);

// all pega qualquer id de imóvel para buscar opções:
$key_regiao = "imovel_regiao";
$args_qualquer = array(
'post_status'           => 'publish',
'post_type'             => 'imovel',
'numberposts'           => -1);
$qualquer = new WP_Query( $args_qualquer );
if ( $qualquer->have_posts() ) {
	while ( $qualquer->have_posts() ) {
		$qualquer->the_post();
		$qualquer_id = get_the_ID();
	}
}
wp_reset_postdata();

if(isset($_POST['baResidencial'])) {
        if($_POST['baResidencial'][0] == "Residencial"){
            $tipo_res_class = ' active';
            $tipo_res_check = ' checked="checked"';
        }
        else{
            $tipo_res_class = "";
            $tipo_res_check = "";
        }
}
if(isset($_POST['baComercial'])) {
        if($_POST['baComercial'][0] == "Comercial"){
            $tipo_com_class = ' active';
            $tipo_com_check = ' checked="checked"';
        }
        else{
            $tipo_com_class = "";
            $tipo_com_check = "";
        }
}

$met_init_min = 0;
$met_init_max = 200;
$met_step 	  = 10;
$met_min	  = $met_init_min;
$met_max 	  = $met_init_max;
if(isset($_POST['baMetragem'])) {
	$metragem = $_POST['baMetragem'];
	$metros   = explode(",", $metragem);
	$met_min  = $metros[0];
	$met_max  = $metros[1];
}


?>

<div class="wrapper-ba wrapper-ba-mobile-desktop wrapper-inner">
	<form id="BuscaAvancada" method="post" action="/imoveis/">

		<!-- Busca simples -->
		<div class="row">
			<div class="col-12">
				<p class="titulo-modal-geral">BUSCA AVANÇADA</p>
				<div class="modal-geral-divisor"></div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<div class="row">
						<div class="col-6 tipo-imovel-group tipo-imovel-group-mobile d-flex">
							<div class="btn-group-toggle w-100" data-toggle="buttons">
								<label class="btn btn-secondary d-flex justify-content-center align-items-center pl-md-0 pr-md-0 <?php echo $tipo_res_class; ?>">
									<div class="btn-check-icon btn-check-icon-residencial text-center d-md-none d-lg-block" style="background-image: url('<?php echo wp_get_attachment_url($icon_res_selected); ?>');"></div>
									<input type="checkbox" autocomplete="off" name="baResidencial[]" value="Residencial" <?php echo $tipo_res_check; ?>>
									<span><?php echo $txt_res; ?></span>
								</label>
							</div>
						</div>
						<div class="col-6 tipo-imovel-group tipo-imovel-group-mobile d-flex">
							<div class="btn-group-toggle w-100" data-toggle="buttons">
								<label class="btn btn-secondary d-flex justify-content-center align-items-center pl-md-0 pr-md-0 <?php echo $tipo_com_class; ?>">
									<div class="btn-check-icon btn-check-icon-comercial text-center d-md-none d-lg-block" style="background-image: url('<?php echo wp_get_attachment_url($icon_com_selected); ?>');"></div>
									<input type="checkbox" autocomplete="off" name="baComercial[]" value="Comercial" <?php echo $tipo_com_check; ?>>
									<span><?php echo $txt_com; ?></span>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="baDoSearch" value="1">
			<div class="col-6">
				<div class="form-group">
					<select class="form-control custom-select" name="baRegiao">
						<option value="">Região</option>
						<?php
	                    $field = get_field_object($key_regiao,$qualquer_id);
	                    if( $field ){
	                    	$regiao = $_POST['baRegiao'];
	                        foreach( $field['choices'] as $k => $v ){
	                        	if($regiao !== ""){
									if($regiao == $k){
										$regiao_select = ' selected="selected"';
									}
									else{
										$regiao_select = '';
									}
								}
								echo '<option value="' . $k . '"' . $regiao_select . '>' . $v . '</option>';
	                        }
	                    }
						?>
					</select>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<select class="form-control custom-select" name="baStatus">
						<option value="">Fase</option>
						<?php
						$key_fase = "imovel_fase";
	                    $field = get_field_object($key_fase,$qualquer_id);
	                    if( $field ){
	                    	$fase = $_POST['baStatus'];
	                        foreach( $field['choices'] as $k => $v ){
	                        	if($fase !== ""){
									if($fase == $k){
										$fase_select = ' selected="selected"';
									}
									else{
										$fase_select = '';
									}
								}
	                            echo '<option value="' . $k . '"' . $fase_select . '>' . $v . '</option>';
	                        }
	                    }
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="dorms">
						<?php echo $label_dorms; ?>
					</label>
					<select class="form-control custom-select" name="baDorms">
						<option value="">...</option>
						<?php
						$key_dorms = "imovel_dorms";
	                    $field = get_field_object($key_dorms,$qualquer_id);
	                    if( $field ){
	                    	$dorms = $_POST['baDorms'];
	                        foreach( $field['choices'] as $k => $v ){
	                        	if($dorms !== ""){
									if($dorms == $k){
										$dorms_select = ' selected="selected"';
									}
									else{
										$dorms_select = '';
									}
								}
	                            echo '<option value="' . $k . '"' . $dorms_select . '>' . $v . '</option>';
	                        }
	                    }
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="vagas">
						<?php echo $label_vagas; ?>
					</label>
					<select class="form-control custom-select" name="baVagas">
						<option value="">...</option>
						<?php
						$key_vagas = "imovel_vagas";
	                    $field = get_field_object($key_vagas,$qualquer_id);
	                    if( $field ){
	                    	$vagas = $_POST['baVagas'];
	                        foreach( $field['choices'] as $k => $v ){
	                        	if($vagas !== ""){
									if($vagas == $k){
										$vagas_select = ' selected="selected"';
									}
									else{
										$vagas_select = '';
									}
								}
	                            echo '<option value="' . $k . '"' . $vagas_select . '>' . $v . '</option>';
	                        }
	                    }
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="suites">
						<?php echo $label_suites; ?>
					</label>
					<select class="form-control custom-select" name="baSuites">
						<option value="">...</option>
						<?php
						$key_suites = "imovel_suites";
	                    $field = get_field_object($key_suites,$qualquer_id);
	                    if( $field ){
	                    	$suites = $_POST['baSuites'];
	                        foreach( $field['choices'] as $k => $v ){
	                        	if($suites !== ""){
									if($suites == $k){
										$suites_select = ' selected="selected"';
									}
									else{
										$suites_select = '';
									}
								}
	                            echo '<option value="' . $k . '"' . $suites_select . '>' . $v . '</option>';
	                        }
	                    }
						?>
					</select>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label>
						<?php echo $label_preco; ?>
					</label>
					<select class="form-control custom-select" name="baFaixasPreco">
						<option value="">...</option>
						<?php
						$key_preco = "imovel_preco";
	                    $field = get_field_object($key_preco,$qualquer_id);
	                    if( $field ){
	                    	$preco = $_POST['baFaixasPreco'];
	                        foreach( $field['choices'] as $k => $v ){
	                        	if($preco !== ""){
									if($preco == $k){
										$preco_select = ' selected="selected"';
									}
									else{
										$preco_select = '';
									}
								}
	                            echo '<option value="' . $k . '"' . $preco_select . '>' . $v . '</option>';
	                        }
	                    }
						?>
					</select>
				</div>
			</div>

			<?php
			if(isset($_POST['baMetragem'])) {
			    $metragem = $_POST['baMetragem'];
			    $metros = explode(",", $metragem);
			    $met_min = $metros[0];
			    $met_max = $metros[1];
			    // Trocar o max range também no custom.js
			    if ($met_min !== 0 && $met_max !== 200){
			    	echo '
			    	<script type="text/javascript">
						var met_min = '. $met_min . ';
						var met_max = '. $met_max . ';
					</script>
			    	';
			    }
			}
			?>
			<div class="col-12">
				<div class="form-group">
					<label>
						<?php echo $label_metragem; ?> <b><span id="metragemMin"></span> - <span id="metragemMax"></span></b>
					</label>
					<input id="metragem" type="text" name="baMetragem"/>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for=""></label>
					<button class="btn btn-limpar" type="reset">
						<?php echo $txt_limpar; ?>
					</button>
				</div>
			</div>
			<!-- Botão para desktop, esconder para mobile -->
			<div class="col-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-buscar btn-block" id="btnBuscar"><?php echo $txt_btn_buscar; ?></button>
				</div>
			</div>
		</div>

	</form>

</div>

<script>
	$('document').ready(function(){
		createSlider(<?php echo $met_min . ',' . $met_max; ?>);

		// Botão Limpar Valores
		$('.btn-limpar').click(function(){
			// Reset Button Radio
			$('.tipo-imovel-group .btn-secondary').removeClass('active');
			// Reset slider values
			createSlider(<?php echo $met_init_min . ',' . $met_init_max; ?>);
		});
	});

	var createSlider = function(valMin, valMax) {
		var metragemValMin  = <?php echo $met_init_min; ?>;
		var metragemValMax  = <?php echo $met_init_max; ?>;
		var metragemInitMin = valMin;
		var metragemInitMax = valMax;
		var sliderMetragem  = $("#metragem").slider({
			id: "metragem",
			min: metragemValMin,
			max: metragemValMax,
			step: <?php echo $met_step; ?>,
			range: true,
			tooltip: 'always',
			value: [metragemInitMin, metragemInitMax]
		});
		$("#metragemMin").text(metragemInitMin + ' m²');
		$("#metragemMax").text((<?php echo $met_init_max; ?> == metragemInitMax ? metragemInitMax + ' m² ou mais': metragemInitMax + ' m²'));
		$("#metragem").on("slide", function(slideEvt) {
			var metragens = slideEvt.value;
			$("#metragemMin").text(metragens[0] + ' m²');
			$("#metragemMax").text((<?php echo $met_init_max; ?> == metragens[1] ? metragens[1] + ' m² ou mais': metragens[1] + ' m²'));
		});
		$("#metragem").on("slideStop", function(slideEvt) {
			var metragens = slideEvt.value;
			$("#metragemMin").text(metragens[0] + ' m²');
			$("#metragemMax").text((<?php echo $met_init_max; ?> == metragens[1] ? metragens[1] + ' m² ou mais': metragens[1] + ' m²'));
		});
		sliderMetragem.slider("refresh");
	}
</script>