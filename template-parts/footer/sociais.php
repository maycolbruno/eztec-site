<?php

// Bloco de redes sociais para o rodapé
?>
<section class="container-fluid section-footer-sociais">
	<div class="wrapper-inner">
		<div class="wrap-sociais-footer">
			<div class="sociais-footer row">
				<div class="col-12 d-flex justify-content-center">
					<ul class="sociais-footer-lista list-unstyled list-inline text-center">
						<?php
						if( have_rows('redes_sociais',310) ):
							while ( have_rows('redes_sociais',310) ) : the_row();
								$mostrar_social = get_sub_field('show_ro_rede_social');
								$image_alt = get_post_meta( get_sub_field('icone_ro_rede_social'), '_wp_attachment_image_alt', true);
								if ($mostrar_social == 1){
									echo '<li class="social-footer-item list-inline-item">
											<a href="' . get_sub_field('url_ro_rede_social') . '" target="_blank" rel="noopener">
												<img src="' . wp_get_attachment_url(get_sub_field('icone_ro_rede_social')) . '" alt="' . $image_alt . '">
											</a>
										  </li>';
								}
							endwhile;
						endif;
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>