<?php
// Seção Vídeos da página de produto
//
//
// Captura informações do CMS
$count = 1;
if( have_rows('galeria_imovel_videos') ):
	while ( have_rows('galeria_imovel_videos') ) : the_row();
		$itens_videos[$count]['url'] = get_sub_field("url_imovel_video");
		$itens_videos[$count]['label'] = get_sub_field("label_video");
		$count ++;
	endwhile;
endif;

$url_tour = get_field("imoveis_url_tour");
$label_tour = get_field("imoveis_label_tour");


if (get_field("exibir_videos") == 1){
	$show_videos = 1;
}
if (get_field("exibir_tour") == 1){
	$show_tour = 1;
}
$class_active = " active";
$aria_att = "true";
$conta_galeriasv = 0;
$galeria_to_remove_class = array();
$galeria_to_remove_classv = array();
?>

<section id="videos" class="container-fluid wrapper-imovel wrapper-imovel-galeria">
	<div class="wrapper-geral">
		<div class="wrapper-inner">

			<ul class="nav nav-tabs" id="TabVideos" role="tablist">
				<?php
				if($show_videos == 1){
					echo '
					<li class="nav-item">
						<a class="nav-link' . $class_active . '" id="videosTab-tab" data-toggle="tab" href="#videosTab" role="tab" aria-controls="videosTab" aria-selected="' . $aria_att . '">' . get_field("txt_menu_nav_videos") . '</a>
					</li>
					';
					$class_active = "";
					$aria_att = "false";
					$galeria_to_remove_classv[$conta_galeriasv]['id'] = "videosTab";
					$conta_galeriasv ++;
				}
				if($show_tour == 1){
					echo '
					<li class="nav-item">
						<a class="nav-link' . $class_active . '" id="tourTab-tab" data-toggle="tab" href="#tourTab" role="tab" aria-controls="tourTab" aria-selected="' . $aria_att . '">' . get_field("txt_menu_nav_tour") . '</a>
					</li>
					';
					$class_active = "";
					$aria_att = "false";
					$galeria_to_remove_classv[$conta_galeriasv]['id'] = "tourTab";
					$conta_galeriasv ++;
				}
				?>
			</ul>
			<div class="tab-content" id="TabContentGaleria">
				<?php 
				if($show_videos == 1){ ?>
				    <div class="tab-pane fade show active" id="videosTab" role="tabpanel" aria-labelledby="videosTab-tab">
				    	<div class="container-fluid wrapper-imovel wrapper-imovel-videos">
							<div class="container wrapper-inner imovel-videos">
								<div class="row">
									<div class="col-12">
										<div class="row d-flex justify-content-center">
											<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
												<div class="image-gallery-box no-thumbnail-gallery">
													<ul id="galeria-videos" class="gallery list-unstyled">
														<?php
														foreach($itens_videos as $video){
															echo '
															<li class="lslide" data-thumb="" data-src="">
																<div class="embed-responsive embed-responsive-16by9">
																	<iframe class="embed-responsive-item" src="' . $video['url'] . '" gesture="media" allow="encrypted-media" allowfullscreen="" frameborder="0"></iframe>
																</div>
																<p class="caption">' . $video['label'] . '</p>
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
				if($show_tour == 1){ ?>
					<div class="tab-pane fade show active" id="tourTab" role="tabpanel" aria-labelledby="tourTab-tab">
				    	<div class="container-fluid wrapper-imovel wrapper-imovel-videos">
							<div class="container wrapper-inner imovel-videos">
								<div class="row">
									<div class="col-12">
										<div class="row d-flex justify-content-center">
											<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
												<div class="image-gallery-box no-thumbnail-gallery">
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
																	<p class="caption">' . $t["label"] . '</p>
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
								</div>
							</div>
						</div>
				    </div>
				<?php } ?>
			</div>


		</div>
</div>

</section>

<?php
$nao_apaga_primeiro_itemv = 1;
foreach($galeria_to_remove_classv as $i){
	if($nao_apaga_primeiro_itemv > 1){
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
	$nao_apaga_primeiro_itemv ++;
}
?>


