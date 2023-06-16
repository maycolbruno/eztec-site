<?php
/*
 * Template Name: Brinde
 * Template Post Type: page
 */


// Captura informações do CMS

get_header();

?>

<div class="wrapper-geral wrapper-geral-brinde">

	<section class="wrapper-inner brinde">

		<p style="margin:30px 4%; text-align:center;">Preencha o formulário para ganhar um brinde exclusivo:</p>

		<div class="wrapper-brinde" style="max-width:800px; margin:0 auto;">
			<div style="margin:0 4%;">

				<form name="qrCodeForm" id="qrCodeForm"  data-target="ws-qrcode" data-isintegrado="true" method="post" action="#"  class="brinde-form" >
					<div class="modal-body container-fluid">
						<input type="hidden" name="idForm" value="5" id="idForm">
						<input type="hidden" name="idEmpreendimento" value="411" id="idEmpreendimento">
						<div class="form-group">
							<label for="nome">Nome Completo<sup>*</sup></label>
							<input type="text" class="form-control" name="nome" id="nome">
						</div>
						<div class="form-row">
							<div class="form-group col-12">
								<label>E-mail<sup>*</sup></label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
							<div class="form-group col-12">
								<label class="tel-form" style="margin:0;">Telefone Celular<sup>*</sup></label>
							</div>
							<div class="form-group col-3 col-sm-2">
								<input type="text" class="form-control" name="ddd" id="ddd"  maxlength="2">
							</div>
							<div class="form-group col-9 col-sm-10 col-md-4">
								<input type="text" class="form-control" name="fone" alt="celular" id="fone"  maxlength="10" >
							</div>
							<div class="form-group col-12">
								<label>Nome do corretor:<sup>*</sup></label>
								<input type="text" class="form-control" name="nomeCorretor" id="nomeCorretor"  maxlength="100">
							</div>
						</div>
						<div class="form-group">
							<div class="form-group col-12 p-0">
								<button type="submit" class="form-control btn btn-primary btn-brinde" id="btnEnviar">ENVIAR</button>
							</div>
						</div>
						<div class="form-group">
							<div class="form-privacidade">
								<?php echo get_field("msg_privacidade",311); ?>
							</div>
						</div>
						<div class="form-group">
						<small class="form-text text-message-required">
							* Campos de preenchimento obrigatório.
						</small>
					</div>
					</div>
				</form>

			</div>
		</div>


	</section>


	<style>
	input#vemail {
	    width: 100%;
	}
	textarea#outromotivo {
	    width: 100%;
	}
	input.brinde-form-control.brinde-submit {
	    background-color: #ba1d1b;
	    margin: 10px 0 50px;
	    text-align: center;
	    padding: 10px 40px;
	    color: #fff;
	}
	label.label-brinde {
	    font-weight: bold;
	    margin-top: 12px;
	}
	.wrapper-brinde {
		text-align: left;
	}
	#masthead {
		display: none;
	}
	#colophon {
		display: none;
	}
	.btn-brinde {
		width: 40%;
		margin: 20px 0 0;
	}
	@media (max-width: 767px) {
		span.brinde-list-item {
			display: block;
		}
	}
	</style>

</div>


<?php
get_footer();  ?>