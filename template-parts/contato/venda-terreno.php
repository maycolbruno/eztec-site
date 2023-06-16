<?php
// Página Contato - Venda seu terreno


// Captura informações do CMS
$titulo_secao = get_field("titulo_secao_contato");
$icone_secao = wp_get_attachment_url(get_field("icon_secao_contato"));
$alt_icone_secao = get_post_meta( get_field('icon_secao_contato'), '_wp_attachment_image_alt', true);
$txt_telefone = get_field("telefone_venda_seu_terreno");
$txt_seus_dados = get_field("txt_seus_dados");
$txt_dados_do_terreno = get_field("txt_dados_do_terreno");
$label_voce_e = get_field("label_voce_e");
$label_nome = get_field("label_nome");
$label_email = get_field("label_email");
$label_telefone = get_field("label_telefone");
$label_estado = get_field("label_estado");
$label_cidade = get_field("label_cidade");
$label_preco = get_field("label_preco");
$label_iptu = get_field("label_iptu");
$label_area_terreno = get_field("label_area_terreno");
$label_endereco = get_field("label_endereco");
$label_proposta = get_field("label_proposta");
$txt_copia = get_field("txt_copia");
$txt_obrigatorios = get_field("txt_obrigatorios");
$txt_btn_enviar = get_field("txt_btn_enviar");
$txt_btn_limpar = "Limpar";
$txt_aceitacao_termos = get_field("txt_aceitacao_termos");
?>

<?php
// Seção Contato - Venda seu terreno
?>
<section id="venda-terreno" class="container-fluid wrapper-contato">

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
			<form name="vendaForm" id="vendaForm" data-target="ws-vendaSeuTerreno" data-isintegrado=true method="post" action="#">

				<input type="hidden" name="acao" value="" id="acao">

				<div class="contato-content-header">
					<div class="contato-content-title">
						<h1 class="contato-content-title-text"><?php echo $titulo_secao; ?></h1>
					</div>
					<div class="contato-content-title-separator"></div>
				</div>

				<div class="contato-content-body">
					<p class="contato-instrucoes"><?php echo $txt_seus_dados; ?></p>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="nome"><?php echo $label_voce_e; ?></label>
							<div class="p-2">
								<div class="form-check form-check-inline">
									<label class="form-check-label d-flex align-items-center">
										<input class="form-check-input" type="radio" checked name="tipoUsuario" id="radioProp" value="P"> Proprietário
									</label>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-check-label d-flex align-items-center">
										<input class="form-check-input" type="radio" name="tipoUsuario" id="radioCorr" value="C"> Corretor
									</label>
								</div>
							</div>
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="nome"><?php echo $label_nome; ?></label>
							<input type="text" class="form-control" name="nome" id="nome">
						</div>
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
				</div>

				<div class="contato-content-body border-top-0">
					<p class="contato-instrucoes"><?php echo $txt_dados_do_terreno; ?></p>

					<div class="form-row">
						<div class="form-group col-md-12 col-lg-6">
							<label for="endTerreno"><?php echo $label_endereco; ?></label>
							<input type="text" class="form-control" name="endTerreno" id="endTerreno">
						</div>
						<div class="form-group col-12 col-md-6 col-lg-3">
							<label for="siglaEstado"><?php echo $label_estado; ?></label>
							<select class="form-control custom-select" name="siglaEstado" id="siglaEstado">
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
						<div class="form-group col-12 col-md-6 col-lg-3">
							<label for="cidade"><?php echo $label_cidade; ?></label>
							<input type="text" class="form-control" name="cidade" id="cidade">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-lg-6">
							<label for="numIptu"><?php echo $label_iptu; ?></label>
							<input type="text" class="form-control" name="numIptu" id="numIptu">
						</div>
						<div class="form-group col-12 col-sm-6 col-lg-3">
							<label for="preco"><?php echo $label_preco; ?></label>
							<input type="text" class="form-control" name="preco" id="preco" alt="money" maxlength="18" autocomplete="off">
						</div>
						<div class="form-group col-12 col-sm-6 col-lg-3">
							<label for="areaTerreno"><?php echo $label_area_terreno; ?></label>
							<input type="text" class="form-control" name="areaTerreno" alt="metric" id="areaTerreno" maxlength="18" autocomplete="off" >
						</div>
					</div>
					<div class="form-group">
						<label for="proposta"><?php echo $label_proposta; ?></label>
						<textarea class="form-control" name="proposta" id="proposta" rows="7"></textarea>
					</div>
				</div>

				<div class="contato-content-footer">
					<div class="form-row">
						<div class="form-group col-12">
							<div class="form-privacidade">
								<?php echo get_field("msg_privacidade",311); ?>
							</div>
						</div>
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