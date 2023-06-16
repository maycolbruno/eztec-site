<?php
// Bloco de copyright e menu para o rodapé

// Captura dados do CMS
$texto_copyright = get_field("texto_copyright",310);
$count = 0;
if( have_rows('menu_rodape',310) ):
	while ( have_rows('menu_rodape',310) ) : the_row();
		$menu_itens[$count]['titulo'] = get_sub_field("txt_menu_item_footer");
		$menu_itens[$count]['url'] = get_sub_field("page_menu_item_footer");
		$menu_itens[$count]['tem-link-externo'] = get_sub_field("link_e_externo");
		$menu_itens[$count]['link-externo'] = get_sub_field("url_externo");
		$count ++;
	endwhile;
endif;
?>
<section class="container-fluid section-footer-copyright">
	<div class="wrapper-inner">
		<div class="wrap-copyright-footer">
			<div class="menu-footer row d-flex align-items-center">
				<div class="menu-footer-copyright col-sm-12 col-md-4 pr-0">
					<p><?php echo $texto_copyright; ?></p>
				</div>
				<div class="menu-footer-items col-sm-12 col-md-8 pl-0">
					<ul class="list-unstyled list-inline">
						<?php
						foreach ($menu_itens as $menu_item){
							if($menu_item['tem-link-externo'] == 1){
								$target = ' target="_blank" rel="noopener"';
								$url = $menu_item['link-externo'];
							}
							else{
								$target = '';
								$url = $menu_item['url'];
							}
							echo '<li class="menu-footer-item list-menu-footer-item">
									<a href="' . $url . '"' . $target . '>' . $menu_item["titulo"] . '</a>
									</li>';
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>