<?php
// Página Contato - Fornecedor


// Captura informações do CMS
$titulo_secao = get_field("titulo_secao_contato");
$icone_secao = wp_get_attachment_url(get_field("icon_secao_contato"));
$alt_icone_secao = get_post_meta( get_field('icon_secao_contato'), '_wp_attachment_image_alt', true);
$txt_intro = get_field("txt_introdutorio");
$label_nome = get_field("label_nome");
$label_email = get_field("label_email");
$label_telefone = get_field("label_telefone");
$label_mensagem = get_field("label_mensagem");
$txt_obrigatorios = get_field("txt_obrigatorios");
$txt_btn_enviar = get_field("txt_btn_enviar");
$txt_btn_limpar = get_field("txt_btn_limpar");
?>

<?php
// Seção Contato - Fornecedor
?>
<section id="fornecedor" class="container-fluid wrapper-contato">

	<header class="wrapper-banner">
		<?php
		// Monta cabeçalho de banner
		get_template_part( 'template-parts/header/banner-no-h', 'page' );
		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<div class="container wrapper-inner wrapper-contato-body">
		<div class="wrapper-contato-content">
			<form name="fornecedorForm" id="fornecedorForm" data-target="ws-fornecedor" data-isintegrado=true  method="post" action="#">

				<input type="hidden" name="acao" value="" id="acao">
				<input type="hidden" name="ip" value="" id="ip">
				<input type="hidden" name="analytics" value="" id="analytics">
				<input type="hidden" name="empreendimento" value="" id="empreendimento">
				<input type="hidden" name="tipoEmail" value="F" id="tipoEmail">

				<div class="contato-content-header">
					<div class="contato-content-title">
						<h1 class="contato-content-title-text"><?php echo $titulo_secao; ?></h1>
					</div>
					<div class="contato-content-title-separator"></div>
				</div>

				<div class="contato-content-body">
					<p class="contato-instrucoes"><?php echo $txt_intro; ?></p>

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
							<input type="text" class="form-control" name="ddd" id="ddd" alt="ddd" maxlength="2" autocomplete="off">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="email">&nbsp;</label>
							<input type="text" class="form-control" name="fone" id="fone" alt="fone"  maxlength="10" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="mensagem"><?php echo $label_mensagem; ?></label>
						<textarea class="form-control" name="mensagem" id="mensagem" rows="7"></textarea>
					</div>
					<div class="form-group">
						<div class="form-privacidade">
							<?php echo get_field("msg_privacidade",311); ?>
						</div>
					</div>
				</div>

				<div class="contato-content-footer">
					<div class="form-row">
						<div class="form-group col-md-6">
							<button type="reset" class="form-control btn btn-secondary" id="btnLimpar"><?php echo $txt_btn_limpar; ?></button>
						</div>
						<div class="form-group col-md-6">
							<div class="wrapper-btn-triangle">
						    	<button type="submit" class="form-control btn btn-primary" id="btnEnviar"><?php echo $txt_btn_enviar; ?></button>
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
</section>