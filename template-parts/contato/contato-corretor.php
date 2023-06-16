<?php
// Página Contato - Trabalhe Conosco

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

<div class="container-fluid wrapper-contato">

	<header class="wrapper-banner">
		<?php
		// Monta cabeçalho de banner
		get_template_part( 'template-parts/header/banner-no-h', 'page' );
		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<?php echo $pre_formulario;

	// Captura informações do CMS
	$show_qualidade = get_field("show_qualidade");
	if($show_qualidade == 1):
		$titulo_qualidade = get_field("titulo_secao_qualidade");
		$count = 0;
		if( have_rows('itens_de_qualidade') ):
			while ( have_rows('itens_de_qualidade') ) : the_row();
				$qualidades[$count]['titulo'] = get_sub_field("titulo_item_qualidade");
				$qualidades[$count]['desc'] = get_sub_field("desc_item_qualidade");
				$count ++;
			endwhile;
		endif;
		?>

		<section id="qualidade" class="container-fluid wrapper-a-eztec-section wrapper-a-eztec-qualidade">
			<div class="container wrapper-inner a-eztec-qualidade">
				<div class="row">
					<div class="col-12">
						<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
							<h2 class="section-content-title text-left"><?php echo $titulo_qualidade; ?></h2>
						</div>
						<div class="row">
							<?php
								foreach($qualidades as $qualidade){
									echo '<div class="a-eztec-qualidade-item col-12 col-md-6">
												<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
													<h3 class="section-content-pre-title text-left">' . $qualidade["titulo"] . '</h3>
													<div class="section-content-title-separator"></div>
												</div>
												<p class="a-eztec-qualidade-item-desc">' . $qualidade["desc"] . '</p>
											</div>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>





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
					<hr>
					<div class="form-group col-12">
						<label for="nome"><?php echo $label_creci; ?></label>
						<div class="p-2">
							<div class="form-check form-check-inline">
								<label class="form-check-label d-flex align-items-center">
									<input class="form-check-input" type="radio" name="hasCreci" onclick="hideCreci()" id="radioCreci" value="Não" style="margin: 0 0 0 -22px;" checked> Não
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label d-flex align-items-center">
									<input class="form-check-input" type="radio" onclick="showCreci()" name="hasCreci" id="radioCreci" value="Sim" style="margin: 0 0 0 -22px;"> Sim
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label d-flex align-items-center">
									<input class="form-check-input" type="radio" name="hasCreci" onclick="showCreci()" id="radioCreci" value="Estagiário" style="margin: 0 0 0 -22px;"> Carteira de Estagiário
								</label>
							</div>

						</div>
					</div>
					<div class="form-group col-12" id="creci" style="display:none;">
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
</div>

<script type="text/javascript">
   function showCreci() {
        document.getElementById('creci').style.display = 'block';
   }
   function hideCreci() {
        document.getElementById('creci').style.display = 'none';
   }
</script>






















