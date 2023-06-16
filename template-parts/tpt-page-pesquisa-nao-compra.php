<?php
/*
 * Template Name: Pesquisa Não Compra
 * Template Post Type: page
 */


// Captura informações do CMS

get_header();

?>

<div class="wrapper-geral wrapper-geral-pesquisa-nao-compra">

	<section class="wrapper-inner pesquisa-nao-compra">


		<img src="https://www.eztec.com.br/wp-content/uploads/componentes/motivo-nao-compra/pesquisa-motivo-nao-compra_op02.jpg" style="max-width:1280px; width:100%; margin:30px auto 0;">

		<p style="margin:30px 4%; text-align:center;">Queremos sempre oferecer o melhor para você, por isso gostaríamos de entender melhor como foi a sua experiência.</p>
		
		<div class="motivo-nao-compra" style="max-width:800px; margin:0 auto;">
			<div style="margin:0 4%;">

				<form action="" method="post" class="p-nao-compra-form">
					<div class="motivo-nao-compra" style="max-width:800px; margin:0 auto;">
						<div style="margin:0 4%;">
							<p>
								<label class="label-nao-compra">E-mail</label><br>
								<span class="p-nao-compra-form-control-wrap your-email">
									<input type="email" name="your-email" value="" size="40" class="p-nao-compra-form-control p-nao-compra-text p-nao-compra-email p-nao-compra-validates-as-required p-nao-compra-validates-as-email" id="vemail" aria-required="true" aria-invalid="false">
								</span>
							</p>
							<p>
								<label class="label-nao-compra">Como você avalia a experiência da sua visita?</label><br>
								<span class="p-nao-compra-form-control-wrap experiencia">
									<span class="p-nao-compra-form-control p-nao-compra-radio" id="experiencia">
										<span class="p-nao-compra-list-item first">
											<input type="radio" name="experiencia" value="Regular" checked="checked">
											<span class="p-nao-compra-list-item-label">Regular</span>
										</span>
										<span class="p-nao-compra-list-item">
											<input type="radio" name="experiencia" value="Boa">
											<span class="p-nao-compra-list-item-label">Boa</span>
										</span>
										<span class="p-nao-compra-list-item last">
											<input type="radio" name="experiencia" value="Ruim">
											<span class="p-nao-compra-list-item-label">Ruim</span>
										</span>
									</span>
								</span>
							</p>
							<p>
								<label class="label-nao-compra">Você já adquiriu o imóvel que estava buscando?</label><br>
								<span class="p-nao-compra-form-control-wrap adquiriu">
									<span class="p-nao-compra-form-control p-nao-compra-radio" id="adquiriu">
										<span class="p-nao-compra-list-item first">
											<input type="radio" name="adquiriu" value="Sim" checked="checked">
											<span class="p-nao-compra-list-item-label">Sim</span>
										</span>
										<span class="p-nao-compra-list-item last">
											<input type="radio" name="adquiriu" value="Não">
											<span class="p-nao-compra-list-item-label">Não</span>
										</span>
									</span>
								</span>
							</p>
							<p>
								<label class="label-nao-compra">Existe um ou mais motivo(s) principal(is) que te impediu/impediram de comprar seu EZTEC?</label><br>
								<span class="p-nao-compra-form-control-wrap motivos">
									<span class="p-nao-compra-form-control p-nao-compra-checkbox p-nao-compra-validates-as-required" id="motivos">
										<span class="p-nao-compra-list-item first">
											<input type="checkbox" name="motivos[]" value="Preço do produto">
											<span class="p-nao-compra-list-item-label">Preço do produto</span>
										</span>
										<span class="p-nao-compra-list-item">
											<input type="checkbox" name="motivos[]" value="Localização">
											<span class="p-nao-compra-list-item-label">Localização</span>
										</span>
										<span class="p-nao-compra-list-item">
											<input type="checkbox" name="motivos[]" value="Forma de pagamento">
											<span class="p-nao-compra-list-item-label">Forma de pagamento</span>
										</span>
										<span class="p-nao-compra-list-item">
											<input type="checkbox" name="motivos[]" value="Tempo de entrega">
											<span class="p-nao-compra-list-item-label">Tempo de entrega</span>
										</span>
										<span class="p-nao-compra-list-item">
											<input type="checkbox" name="motivos[]" value="Vagas">
											<span class="p-nao-compra-list-item-label">Vagas</span>
										</span>
										<span class="p-nao-compra-list-item">
											<input type="checkbox" name="motivos[]" value="Planta">
											<span class="p-nao-compra-list-item-label">Planta</span>
										</span>
										<span class="p-nao-compra-list-item">
											<input type="checkbox" name="motivos[]" value="Atendimento">
											<span class="p-nao-compra-list-item-label">Atendimento</span>
										</span>
										<span class="p-nao-compra-list-item last">
											<input type="checkbox" name="motivos[]" value="Outro motivo">
											<span class="p-nao-compra-list-item-label">Outro motivo</span>
										</span>
									</span>
								</span>
							</p>
							<p>
								<label class="label-nao-compra">Em caso de outro motivo, compartilhe conosco:</label><br>
								<span class="p-nao-compra-form-control-wrap outromotivo">
									<textarea name="outromotivo" cols="40" rows="4" class="p-nao-compra-form-control p-nao-compra-textarea" id="outromotivo" aria-invalid="false"></textarea>
								</span>
							</p>
							<p>
								<label class="label-nao-compra">Você ainda busca um imóvel?</label><br>
								<span class="p-nao-compra-form-control-wrap aindabusca">
									<span class="p-nao-compra-form-control p-nao-compra-radio" id="aindabusca">
										<span class="p-nao-compra-list-item first">
											<input type="radio" name="aindabusca" value="Sim" checked="checked">
											<span class="p-nao-compra-list-item-label">Sim</span>
										</span>
										<span class="p-nao-compra-list-item last">
											<input type="radio" name="aindabusca" value="Não">
											<span class="p-nao-compra-list-item-label">Não</span>
										</span>
									</span>
								</span>
							</p>
							<input type="hidden" id="imovel" name="imovel" value="">
							<div class="form-group">
								<div class="form-privacidade">
									<?php echo get_field("msg_privacidade",311); ?>
								</div>
							</div>
							<input type="submit" value="Enviar" class="p-nao-compra-form-control p-nao-compra-submit">
						</div>
					</div>
				</form>

			</div>
		</div>


	</section>

	<script text="text/javascript">
	var getUrlParameter = function getUrlParameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;
	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	};

	var Vmail = getUrlParameter('vmail');
	if (Vmail != null) {
	     document.getElementById('vemail').value = Vmail;
	}

	var Vid = getUrlParameter('vimovel');
	if (Vid != null) {
	     document.getElementById('imovel').value = Vid;
	}

	</script>

	<style>
	input#vemail {
	    width: 100%;
	}
	textarea#outromotivo {
	    width: 100%;
	}
	input.p-nao-compra-form-control.p-nao-compra-submit {
	    background-color: #ba1d1b;
	    margin: 10px 0 50px;
	    text-align: center;
	    padding: 10px 40px;
	    color: #fff;
	}
	label.label-nao-compra {
	    font-weight: bold;
	    margin-top: 12px;
	}
	.pesquisa-nao-compra {
		text-align: center;
	}
	@media (max-width: 767px) {
	.motivo-nao-compra {
		text-align: center;
	}
	span.p-nao-compra-list-item {
		display: block;
	}
	}
	</style>

</div>


<?php
get_footer();  ?>