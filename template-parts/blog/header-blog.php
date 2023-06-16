<?php
$blogez_logo = get_field("blogez_logo",311);
$blogez_search_txt = get_field("blogez_search_txt",311);
$count = 1;
if( have_rows('blogez_menu_categorias',311) ):
	while ( have_rows('blogez_menu_categorias',311) ) : the_row();
		$itens_menu[$count]['txt'] = get_sub_field("blogez_menu_item_txt");
		$itens_menu[$count]['url'] = get_category_link(get_sub_field("blogez_menu_item_url"));
		$count ++;
	endwhile;
endif;
?>

<div class="wrapper-geral blog-header">
	<div class="wrapper-inner">
		<div class="blog-header-content">
			<h1><img class="logo-blogez" src="<?php echo $blogez_logo; ?>" alt="BlogEz"></h1>
			<div class="wrapper-search-blog-form">
				<form role="search" action="<?php echo site_url('/blog-resultados-de-busca'); ?>" method="get" id="searchformblog">
					<div class="wrap-inputs-search-blog">
					    <input type="text" name="termo" class="search-blog-input" placeholder="<?php echo $blogez_search_txt; ?>"/>
					    <input type="submit" alt="Search" value="" class="search-blog-submit" style="background-image:url(<?php echo wp_get_attachment_url(get_field('icon_busca_fl',311)); ?>);"/>
					</div>
				</form>
			</div>
		</div>
		<div class="wrap-menu-categorias d-flex justify-content-between">
			<?php
			foreach($itens_menu as $i){
				echo '
				<a class="item-menu-categoria-link" href="' . $i["url"] . '">' . $i["txt"] . '</a>
				';
			}
			?>
		</div>
		<div class="wrap-menu-categorias mobile">
			<div id="accordionMenuCategorias" class="col-lg-3 col-12">
				<div class="card">
				    <div class="" id="headingMenuCategorias">
				        <div class="" data-toggle="collapse" data-target="#collapseMenuCategorias" aria-expanded="true" aria-controls="collapseMenuCategorias">
				        	<div class="wrapper-titlulo-menu-categorias d-flex justify-content-between">
					          	<p class="nome-menu-categorias">CATEGORIAS</p>
					          	<i class="seta-menu-categorias" id="SetaMenuCategorias" aria-hidden="true"></i>
				        	</div>
				    	</div>
					</div>
					<div id="collapseMenuCategorias" class="collapse" aria-labelledby="headingMenuCategorias" data-parent="#accordionMenuCategorias">
				      	<div class="">
					        <?php
							foreach ($itens_menu as $i){
								echo '<a href="' . $i["url"] . '" class="link-menu-categorias">
										<p class="menu-categorias-item">' . $i["txt"] . '</p>
									  </a>';
							}
							?>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#collapseMenuCategorias').on('show.bs.collapse', function () {
	  document.getElementById("SetaMenuCategorias").style.transform = "rotate(225deg)";
	  document.getElementById("SetaMenuCategorias").style.marginTop = "10px";
	})
	$('#collapseMenuCategorias').on('hide.bs.collapse', function () {
	  document.getElementById("SetaMenuCategorias").style.transform = "rotate(45deg)";
	  document.getElementById("SetaMenuCategorias").style.marginTop = "0";
	})
</script>