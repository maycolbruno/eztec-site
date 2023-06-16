<?php
// Seção Obra da página de produto
//
//
// Captura informações do CMS
$titulo_obra = get_field("imovel_titulo_obra");
$imovel_obra_url_galeria = get_field("imovel_obra_url_galeria");
$obra_percent_fundacao_fl = get_field("obra_percent_fundacao_fl");
$obra_percent_estrutura_fl = get_field("obra_percent_estrutura_fl");
$obra_percent_alvenaria_fl = get_field("obra_percent_alvenaria_fl");
$obra_percent_instalacoes_fl = get_field("obra_percent_instalacoes_fl");
$obra_percent_rev_interno_fl = get_field("obra_percent_rev_interno_fl");
$obra_percent_rev_externo_fl = get_field("obra_percent_rev_externo_fl");
$obra_percent_piso_fl = get_field("obra_percent_piso_fl");
$obra_percent_pintura_fl = get_field("obra_percent_pintura_fl");
$obra_percent_paisagismo_fl = get_field("obra_percent_paisagismo_fl");
$show_galeria = get_field("show_galeria_obra");
$count = 1;
if( have_rows('galeria_imovel_obra') ):
	while ( have_rows('galeria_imovel_obra') ) : the_row();
		$imgs_obra[$count]['img'] = get_sub_field("img_imovel_obra");
		$count ++;
	endwhile;
endif;
$show_obra_video = get_field("show_video_entrega");
$txt_pontualidade = get_field("txt_obra_pontualidade");
$txt_video = get_field("txt_obra_video");
$obra_video = get_field("video_obra_video");
$img_video_obra = get_field("img_obra_video");
//
// Componentes
$titulo_fundacao = get_field("titulo_obra_fundacao",980);
$icon_fundacao = wp_get_attachment_url(get_field("icon_obra_fundacao",980));
$alt_icon_fundacao = get_post_meta( get_field('icon_obra_fundacao',980), '_wp_attachment_image_alt', true);
$titulo_estrutura = get_field("titulo_obra_estrutura",980);
$icon_estrutura = wp_get_attachment_url(get_field("icon_obra_estrutura",980));
$alt_icon_estrutura = get_post_meta( get_field('icon_obra_estrutura',980), '_wp_attachment_image_alt', true);
$titulo_alvenaria = get_field("titulo_obra_alvenaria",980);
$icon_alvenaria = wp_get_attachment_url(get_field("icon_obra_alvenaria",980));
$alt_icon_alvenaria = get_post_meta( get_field('icon_obra_alvenaria',980), '_wp_attachment_image_alt', true);
$titulo_instalacoes = get_field("titulo_obra_instalacoes",980);
$icon_instalacoes = wp_get_attachment_url(get_field("icon_obra_instalacoes",980));
$alt_icon_instalacoes = get_post_meta( get_field('icon_obra_instalacoes',980), '_wp_attachment_image_alt', true);
$titulo_rev_interno = get_field("titulo_obra_rev_interno",980);
$icon_rev_interno = wp_get_attachment_url(get_field("icon_obra_rev_interno",980));
$alt_icon_rev_interno = get_post_meta( get_field('icon_obra_rev_interno',980), '_wp_attachment_image_alt', true);
$titulo_rev_externo = get_field("titulo_obra_rev_externo",980);
$icon_rev_externo = wp_get_attachment_url(get_field("icon_obra_rev_externo",980));
$alt_icon_rev_externo = get_post_meta( get_field('icon_obra_rev_externo',980), '_wp_attachment_image_alt', true);
$titulo_piso = get_field("titulo_obra_piso",980);
$icon_piso = wp_get_attachment_url(get_field("icon_obra_piso",980));
$alt_icon_piso = get_post_meta( get_field('icon_obra_piso',980), '_wp_attachment_image_alt', true);
$titulo_pintura = get_field("titulo_obra_pintura",980);
$icon_pintura = wp_get_attachment_url(get_field("icon_obra_pintura",980));
$alt_icon_pintura = get_post_meta( get_field('icon_obra_pintura',980), '_wp_attachment_image_alt', true);
$titulo_paisagismo = get_field("titulo_obra_paisagismo",980);
$icon_paisagismo = wp_get_attachment_url(get_field("icon_obra_paisagismo",980));
$alt_icon_paisagismo = get_post_meta( get_field('icon_obra_paisagismo',980), '_wp_attachment_image_alt', true);

?>

<section id="obra" class="container-fluid wrapper-imovel-obra">
	<div class="container wrapper-inner imovel-obra obra produto-obra">
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-8 col-12">
				<div class="section-content-header">
					<h2 class="section-content-title"><?php echo $titulo_obra; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-12 btn-galeria-obra">
				<div class="wrapper-btn-triangle">
			    	<a class="btn btn-primary btn-lg" href="<?php echo $imovel_obra_url_galeria; ?>">GALERIA DE IMAGENS</a>
			    	<div class="triangle-top-right"></div>
			    </div>
			</div>
		</div>
	</div>
	<div class="obra-status-desk">
		<div class="container wrapper-inner imovel-obra obra produto-obra">
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

	<div class="obra-status-mobile">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="" id="headingObraAcordion">
				        <div class="collapsed" data-toggle="collapse" data-target="#collapseObraAcordion" aria-expanded="false" aria-controls="collapseObraAcordion">
				          <div class="wrapper-titulo-obra-acordion d-flex justify-content-between">
				          	<div class="titulo-obra-acordion">AVANÇO DAS OBRAS</div>
				          	<i class="seta-obra-acordion" id="SetaObraAcordion" aria-hidden="true"></i>
				          </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	    <div id="collapseObraAcordion" class="collapse" aria-labelledby="headingObraAcordion" data-parent="#accordionObraAcordion" style="">
	      <div class="container wrapper-inner imovel-obra obra produto-obra">
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

	<script>
    	$('#collapseObraAcordion').on('show.bs.collapse', function () {
		  document.getElementById("SetaObraAcordion").style.transform = "rotate(225deg)";
		  document.getElementById("SetaObraAcordion").style.marginTop = "10px";
		})
		$('#collapseObraAcordion').on('hide.bs.collapse', function () {
		  document.getElementById("SetaObraAcordion").style.transform = "rotate(45deg)";
		  document.getElementById("SetaObraAcordion").style.marginTop = "0";
		})
    </script>
</section>