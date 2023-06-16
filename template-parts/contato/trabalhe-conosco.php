<?php
// Página Contato - Trabalhe Conosco


// Captura informações do CMS
$titulo_secao = get_field("titulo_secao_contato");
$icone_secao = wp_get_attachment_url(get_field("icon_secao_contato"));
$alt_icone_secao = get_post_meta( get_field('icon_secao_contato'), '_wp_attachment_image_alt', true);
$label_cpf = get_field("label_cpf");
$label_nome = get_field("label_nome");
$label_apelido = get_field("label_apelido");
$label_endereco = get_field("label_endereco");
$label_numero = get_field("label_numero");
$label_complemento = get_field("label_complemento");
$label_bairro = get_field("label_bairro");
$label_cidade = get_field("label_cidade");
$label_estado = get_field("label_estado");
$label_cep = get_field("label_cep");
$label_telefone = get_field("label_telefone");
$label_ramal = get_field("label_ramal");
$label_fax = get_field("label_fax");
$label_email = get_field("label_email");
$label_tel_comercial = get_field("label_tel_comercial");
$label_celular = get_field("label_celular");
$label_localizacao = get_field("label_localizacao");
$label_celular_extra = get_field("label_celular_extra");
$label_curriculo = get_field("label_currículo");
$txt_obrigatorios = get_field("txt_obrigatorios");
$txt_btn_enviar = get_field("txt_btn_enviar");
$txt_btn_limpar = get_field("txt_btn_limpar");
?>

<?php
// Seção Contato - Trabalhe Conosco
?>
<section id="trabalhe-conosco" class="container-fluid wrapper-contato">

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
			<form name="trabalheConoscoForm" id="trabalheConoscoForm" data-target="ws-trabalheConosco" data-isintegrado=true method="post" action="#">
				<div class="contato-content-header">
					<div class="contato-content-title">
						<h1 class="contato-content-title-text"><?php echo $titulo_secao; ?></h1>
					</div>
					<div class="contato-content-title-separator"></div>
				</div>

				<div class="contato-content-body">
					<p class="contato-instrucoes"><?php echo $txt_intro; ?></p>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="nome"><?php echo $label_nome; ?></label>
							<input type="text" class="form-control" name="nome" id="nome">
						</div>
						<div class="form-group col-12 col-md-3">
							<label for="cpf"><?php echo $label_cpf; ?></label>
							<input type="text" class="form-control" name="cpf" id="cpf" alt="cpf" >
						</div>
						<div class="form-group col-12 col-md-3">
							<label for="apelido"><?php echo $label_apelido; ?></label>
							<input type="text" class="form-control" name="apelido" id="apelido">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="trabalheForm.endereco"><?php echo $label_endereco; ?></label>
							<input type="text" class="form-control" name="trabalheFormEndereco" id="endereco">
						</div>
						<div class="form-group col-12 col-md-3">
							<label for="trabalheForm.numero"><?php echo $label_numero; ?></label>
							<input type="number" class="form-control" name="numero" id="numero">
						</div>
						<div class="form-group col-12 col-md-3">
							<label for="trabalheForm.complemento"><?php echo $label_complemento; ?></label>
							<input type="text" class="form-control" name="complemento" id="complemento">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12 col-lg-6">
							<label for="trabalheForm.bairro"><?php echo $label_bairro; ?></label>
							<input type="text" class="form-control" name="bairro" id="bairro">
						</div>
						<div class="form-group col-sm-12 col-md-6 col-lg-3">
							<label for="trabalheForm.siglaEstado"><?php echo $label_estado; ?></label>
							<select class="form-control custom-select" name="trabalheForm-siglaEstado" id="siglaEstado">
								<option value="">Selecione</option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AP">AP</option>
								<option value="AM">AM</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MT">MT</option>
								<option value="MS">MS</option>
								<option value="MG">MG</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PR">PR</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RS">RS</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="SC">SC</option>
								<option value="SP">SP</option>
								<option value="SE">SE</option>
								<option value="TO">TO</option>
							</select>
						</div>
						<div class="form-group col-sm-12 col-md-6 col-lg-3">
							<label for="cidade"><?php echo $label_cidade; ?></label>
							<input type="text" class="form-control" name="trabalheForm-cidade" id="cidade">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="cep"><?php echo $label_cep; ?></label>
							<input type="text" class="form-control" name="trabalheForm-cep" id="cep" alt="cep" >
						</div>
						<div class="form-group col-3 col-sm-2">
							<label for="ddd_fone"><?php echo $label_telefone; ?></label>
							<input type="text" class="form-control" name="ddd_fone" id="ddd_fone" alt="ddd" maxlength="2" autocomplete="off">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="fone">&nbsp;</label>
							<input type="text" class="form-control" name="fone" id="fone" alt="fone" maxlength="10" autocomplete="off">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="ramal"><?php echo $label_ramal; ?></label>
							<input type="text" class="form-control" name="ramal" id="ramal">
						</div>
						<div class="form-group col-3 col-sm-2">
							<label for="ddd_fax"><?php echo $label_fax; ?></label>
							<input type="text" class="form-control" name="ddd_fax" id="ddd_fax" alt="ddd" maxlength="2" autocomplete="off">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="fax">&nbsp;</label>
							<input type="text" class="form-control" name="fax" id="fax" alt="fone" maxlength="10" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label for="email"><?php echo $label_email; ?>*</label>
						<input type="email" class="form-control" name="email" id="email">
					</div>

					<div class="form-row">
						<div class="form-group col-3 col-sm-2">
							<label for="ddd_comercial" class="allow-exceed-text"><?php echo $label_tel_comercial; ?></label>
							<input type="text" class="form-control" name="ddd_comercial" id="ddd_comercial" alt="ddd" maxlength="2" autocomplete="off">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="comercial">&nbsp;</label>
							<input type="text" class="form-control" name="comercial" id="comercial" alt="fone" maxlength="10" autocomplete="off">
						</div>
						<div class="form-group col-3 col-sm-2">
							<label for="ddd_celular"><?php echo $label_celular; ?>*</label>
							<input type="text" class="form-control" name="ddd_celular" id="ddd_celular" alt="ddd" maxlength="2" autocomplete="off">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="celular">&nbsp;</label>
							<input type="text" class="form-control" name="celular" id="celular" alt="fone" maxlength="10" autocomplete="off">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="localizacao"><?php echo $label_localizacao; ?></label>
							<input type="text" class="form-control" name="localizacao" id="localizacao">
						</div>
						<div class="form-group col-3 col-sm-2">
							<label for="ddd_celular_extra" class="allow-exceed-text"><?php echo $label_celular_extra; ?></label>
							<input type="text" class="form-control" name="ddd_celular_extra" id="ddd_celular_extra" alt="ddd" maxlength="2" autocomplete="off">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="celular_extra">&nbsp;</label>
							<input type="text" class="form-control" name="celular_extra" id="celular_extra" alt="fone" maxlength="10" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label for="curriculo"><?php echo $label_curriculo; ?></label>
						<div class="custom-file form-control">
							<input type="file" class="custom-file-input" name="curriculo" id="curriculo">
							<span class="custom-file-control">Escolha o arquivo</span>
						</div>
						<label id="curriculo-error" class="error" for="curriculo"></label>
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