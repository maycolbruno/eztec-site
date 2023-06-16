<?php
// Página Vídeos

// Captura informações do CMS
$placeholder_search_videos = get_field("placeholder_videos");
$icon_seach_videos = get_field("icon_search_videos");
?>

<div class="container-fluid wrapper-videos p-0">

	<header class="wrapper-banner">
		<?php
		// Monta cabeçalho de banner
		get_template_part( 'template-parts/header/banner', 'page' );

		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<section class="container wrapper-inner videos">

		<div class="row videos-filter-bar">
			<div class="col-12 col-md-8 col-lg-6">
				<form onsubmit="return false;">
					<div class="form-row">
						<div class="form-group">
							<input type="search" id="search-input" class="form-control videos-filter-bar-input" placeholder="<?php echo $placeholder_search_videos; ?>" value="" name="s" title="Buscar por:" aria-label="Buscar">
							<img class="videos-filter-bar-icon" src="<?php echo wp_get_attachment_url($icon_seach_videos); ?>" alt="<?php echo get_post_meta( $icon_seach_videos, "_wp_attachment_image_alt", true) ?>">
						</div>
					</div>
				</form>
			</div>
		</div>

		<div id="videos-list">
			<?php
			$i = 1; // alimenta ID de seções
			$v = 1; // alimenta ID de cada vídeo
			if( have_rows('secoes_de_video') ):
				while ( have_rows('secoes_de_video') ) : the_row();
					if(get_sub_field('show_session') == 1){
						echo '
						<div class="videos-section">
							<div class="row videos-section-title">
								<div class="col-12">
									<div class="section-content-header d-flex align-items-start flex-column">
										<h2 class="section-content-title text-left">' . get_sub_field("titulo_secao") . '</h2>
										<div class="section-content-title-separator"></div>
									</div>
								</div>
							</div>
							<div class="row videos-section-box">
						';
								if( have_rows('videos') ):
									while ( have_rows('videos') ) : the_row();
										echo '<div class="video-section-box-item col-6 col-md-4 col-lg-3">
													<div class="video-section-box-item-img" onclick="videos.openVideo(\'' . get_sub_field("url_video") . '\')">
														<img class="img-fluid w-100" src="' . wp_get_attachment_url(get_sub_field("img_capa_video")) . '" alt="' . get_post_meta( get_sub_field("img_capa_video"), "_wp_attachment_image_alt", true) . '">
														<div class="video-section-box-item-img-overlay d-flex justify-content-center align-items-center">
															<i class="btn-play-video" aria-hidden="true"></i>
														</div>
													</div>
													<div class="video-section-box-item-info">
														<p class="video-section-box-item-info-title">' . get_sub_field("status_video") . '</p>
														<h3 class="video-section-box-item-info-desc">' . get_sub_field("titulo_video") . '</h3>
													</div>
												</div>';
										$v ++;
									endwhile;
								endif;
						echo '
							</div>
						</div>
						';
					}
					$i ++;
				endwhile;
			endif;
			?>
		</div>

		<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="modalVideoLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
					<div class="modal-body mt-5 mb-5 border-0">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe id="video-modal" class="embed-responsive-item" src="" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>