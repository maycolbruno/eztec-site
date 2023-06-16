<?php
// Página Contato - SAC


// Captura informações do CMS
$titulo_secao = get_field("titulo_secao_contato");
$icone_secao = wp_get_attachment_url(get_field("icon_secao_contato"));
$alt_icone_secao = get_post_meta( get_field('icon_secao_contato'), '_wp_attachment_image_alt', true);
$txt_intro = get_field("txt_introdutorio");
$label_nome = get_field("label_nome");
$label_email = get_field("label_email");
$label_imovel = get_field("label_imovel");
$label_telefone = get_field("label_telefone");
$label_origem_midia = get_field("label_origem_midia");
$label_mensagem = get_field("label_mensagem");
$txt_obrigatorios = get_field("txt_obrigatorios");
$txt_aceitar_news = get_field("txt_aceitar_news");
$txt_btn_enviar = get_field("txt_btn_enviar");
$txt_btn_limpar = get_field("txt_btn_limpar");
?>
<?php
// Seção Contato - SAC
?>
<section id="sac" class="container-fluid wrapper-contato">

	<header class="wrapper-banner">
		<?php
		// Monta cabeçalho de banner
		get_template_part( 'template-parts/header/banner-no-h', 'page' );
		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>
	<?php
	global $source_print;
	global $content_print;
	global $campaign_print;
	global $medium_print;
	?>

	<div class="container wrapper-inner wrapper-contato-body">
		<div class="wrapper-contato-content">
			<form name="sacForm" id="sacForm" data-target="ws-sacEztec" data-isintegrado=true  method="post" >

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
							<input type="text" class="form-control" name="fone" id="fone" alt="fone" maxlength="10" autocomplete="off">
						</div>
					</div>
					<div class="form-group" id="divEmpre">
						<label for="idEmpreendimento"><?php echo $label_imovel; ?></label>
						<select class="form-control custom-select" name="idEmpreendimento" id="idEmpreendimento">
							<option value="" selected="selected">Selecione</option>
							<?php
							$args = array(
								'post_type'  => 'imovel',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
							);
							$imovel_q = new WP_Query( $args );
							if ( $imovel_q->have_posts() ) {
								while ( $imovel_q->have_posts() ) {
									$imovel_q->the_post();
									echo '
									<option value="' . get_field("imovel_id") . '">' . get_the_title() . '</option>
									';
								}
							}
							// Reseta WP_query
							wp_reset_postdata();
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="mensagem"><?php echo $label_mensagem; ?></label>
						<textarea class="form-control" name="mensagem" id="mensagem" rows="7"></textarea>
					</div>
					<div class="form-group">
						<div class="form-check">
							<label id="info" class="form-check-label d-flex align-items-center">
								<input type="checkbox" class="form-check-input" name="info" id="info" value="on"> <?php echo $txt_aceitar_news; ?>
							</label>
						</div>
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