<?php
// Bloco de contato dentro de cada seção das Páginas

// Captura informações do CMS para Barra de Contato
$txt_intro_bcontato = get_field("txt_intro_barra_contato",311);
$txt_tel_bcontato = get_field("txt_tel_barra_contato",311);
$num_tel_bcontato = get_field("num_telefone_barra_contato",311);
$icon_tel_bcontato = get_field("icon_tel_barra_contato",311);
$txt_chat_bcontato = get_field("txt_chat_barra_contato",311);
$icon_chat_bcontato = get_field("icon_chat_barra_contato",311);
$txt_email_bcontato = get_field("txt_email_barra_contato",311);
$icon_email_bcontato = get_field("icon_email_barra_contato",311);
$txt_whats_bcontato = get_field("txt_whats_barra_contato",311);
$icon_whats_bcontato = get_field("icon_whats_barra_contato",311);

global $string_whats;

// Chat Online
$current_post_type = get_post_type();
if($current_post_type == "imovel"){
	$id_chat_param = get_the_ID();
}
else{
	$id_chat_param = "geral";
}
?>

<div class="row wrapper-barra-contato d-none d-sm-none d-md-block">
	<div class="col-12">
		<p class="barra-contato-intro text-center">
			<?php echo $txt_intro_bcontato; ?>
		</p>
		<div class="row barra-contato-list">
			<div class="barra-contato-list-item barra-contato-item-tel col">
				<a class="d-flex justify-content-center align-items-center" href="tel:<?php echo $num_tel_bcontato; ?>" onclick="dataLayer.push({'event': 'telefone_vendas'})">
					<img src="<?php echo wp_get_attachment_url($icon_tel_bcontato); ?>" alt="<?php echo get_post_meta( $icon_tel_bcontato, "_wp_attachment_image_alt", true) ?>">
					<?php echo $txt_tel_bcontato; ?>
				</a>
			</div>

			<div class="barra-contato-list-item barra-contato-item-chat col">
				<a class="d-flex justify-content-center align-items-center" href="#contatoChat" data-toggle="modal" data-target="#modalChat-<?php echo $id_chat_param; ?>">
					<img src="<?php echo wp_get_attachment_url($icon_chat_bcontato); ?>" alt="<?php echo get_post_meta( $icon_chat_bcontato, "_wp_attachment_image_alt", true) ?>">
					<?php echo $txt_chat_bcontato . $tipo_res; ?>
				</a>
			</div>

			<div class="barra-contato-list-item barra-contato-item-email col">
				<a class="d-flex justify-content-center align-items-center" href="#contatoEmail" data-toggle="modal" data-target="#modalEmail">
					<img src="<?php echo wp_get_attachment_url($icon_email_bcontato); ?>" alt="<?php echo get_post_meta( $icon_email_bcontato, "_wp_attachment_image_alt", true) ?>">
					<?php echo $txt_email_bcontato; ?>
				</a>
			</div>

			<div class="barra-contato-list-item barra-contato-item-whats col">
				<a class="d-flex justify-content-center align-items-center" href="<?php echo $string_whats; ?>" target="_blank" rel="noopener">
					<img src="<?php echo wp_get_attachment_url($icon_whats_bcontato); ?>" alt="<?php echo get_post_meta( $icon_whats_bcontato, "_wp_attachment_image_alt", true) ?>">
					<?php echo $txt_whats_bcontato; ?>
				</a>
			</div>

		</div>
	</div>
</div>