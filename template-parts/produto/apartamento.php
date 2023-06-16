<?php
// Seção Apartamento da página de produto
//
//
// Captura informações do CMS
$bg_color = get_field("imoveis_bg_color_aptos");
$titulo_aptos = get_field("imoveis_titulo_aptos");
$count = 1;
if( have_rows('galeria_imovel_apto') ):
	while ( have_rows('galeria_imovel_apto') ) : the_row();
		$imgs_apto[$count]['img'] = get_sub_field("img_imovel_aptos");
		$imgs_apto[$count]['img_big'] = get_sub_field("img_big_imovel_aptos");
		$count ++;
	endwhile;
endif;
?>

<section id="aptos" class="container-fluid wrapper-imovel wrapper-imovel-apartamento" style="background-color:<?php echo $bg_color; ?>;">
	<div class="container wrapper-inner imovel-apartamento">
		<div class="row">
			<div class="col-12">
				<div class="section-content-header d-flex align-items-center flex-column">
					<h2 class="section-content-title text-center"><?php echo $titulo_aptos; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="row d-flex justify-content-center">
					<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
						<div class="image-gallery-box">
							<ul id="galeria-apartamentos" class="gallery list-unstyled">
								<?php
								foreach($imgs_apto as $img){
									$imagem = wp_get_attachment_metadata( $img["img"], true );
									$upload_dir = wp_upload_dir();
									$path_img =  dirname($imagem["file"]);
									$url_img_xs = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["545x319"]["file"];
									$url_img_sm = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["737x431"]["file"];
									$url_img_lg = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["795x466"]["file"];
									echo '
									<li class="lslide" data-thumb="' . wp_get_attachment_url($img["img"]) . '" data-src="' . wp_get_attachment_url($img["img_big"]) . '" data-sub-html="' . wp_get_attachment_caption( $img["img"]) . '">

										<img class="img-fluid"
											src="' . wp_get_attachment_url($img["img"]) . '"
											alt="' . get_post_meta( $img["img"], "_wp_attachment_image_alt", true) . '"
											srcset="
												' . $url_img_xs . ' 575w,
												' . $url_img_sm . ' 767w,
												' . $url_img_lg . ' 1199w,
												' . wp_get_attachment_url($img["img"]) . ' 1200w"
										/>

										<p class="caption">' . wp_get_attachment_caption( $img["img"]) . '</p>
									</li>
									';
								}
								?>
							</ul>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>