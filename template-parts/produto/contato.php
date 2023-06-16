<?php
// Seção Contato da página de produto
//
//
// Captura informações do CMS
$imovel_id = get_field("imovel_id");
$titulo_contato = get_field("titulo_imovel_contato");
$label_nome = get_field("label_nome");
$label_email = get_field("label_email");
$label_telefone = get_field("label_telefone");
$label_mensagem = get_field("label_mensagem");
$txt_aceitar_news = get_field("txt_aceitar_news");
$txt_mala = get_field("txt_aceitar_mala_direta");
$label_cep = get_field("label_cep");
$label_cidade = get_field("label_cidade");
$label_endereco = get_field("label_endereco");
$label_num = get_field("label_numero");
$label_bairro = get_field("label_bairro");
$label_complemento = get_field("label_complemento");
$txt_btn_enviar = get_field("txt_btn_enviar");
$txt_obrigatorios = get_field("txt_obrigatorios");
$txt_persona = get_field("txt_persona");
$bg_persona = get_field("bg_persona");
?>

<section id="contato" class="container-fluid wrapper-contato wrapper-contato-imovel" style="background-color:<?php echo get_field("imoveis_bg_color_contato") ?>;">
	<div class="container wrapper-inner wrapper-contato-body contato-form pt-0 pb-0">
		<div class="wrapper-contato-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-lg-4 col-12">
						<div class="contato-content-header d-flex align-items-center">
							<div class="contato-content-title">
								<h2 class="contato-content-title-text">PARA MAIS<br>INFORMAÇÕES</h2>
								<div class="contato-content-title-separator"></div>
								<p class="contato-content-desc-text"><?php echo $titulo_contato; ?></p>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-8 col-12">
						<form name="emailForm" id="emailForm" data-target="ws-produto" data-isintegrado=true method="post" action="#">
							<input type="hidden" name="idEmpreendimento" id="idEmpreendimento" value="<?php echo $imovel_id; ?>" id="utm_source">
							<input type="hidden" name="idForm" value="3" />

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
										<label for="fone">&nbsp;</label>
										<input type="text" class="form-control" name="fone" id="fone" alt="fone" maxlength="10" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label for="mensagem"><?php echo $label_mensagem; ?></label>
									<textarea class="form-control" name="mensagem" id="mensagem" rows="7"></textarea>
								</div>
								<div class="form-group">
									<div class="form-check">
										<label class="form-check-label d-flex align-items-center">
											<input class="form-check-input" name="info" value="on" type="checkbox"> <?php echo $txt_aceitar_news; ?>
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="form-privacidade" style="color:#000;">
										<?php echo get_field("msg_privacidade",311); ?>
									</div>
								</div>
							</div>

							<div class="contato-content-footer">
								<div class="form-row">
									<div class="form-group col-12">
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
			</div>
		</div>
	</div>
</section>