<?php
// Prêmios

// Captura informações do CMS
$titulo_premios = get_field("titulo_secao_premios");
$desc_premios = get_field("desc_secao_premios");
$bg_premios = wp_get_attachment_url(get_field("bg_secao_premios"));
$count = 0;
if( have_rows('itens_de_premios') ):
	while ( have_rows('itens_de_premios') ) : the_row();
		$premios[$count]['titulo'] = get_sub_field("titulo_do_premio");
		$premios[$count]['datas'] = get_sub_field("datas_do_premio");
		$premios[$count]['desc'] = get_sub_field("desc_premio");
		$premios[$count]['fonte'] = get_sub_field("fonte_do_premio");
		$count ++;
	endwhile;
endif;
?>

<section id="premios" class="container-fluid wrapper-a-eztec-section wrapper-premios" style="background-image:url(<?php echo $bg_premios; ?>);">
	<div class="container wrapper-inner a-eztec-premios">
		<div class="a-eztec-premios-box">
			<div class="row a-eztec-premios-box-header">
				<div class="a-eztec-premios-box-header-titulo col-12 col-xl-2">
					<h2><?php echo $titulo_premios; ?></h2>
				</div>
				<div class="a-eztec-premios-box-header-desc text-right col-12 col-xl-10">
					<?php echo $desc_premios; ?>
				</div>
			</div>
			<hr>
			<div class="row a-eztec-premios-box-carousel">
				<div class="col-12">
					<div id="carouselPremios" class="carousel slide d-flex justify-content-center" data-ride="carousel" data-interval="false">

						<a class="carousel-control d-flex h-100 carousel-control-prev" href="#carouselPremios" role="button" data-slide="prev">
							<span class="carousel-control-icon carousel-control-prev-icon d-flex justify-content-center align-items-center" aria-hidden="true">
								<i class="seta-base seta-left"></i>
							</span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control d-flex h-100 carousel-control-next" href="#carouselPremios" role="button" data-slide="next">
							<span class="carousel-control-icon carousel-control-next-icon d-flex justify-content-center align-items-center" aria-hidden="true">
								<i class="seta-base seta-right"></i>
							</span>
							<span class="sr-only">Next</span>
						</a>

						<div class="carousel-inner" role="listbox">
							<?php
							$first_slide = 1;
							foreach($premios as $premio){
								if($first_slide == 1){
									$active_class = " active";
								}
								else{
									$active_class = "";
								}
								echo '<div class="carousel-item a-eztec-premios-box-carousel-item' . $active_class . '">
										<div class="row a-eztec-premios-box-carousel-item-header">
											<div class="col-12">
												<div class="section-content-header section-content-a-eztec d-flex align-items-start flex-column">
													<div class="section-content-pre-title mb-0 text-left">' . $premio["titulo"] . '</div>
													<div class="section-content-pre-title text-left">
														<small>' . $premio["datas"] . '</small>
													</div>
													<div class="section-content-title-separator"></div>
												</div>
											</div>
										</div>
										<div class="row a-eztec-premios-box-carousel-item-content">
											<div class="col-12">
												<p class="a-eztec-premios-box-carousel-item-content-desc">' . $premio["desc"] . '</p>
												<small class="a-eztec-premios-box-carousel-item-content-fonte">' . $premio["fonte"] . '</small>
											</div>
										</div>
									</div>';
							$first_slide = 0;
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>