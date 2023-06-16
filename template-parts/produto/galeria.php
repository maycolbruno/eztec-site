<?php
// Seção Galeria da página de produto
//
//
// Captura informações do CMS
$count = 1;
if( have_rows('galeria_imovel_apto') ):
	while ( have_rows('galeria_imovel_apto') ) : the_row();
		$imgs_apto[$count]['img'] = get_sub_field("img_imovel_aptos");
		$imgs_apto[$count]['img_big'] = get_sub_field("img_big_imovel_aptos");
		$count ++;
	endwhile;
endif;

$count = 1;
if( have_rows('galeria_imovel_plantas') ):
	while ( have_rows('galeria_imovel_plantas') ) : the_row();
		$imgs_plantas[$count]['img'] = get_sub_field("img_imovel_plantas");
		$imgs_plantas[$count]['img_big'] = get_sub_field("img_big_imovel_plantas");
		$count ++;
	endwhile;
endif;

$count = 1;
if( have_rows('galeria_imovel_lazer') ):
	while ( have_rows('galeria_imovel_lazer') ) : the_row();
		$imgs_lazer[$count]['img'] = get_sub_field("img_imovel_lazer");
		$imgs_lazer[$count]['img_big'] = get_sub_field("img_big_imovel_lazer");
		$count ++;
	endwhile;
endif;


if (get_field("exibir_apartamentos") == 1){
	$show_aptos = 1;
}
if (get_field("exibir_plantas") == 1){
	$show_plantas = 1;
}
if (get_field("exibir_lazer") == 1){
	$show_lazer = 1;
}
$class_active = " active";
$aria_att = "true";
$conta_galerias = 0;
$galeria_to_remove_class = array();
?>

<section id="galerias" class="container-fluid wrapper-imovel wrapper-imovel-galeria">
	<div class="wrapper-geral">
		<div class="wrapper-inner">

			<ul class="nav nav-tabs" id="myTabGalerias" role="tablist">
				<?php
				if($show_aptos == 1){
					echo '
					<li class="nav-item">
						<a class="nav-link' . $class_active . '" id="aptosTab-tab" data-toggle="tab" href="#aptosTab" role="tab" aria-controls="aptosTab" aria-selected="' . $aria_att . '">' . get_field("txt_menu_nav_aptos") . '</a>
					</li>
					';
					$class_active = "";
					$aria_att = "false";
					$galeria_to_remove_class[$conta_galerias]['id'] = "aptosTab";
					$conta_galerias ++;
				}
				if($show_plantas == 1){
					echo '
					<li class="nav-item">
						<a class="nav-link' . $class_active . '" id="plantasTab-tab" data-toggle="tab" href="#plantasTab" role="tab" aria-controls="plantasTab" aria-selected="' . $aria_att . '">' . get_field("txt_menu_nav_plantas") . '</a>
					</li>
					';
					$class_active = "";
					$aria_att = "false";
					$galeria_to_remove_class[$conta_galerias]['id'] = "plantasTab";
					$conta_galerias ++;
				}
				if($show_lazer == 1){
					echo '
					<li class="nav-item">
						<a class="nav-link' . $class_active . '" id="lazerTab-tab" data-toggle="tab" href="#lazerTab" role="tab" aria-controls="lazerTab" aria-selected="' . $aria_att . '">' . get_field("txt_menu_nav_lazer") . '</a>
					</li>
					';
					$class_active = "";
					$aria_att = "false";
					$galeria_to_remove_class[$conta_galerias]['id'] = "lazerTab";
					$conta_galerias ++;
				}
				?>
			</ul>
			<div class="tab-content" id="TabContentGaleria">
				<?php 
				if($show_aptos == 1){ ?>
				    <div class="tab-pane fade show active" id="aptosTab" role="tabpanel" aria-labelledby="aptosTab-tab">
				    	<div class="container-fluid wrapper-imovel wrapper-imovel-apartamento">
							<div class="container wrapper-inner imovel-apartamento">
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
						</div>
				    </div>
				<?php } ?>
				<?php 
				if($show_plantas == 1){ ?>
					<div class="tab-pane fade show active" id="plantasTab" role="tabpanel" aria-labelledby="plantasTab-tab">
				    	<div class="container-fluid wrapper-imovel wrapper-imovel-plantas">
							<div class="container wrapper-inner imovel-plantas">
								<div class="row">
									<div class="col-12">
										<div class="row d-flex justify-content-center">
											<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
												<div class="image-gallery-box">
													<ul id="galeria-plantas" class="gallery list-unstyled">
														<?php
														foreach($imgs_plantas as $img){
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
														$class_tab_active = "";
														?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				    </div>
				<?php } ?>
			    <div class="tab-pane fade show active" id="lazerTab" role="tabpanel" aria-labelledby="lazerTab-tab">
			    	<?php 
					if($show_lazer == 1){ ?>
						<div class="container-fluid wrapper-imovel wrapper-imovel-lazer">
							<div class="container wrapper-inner imovel-lazer">
								<div class="row">
									<div class="col-12">
										<div class="row d-flex justify-content-center">
											<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
												<div class="image-gallery-box">
													<ul id="galeria-lazer" class="gallery list-unstyled">
														<?php
														foreach($imgs_lazer as $img){
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
						</div>
					<?php } ?>
			    </div>
			</div>


		</div>
</div>

</section>

<?php
$nao_apaga_primeiro_item = 1;
foreach($galeria_to_remove_class as $i){
	if($nao_apaga_primeiro_item > 1){
		echo '
		<script type="text/javascript">
		    $(document).ready(function(){
		    	setTimeout(function(){
			    	var element = document.getElementById("' . $i["id"] . '");
					element.classList.remove("active");
					element.classList.remove("show");
				}, 4000);
		    });
		</script>
		
		';
	}
	$nao_apaga_primeiro_item ++;
}
?>






