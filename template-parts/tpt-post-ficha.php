<?php
/*
 * Template Name: Ficha de Corretor
 * Template Post Type: ficha
 */


// Dados do CMS
$tpt_ficha_titulo = get_field("tpt_ficha_titulo");
$count = 1;
if( have_rows('tpt_ficha_itens_de_conteudo') ):
	while ( have_rows('tpt_ficha_itens_de_conteudo') ) : the_row();
		$itens_ficha[$count]['titulo'] = get_sub_field("tpt_ficha_item_titulo");
		$itens_ficha[$count]['is_gallery'] = get_sub_field("tpt_ficha_is_gallery");
		$titulo = get_sub_field("tpt_ficha_item_titulo");
		$countsub = 0;
		if( have_rows('tpt_ficha_gallery_itens') ):
			while ( have_rows('tpt_ficha_gallery_itens') ) : the_row();
				$subitens_galeria[$count][$countsub]['titulo'] = $titulo;
				$subitens_galeria[$count][$countsub]['label'] = get_sub_field("tpt_ficha_galeria_titulo");
				$subitens_galeria[$count][$countsub]['img'] = get_sub_field("tpt_ficha_galeria_img");
				$countsub ++;
			endwhile;
		endif;
		$countsub = 0;
		if( have_rows('tpt_ficha_subitens') ):
			while ( have_rows('tpt_ficha_subitens') ) : the_row();
				$subitens_ficha[$count][$countsub]['titulo'] = $titulo;
				$subitens_ficha[$count][$countsub]['index'] = get_sub_field("tpt_ficha_subitem_index");
				$subitens_ficha[$count][$countsub]['content'] = get_sub_field("tpt_ficha_subitem_content");
				$countsub ++;
			endwhile;
		endif;
		$count ++;
	endwhile;
endif;

get_header(); ?>

<style>
	body {
		padding-top: 20px;
	}
</style>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post(); ?>

			<div class="wrapper-geral wrapper-geral-ficha">
				<div class="wrapper-inner">
					<h1><?php echo $tpt_ficha_titulo; ?></h1>
					<?php
					$conta = 0;
					echo '<div id="accordion">';
						foreach ($itens_ficha as $item){
							$t = $item["titulo"];
							echo '
							<div class="card">
							    <div class="card-header" id="heading' . $conta . '">
							      <h2 class="mb-0">
							        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse' . $conta . '" aria-expanded="true" aria-controls="collapse' . $conta . '">
							          <p>' . $item["titulo"] . '</p>
							        </button>
							      </h2>
							    </div>';
							    if ($item["is_gallery"] == 1){
							    	echo '
								    <div id="collapse' . $conta . '" class="collapse" aria-labelledby="heading' . $conta . '" data-parent="#accordion" style="background-color: #f0f0f0;">
								      <div class="card-body">';
								      foreach($subitens_galeria as $subitem){
								      		echo '
								      		<div class="item-galeria" style="text-align:center;">';
											  	foreach($subitem as $i){
													if($i["titulo"] == $t){
														echo '
														<p style="margin: 35px 0 0;">' . $i["label"] . '</p>
														<img src="' . $i["img"] . '" style="margin: 0 0 50px; max-width: 820px; width: 100%;">';
													}
												}    
											echo '
											</div>
								      		';
										}  
								      echo '
								      </div>
								    </div>';
							    }
							    else{
							    	echo '
								    <div id="collapse' . $conta . '" class="collapse" aria-labelledby="heading' . $conta . '" data-parent="#accordion" style="background-color: #f0f0f0;">
								      <div class="card-body">';
								      foreach($subitens_ficha as $subitem){
								      		echo '
								      		<table class="table table-striped" style="margin-bottom: 0;">
											  <tbody>';
											  	foreach($subitem as $i){
													if($i["titulo"] == $t){
														echo '
														<tr>
															<td style="border: 1px solid #ccc;">' . $i["index"] . '</td>
															<td style="border: 1px solid #ccc;">' . $i["content"] . '</td>
														</tr>';
													}
												}    
											    echo '
											  </tbody>
											</table>
								      		';
										}  
								      echo '
								      </div>
								    </div>';
							    }
							    
							echo '
						  	</div>
							';
							$conta ++;
						}
					echo '</div>';
					?>
				</div>
			</div>

		<?php endwhile;
		?>

	</main>
</div>

<?php
get_footer();
