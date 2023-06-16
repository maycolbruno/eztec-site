<?php
// Formulário de contato de WhatsApp para o lightbox do menu de interação


// Captura informações do CMS
$txt_intro        = get_field("texto_introdutorio",311);
$label_nome       = get_field("label_nome",311);
$label_email      = get_field("label_email",311);
$label_telefone   = get_field("label_telefone",311);
$label_imovel     = get_field("label_imovel",311);
$txt_news         = get_field("txt_news",311);
$txt_obrigatorios = get_field("txt_obrigatorios",311);
$txt_enviar       = get_field("txt_btn_enviar",311);
$txt_whats        = get_field("txt_whats",311);
?>

<div class="mi-whats modal fade" id="modalWhats" tabindex="-1" role="dialog" aria-labelledby="modalWhatsLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form name="whatsForm" id="whatsForm" data-target="ws-whatsapp" data-isintegrado=true method="post" action="#" class="mi-contato-whats">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
				<div class="modal-header flex-column">
					<span class="titulo-contato-geral"><?php echo $txt_whats; ?></span>
					<div class="contato-geral-divisor"></div>
				</div>
				<div class="modal-body">
					<p class="contato-instrucoes"><?php echo $txt_intro; ?></p>
					<input type="hidden" name="idForm" value="4" />
					<div class="form-group">
						<label for="nome"><?php echo $label_nome; ?></label>
						<input type="text" class="form-control" name="nome" id="nome">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email"><?php echo $label_email; ?></label>
							<input type="email" class="form-control" name="email" id="email">
						</div>
						<div class="form-group col-3 col-sm-2">
							<label for="ddd"><?php echo $label_telefone; ?></label>
							<input type="text" class="form-control" name="ddd" id="ddd" alt="ddd"  maxlength="2" >
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="email">&nbsp;</label>
							<input type="text" class="form-control" name="fone" id="fone" alt="fone"  maxlength="10">
						</div>
					</div>
					<div class="form-group" id="divEmpre">
						<label for="codempreendimento"><?php echo $label_imovel; ?></label>
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
					<div class="form-group">
						<div class="form-check">
							<label class="form-check-label d-flex align-items-center">
								<input class="form-check-input" name="info" value="on" type="checkbox"> <?php echo $txt_news; ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-privacidade">
							<?php echo get_field("msg_privacidade",311); ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-row">
						<div class="form-group col-md-6">
							<button type="button" class="form-control btn btn-secondary" data-dismiss="modal">Fechar</button>
						</div>
						<div class="form-group col-md-6">
							<div class="wrapper-btn-triangle btn-modal">
						    	<button type="submit" class="form-control btn btn-primary" id="btnEnviar">
						    		<div class="wrap-content-btn-contato-geral">
							    	<p class="titulo-btn-contato-geral"><?php echo $txt_enviar; ?></p>
							    </button>
						    	</a>
						    	<div class="triangle-top-right"></div>
						    </div>
						</div>
					</div>
					<div class="form-group">
						<small class="form-text text-message-required">
							<?php echo $txt_obrigatorios; ?>
						</small>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>