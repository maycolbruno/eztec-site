<?php
/*
 * Template Name: Acompanhe sua Obra
 * Template Post Type: obras
 */


// Dados do CMS
$tpt_obra_imovel = get_field("tpt_obra_imovel");
$tpt_obra_titulo = get_field("tpt_obra_titulo");
$logo = get_field("imoveis_logo_caracteristicas_fl",$tpt_obra_imovel);
$titulo_imovel = get_the_title($tpt_obra_imovel);
$titulo_fundacao = get_field("titulo_obra_fundacao",980);
$titulo_estrutura = get_field("titulo_obra_estrutura",980);
$titulo_alvenaria = get_field("titulo_obra_alvenaria",980);
$titulo_instalacoes = get_field("titulo_obra_instalacoes",980);
$titulo_rev_interno = get_field("titulo_obra_rev_interno",980);
$titulo_rev_externo = get_field("titulo_obra_rev_externo",980);
$titulo_piso = get_field("titulo_obra_piso",980);
$titulo_pintura = get_field("titulo_obra_pintura",980);
$titulo_paisagismo = get_field("titulo_obra_paisagismo",980);
$obra_percent_fundacao_fl = get_field("obra_percent_fundacao_fl",$tpt_obra_imovel);
$obra_percent_estrutura_fl = get_field("obra_percent_estrutura_fl",$tpt_obra_imovel);
$obra_percent_alvenaria_fl = get_field("obra_percent_alvenaria_fl",$tpt_obra_imovel);
$obra_percent_instalacoes_fl = get_field("obra_percent_instalacoes_fl",$tpt_obra_imovel);
$obra_percent_rev_interno_fl = get_field("obra_percent_rev_interno_fl",$tpt_obra_imovel);
$obra_percent_rev_externo_fl = get_field("obra_percent_rev_externo_fl",$tpt_obra_imovel);
$obra_percent_piso_fl = get_field("obra_percent_piso_fl",$tpt_obra_imovel);
$obra_percent_pintura_fl = get_field("obra_percent_pintura_fl",$tpt_obra_imovel);
$obra_percent_paisagismo_fl = get_field("obra_percent_paisagismo_fl",$tpt_obra_imovel);
$count = 1;
if( have_rows('galeria_imovel_obra',$tpt_obra_imovel) ):
	while ( have_rows('galeria_imovel_obra',$tpt_obra_imovel) ) : the_row();
		$imgs_obra[$count]['img'] = get_sub_field("img_imovel_obra");
		$count ++;
	endwhile;
endif;

get_header(); ?>

<div class="wrapper-geral obra">
	<div class="obra-header">
		<div class="wrapper-inner">
			<img class="logo-imovel" src="<?php echo wp_get_attachment_url($logo); ?>" alt="<?php echo $titulo_imovel; ?>">
		</div>
	</div>
	<?php
	// Monta breadcrumb
	get_template_part( 'template-parts/header/breadcrumb', 'page' );
	?>
	<div class="wrapper-inner">
		<div class="status-obra">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<h1 class="titulo-obra"><?php echo $tpt_obra_titulo; ?></h1>
						<div class="detalhe-titulo-obra"></div>
					</div>
				</div>
				<div class="row wrap-status">
					<div class="bloco-de-status col-xl-4 col-lg-4 col-12">
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_fundacao; ?></div>
							<div class="status-percent"><?php echo $obra_percent_fundacao_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_fundacao_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_fundacao_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_estrutura; ?></div>
							<div class="status-percent"><?php echo $obra_percent_estrutura_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_estrutura_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_estrutura_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_alvenaria; ?></div>
							<div class="status-percent"><?php echo $obra_percent_alvenaria_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_alvenaria_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_alvenaria_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>

					<div class="bloco-de-status col-xl-4 col-lg-4 col-12">
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_instalacoes; ?></div>
							<div class="status-percent"><?php echo $obra_percent_instalacoes_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_instalacoes_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_instalacoes_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_rev_interno; ?></div>
							<div class="status-percent"><?php echo $obra_percent_rev_interno_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_rev_interno_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_rev_interno_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_rev_externo; ?></div>
							<div class="status-percent"><?php echo $obra_percent_rev_externo_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_rev_externo_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_rev_externo_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>

					<div class="bloco-de-status col-xl-4 col-lg-4 col-12">
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_piso; ?></div>
							<div class="status-percent"><?php echo $obra_percent_piso_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_piso_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_piso_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_pintura; ?></div>
							<div class="status-percent"><?php echo $obra_percent_pintura_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_pintura_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_pintura_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="text-status d-flex justify-content-between">
							<div class="status-name"><?php echo $titulo_paisagismo; ?></div>
							<div class="status-percent"><?php echo $obra_percent_paisagismo_fl; ?>%</div>
						</div>
						<div class="progress">
						  <div class="progress-bar" style="width: <?php echo $obra_percent_paisagismo_fl; ?>%;" role="progressbar" aria-valuenow="<?php echo $obra_percent_paisagismo_fl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="container-fluid wrapper-imovel wrapper-imovel-obra page-obra">
	<div class="container wrapper-inner imovel-obra">
		<div class="row">
			<div class="col-12">
				<div class="row d-flex justify-content-center">
					<div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center">
						<div class="image-gallery-box">
							<ul id="galeria-obra" class="gallery list-unstyled">
								<?php
								foreach($imgs_obra as $img){
									$imagem = wp_get_attachment_metadata( $img["img"], true );
									$upload_dir = wp_upload_dir();
									$path_img =  dirname($imagem["file"]);
									$url_img_xs = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["545x319"]["file"];
									$url_img_sm = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["737x431"]["file"];
									$url_img_lg = $upload_dir["baseurl"] . "/" . $path_img . "/" . $imagem["sizes"]["795x466"]["file"];
									echo '
									<li class="lslide" data-thumb="' . wp_get_attachment_url($img["img"]) . '" data-sub-html="' . wp_get_attachment_caption( $img["img"]) . '">

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
				<div class="row">
					<div class="wrapper-btn-triangle btn-obra">
				    	<a class="btn btn-primary btn-lg" href="<?php echo get_permalink($tpt_obra_imovel); ?>">VOLTAR</a>
				    	<div class="triangle-top-right"></div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
