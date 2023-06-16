<?php
// Banner de imagens para Home
//
//
// Captura informações do CMS
$count = 0;
if( have_rows('banners_home_slider_fl2') ):
	while ( have_rows('banners_home_slider_fl2') ) : the_row();
		$banners[$count]['titulo']    = get_sub_field("titulo_banner_slider_fl2");
		$banners[$count]['subtitulo'] = get_sub_field("subtitulo_banner_slider_fl2");
		$banners[$count]['status']    = get_sub_field("status_banner_slider_fl2");
		$banners[$count]['btn']       = get_sub_field("txt_btn_call_banner_home_fl2");
		$banners[$count]['img']       = get_sub_field("img_banner_slider_fl2");
		$banners[$count]['img_md']    = get_sub_field("img_banner_slider_md_fl2");
		$banners[$count]['img_xs']    = get_sub_field("img_banner_slider_xs_fl2");
		$banners[$count]['usar_externa']       = get_sub_field("usar_url_banner_slider_fl2");
		$banners[$count]['url_externa']       = get_sub_field("url_externa_banner_slider_fl2");
		$banners[$count]['url']       = get_sub_field("url_banner_slider_fl2");
		$count ++;
	endwhile;
endif;
?>

<div class="banner-slide">

	<?php // Carrossel para formato medium-large-xl ?>
	<div id="carouselBannerSliderMd" class="carousel slide d-none d-md-block" data-ride="carousel">
		<div class="carousel-inner">
			<?php
			$n = 0;
			foreach ($banners as $banner){
				$active_class = ($n == 0 ? ' active' : '');
				if ($banner["usar_externa"] == 1) {
					$url_banner = $banner["url_externa"];
					$dir_target = ' target="_blank" rel="noopener"';
				}
				else{
					$url_banner = $banner["url"];
					$dir_target = '';
				}
			  	echo '
				<div class="carousel-item ml-auto mr-auto ' . $active_class . '">
					<img class="img-fluid ml-auto mr-auto" src="' . wp_get_attachment_url($banner["img"]) . '" alt="' . get_post_meta( $banner["img"], "_wp_attachment_image_alt", true) . '">
					<div class="carousel-caption home-version d-flex align-items-center justify-content-center w-100 h-100">
						<div class="carousel-caption-center">
							<span class="banner-slide-status">' . $banner["status"] . '</span>
							<span class="banner-slide-title">' . $banner["titulo"] . '</span>
							<div class="banner-slide-divisor"></div>
							<span class="banner-slide-subtitle">' . $banner["subtitulo"] . '</span>
							<div class="wrapper-btn-triangle">
						    	<a class="btn btn-primary btn-lg" href="' . $url_banner . '" ' . $dir_target . '>' . $banner["btn"] . '<div class="triangle-top-right"></div></a>
						    </div>
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

	<?php // Carrossel para formato small ?>
	<div id="carouselBannerSliderSm" class="carousel slide d-none d-sm-block d-md-none" data-ride="carousel">
		<div class="carousel-inner">
			<?php
			$n = 0;
			foreach ($banners as $banner){
				$active_class = ($n == 0 ? ' active' : '');
				if ($banner["usar_externa"] == 1) {
					$url_banner = $banner["url_externa"];
					$dir_target = ' target="_blank" rel="noopener"';
				}
				else{
					$url_banner = $banner["url"];
					$dir_target = '';
				}
			  	echo '
				  <div class="carousel-item ' . $active_class . '">
				  	<img class="img-fluid" src="' . wp_get_attachment_url($banner["img_md"]) . '" alt="' . get_post_meta( $banner["img_md"], "_wp_attachment_image_alt", true) . '">
					<div class="carousel-caption home-version d-flex align-items-center justify-content-center w-100 h-100">
						<div class="carousel-caption-center">
							<span class="banner-slide-status">' . $banner["status"] . '</span>
							<span class="banner-slide-title">' . $banner["titulo"] . '</span>
							<div class="banner-slide-divisor"></div>
							<span class="banner-slide-subtitle">' . $banner["subtitulo"] . '</span>
						    <div class="wrapper-btn-triangle">
						    	<a class="btn btn-primary btn-lg" href="' . $url_banner . '" ' . $dir_target . '>' . $banner["btn"] . '</a>
						    	<div class="triangle-top-right"></div>
						    </div>
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
		<div class="carousel-inner">
			<?php
			$n = 0;
			foreach ($banners as $banner){
				$active_class = ($n == 0 ? ' active' : '');
				if ($banner["usar_externa"] == 1) {
					$url_banner = $banner["url_externa"];
					$dir_target = ' target="_blank" rel="noopener"';
				}
				else{
					$url_banner = $banner["url"];
					$dir_target = '';
				}
			  	echo '
				<div class="carousel-item ' . $active_class . '">
					<img class="img-fluid" src="' . wp_get_attachment_url($banner["img_xs"]) . '" alt="' . get_post_meta( $banner["img_xs"], "_wp_attachment_image_alt", true) . '">
					<div class="carousel-caption home-version d-flex align-items-center justify-content-center w-100 h-100">
						<div class="carousel-caption-center">
							<span class="banner-slide-status">' . $banner["status"] . '</span>
							<span class="banner-slide-title">' . $banner["titulo"] . '</span>
							<div class="banner-slide-divisor-mobile"></div>
							<span class="banner-slide-subtitle">' . $banner["subtitulo"] . '</span>
						    <div class="wrapper-btn-triangle">
						    	<a class="btn btn-primary btn-lg" href="' . $url_banner . '" ' . $dir_target . '>' . $banner["btn"] . '</a>
						    	<div class="triangle-top-right"></div>
						    </div>
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