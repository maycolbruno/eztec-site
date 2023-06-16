<?php
// Seção Downloads da página de produto
//
//
// Captura informações do CMS
$count = 1;
if( have_rows('itens_de_download') ):
	while ( have_rows('itens_de_download') ) : the_row();
		$download_item[$count]['txt'] = get_sub_field("txt_desc_download");
		$download_item[$count]['btn'] = get_sub_field("txt_btn_download");
		$download_item[$count]['file'] = get_sub_field("arquivo_download");
		$download_item[$count]['window'] = get_sub_field("new_window_download");
		$download_item[$count]['icon'] = get_sub_field("icon_btn_download");
		$count ++;
	endwhile;
endif;
?>

<section id="downloads" class="container-fluid wrapper-downloads wrapper-downloads-imovel">
	<div class="container wrapper-inner wrapper-downloads-body downloads-form">
		<?php
		 $count = 1;
		 foreach($download_item as $item){
			$target_window = "";
			if($item["window"] == 1){
				$target_window = ' target="_blank" rel="noopener"';
			}
			echo '
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 desc-item-download">
						<p>' . $item["txt"] . '</p>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 btn-item-download">
						<div class="wrapper-btn-triangle">
					    	<a id="download-' . $count . '" class="btn btn-alert" href="' . $item["file"] . '"' . $target_window . '><img src="' . $item["icon"] . '">' . $item["btn"] . '</a>
					    	<div class="triangle-top-right"></div>
					    </div>
					</div>
				</div>
			';
			$count ++;
		} ?>
		
	</div>
</section>