<?php
// Página Contato - Startup


// Captura informações do CMS
$titulo_secao = get_field("titulo_secao_contato");
$alt_icone_secao = get_post_meta( get_field('icon_secao_contato'), '_wp_attachment_image_alt', true);
$txt_intro = get_field("texto_introdutorio");
$label_nome = get_field("label_nome");
$label_nome_startup = get_field("label_nome_startup");
$label_desc_startup = get_field("label_desc_startup");
$label_site = get_field("label_site");
$label_email = get_field("label_email");
$label_msg = get_field("label_mensagem");
$label_endereco = get_field("label_endereco");
$label_complemento = get_field("label_complemento");
$txt_btn_enviar = get_field("txt_btn_enviar");
$txt_btn_limpar = "Limpar";
$txt_obrigatorios = get_field("txt_obrigatorios");
?>

<?php
// Seção Contato - Produto
?>
<section id="fale-conosco" class="container-fluid wrapper-contato">

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
			<form name="faleConoscoForm" id="faleConoscoForm" data-target="ws-startups" data-isintegrado=true method="post" action="#">
				<input type="hidden" name="idForm" value="1" />

				<div class="contato-content-header">
					<div class="contato-content-title">
						<h1 class="contato-content-title-text"><?php echo $titulo_secao; ?></h1>
					</div>
					<div class="contato-content-title-separator"></div>
				</div>

				<div class="contato-content-body">
					<p class="contato-instrucoes"><?php echo $txt_intro; ?></p>

					<div class="form-group">
						<label for="nome"><?php echo $label_nome_startup; ?></label>
						<input type="text" class="form-control" name="nomeStartup" id="nomeStartup" required>
					</div>
					<div class="form-group">
						<label for="nome"><?php echo $label_desc_startup; ?></label>
						<textarea class="form-control" name="descStartup" id="descStartup" rows="7" required></textarea>
					</div>
					<div class="form-group">
						<label for="nome"><?php echo $label_site; ?></label>
						<input type="url" class="form-control" name="site" id="site"  alt="url" required>
					</div>
					<div class="form-group">
						<label for="mensagem"><?php echo $label_msg; ?></label>
						<input type="text" class="form-control" name="mensagem"  id="mensagem" required>
					</div>
					<div class="form-group">
						<label for="nome"><?php echo $label_nome; ?></label>
						<input type="text" class="form-control" name="nome" id="nome" required>
					</div>
					<div class="form-group">
						<label for="email"><?php echo $label_email; ?></label>
						<input type="email" class="form-control" name="email" id="email" alt="email" required>
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