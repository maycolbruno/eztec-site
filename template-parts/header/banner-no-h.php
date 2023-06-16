<?php
// Banner simples sem slider
//
// Captura informações do CMS
$banner = wp_get_attachment_url(get_field("banner"));
$titulo_banner = get_field("titulo_banner");
?>

<div class="banner" style="background-image:url(<?php echo $banner; ?>);">
	<div class="banner-text-content d-flex justify-content-center align-items-center">
		<p><?php echo $titulo_banner; ?></p>
	</div>
</div>