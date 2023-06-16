<?php
// Bloco institucional para o rodapé


$texto_institucional = get_field('txt_footer_institucional',310);
?>

<section class="container-fluid section-footer-copyright institucional">
	<div class="wrapper-inner">
		<div class="wrap-copyright-footer">
			<div class="menu-footer row d-flex align-items-center">
				<div class="menu-footer-institucional col pr-0">
					<p><?php echo $texto_institucional; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>