<?php
// Seção Vídeos


// Captura informações do CMS
$titulo_videos = get_field("titulo_secao_videos");
$desc_videos = get_field("desc_secao_videos");
$txt_btn_videos = get_field("txt_btn_videos");
$url_page_videos = get_field("pagina_de_videos");
$url_video = get_field("url_video");
$img_video = wp_get_attachment_url(get_field("img_capa_video_a_eztec"));
$alt_img_video = get_post_meta( get_field('img_capa_video_a_eztec'), '_wp_attachment_image_alt', true);
?>

<section id="videos" class="container-fluid wrapper-a-eztec-section wrapper-a-eztec-videos p-0">
	<div class="container wrapper-inner a-eztec-videos">
		<div class="row">
			<div class="a-eztec-videos-text col-12 col-md-6 d-flex justify-content-center align-items-center flex-column">
				<h2 class="a-eztec-videos-text-titulo"><?php echo $titulo_videos; ?></h2>
				<p class="a-eztec-videos-text-desc"><?php echo $desc_videos; ?></p>
				<a class="btn btn-primary btn-lg" href="<?php echo $url_page_videos; ?>">
					<?php echo $txt_btn_videos; ?>
				</a>
			</div>
			<div class="videa-eztec-videos-video col-12 col-md-6 d-flex align-items-center">
				<?php 
				if (empty($url_video)){
					echo '
						<img class="img-fluid w-100" src="' . $img_video . '" alt="' . $alt_img_video . '">
					';
				}
				else{ ?>
					<a href="#aEztecVideo" data-toggle="modal" data-target="#modalAEztecVideo">
						<img class="img-fluid w-100" src="<?php echo $img_video; ?>" alt="<?php echo $alt_img_video; ?>">
					</a>
					<div class="modal fade" id="modalAEztecVideo" tabindex="-1" role="dialog" aria-labelledby="modalAEztecVideoLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
								<div class="modal-body mt-5 mb-5 border-0">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="<?php echo $url_video; ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
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