<?php
// Página Contato - Corretor - Promoção

$pre_formulario = get_field("pre_formulario");
$titulo_secao_contato = get_field("titulo_secao_contato");
$label_nome = get_field("label_nome");
$label_telefone = get_field("label_telefone");
$label_email = get_field("label_email");
$label_creci = get_field("label_creci");
$label_creci_definitivo = get_field("label_creci_definitivo");
$txt_obrigatorios = get_field("txt_obrigatorios");
$txt_btn_enviar = get_field("txt_btn_enviar");
$label_digitar_creci = get_field("label_digitar_creci");
$label_indicado = get_field("label_indicado");
?>

<?php
// Seção Contato - Corretor
?>

<style>
.wrapper-contato-content {
	background-color: #fff;
}
.img-apresentacao-tecvendas-mobile{
		display:none;
}
@media (max-width: 767px) {
	.img-apresentacao-tecvendas{
		display:none;
	}
	.img-apresentacao-tecvendas-mobile{
		display:block;
	}
}
</style>

<section id="trabalhe-conosco" class="container-fluid wrapper-contato">

	<header class="wrapper-banner">
		<?php
		// Monta cabeçalho de banner
		get_template_part( 'template-parts/header/banner-no-h', 'page' );
		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<?php echo $pre_formulario; ?>

	<div class="container wrapper-inner wrapper-contato-body">
		<div class="wrapper-contato-content">
			<form name="trabalheConoscoForm" id="trabalheConoscoForm" data-target="ws-trabalheConosco" data-isintegrado=true method="post" action="#">
				<div class="contato-content-header d-flex align-items-center flex-column">
					<div class="contato-content-title d-flex justify-content-center align-items-center">
						<h1 class="contato-content-title-text text-center">
							<?php echo $titulo_secao_contato; ?>
						</h1>
					</div>
					<div class="contato-content-title-separator"></div>
				</div>

				<div class="contato-content-body">

					<div class="form-row">
						<div class="form-group col-12 style="width:100%;">
							<label for="nome"><?php echo $label_nome; ?></label>
							<input type="text" class="form-control" name="nome" id="nome">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-3 col-sm-2">
							<label for="ddd_fone"><?php echo $label_telefone; ?></label>
							<input type="text" class="form-control" name="ddd_fone" id="ddd_fone" alt="ddd" maxlength="2" autocomplete="off">
						</div>
						<div class="form-group col-9 col-sm-10 col-md-4">
							<label for="fone">&nbsp;</label>
							<input type="text" class="form-control" name="fone" id="fone" alt="fone" maxlength="10" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label for="email"><?php echo $label_email; ?></label>
						<input type="email" class="form-control" name="email" id="email">
					</div>

					<div class="form-group">
						<label for="email"><?php echo $label_indicado; ?></label>
						<input type="text" class="form-control" name="indicado" id="indicado">
					</div>
					<hr>
					<div class="form-group col-12">
						<label for="nome"><?php echo $label_creci; ?></label>
						<div class="p-2">
							<div class="form-check form-check-inline">
								<label class="form-check-label d-flex align-items-center">
									<input class="form-check-input" type="radio" name="hasCreci" id="radioCreci" value="Sim" style="margin: 0 0 0 -22px;" checked> Sim
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label d-flex align-items-center">
									<input class="form-check-input" type="radio" name="hasCreci" id="radioCreci" value="Estagiário" style="margin: 0 0 0 -22px;"> Carteira de Estagiário
								</label>
							</div>

						</div>
					</div>
					<div class="form-group col-12" id="creci">
						<label for="nome"><?php echo $label_digitar_creci; ?></label>
						<input type="text" class="form-control" name="creci" id="creci" alt="creci" maxlength="10" autocomplete="off">
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
							<button type="submit" class="form-control btn btn-primary" id="btnEnviar"><?php echo $txt_btn_enviar; ?></button>
						</div>
					</div>
					<div class="form-group">
						<small class="form-text text-message-required">
							<sup>*</sup>Campos Obrigatórios.
						</small>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>






















