<?php

	// Bloco de newsletter para o rodapé
?>
<section class="container-fluid section-footer-newsletter">
	<div class="wrapper-inner">
		<div class="wrap-newsletter-footer">
			<div class="news-footer row">
				<div class="text-newsletter col-md-12 col-lg-6 d-flex align-items-start flex-column justify-content-center">
					<p class="titulo-newsletter"><?php echo get_field('txt_ro_superior_news_fl',310); ?></p>
					<p class="instrucoes-newsletter"><?php echo get_field('txt_ro_inferior_news_fl',310); ?></p>
				</div>
				<div class="footer-form-newsletter col-md-12 col-lg-6">

					<!-- Formulário de Newsletter -->
					<form class="form-newsletter d-flex flex-column flex-lg-row" name="newsletterForm" id="newsletterForm" data-target="ws-newsLetter"  data-isintegrado=true method="post" action="#" >
						<div class="row newsletter-box d-flex w-100">
							<div class="col-12 col-lg-9 newsletter-box-data">
								<input type="nome" id="NewsNome" name="nome" class="news-data" placeholder="<?php echo get_field('label_ro_nome_news',310); ?>">
								<input type="email" id="NewsEmail" name="email" class="news-data" placeholder="<?php echo get_field('label_ro_email_news',310); ?>">
							</div>
							<div class="col-12 col-lg-3 newsletter-box-btn">
								<button id="EnviarNewsletterFooter" class="btn-cadastrar-newsletter" type="submit" ><img src="<?php echo get_field('icon_btn_enviar_news',310); ?>" alt="Enviar" title="Enviar"></button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>
