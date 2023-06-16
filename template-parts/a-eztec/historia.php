<?php
// Seção História de A EZTEC
//
//
// Captura informações do CMS
$titulo_secao = get_field("titulo_secao_historia");
$subtitulo_secao = get_field("subtitulo_secao_historia");
$desc_secao = get_field("desc_secao_historia");
$img_secao = wp_get_attachment_url(get_field("imagem_secao_historia"));
$alt_img_secao = get_post_meta( get_field('imagem_secao_historia'), '_wp_attachment_image_alt', true);
$titulo_valores_principios = get_field("titulo_valores_e_principios");
$count = 0;
if( have_rows('itens_de_valores_e_principios') ):
	while ( have_rows('itens_de_valores_e_principios') ) : the_row();
		$valores[$count]['icone'] = wp_get_attachment_url(get_sub_field("icone_item_valores_e_principios"));
		$valores[$count]['alt'] = get_post_meta(get_sub_field("icone_item_valores_e_principios"));
		$valores[$count]['titulo'] = get_sub_field("titulo_item_valores_e_principios");
		$count ++;
	endwhile;
endif;
$bg_historico = wp_get_attachment_url(get_field("bg_status_historico"));
$qtde_imoveis = get_field("qtde_imoveis_status_historico");
$titulo_imoveis = get_field("txt_imoveis_status_historico");
$qtde_metros = get_field("qtde_metros_status_historico");
$titulo_metros = get_field("txt_metros_status_historico");
$qtde_unidades = get_field("qtde_unidades_status_historico");
$titulo_unidades = get_field("txt_unidades_status_historico");
?>

<section id="historia" class="container-fluid wrapper-a-eztec-section wrapper-a-eztec-historia pb-0">
	<div class="container wrapper-inner a-eztec-historia">
		<div class="row a-eztec-historia-content">
			<div class="col-md-12 col-lg-6">
				<div class="section-content-header d-flex align-items-start flex-column">
					<h2 class="section-content-pre-title text-left"><?php echo $titulo_secao; ?></h2>
					<p class="section-content-title text-left"><?php echo $subtitulo_secao; ?></p>
					<div class="section-content-title-separator"></div>
				</div>
				<p class="a-eztec-historia-content-desc"><?php echo $desc_secao; ?></p>
			</div>
			<div class="img-historia col-6 d-none d-md-none d-lg-block">
				<img src="<?php echo $img_secao; ?>" alt="<?php echo $alt_img_secao; ?>">
			</div>
		</div>
		<div class="row a-eztec-historia-content-valores">
			<div class="col-12">
				<div class="row a-eztec-historia-content-valores-titulo">
					<div class="col-12">
						<p><?php echo $titulo_valores_principios; ?></p>
					</div>
				</div>
				<div class="row">
					<?php
					foreach ($valores as $valor){
						echo '<div class="col-6 col-md-4 col-lg">
								<div class="a-eztec-historia-content-valores-item d-flex justify-content-center align-items-center flex-column">
									<img src="' . $valor["icone"] . '" alt="' . $valor["alt"] . '">
									<p>' . $valor["titulo"] . '</p>
								</div>
							</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="a-eztec-historia-dados" style="background-image:url(<?php echo $bg_historico ?>);">
		<div class="container-fluid wrapper-inner a-eztec-historia-dados-box">
			<div class="row">
				<div class="col-12 col-md-4">
					<div class="a-eztec-historia-dados-box-item d-flex justify-content-center align-items-center flex-column">
						<span class="a-eztec-historia-dados-box-item-qtde"><?php echo $qtde_imoveis; ?></span>
						<hr class="a-eztec-historia-dados-box-item-divisor">
						<span class="a-eztec-historia-dados-box-item-titulo"><?php echo $titulo_imoveis; ?></span>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="a-eztec-historia-dados-box-item d-flex justify-content-center align-items-center flex-column">
						<span class="a-eztec-historia-dados-box-item-qtde"><?php echo $qtde_metros; ?></span>
						<hr class="a-eztec-historia-dados-box-item-divisor">
						<span class="a-eztec-historia-dados-box-item-titulo"><?php echo $titulo_metros; ?></span>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="a-eztec-historia-dados-box-item d-flex justify-content-center align-items-center flex-column">
						<span class="a-eztec-historia-dados-box-item-qtde"><?php echo $qtde_unidades; ?></span>
						<hr class="a-eztec-historia-dados-box-item-divisor">
						<span class="a-eztec-historia-dados-box-item-titulo"><?php echo $titulo_unidades; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>