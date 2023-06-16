<?php
// PÁGINA DE PRODUTO

$monta_galeria = 0;
if (get_field("exibir_apartamentos") == 1){
	$monta_galeria = 1;
}
if (get_field("exibir_plantas") == 1){
	$monta_galeria = 1;
}
if (get_field("exibir_lazer") == 1){
	$monta_galeria = 1;	
}

$monta_videos = 0;
if (get_field("exibir_videos") == 1){
	$monta_videos = 1;
}
if (get_field("exibir_tour") == 1){
	$monta_videos = 1;	
}
?>

<div class="container-fluid wrapper-imovel p-0">

	<header class="wrapper-banner">
		<?php
		// Monta header template
		get_template_part( 'template-parts/header/banner-imagens-imovel', 'page' );
		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<?php //Menu de Navegação de seções ?>
	<div class="wrapper-nav-menu">
		<div class="container wrapper-inner nav-menu d-flex justify-content-center">

			<ul class="nav-menu-list list-unstyled list-inline d-none d-sm-none d-md-flex flex-colunm">
				<?php
				if (get_field("exibir_caracteristicas") == 1){
					if (get_field("exibir_menu_nav_carac") == 1){
						echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#caracteristicas">' . get_field("txt_menu_nav_carac") . '</a></li>';
					}
				}
				if ($monta_galeria == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#galerias">GALERIA</a></li>';
				}
				if (get_field("exibir_downloads") == 1){
					if (get_field("exibir_menu_nav_downloads") == 1){
						echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#downloads">' . get_field("txt_menu_nav_downloads") . '</a></li>';
					}
				}
				if ($monta_videos == 1){
					echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#videos">VÍDEOS</a></li>';
				}
				if (get_field("exibir_regiao") == 1){
					if (get_field("exibir_menu_nav_regiao") == 1){
						echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#regiao">' . get_field("txt_menu_nav_regiao") . '</a></li>';
					}
				}
				if (get_field("exibir_obra") == 1){
					if (get_field("exibir_menu_nav_obra") == 1){
						echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#obra">' . get_field("txt_menu_nav_obra") . '</a></li>';
					}
				}
				if (get_field("exibir_contato") == 1){
					if (get_field("exibir_menu_nav_contato") == 1){
						echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#contato">' . get_field("txt_menu_nav_contato") . '</a></li>';
					}
				}
				if (get_field("exibir_relacionados") == 1){
					if (get_field("exibir_menu_nav_relacionados") == 1){
						echo '<li class="nav-menu-item list-inline-item"><a class="d-flex justify-content-center" href="#relacionados">' . get_field("txt_menu_nav_relacionados") . '</a></li>';
					}
				}
				?>
			</ul>

			<div class="mobile-selector row w-100 d-block d-md-none nav-menu-list-dropdown">
				<div class="col-12 p-0">
					<div class="dropdown w-100">
						<button class="btn btn-secondary btn-menu dropdown-toggle w-100" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							SELECIONE UMA SEÇÃO
						</button>
						<div class="dropdown-menu w-100 p-0" aria-labelledby="dropdownMenu">
							<ul class="nav-menu-list-mobile dropdown-menu-list list-unstyled m-0">
								<?php
								if (get_field("exibir_caracteristicas") == 1){
									if (get_field("exibir_menu_nav_carac") == 1){
										echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#caracteristicas">' . get_field("txt_menu_nav_carac") . '</a></li>';
									}
								}
								if ($monta_galeria == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#galerias">GALERIA</a></li>';
								}
								if (get_field("exibir_downloads") == 1){
									if (get_field("exibir_menu_nav_downloads") == 1){
										echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#downloads">' . get_field("txt_menu_nav_downloads") . '</a></li>';
									}
								}
								if ($monta_videos == 1){
									echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#videos">VÍDEOS</a></li>';
								}
								if (get_field("exibir_regiao") == 1){
									if (get_field("exibir_menu_nav_regiao") == 1){
										echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#regiao">' . get_field("txt_menu_nav_regiao") . '</a></li>';
									}
								}
								if (get_field("exibir_obra") == 1){
									if (get_field("exibir_menu_nav_obra") == 1){
										echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#obra">' . get_field("txt_menu_nav_obra") . '</a></li>';
									}
								}
								if (get_field("exibir_contato") == 1){
									if (get_field("exibir_menu_nav_contato") == 1){
										echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#contato">' . get_field("txt_menu_nav_contato") . '</a></li>';
									}
								}
								if (get_field("exibir_relacionados") == 1){
									if (get_field("exibir_menu_nav_relacionados") == 1){
										echo '<li class="dropdown-menu-item d-flex justify-content-center"><a class="d-flex justify-content-center w-100" href="#relacionados">' . get_field("txt_menu_nav_relacionados") . '</a></li>';
									}
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

		// Seção Características
		if (get_field("exibir_caracteristicas") == 1){
			get_template_part( 'template-parts/produto/caracteristicas', 'page' );
		}

		// Seção Galeria
		if ($monta_galeria == 1){
			get_template_part( 'template-parts/produto/galeria', 'page' );
		}

		// Seção Downloads
		if (get_field("exibir_downloads") == 1){
			get_template_part( 'template-parts/produto/downloads', 'page' );
		}

		// Seção Vídeos
		if ($monta_videos == 1){
			get_template_part( 'template-parts/produto/videos', 'page' );
		}

		// Seção Região
		if (get_field("exibir_regiao") == 1){
			get_template_part( 'template-parts/produto/regiao', 'page' );
		}

		// Seção Obra
		if (get_field("exibir_obra") == 1){
			get_template_part( 'template-parts/produto/obra', 'page' );
		}

		// Seção Ficha Técnica
		if (get_field("mostrar_ficha_tecnica") == 1){
			get_template_part( 'template-parts/produto/ficha-tecnica', 'page' );
		}		

		// Seção Contato
		if (get_field("exibir_contato") == 1){
			get_template_part( 'template-parts/produto/contato', 'page' );
		}

		// Seção Relacionados
		if (get_field("exibir_relacionados") == 1){
			get_template_part( 'template-parts/produto/relacionados', 'page' );
		}

	?>

</div>