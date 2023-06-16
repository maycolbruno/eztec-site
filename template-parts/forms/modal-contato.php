<?php
// Formulário de contato de WhatsApp para o lightbox do menu de interação


// Captura informações do CMS
$txt_btn_contato_fl = get_field("txt_btn_contato_fl",311);
$txt_titulo_modal_contato = get_field("txt_titulo_modal_contato_fl",311);
$txt_chat = get_field("txt_chat_fl",311);
$icone_chat = wp_get_attachment_url(get_field("icone_interacao_chat_fl",311));
$alt_icone_chat = get_post_meta(get_field('icone_interacao_chat_fl',311), '_wp_attachment_image_alt', true);
$txt_email = get_field("txt_email_fl",311);
$icone_email = wp_get_attachment_url(get_field("icone_interacao_email_fl",311));
$alt_icone_email = get_post_meta(get_field('icone_interacao_email_fl',311), '_wp_attachment_image_alt', true);
$url_email = get_field("url_email",311);
$txt_whats = get_field("txt_whats_fl",311);
$icone_whats = wp_get_attachment_url(get_field("icone_interacao_whats_fl",311));
$alt_icone_whats = get_post_meta(get_field('icone_interacao_whats_fl',311), '_wp_attachment_image_alt', true);
$txt_tel = get_field("txt_telefones_fl",311);
$icone_tel = wp_get_attachment_url(get_field("icone_interacao_telefone_fl",311));
$alt_icone_tel = get_post_meta(get_field('icone_interacao_telefone_fl',311), '_wp_attachment_image_alt', true);
$num_tel = get_field("num_ligacao_telefone",311);
global $string_whats;
global $id_chat_param;
?>

<div class="modal-contato modal fade" id="modalContatoGeral" tabindex="-1" role="dialog" aria-labelledby="modalContatoGeralLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
			<div class="wrap-content-contato-geral">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<p class="titulo-contato-geral"><?php echo $txt_titulo_modal_contato; ?></p>
							<div class="contato-geral-divisor"></div>
							<div class="wrapper-btn-triangle btncorretor">
						    	<a class="btn btn-primary btn-lg" href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
						    		<div class="wrap-content-btn-contato-geral">
							    		<img class="icon-btn-contato-geral" src="<?php echo $icone_chat; ?>" alt="<?php echo $txt_chat; ?>">
							    		<p class="titulo-btn-contato-geral"><?php echo $txt_chat; ?></p>
							    	</div>
						    	</a>
						    	<div class="triangle-top-right"></div>
						    </div>
						</div>
						<div class="col-12">
							<div class="wrapper-btn-triangle">
						    	<a id="WhatsAppBtnModal" class="btn btn-primary btn-lg" href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
						    		<div class="wrap-content-btn-contato-geral">
							    		<img class="icon-btn-contato-geral" src="<?php echo $icone_whats; ?>" alt="<?php echo $txt_whats; ?>">
							    		<p class="titulo-btn-contato-geral"><?php echo $txt_whats; ?></p>
							    	</div>
						    	</a>
						    	<div class="triangle-top-right"></div>
						    </div>
						</div>
						<div class="col-12">
							<div class="wrapper-btn-triangle">
						    	<a class="btn btn-primary btn-lg" href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
						    		<div class="wrap-content-btn-contato-geral">
							    		<img class="icon-btn-contato-geral" src="<?php echo $icone_email; ?>" alt="<?php echo $txt_email; ?>">
							    		<p class="titulo-btn-contato-geral"><?php echo $txt_email; ?></p>
							    	</div>
						    	</a>
						    	<div class="triangle-top-right"></div>
						    </div>
						</div>
						<div class="col-12">
							<div class="wrapper-btn-triangle">
						    	<a class="btn btn-primary btn-lg" href="tel:<?php echo $num_tel; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
						    		<div class="wrap-content-btn-contato-geral">
							    		<img class="icon-btn-contato-geral" src="<?php echo $icone_tel; ?>" alt="<?php echo $txt_tel; ?>">
							    		<p class="titulo-btn-contato-geral"><?php echo $txt_tel; ?></p>
							    	</div>
						    	</a>
						    	<div class="triangle-top-right"></div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>