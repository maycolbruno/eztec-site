<?php
// Seção Características da página de produto
//
//
// Captura informações do CMS
$mostrar_ficha_tecnica = get_field("mostrar_ficha_tecnica");
$titulo_ficha = get_field("imovel_titulo_carac_ficha");
$ficha_tecnica = get_field("imovel_ficha_carac_ficha");
?>

<section id="ficha" class="wrapper-ficha-tecnica pb-0">
	<div class="container-fluid wrapper-ficha-tecnica p-0">
		<div class="container wrapper-inner ficha-tecnica">
			<div id="caracteristicasAccordion" data-children=".item">
				<div class="row d-flex justify-content-center">
					<div class="col-12 col-md-8">
						<a class="ficha-tecnica-accordion d-flex justify-content-center collapsed" data-toggle="collapse" data-parent="#caracteristicasAccordion" href="#caracteristicasAccordion1" aria-expanded="false" aria-controls="caracteristicasAccordion1">
							<div class="row ficha-tecnica-box d-flex align-items-center w-100">
								<div class="col-12">
									<div class="wrapper-header-ficha">
										<div class="header-ficha">
											<div class="ficha-tecnica-titulo">
												<?php echo $titulo_ficha; ?>
											</div>
											<div class="detalhe-titulo"></div>
										</div>
										<button class="ficha-tecnica-btn">
											<div class="ficha-tecnica-btn-open justify-content-center align-items-center">
												<i class="seta-base-ficha-tecnica seta-down seta-white" aria-hidden="true"></i>
											</div>
											<div class="ficha-tecnica-btn-close justify-content-center align-items-center">
												<span>x</span>
											</div>
										</button>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div id="caracteristicasAccordion1" class="ficha-tecnica-dados collapse" role="tabpanel">
					<?php echo $ficha_tecnica; ?>
				</div>
			</div>
		</div>
	</div>
</section>