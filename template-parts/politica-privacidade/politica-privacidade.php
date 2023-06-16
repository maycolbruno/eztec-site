<?php
// PÁGINA POLÍTICA DE PRIVACIDADE


// Captura informações do CMS
$titulo_termos = get_field("titulo_pp_termos");
$desc_termos = get_field("desc_pp_termos");
$titulo_politica = get_field("titulo_pp_politica");
$desc_politica = get_field("desc_pp_politica");
$titulo_dicas = get_field("titulo_pp_dicas");
$desc_dicas = get_field("desc_pp_dicas");



?>

<div class="container-fluid wrapper-politica-privacidade p-0">

	<header class="wrapper-banner">
		<?php
			// Monta cabeçalho de banner
			get_template_part( 'template-parts/header/banner', 'page' );

			// Monta breadcrumb
			get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<?php
	// Conteúdo
	?>
	<section class="container wrapper-inner politica-privacidade">
		<div class="row politica-privacidade-box">
			<?php if($titulo_termos !== ""){ ?>
				<div class="col-12 politica-privacidade-box-item">
					<div class="section-content-header">
						<h2 class="contato-content-title-text"><?php echo $titulo_termos; ?></h2>
						<div class="section-content-title-separator"></div>
					</div>
					<p><?php echo $desc_termos; ?></p>
				</div>
			<?php } ?>
			<?php if($titulo_politica !== ""){ ?>
				<div class="col-12 politica-privacidade-box-item">
					<div class="section-content-header">
						<h2 class="contato-content-title-text"><?php echo $titulo_politica; ?></h2>
						<div class="section-content-title-separator"></div>
					</div>
					<p><?php echo $desc_politica; ?></p>
				</div>
			<?php } ?>
			<?php if($titulo_dicas !== ""){ ?>
				<div class="col-12 politica-privacidade-box-item">
					<div class="section-content-header">
						<h2 class="section-content-title"><?php echo $titulo_dicas; ?></h2>
						<div class="section-content-title-separator"></div>
					</div>
					<p><?php echo $desc_dicas; ?></p>
				</div>
			<?php } ?>
		</div>
	</section>

</div>