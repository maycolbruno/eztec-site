<?php
// Template 1 para Campanhas


// Captura informações do CMS
$mostrar_pres = get_field("show_presentation_t1");
$pre_pres = get_field("pre_presentation_t1");
$status_pres = get_field("status_presentation_t1");
$titulo_pres = get_field("titulo_presentation_t1");
$desc_pres = get_field("desc_presentation_t1");
$area_pres = get_field("area_presentation_t1");
$pos_pres = get_field("pos_presentation_t1");
$txt_legal = get_field("txt_legal_t1");

?>

<section class="campanha-presentation">
	<?php
	if($mostrar_pres == 1){
		if($area_pres == 1280){
			echo '<div class="container wrapper-inner">';
		}
		if ($pre_pres !== ""){
			echo '<div class="campanha-presentation-pre-content">'. $pre_pres . '</div>';
		}
		?>

		<div class="row campanha-presentation-content">
			<div class="col-12">
				<div class="section-content-header">
					<p class="section-content-pre-title"><?php echo $status_pres; ?></p>
					<h1 class="section-content-title"><?php echo $titulo_pres; ?></h1>
					<div class="section-content-title-separator"></div>
				</div>
				<p class="campanha-presentation-descricao"><?php echo $desc_pres; ?></p>
			</div>
		</div>

		<?php
		if ($pos_pres !== ""){
			echo '<div class="campanha-presentation-pos-content">'. $pos_pres . '</div>';
		}
		if($area_pres == 1280){
			echo '</div>';
		}
	}
	?>
</section>

<?php //Menu de Navegação de seções ?>
<section class="wrapper-nav-menu">
	<div class="container wrapper-inner nav-menu nav-menu-compact d-flex justify-content-center flex-md-column">

		<?php
		if (have_rows('regioes_t1')) {

			$totalItems = 0;
			while ( have_rows('regioes_t1') ) : the_row();
				if(get_sub_field('show_menu_nav_t1') == 1){
					$totalItems++;
				}
			endwhile;

			$halfList = round($totalItems / 2);
			$count = 0;
			$navList = '<ul class="nav-menu-list nav-menu-list-first list-unstyled list-inline d-none d-sm-none d-md-flex flex-colunm">';

			while ( have_rows('regioes_t1') ) : the_row();
				if ($count == $halfList) {
					$navList .= '</ul><ul class="nav-menu-list nav-menu-list-second list-unstyled list-inline d-none d-sm-none d-md-flex flex-colunm">';
				}
				if (get_sub_field('show_menu_nav_t1') == 1) {
					$navList .= '
						<li class="nav-menu-item list-inline-item">
							<a class="d-flex justify-content-center" href="#section-' . get_sub_field("id_secao_t1") . '">' . get_sub_field("txt_menu_nav_t1") . '</a>
						</li>
					';
					$count++;
				}
			endwhile;
			$navList .= '</ul>';

			echo $navList;



			if($totalItems !== 0){ ?>
				<div class="row w-100 d-block d-md-none nav-menu-list-dropdown">
					<div class="col-12 p-0">
						<div class="dropdown w-100">
							<button class="btn btn-secondary btn-menu dropdown-toggle w-100" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								SELECIONE UMA REGIÃO
							</button>
							<div class="dropdown-menu w-100 p-0" aria-labelledby="dropdownMenu">
								<ul class="nav-menu-list-mobile dropdown-menu-list list-unstyled m-0">
									<?php
									if( have_rows('regioes_t1') ):
										while ( have_rows('regioes_t1') ) : the_row();
											echo '
											<li class="dropdown-menu-item d-flex justify-content-center">
												<a class="d-flex justify-content-center w-100" href="#section-' . get_sub_field("id_secao_t1") . '">
													' . get_sub_field("txt_menu_nav_t1") .'
												</a>
											</li>';
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php }




		}
		?>

		

	</div>
</section>

