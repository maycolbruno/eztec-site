<?php
// Banner em HTML
//
//
// Captura informações do CMS

$html = get_field("html_header");
?>

<div class="container-fluid banner-html p-0 w-100">
	<?php echo $html; ?>
</div>