<?php
/*
 * Template Name: Park Avenue Teaser
 * Template Post Type: page
 */


// Captura informações do CMS

get_header();

?>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
	#colophon {
		display: none;
	}
	#masthead {
		display: none;
	}
	body {
		background-color: #202326;
		font-family: Roboto,Helvetica,sans-serif;
		padding-top:0;
	}
	.bg-white-park-avenue-teaser{
		background-color:#fff;
	}
	.status-park-avenue-teaser h1 {
		font-size: 32px;
		color: #d5af83;
		text-align: center;
		padding-top: 0;
		padding-bottom: 0;
		margin: 10px 0;
	}
	.banner-park-avenue-teaser, .banner-mobile-park-avenue-teaser{
		width:100%;
	}
	.banner-mobile-park-avenue-teaser{
		display:none;
	}
	.logo-park-avenue-teaser{
		width:100%;
		max-width:981px;
		margin-top:70px;
		margin-bottom:90px;
	}
	.endereco-park-avenue-teaser{
		text-transform: uppercase;
		color:#373737;
		text-align: center;
		font-size:32px;
	}
	.img-park-avenue-teaser{
		text-align: center;
	}
	img.logo-footer-park-avenue-teaser {
	    max-width: 538px;
	    width: 100%;
	    margin: 100px auto;
	}
	.contato-status-park-avenue-teaser{
		font-size:25px;
		color:#c3c3c3;
	}
	.contato-titulo-park-avenue-teaser{
		font-size:40px;
		text-transform: uppercase;
		color:#c3c3c3;
		margin-bottom:40px;
	}
	.divisor-park-avenue-teaser{
		width:58px;
		height: 3px;
		background-color:#dab180;
		margin:12px 0 24px;
	}
	.wrapper-form-park-avenue-teaser{
		max-width: 840px;
		margin:0 auto;
		padding:50px 0;
	}
	.wpcf7-form-control {
	    width: 100%;
	    background-color: #dbd9d8;
	    border: 0;
	    border-radius: 7px;
	    font-size: 20px;
	    color:#000;
	    padding:10px;
	}
	.wpcf7-textarea {
	    width: 100%;
	    background-color: #dbd9d8;
	    border: 0;
	    border-radius: 7px;
	    font-size: 20px;
	    color:#000;
	    padding:10px;
	}
	.label-park-avenue-teaser {
	    margin-bottom: 15px;
	    color:#c3c3c3;
	    font-size:20px;
	}
	input.wpcf7-form-control.wpcf7-submit {
		    background-color: transparent;
		    font-size: 17px;
		    color: #c3c3c3;
		    background-image: url(https://www.eztec.com.br/marketing/park-avenue/enviar-park-avenue-teaser.png);
		    background-repeat: no-repeat;
		    background-position: right;
		    height: 95px;
		    text-align: right;
		    padding-right: 81px;
	}
	.txt-obrig-park-avenue-teaser{
		font-size:16px;
		text-align: right;
		color:#d5af83;
		margin:25px 0;
	}
	.wpcf7 form.sent .wpcf7-response-output {
	    border-color: transparent;
	    background-image: url(https://www.eztec.com.br/wp-content/uploads/imoveis/park-avenue/teaser/aviso_v3.jpg);
	    background-position: center;
	    background-repeat: no-repeat;
	    background-size: 100%;
	    height: 347px;
	    max-width: 850px;
	    margin: 0;
	}
	@media (max-width: 767px) {
		.status-park-avenue-teaser h1{
			font-size:20px;
		}

		.endereco-park-avenue-teaser{
			font-size:19px;
		}
		.logo-park-avenue-teaser{
			margin-top:30px;
			margin-bottom:30px;
		}
		.banner-mobile-park-avenue-teaser{
			display:block;
		}
		.banner-park-avenue-teaser{
			display:none;
		}
		img.logo-footer-park-avenue-teaser {
		    margin: 30px auto;
		}
		.contato-status-park-avenue-teaser{
			font-size:18px;
		}
		.contato-titulo-park-avenue-teaser{
			font-size:19px;
		}
		.label-park-avenue-teaser {
		    font-size: 14px;
		}
		.txt-obrig-park-avenue-teaser {
		    font-size: 14px;
		}
	}
</style>

<div class="wrapper-geral wrapper-geral-park-avenue-teaser">

	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-12">
				<div class="status-park-avenue-teaser">
					<h1>BREVE LANÇAMENTO - OBRAS INICIADAS</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="bg-white-park-avenue-teaser">
		<div class="container-fluid p-0">
			<div class="ro p-0">
				<div class="col-12 p-0">
					<div class="img-park-avenue-teaser">
						<img class="banner-park-avenue-teaser" src="https://www.eztec.com.br/marketing/park-avenue/banner-park-avenue-teaser.jpg">
						<img class="banner-mobile-park-avenue-teaser" src="https://www.eztec.com.br/marketing/park-avenue/banner-mobile-park-avenue-teaser.jpg">
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper-inner park-avenue-teaser">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="img-park-avenue-teaser">
							<img class="logo-park-avenue-teaser" src="https://www.eztec.com.br/marketing/park-avenue/logo-park-avenue-teaser2.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper-inner">
		<div class="wrapper-form-park-avenue-teaser">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="contato-status-park-avenue-teaser">
							CONTATO
						</div>
						<div class="divisor-park-avenue-teaser"></div>
						<div class="contato-titulo-park-avenue-teaser">
							cadastre-se para conhecer<br>este projeto único.
						</div>
					</div>
					<div class="col-12">
					<div role="form" class="wpcf7" lang="pt-BR" dir="ltr">
  <div class="screen-reader-response">
    <p role="status" aria-live="polite" aria-atomic="true"></p>
    <ul></ul>
  </div>
  <form name="faleConoscoForm" id="faleConoscoForm" class="wpcf7-form init" data-target="ws-parkavenue" data-isintegrado="true" method="post" action="#" novalidate="novalidate">
    <div style="display: none;">
      <input type="hidden" name="_wpcf7" value="28693"> <input type="hidden" name="_wpcf7_version" value="5.4.1">
      <input type="hidden" name="_wpcf7_locale" value="pt_BR"> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f28693-o1"> <input type="hidden" name="_wpcf7_container_post" value="0">
      <input type="hidden" name="_wpcf7_posted_data_hash" value="">
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="label-park-avenue-teaser">Nome*</div>
          <p><span class="wpcf7-form-control-wrap your-name">
              <input type="text" name="nome" id="nome" value="" required class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span>
          </p>
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
          <div class="label-park-avenue-teaser">E-mail*</div>
          <p><span class="wpcf7-form-control-wrap your-email">
              <input type="email" name="email" id="email" required="" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span>
          </p>
        </div>
		<div class="col-xl-2 col-lg-2 col-2">
          <div class="label-park-avenue-teaser">DDD*</div>
          <p><span class="wpcf7-form-control-wrap tel-452">
              <input type="text" name="ddd" id="ddd" alt="ddd" autocomplete="off" required value="" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false"></span>
          </p>
        </div>
        <div class="col-xl-4 col-lg-4 col-4">
          <div class="label-park-avenue-teaser">Telefone*</div>
          <p><span class="wpcf7-form-control-wrap tel-452">
              <input type="text" name="fone" id="fone" alt="fone" autocomplete="off" required value="" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false"></span>
          </p>
        </div>
        <div class="col-12">
          <div class="label-park-avenue-teaser">Mensagem*</div>
          <p><span class="wpcf7-form-control-wrap your-message">
              <textarea name="mensagem" id="mensagem" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span>
          </p>
        </div>
        <div class="col-12">
            <div class="txt-obrig-park-avenue-teaser">* Campos de preenchimento obrigatório.</div>
            <div class="form-group">
				<div class="form-privacidade">
					<?php echo get_field("msg_privacidade",311); ?>
				</div>
			</div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12"></div>
        <div class="col-xl-6 col-lg-6 col-12">
          <button type="submit" class="wpcf7-form-control wpcf7-submit">
            ENVIAR
          </button><span class="ajax-loader"></span></div>
      </div>
    </div>
    <div class="wpcf7-response-output" aria-hidden="true"></div>
  </form>
</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper-inner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="img-park-avenue-teaser">
						<img class="logo-footer-park-avenue-teaser" src="https://www.eztec.com.br/marketing/park-avenue/logos.png">
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<?php
get_footer();  ?>