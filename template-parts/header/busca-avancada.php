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
$icon_dorms         = get_field("icon_ba_dorms",311);
$label_vagas        = get_field("label_ba_vagas",311);
$icon_vagas         = get_field("icon_ba_vagas",311);
$label_suites       = get_field("label_ba_suites",311);
$icon_suites        = get_field("icon_ba_suites",311);
$label_preco        = get_field("label_ba_faixa_preco",311);
$icon_preco         = get_field("icon_ba_faixa_preco",311);
$label_metragem     = get_field("label_ba_metragem",311);
$icon_metragem      = get_field("icon_ba_metragem",311);
$txt_limpar         = get_field("txt_ba_btn_limpar_filtros",311);

$mostrar_apenas_comerciais = get_field("show_apenas_comerciais");

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


//Constroi a action do formulario
$regiao_usada = get_field("regiao_usada");
if ($regiao_usada == "nenhuma"){
	$url_regiao = "/imoveis/";
	if($mostrar_apenas_comerciais == 1){
		$url_regiao = "/imoveis/comerciais/";
	}
}
else{
	if (is_page(2)){
        $url_regiao = "/imoveis/";
    }
    else{
    	$url_regiao = get_permalink();
    }
}


// Constrói classes para ocultar Tipo de Imóvel quando tem apenas Comerciais
if ($mostrar_apenas_comerciais == 1){
	$esconde_tipos = 1;
}
if ($esconde_tipos == 1){
	$class_col_tipo = "d-none col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12";
	$class_col_restante = "col-xl-5 col-lg-5 col-md-5 col-sm-6 col-6";
}
else{
	$class_col_tipo = "col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12";
	$class_col_restante = "col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6";
}
?>

<div class="wrapper-ba wrapper-ba-mobile-desktop wrapper-inner">
	<form id="BuscaAvancada" method="post" action="<?php echo $url_regiao; ?>">

		<!-- Busca simples -->
		<div class="row">
			<div class="<?php echo $class_col_tipo; ?>">
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
			<div class="<?php echo $class_col_restante; ?>">
				<div class="form-group">
					<select class="form-control custom-select" name="baRegiao">
						<?php
						if($regiao_usada == "nenhuma"){
							$key_regiao = "imovel_regiao";
							echo '<option value="">Região</option>';
						}
						else{
							$key_regiao = "imovel_bairro";
							echo '<option value="">Bairro</option>';
						}
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
								if($key_regiao == "imovel_bairro"){
									$abrev_regiao = substr($k, 0, 2);
									if($abrev_regiao == $regiao_usada){
										echo '<option value="' . $k . '"' . $regiao_select . '>' . $v . '</option>';
									}
								}
								else{
									echo '<option value="' . $k . '"' . $regiao_select . '>' . $v . '</option>';
								}
	                        }
	                    }
						?>
					</select>
				</div>
			</div>
			<div class="<?php echo $class_col_restante; ?>">
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
			<!-- Botão para desktop, esconder para mobile -->
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 d-none d-sm-none d-md-block">
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-buscar btn-block" id="btnBuscar"><?php echo $txt_btn_buscar; ?></button>
				</div>
			</div>
			<div class="col-12 p-0 text-right btn-busca-avancada-box">
				<button type="button" class="btn btn-link btn-busca-avancada text-right collapsed" data-toggle="collapse" data-target="#busca-avancada" aria-controls="busca-avancada" aria-expanded="false" aria-label="Toggle busca avancada">
					<?php echo $txt_busca_avancada; ?> <i class="triangle-down" aria-hidden="true"></i>
				</button>
			</div>
		</div>

		<!-- Busca Avancada -->
		<div id="busca-avancada" class="row busca-avancada collapse" role="tabpanel" aria-labelledby="busca-avancada">
			<div class="offset-xl-1 col-xl-1 offset-lg-1 col-lg-1 col-md-4 col-sm-4 col-4">
				<div class="form-group text-center">
					<label for="dorms">
						<img src="<?php echo wp_get_attachment_url($icon_dorms); ?>" alt="<?php echo get_post_meta( $icon_dorms, '_wp_attachment_image_alt', true); ?>">
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
			<div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4">
				<div class="form-group text-center">
					<label for="vagas">
						<img src="<?php echo wp_get_attachment_url($icon_vagas); ?>" alt="<?php echo get_post_meta( $icon_vagas, '_wp_attachment_image_alt', true); ?>">
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
			<div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4">
				<div class="form-group text-center">
					<label for="suites">
						<img src="<?php echo wp_get_attachment_url($icon_suites); ?>" alt="<?php echo get_post_meta( $icon_suites, '_wp_attachment_image_alt', true); ?>">
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
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="form-group">
					<label>
						<img src="<?php echo wp_get_attachment_url($icon_preco); ?>" alt="<?php echo get_post_meta( $icon_preco, '_wp_attachment_image_alt', true); ?>">
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
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="form-group">
					<label>
						<img src="<?php echo wp_get_attachment_url($icon_metragem); ?>" alt="<?php echo get_post_meta( $icon_metragem, '_wp_attachment_image_alt', true); ?>">
						<?php echo $label_metragem; ?> <b><span id="metragemMin"></span> - <span id="metragemMax"></span></b>
					</label>
					<input id="metragem" type="text" name="baMetragem"/>
				</div>
			</div>
			<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
				<div class="form-group">
					<label for=""></label>
					<button class="btn btn-limpar" type="reset">
						<?php echo $txt_limpar; ?>
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 d-block d-sm-block d-md-none">
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-buscar" id="btnBuscar"><?php echo $txt_btn_buscar; ?></button>
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