<?php
if( have_rows('regioes_t1') ):
	while ( have_rows('regioes_t1') ) : the_row();
		$titulo_regiao = get_sub_field("titulo_regiao_t1");
		$id_secao = get_sub_field("id_secao_t1");
		$show_regiao = get_sub_field("exibir_regiao_t1");
		$desc_regiao = get_sub_field("desc_regiao_t1");
		$show_menu_nav = get_sub_field("show_menu_nav_t1");
		$txt_menu_nav = get_sub_field("txt_menu_nav_t1");
		$bg_color_section = get_sub_field("bg_color_regiao_t1");

		if($show_regiao == 1){ ?>
			<section id="section-<?php echo $id_secao; ?>" class="container-fluid wrapper-campanha-section" style="background-color:<?php echo $bg_color_section; ?>;">
				<div class="container wrapper-inner campanha-section">

					<div class="row">
						<div class="col-12">
							<div class="section-content-header">
								<h2 class="section-content-title"><?php echo $titulo_regiao; ?></h2>
								<p class="section-content-text"><?php echo $desc_regiao; ?></p>
								<div class="section-content-title-separator"></div>
							</div>
						</div>
					</div>

					<div class="row">
						<?php
						if( have_rows('itens_da_regiao_t1') ):
							while ( have_rows('itens_da_regiao_t1') ) : the_row();
								$status_item_regiao = get_sub_field("status_item_t1");
								$bg_color_status_item_regiao = get_sub_field("bg_color_item_t1");
								$txt_regiao_item_regiao = get_sub_field("txt_regiao_t1");
								$produto_item_regiao = get_sub_field("nome_produto_t1");
								$box_item_regiao = get_sub_field("box_produto_t1");
								$img_item_regiao = get_sub_field("img_produto_t1");
								$img = wp_get_attachment_metadata( $img_item_regiao, true );
								$img_url = wp_get_attachment_url($img_item_regiao);
								$upload_dir = wp_upload_dir();
								$path_img =  dirname($img["file"]);
								$item_imovel_url = get_sub_field("url_produto_t1");
								$usar_610x400 = get_sub_field("usar_610x400");
								$img_produto_t1_610x400 = get_sub_field("img_produto_t1_610x400");
								$img_610x400 = wp_get_attachment_metadata( $img_produto_t1_610x400, true );
								$img_610x400_url = wp_get_attachment_url($img_produto_t1_610x400);
								?>

								<?php
								if($usar_610x400 == 1){ ?>
									<div class="campanha-item col-12 col-sm-12 col-md-6 col-lg-6">
										<div class="row d-flex justify-content-center">
											<div class="campanha-item-box col-8 col-sm-11 p-0" rel="noopener">
												<a href="<?php echo $item_imovel_url; ?>">
													<div class="campanha-item-imagem">
														<img class="img-fluid w-100" src="<?php echo $img_610x400_url; ?>" alt="<?php echo $produto_item_regiao; ?>">
														<p class="campanha-item-imagem-status"><?php echo $status_item_regiao; ?></p>
													</div>
													<div class="campanha-item-text">
														<div class="campanha-item-descricao">
															<p class="campanha-item-descricao-regiao"><?php echo $txt_regiao_item_regiao; ?></p>
															<p class="campanha-item-descricao-produto"><?php echo $produto_item_regiao; ?></p>
														</div>
														<div class="campanha-item-info">
															<p class="campanha-item-info-text"><?php echo $box_item_regiao; ?></p>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								<?php }
								else{ ?>
									<div class="campanha-item col-12 col-sm-6 col-md-4 col-lg-3">
										<div class="row d-flex justify-content-center">
											<div class="campanha-item-box col-8 col-sm-11 p-0">
												<a href="<?php echo $item_imovel_url; ?>" rel="noopener">
													<div class="campanha-item-imagem">
														<img class="img-fluid w-100" src="<?php echo $img_url; ?>" alt="<?php echo $produto_item_regiao; ?>">
														<p class="campanha-item-imagem-status"><?php echo $status_item_regiao; ?></p>
													</div>
													<div class="campanha-item-text">
														<div class="campanha-item-descricao">
															<p class="campanha-item-descricao-regiao"><?php echo $txt_regiao_item_regiao; ?></p>
															<p class="campanha-item-descricao-produto"><?php echo $produto_item_regiao; ?></p>
														</div>
														<div class="campanha-item-info">
															<p class="campanha-item-info-text"><?php echo $box_item_regiao; ?></p>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								<?php } ?>
							<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
			</section>
		<?php
		}
		?>

	<?php
	endwhile;
endif;

if (!empty($txt_legal)) {
	echo '<div class="container wrapper-inner campanha-texto-legal">
				<div class="row">
					<div class="col-12">
						<p>' . $txt_legal . '</p>
					</div>
				</div>
			</div>';
}
?>

