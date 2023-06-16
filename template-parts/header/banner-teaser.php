<?php
// Banner simples sem slider
//
// Captura informações do CMS
$banner = wp_get_attachment_url(get_field("banner_teaser"));
$titulo_banner = get_field("titulo_banner_teaser");
?>

<div class="banner" style="background-image:url(<?php echo $banner; ?>);">
	<div class="banner-text-content d-flex justify-content-center align-items-center w-100 h-100">
		<h1><?php echo $titulo_banner; ?></h1>
	</div>
</div>