<?php
// Seção Obra da página de produto
//
//
// Captura informações do CMS
$bg_color_tour = get_field("imoveis_bg_color_tour");
$titulo_tour = get_field("imoveis_titulo_tour");
$desc_tour = get_field("imoveis_desc_tour");
$url_tour = get_field("imoveis_url_tour");
$label_tour = get_field("imoveis_label_tour");
?>

<section id="tour" class="container-fluid wrapper-imovel wrapper-imovel-tour" style="background-color:<?php echo $bg_color_tour; ?>;">
	<div class="container wrapper-inner imovel-tour">
		<div class="row">
			<div class="col-12">
				<div class="section-content-header d-flex align-items-center flex-column">
					<h2 class="section-content-title text-center"><?php echo $titulo_tour; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 d-flex justify-content-center">
				<p class="desc mt-0 mb-5"><?php echo $desc_tour; ?></p>
			</div>
		</div>
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-8">
				<div class="image-gallery-box tour-gallery-box">
					<ul id="galeria-tour" class="gallery list-unstyled">
						<?php
						$count = 1;
						if( have_rows('imoveis_tours') ):
							while ( have_rows('imoveis_tours') ) : the_row();
								$tour[$count]['url'] = get_sub_field("url_do_tour");
								$tour[$count]['label'] = get_sub_field("label_do_tour");
								$count ++;
							endwhile;
						endif;
						$i = 1;
						foreach($tour as $t){
							echo '
								<li class="lslide">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="' . $t["url"] . '" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
									</div>
									<p class="label-tour mt-3 mb-0">' . $t["label"] . '</p>
								</li>
								';
							$i ++;
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
