<?php
// Seção Compliance


// Captura informações do CMS
$titulo_secao_compliance = get_field("titulo_secao_compliance");
$desc_secao_compliance = get_field("desc_secao_compliance");
$subtitulo_secao_compliance = get_field("subtitulo_secao_compliance");
$imagem_secao_compliance = get_field("imagem_secao_compliance");
$count = 0;
if( have_rows('btns_secao_compliance') ):
	while ( have_rows('btns_secao_compliance') ) : the_row();
		$btns[$count]['txt'] = get_sub_field("btn_compliance_txt");
		$btns[$count]['url'] = get_sub_field("btn_compliance_url");
		$count ++;
	endwhile;
endif;
?>

<section id="compliance" class="container-fluid wrapper-a-eztec-section wrapper-a-eztec-compliance">
	<div class="container wrapper-inner a-eztec-compliance">
		<div class="row a-eztec-compliance-content">
			<div class="col-md-12 col-lg-6">
				<div class="section-content-header d-flex align-items-start flex-column">
					<h2 class="section-content-pre-title text-left"><?php echo $titulo_secao_compliance; ?></h2>
					<p class="section-content-title text-left"><?php echo $subtitulo_secao_compliance; ?></p>
					<div class="section-content-title-separator"></div>
				</div>
				<p class="a-eztec-compliance-content-desc"><?php echo $desc_secao_compliance; ?></p>
			</div>
			<div class="img-compliance col-6 d-none d-md-none d-lg-block">
				<img src="<?php echo $imagem_secao_compliance; ?>" alt="Compliance">
			</div>
		</div>
		<div class="row">
			<?php
			foreach($btns as $i){
				echo '
				<div class="col-xl-3 col-lg-3 col-md-3 col-6">
					<a class="btn btn-primary btn-compliance" rel="noopener" target="_blank" href="' . $i["url"] . '">' . $i["txt"] . '</a>
				</div>
				';
			}
			?>
		</div>
	</div>
</section>