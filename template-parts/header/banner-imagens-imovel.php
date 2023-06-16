<?php
// Banner de imagens
//
//
// Captura informações do CMS
$count = 0;
if( have_rows('banners_produto_slider_fl') ):
	while ( have_rows('banners_produto_slider_fl') ) : the_row();
		$banners[$count]['titulo']    = get_sub_field("titulo_banner_slider_fl");
		$banners[$count]['subtitulo'] = get_sub_field("subtitulo_banner_slider_fl");
		$banners[$count]['status']    = get_sub_field("status_banner_slider_fl");
		$banners[$count]['img']       = get_sub_field("img_banner_slider_fl");
		$banners[$count]['img_md']       = get_sub_field("img_banner_slider_md_fl");
		$banners[$count]['img_xs']       = get_sub_field("img_banner_slider_xs_fl");
		$count ++;
	endwhile;
endif;
?>

<div class="banner-slide">

	<?php // Carrossel para formato medium-large-xl ?>
	<div id="carouselBannerSliderMd" class="carousel slide d-none d-md-block" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<?php
			$n = 0;
			foreach ($banners as $banner){
				$active_class = ($n == 0 ? ' active' : '');
			  	echo '
				<div class="carousel-item ml-auto mr-auto ' . $active_class . '">
					<img class="img-fluid" src="' . wp_get_attachment_url($banner["img"]) . '" alt="' . get_post_meta( $banner["img"], "_wp_attachment_image_alt", true) . '">
					<div class="carousel-caption d-flex align-items-center justify-content-center w-100 h-100">
						<div class="carousel-caption-center">
						    <span class="banner-slide-status">' . $banner["status"] . '</span>
						    <h1 class="banner-slide-title">' . $banner["titulo"] . '</h1>
						    <div class="detalhe-titulo"></div>
						    <span class="banner-slide-subtitle">' . $banner["subtitulo"] . '</span>
						</div>
					</div>
				</div>';
				$n ++;
			}
			if ($n > 1){
				echo '
		  		<a class="carousel-control-prev" href="#carouselBannerSliderMd" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true">
						<i class="seta-base-banner seta-left" aria-hidden="true"></i>
			    	</span>
				    <span class="sr-only">Anterior</span>
				</a>
				<a class="carousel-control-next" href="#carouselBannerSliderMd" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true">
						<i class="seta-base-banner seta-right" aria-hidden="true"></i>
				    </span>
				    <span class="sr-only">Próximo</span>
				</a>';
			}
			?>
		</div>
	</div>

	<?php // Carrossel para formato medium ?>
	<div id="carouselBannerSliderSm" class="carousel slide d-none d-sm-block d-md-none" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<?php
			$n = 0;
			foreach ($banners as $banner){
				$active_class = ($n == 0 ? ' active' : '');
			  	echo '
				<div class="carousel-item ' . $active_class . '">
					<img class="img-fluid" src="' . wp_get_attachment_url($banner["img_md"]) . '" alt="' . get_post_meta( $banner["img_md"], "_wp_attachment_image_alt", true) . '">
					<div class="carousel-caption d-flex align-items-center justify-content-center w-100 h-100">
						<div class="carousel-caption-center">
						    <span class="banner-slide-status">' . $banner["status"] . '</span>
						    <span class="banner-slide-title">' . $banner["titulo"] . '</span>
						    <div class="detalhe-titulo"></div>
						    <span class="banner-slide-subtitle">' . $banner["subtitulo"] . '</span>
						</div>
					</div>
				</div>';
				$n ++;
			}
			if ($n > 1){
				echo '
		  		<a class="carousel-control-prev" href="#carouselBannerSliderSm" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true">
						<i class="seta-base-banner seta-left" aria-hidden="true"></i>
			    	</span>
				    <span class="sr-only">Anterior</span>
				</a>
				<a class="carousel-control-next" href="#carouselBannerSliderSm" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true">
						<i class="seta-base-banner seta-right" aria-hidden="true"></i>
				    </span>
				    <span class="sr-only">Próximo</span>
				</a>';
			}
			?>
		</div>
	</div>

	<?php // Carrossel para formato extra small ?>
	<div id="carouselBannerSlider" class="carousel slide d-block d-sm-none" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<?php
			$n = 0;
			foreach ($banners as $banner){
				$active_class = ($n == 0 ? ' active' : '');
			  	echo '
				<div class="carousel-item ' . $active_class . '">
					<img class="img-fluid ml-auto mr-auto" src="' . wp_get_attachment_url($banner["img_xs"]) . '" alt="' . get_post_meta( $banner["img_xs"], "_wp_attachment_image_alt", true) . '">
					<div class="carousel-caption d-flex align-items-center justify-content-center w-100 h-100">
						<div class="carousel-caption-center">
						    <span class="banner-slide-status">' . $banner["status"] . '</span>
						    <span class="banner-slide-title">' . $banner["titulo"] . '</span>
						    <div class="detalhe-titulo"></div>
						    <span class="banner-slide-subtitle">' . $banner["subtitulo"] . '</span>
						</div>
					</div>
				</div>';
				$n ++;
			}
			if ($n > 1){
				echo '
		  		<a class="carousel-control-prev" href="#carouselBannerSlider" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true">
						<i class="seta-base-banner seta-left" aria-hidden="true"></i>
			    	</span>
				    <span class="sr-only">Anterior</span>
				</a>
				<a class="carousel-control-next" href="#carouselBannerSlider" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true">
						<i class="seta-base-banner seta-right" aria-hidden="true"></i>
				    </span>
				    <span class="sr-only">Próximo</span>
				</a>';
			}
			?>
		</div>
	</div>

</div>