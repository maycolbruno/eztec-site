<?php
// PÁGINA A EZTEC
?>

<div class="container-fluid wrapper-a-eztec p-0">

	<header class="wrapper-banner">
		<?php
		// Monta cabçalho de banner
		get_template_part( 'template-parts/header/banner', 'page' );

		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<?php //Menu de Navegação de seções ?>
	<div class="wrapper-nav-menu">
		<div class="container wrapper-inner nav-menu d-flex justify-content-center">

			<ul class="nav-menu-list list-unstyled list-inline d-none d-sm-none d-md-flex flex-colunm">
				<?php
				if (get_field("show_historia") == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center w-100 align-items-center" style="text-align: center; height:70px;" href="#historia">' . get_field("texto_menu_superior_historia") . '</a></li>';
				}
				if (get_field("show_missao_visao") == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center w-100 align-items-center" style="text-align: center; height:70px;" href="#missao-visao">' . get_field("texto_menu_superior_missao_visao") . '</a></li>';
				}
				if (get_field("show_diferenciais") == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center w-100 align-items-center" style="text-align: center; height:70px;" href="#diferenciais">' . get_field("texto_menu_superior_diferenciais") . '</a></li>';
				}
				if (get_field("show_compliance") == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center w-100 align-items-center" style="text-align: center; height:70px;" href="#compliance">' . get_field("texto_menu_superior_compliance") . '</a></li>';
				}
				if (get_field("show_premios") == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center w-100 align-items-center" style="text-align: center; height:70px;" href="#premios">' . get_field("texto_menu_superior_premios") . '</a></li>';
				}
				if (get_field("show_qualidade") == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center w-100 align-items-center" style="text-align: center; height:70px;" href="#qualidade">' . get_field("texto_menu_superior_qualidade") . '</a></li>';
				}
				if (get_field("show_videos") == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center w-100 align-items-center" style="text-align: center; height:70px;" href="#videos">' . get_field("texto_menu_superior_video") . '</a></li>';
				}
				?>
			</ul>

			<div class="row w-100 d-block d-md-none nav-menu-list-dropdown">
				<div class="col-12 p-0">
					<div class="dropdown w-100">
						<button class="btn btn-secondary btn-menu dropdown-toggle w-100" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							SELECIONE UMA SEÇÃO
						</button>
						<div class="dropdown-menu w-100 p-0" aria-labelledby="dropdownMenu">
							<ul class="nav-menu-list-mobile dropdown-menu-list list-unstyled m-0">
								<?php
								if (get_field("show_historia") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#historia">' . get_field("texto_menu_superior_historia") . '</a></li>';
								}
								if (get_field("show_missao_visao") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#missao-visao">' . get_field("texto_menu_superior_missao_visao") . '</a></li>';
								}
								if (get_field("show_diferenciais") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#diferenciais">' . get_field("texto_menu_superior_diferenciais") . '</a></li>';
								}
								if (get_field("show_compliance") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#compliance">' . get_field("texto_menu_superior_compliance") . '</a></li>';
								}
								if (get_field("show_premios") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#premios">' . get_field("texto_menu_superior_premios") . '</a></li>';
								}
								if (get_field("show_qualidade") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#qualidade">' . get_field("texto_menu_superior_qualidade") . '</a></li>';
								}
								if (get_field("show_videos") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#videos">' . get_field("texto_menu_superior_video") . '</a></li>';
								}
								if (get_field("show_contato") == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#contato">' . get_field("texto_menu_superior_contato") . '</a></li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php
		// Seção História
		if (get_field("show_historia") == 1){
			get_template_part( 'template-parts/a-eztec/historia', 'page' );
		}
	?>

	<?php
		// Seção Missão e Visão
		if (get_field("show_missao_visao") == 1){
			get_template_part( 'template-parts/a-eztec/missao-visao', 'page' );
		}
	?>

	<?php
		// Seção Diferenciais
		if (get_field("show_diferenciais") == 1){
			get_template_part( 'template-parts/a-eztec/diferenciais', 'page' );
		}
	?>

	<?php
		// Seção Compliance
		if (get_field("show_compliance") == 1){
			get_template_part( 'template-parts/a-eztec/compliance', 'page' );
		}
	?>

	<?php
		// Seção Prêmios
		if (get_field("show_premios") == 1){
			get_template_part( 'template-parts/a-eztec/premios', 'page' );
		}
	?>

	<?php
		// Seção Qualidade
		if (get_field("show_qualidade") == 1){
			get_template_part( 'template-parts/a-eztec/qualidade', 'page' );
		}
	?>

	<?php
		// Seção Vídeos
		if (get_field("show_videos") == 1){
			get_template_part( 'template-parts/a-eztec/videos', 'page' );
		}
	?>

	<?php
		// Seção Contato
		if (get_field("show_contato") == 1){
			get_template_part( 'template-parts/a-eztec/contato', 'page' );
		}
	?>

</div>