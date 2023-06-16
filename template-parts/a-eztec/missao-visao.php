<?php
// Seção Missão e Visão

// Captura informações do CMS
$titulo_missao = get_field("titulo_missao");
$desc_missao = get_field("desc_missao");
$titulo_visao = get_field("titulo_visao");
$desc_visao = get_field("desc_visao");
?>

<section id="missao-visao" class="container-fluid wrapper-a-eztec-section wrapper-missao-visao">
	<div class="container wrapper-inner a-eztec-missao-visao">
		<div class="row">
			<div class="a-eztec-missao-visao-item col-12 col-md-6">
				<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
					<h2 class="section-content-pre-title text-left"><?php echo $titulo_missao; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
				<p class="a-eztec-missao-visao-item-desc"><?php echo $desc_missao; ?></p>
			</div>
			<div class="a-eztec-missao-visao-item col-12 col-md-6">
				<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
					<h2 class="section-content-pre-title text-left"><?php echo $titulo_visao; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
				<p class="a-eztec-missao-visao-item-desc"><?php echo $desc_visao; ?></p>
			</div>
		</div>
	</div>
</section>