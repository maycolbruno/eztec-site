<?php
// Template 1 para Campanhas


// Captura informações do CMS
$mostrar_pres = get_field("show_presentation_agendamento");
$pre_pres = get_field("pre_presentation_agendamento");
$status_pres = get_field("status_presentation_agendamento");
$titulo_pres = get_field("titulo_presentation_agendamento");
$desc_pres = get_field("desc_presentation_agendamento");
$bg_color_pres = get_field("bg_color_presentation_agendamento");
$area_pres = get_field("area_presentation_agendamento");
$pos_pres = get_field("pos_presentation_agendamento");
$txt_legal = get_field("txt_legal_agendamento");

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
				<p class="campanha-presentation-descricao text-center"><?php echo $desc_pres; ?></p>
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

<section class="wrapper-inner brinde">
	<div class="wrap-box-form-live">


		<div class="wrapper-brinde" style="max-width:800px; margin:0 auto;">
			<div style="margin:0 4%;">

				<form name="agendamentoForm" id="agendamentoForm"  data-target="ws-agendamento" data-isintegrado="true" method="post" action="#"  class="brinde-form" >
					<div class="modal-body container-fluid">
						<input type="hidden" name="idForm" value="5" id="idForm">
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
								<input type="text" class="form-control" name="fone" alt="fone" id="fone"  maxlength="10" >
							</div>
							<div class="form-group col-12" id="divEmpre">
								<label for="idEmpreendimento"><?php echo $label_imovel; ?></label>
								<select class="form-control custom-select" name="idEmpreendimento" id="idEmpreendimento">
									<option value="">Selecione</option>
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
									$current_post_type = get_post_type();
									if($current_post_type == "imovel"){
										$im_id = get_field("imovel_id");
									}
									else{
										$imovel_ref = get_field("imovel_ref");
										$im_id = get_field("imovel_id",$imovel_ref);
									}
									$imovel_q = new WP_Query( $args );
									if ( $imovel_q->have_posts() ) {
										while ( $imovel_q->have_posts() ) {
											$imovel_q->the_post();
											$imovel_inner_id = get_field("imovel_id");
											if($im_id == $imovel_inner_id){
												echo '<option value="' . $imovel_inner_id . '" selected="selected">' . get_the_title() . '</option>';
											}
											else{
												echo '<option value="' . $imovel_inner_id . '">' . get_the_title() . '</option>';
											}
										}
									}
									// Reseta WP_query
									wp_reset_postdata();
									?>
								</select>
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

