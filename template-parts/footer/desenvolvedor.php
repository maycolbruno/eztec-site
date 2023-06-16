<?php
// Bloco de desenvolvedor para o rodapé
?>

<section class="container-fluid section-footer-dev">
	<div class="wrapper-inner wrap-dev-footer container">
		<div class="dev-footer row">
			<div class="col-12 d-flex justify-content-center">
				<a href="<?php echo get_field('url_dev',310); ?>" alt="<?php echo get_post_meta(get_field('icon_dev',310), '_wp_attachment_image_alt', true) ?>" target="_blank" rel="noopener">
					<?php echo get_field("txt_dev",310); ?> <img src="<?php echo wp_get_attachment_url(get_field('icon_dev',310)); ?>" alt="Tagawa">
				</a>
			</div>
		</div>
	</div>
</section>