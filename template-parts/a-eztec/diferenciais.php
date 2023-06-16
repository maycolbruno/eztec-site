<?php
// Seção Diferenciais



// Captura informações do CMS
$titulo_diferenciais = get_field("titulo_secao_diferenciais");
$desc_diferenciais = get_field("descricao_de_diferenciais");
$count = 0;
if( have_rows('itens_diferenciais') ):
	while ( have_rows('itens_diferenciais') ) : the_row();
		$diferenciais[$count]['icone'] = wp_get_attachment_url(get_sub_field("icone_item_diferencial"));
		$diferenciais[$count]['alt'] = get_post_meta(get_sub_field("icone_item_diferencial"));
		$diferenciais[$count]['titulo'] = get_sub_field("titulo_item_diferencial");
		$diferenciais[$count]['desc'] = get_sub_field("desc_item_diferencial");
		$count ++;
	endwhile;
endif;
?>

<section id="diferenciais" class="container-fluid wrapper-a-eztec-section wrapper-diferenciais">
	<div class="container wrapper-inner a-eztec-diferenciais">
		<div class="row">
			<div class="a-eztec-diferenciais-item mt-auto col-12 col-md-6 col-lg-4">
				<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
					<h2 class="section-content-pre-title text-left"><?php echo $titulo_diferenciais; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
				<p class="a-eztec-diferenciais-item-desc"><?php echo $desc_diferenciais; ?></p>
			</div>
			<?php
			foreach($diferenciais as $diferencial){
				echo '<div class="a-eztec-diferenciais-item col-12 col-md-6 col-lg-4">
						<img src="' . $diferencial["icone"] . '" alt="' . $diferencial["alt"] . '">
						<h3 class="a-eztec-diferenciais-item-title">' . $diferencial["titulo"] . '</h3>
						<p class="a-eztec-diferenciais-item-desc">' . $diferencial["desc"] . '</p>
					</div>';
			}
			?>
		</div>
	</div>
</section>