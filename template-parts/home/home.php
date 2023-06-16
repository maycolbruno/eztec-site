	<?php
	// HOMEPAGE

	$id_chat_param = 1; // inicia contador de chats

	?>

	<div class="container-fluid wrapper-home p-0">

		<header class="wrapper-banner">
			<?php
			$show_conteudo_pre_banner = get_field("show_conteudo_pre_banner_fl");

			if($show_conteudo_pre_banner == 1){
				$conteudo_pre_banner = get_field("conteudo_pre_banner_fl");
				echo $conteudo_pre_banner;
			}

			$headerTemplate = 'template-parts/header/banner-imagens-home';
			// Monta header template
			get_template_part( $headerTemplate, 'page' );
			?>
		</header>


		<?php
		$menu_regiao_titulo_fl = get_field("menu_regiao_titulo_fl");
		$count = 0;
		if( have_rows('menu_regiao_itens_fl') ):
			while ( have_rows('menu_regiao_itens_fl') ) : the_row();
				$itens_menu_regiao[$count]['txt'] = get_sub_field("menu_regiao_item_txt_fl");
				$itens_menu_regiao[$count]['url'] = get_sub_field("menu_regiao_item_url_fl");
				$count ++;
			endwhile;
		endif;
		?>
		<div class="wrapper-geral wrapper-buscas">
			<div class="wrapper-inner">
				<div class="wrap-buscas">
					<div class="container-fluid">
						<div class="row">
							<div class="buscas-regiao col-xl-7 col-lg-7 col-md-7 col-12 p-0">
								<div class="dropdown wrapper-dropdown-regiao">
									<div class="wrap-dropdown-regiao">
									    <div class="dropdown-regiao dropdown-toggle" type="button" id="dropdownMenuRegiao" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									      <?php echo $menu_regiao_titulo_fl; ?>
									    </div>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuRegiao">
											<?php
											foreach ($itens_menu_regiao as $i){
												echo '
												<a class="dropdown-item" href="' . $i["url"] . '">' . $i["txt"] . '</a>
												';
											}
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="buscas-avancada col-xl-5 col-lg-5 col-md-5 col-12">
								<div class="wrap-btn-busca-avancada-home">
									<a class="btn-busca-avancada-home" href="#modalBuscaAvancada" data-toggle="modal" data-target="#modalBuscaAvancada">
										BUSCA AVANÇADA
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		// Seções
		if( have_rows('secoes_de_conteudo_fl') ):
			while ( have_rows('secoes_de_conteudo_fl') ) : the_row();
				$show_session = get_sub_field("show_session_fl");
				$layout = get_sub_field("layout_secao_fl");
				if($show_session == 1){
					$tipo_de_layout = get_sub_field("layout_secao_fl");
					$isMobileVisible = "";
					$isMobileVisible = (get_sub_field("show_session_mobile_fl") == 1 ? '': 'd-none d-md-block');

					// Layout Lançamentos
					if ($tipo_de_layout == "lancamentos"){
						$bg_color = get_sub_field("bg_color_secao_lancamentos");
						$titulo_secao_lancamentos = get_sub_field("titulo_secao_lancamentos");
						$desc_secao_lancamentos = get_sub_field("desc_secao_lancamentos");
						$count = 0;
						if( have_rows('itens_secao_lancamentos') ):
							while ( have_rows('itens_secao_lancamentos') ) : the_row();
								$itens_lancamentos[$count]['status'] = get_sub_field("item_secao_lancamentos_status");
								$itens_lancamentos[$count]['titulo'] = get_sub_field("item_secao_lancamentos_titulo");
								$itens_lancamentos[$count]['regiao'] = get_sub_field("item_secao_lancamentos_regiao");
								$itens_lancamentos[$count]['box'] = get_sub_field("item_secao_lancamentos_box");
								$itens_lancamentos[$count]['img'] = get_sub_field("item_secao_lancamentos_img");
								$itens_lancamentos[$count]['url'] = get_sub_field("item_secao_lancamentos_url");
								$count ++;
							endwhile;
						endif;
						echo '
						<section class="wrapper-geral wrapper-home-section ' . $isMobileVisible . '" style="background-color:' . $bg_color . '">
							<div class="wrapper-inner">
								<div class="container-fluid">
									<div class="row">
										<div class="col-12">
											<h2 class="titulo-home">' . $titulo_secao_lancamentos . '</h2>
											<div class="divisor-titulo"></div>
											<p class="desc-home">' . $desc_secao_lancamentos . '</p>
										</div>';
										foreach($itens_lancamentos as $i){
										echo '
										<div class="item-secao-destaques col-xl-4 col-lg-4 col-md-6 col-12">
											<a href="' . $i["url"] . '">
												<div class="wrapper-content-secao-destaques">
													<img class="img-fluid w-100" src="' . wp_get_attachment_url($i["img"]) . '" alt="' . get_post_meta( $i["img"], "_wp_attachment_image_alt", true) . '">
													<div class="home-item-status">' . $i["status"] . '</div>
													<div class="wrap-item-titulo">
														<h3 class="item-home-titulo">' . $i["titulo"] . '</h3>
														<div class="item-home-regiao">' . $i["regiao"] . '</div>
														<div class="item-home-box">' . $i["box"] . '</div>
													</div>
												</div>
											</a>
										</div>
										';
										}
									echo '	
									</div>
								</div>
							</div>
						</section>
						';
					}

					// Layout Destaques
					if ($tipo_de_layout == "destaques"){
						$bg_color = get_sub_field("bg_color_secao_destaques");
						$titulo_secao_destaques = get_sub_field("titulo_secao_destaques");
						$desc_secao_destaques = get_sub_field("desc_secao_destaques");
						$item_main_secao_destaques_status = get_sub_field("item_main_secao_destaques_status");
						$item_main_secao_destaques_titulo = get_sub_field("item_main_secao_destaques_titulo");
						$item_main_secao_destaques_regiao = get_sub_field("item_main_secao_destaques_regiao");
						$item_main_secao_destaques_box = get_sub_field("item_main_secao_destaques_box");
						$item_main_secao_destaques_img = get_sub_field("item_main_secao_destaques_img");
						$item_main_secao_destaques_img_menor = get_sub_field("item_main_secao_destaques_img_menor");
						$item_main_secao_destaques_url = get_sub_field("item_main_secao_destaques_url");
						$count = 0;
						if( have_rows('itens_secao_destaques') ):
							while ( have_rows('itens_secao_destaques') ) : the_row();
								$itens_destaques[$count]['status'] = get_sub_field("item_secao_destaques_status");
								$itens_destaques[$count]['titulo'] = get_sub_field("item_secao_destaque_titulo");
								$itens_destaques[$count]['regiao'] = get_sub_field("item_secao_destaques_regiao");
								$itens_destaques[$count]['box'] = get_sub_field("item_secao_destaques_box");
								$itens_destaques[$count]['img'] = get_sub_field("item_secao_destaques_img");
								$itens_destaques[$count]['url'] = get_sub_field("item_secao_destaques_url");
								$count ++;
							endwhile;
						endif;
						echo '
						<section class="wrapper-geral wrapper-home-section ' . $isMobileVisible . '" style="background-color:' . $bg_color . '">
							<div class="wrapper-inner">
								<div class="container-fluid">
									<div class="row">
										<div class="col-12">
											<h2 class="titulo-home">' . $titulo_secao_destaques . '</h2>
											<div class="divisor-titulo"></div>
											<p class="desc-home">' . $desc_secao_destaques . '</p>
										</div>
										<div class="item-secao-destaques item-main col-xl-8 col-lg-8 col-12">
											<a href="' . $item_main_secao_destaques_url . '">
												<div class="wrapper-content-secao-destaques">
													<img class="img-fluid w-100 d-none d-md-block" src="' . wp_get_attachment_url($item_main_secao_destaques_img) . '" alt="' . get_post_meta( $item_main_secao_destaques_img, "_wp_attachment_image_alt", true) . '">
													<img class="img-fluid w-100 d-block d-md-none" src="' . wp_get_attachment_url($item_main_secao_destaques_img_menor) . '" alt="' . get_post_meta( $item_main_secao_destaques_img_menor, "_wp_attachment_image_alt", true) . '">
													<div class="home-item-status">' . $item_main_secao_destaques_status . '</div>
													<div class="wrap-item-titulo">
														<h3 class="item-home-titulo">' . $item_main_secao_destaques_titulo . '</h3>
														<div class="item-home-regiao">' . $item_main_secao_destaques_regiao . '</div>
														<div class="item-home-box">' . $item_main_secao_destaques_box . '</div>
													</div>
												</div>
											</a>
										</div>';
										foreach($itens_destaques as $i){
										echo '
										<div class="item-secao-destaques col-xl-4 col-lg-4 col-md-6 col-12">
											<a href="' . $i["url"] . '">
												<div class="wrapper-content-secao-destaques">
													<img class="img-fluid w-100" src="' . wp_get_attachment_url($i["img"]) . '" alt="' . get_post_meta( $i["img"], "_wp_attachment_image_alt", true) . '">
													<div class="home-item-status">' . $i["status"] . '</div>
													<div class="wrap-item-titulo">
														<h3 class="item-home-titulo">' . $i["titulo"] . '</h3>
														<div class="item-home-regiao">' . $i["regiao"] . '</div>
														<div class="item-home-box">' . $i["box"] . '</div>
													</div>
												</div>
											</a>
										</div>
										';
										}
									echo '	
									</div>
								</div>
							</div>
						</section>
						';
					}

					// Layout Livre
					if ($tipo_de_layout == "livre"){
						$livre_content = get_sub_field("conteudo_secao_livre");
						echo '
						<section class="wrapper-geral ' . $isMobileVisible . '">
							' . $livre_content . '
						</section>
						';
					}

					// Layout Blog
					if ($tipo_de_layout == "blog"){
						$bg_color = get_sub_field("bg_color_secao_blog");
						$bg_img = get_sub_field("bg_img_secao_blog");
						$status_secao_blog = get_sub_field("status_secao_blog");
						$titulo_secao_blog = get_sub_field("titulo_secao_blog");
						$txt_btn_secao_blog = get_sub_field("txt_btn_secao_blog");
						echo '
						<section class="wrapper-geral wrapper-home-section section-blog ' . $isMobileVisible . '" style="background-color:' . $bg_color . '; background-image:url(' . $bg_img . ');">
							<div class="wrapper-inner">
								<div class="status-titulo-home">' . $status_secao_blog . '</div>
								<h2 class="titulo-home">' . $titulo_secao_blog . '</h2>
								<div class="divisor-titulo"></div>
								<div id="carouselBlog" class="carousel slide" data-ride="carousel">
								  <div class="carousel-inner">';
								  	$blog_args = array(
				                    'post_type' => 'post',
				                    'post_status' => 'publish',
				                    'posts_per_page'=>3,
				                    'order'=>'ASC',
				                    );
								    $blog_query = new WP_Query( $blog_args );
								    $conta_posts = 1;
								    $active_class = "";
									// The Loop
									if ( $blog_query->have_posts() ) {
									    while ( $blog_query->have_posts() ) {
									    	if($conta_posts == 1){
									    		$active_class = " active";
									    	}
									    	else{
									    		$active_class = "";
									    	}
									        $blog_query->the_post();
									        $titulo_post = get_the_title();
									        $desc_post = get_the_excerpt();
									        $url_post = get_permalink();
									        $data_post = get_the_date();
									        echo '
									        <div class="carousel-item carousel-item-home-blog' . $active_class . '">
										      <div class="wrap-home-blog-item-content">
										      	<h3 class="home-blog-item-titulo">' . $titulo_post . '</h3>
										      	<p class="home-blog-item-data">' . $data_post . '</p>
										      	<p class="home-blog-item-desc">' . $desc_post . '</p>
									      		<div class="wrapper-btn-triangle">
											    	<a class="btn btn-primary btn-lg" href="' . $url_post . '">' . $txt_btn_secao_blog . '</a>
											    	<div class="triangle-top-right"></div>
											    </div>
										      </div>
										    </div>
									        ';
									        $conta_posts ++;
									    }
									}
									wp_reset_postdata();
								  echo '  
								  </div>
								  <a class="carousel-control-prev" href="#carouselBlog" role="button" data-slide="prev">
								    <span class="carousel-control-prev-icon" aria-hidden="true">
								    	<i class="seta-base-banner seta-left" aria-hidden="true"></i>
								    </span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselBlog" role="button" data-slide="next">
								    <span class="carousel-control-next-icon" aria-hidden="true">
								    	<i class="seta-base-banner seta-right" aria-hidden="true"></i>
								    </span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>
							</div>
						</section>
						';
					}


					// Layout Região
					if ($tipo_de_layout == "regiao"){
						$bg_color = get_sub_field("bg_color_secao_regiao");
						$titulo_secao_regiao = get_sub_field("titulo_secao_regiao_fl");
						$desc_secao_regiao = get_sub_field("desc_secao_regiao_fl");
						$count = 0;
						if( have_rows('itens_secao_regiao_fl') ):
							while ( have_rows('itens_secao_regiao_fl') ) : the_row();
								$itens_regiao[$count]['titulo'] = get_sub_field("item_secao_regiao_fl_titulo");
								$itens_regiao[$count]['url'] = get_sub_field("item_secao_regiao_fl_url");
								$itens_regiao[$count]['img'] = get_sub_field("item_secao_regiao_fl_img");
								$count ++;
							endwhile;
						endif;
						$total_regiao = count($itens_regiao);
						echo '
						<section class="wrapper-geral section-regiao wrapper-home-section ' . $isMobileVisible . '" style="background-color:' . $bg_color . '">
							<div class="wrapper-inner">
								<div class="container-fluid">
									<div class="row">
										<div class="col-12">
											<h2 class="titulo-home">' . $titulo_secao_regiao . '</h2>
											<div class="divisor-titulo"></div>
											<p class="desc-home">' . $desc_secao_regiao . '</p>
										</div>
										<div class="col-12">
											<div class="wrapper-slide-regiao-home d-none d-md-block d-lg-block d-xl-block">
												<div id="carouselRegiao" class="carousel slide" data-ride="">
												    <div class="carousel-inner">
													  	<div class="carousel-item carousel-item-home-regiao active">
														    <div class="container-fluid p-0">
														      	<div class="row p-0">';
																    $conta_regiao = 1;
																    foreach($itens_regiao as $i){
														      			echo '
														      			<div class="col-4">
														      				<a href="' . $i["url"] . '">
																      			<div class="item-home-regiao-content">
																      				<img class="d-block w-100" src="' . wp_get_attachment_url($i["img"]) . '" alt="' . $i["titulo"] . '">
																      				<div class="item-home-regiao-content-titulo">' . $i["titulo"] . '</div>
																      				<div class="detalheitem-home-regiao"></div>
																      			</div>
																      		</a>
															      		</div>
														      			';
														      			if (($conta_regiao % 3) === 0){
														      				if($conta_regiao === $total_regiao){
														      					echo '
														      					</div></div></div>';	
														      				}
														      				else{
														      					echo '
															      				</div></div></div>
															      				<div class="carousel-item carousel-item-home-regiao">
															      					<div class="container-fluid p-0">
																				      	<div class="row p-0">
															      				';
														      				}
														      			}
														      			else{
														      				if($conta_regiao === $total_regiao){
														      					echo '
														      					</div></div></div>';	
														      				}
														      			}
														      			$conta_regiao ++;
													      		    }											   
												echo '
													</div>
													<a class="carousel-control-prev" href="#carouselRegiao" role="button" data-slide="prev">
													    <span class="carousel-control-prev-icon" aria-hidden="true">
													    	<i class="seta-base-banner seta-left" aria-hidden="true"></i>
													    </span>
													    <span class="sr-only">Previous</span>
													</a>
													<a class="carousel-control-next" href="#carouselRegiao" role="button" data-slide="next">
													    <span class="carousel-control-next-icon" aria-hidden="true">
													    	<i class="seta-base-banner seta-right" aria-hidden="true"></i>
													    </span>
													    <span class="sr-only">Next</span>
													</a>
												</div>
											</div>

											<div class="wrapper-slide-regiao-home mobile d-block d-md-none d-lg-none d-xl-none">
												<div id="carouselRegiaoMobile" class="carousel slide" data-ride="">
												    <div class="carousel-inner">';
													$conta_regiao = 1;
													foreach($itens_regiao as $i){
														if($conta_regiao == 1){
															$active_class = " active";
														}
														else{
															$active_class = "";
														}
														echo '
													  	<div class="carousel-item carousel-item-home-regiao' . $active_class . '">
														    <div class="container-fluid p-0">
														      	<div class="row p-0">
														      			<div class="col-12">
															      			<div class="item-home-regiao-content">
															      				<img class="d-block w-100" src="' . wp_get_attachment_url($i["img"]) . '" alt="' . $i["titulo"] . '">
															      				<div class="item-home-regiao-content-titulo">' . $i["titulo"] . '</div>
															      				<div class="detalheitem-home-regiao"></div>
															      			</div>
															      		</div>
														      	</div>
												   			</div>
												    	</div>
												    	';
														$conta_regiao ++;
													}
												echo '
											    </div>
											    <a class="carousel-control-prev" href="#carouselRegiaoMobile" role="button" data-slide="prev">
												    <span class="carousel-control-prev-icon" aria-hidden="true">
												    	<i class="seta-base-banner seta-left" aria-hidden="true"></i>
												    </span>
												    <span class="sr-only">Previous</span>
												</a>
												<a class="carousel-control-next" href="#carouselRegiaoMobile" role="button" data-slide="next">
												    <span class="carousel-control-next-icon" aria-hidden="true">
												    	<i class="seta-base-banner seta-right" aria-hidden="true"></i>
												    </span>
												    <span class="sr-only">Next</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					';
				}


			}
		endwhile;
	endif;
	?>

</div>
