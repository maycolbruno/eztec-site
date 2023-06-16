<?php
// Banner simples sem slider para página de busca simples diferenciado de banner.php, pois precisa de ID de componente para funcionar.
//
// Captura informações do CMS
$banner = wp_get_attachment_url(get_field("banner",1977));
$titulo_banner = get_field("titulo_banner",1977);
?>

<div class="banner banner-404" style="background-image:url(<?php echo $banner; ?>);">
	<div class="banner-text-content d-flex justify-content-center align-items-center w-100 h-100">
		<h1><?php echo $titulo_banner; ?></h1>
	</div>
</div>