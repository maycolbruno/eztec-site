<?php
// Página Cidade Maia

// Captura informações do CMS
$status_complexo = get_field("complexo_status");
$titulo_complexo = get_field("complexo_titulo");
$logo_complexo = get_field("complexo_logo");
$box_complexo = get_field("complexo_box");
$box_adicional_complexo = get_field("complexo_box_adicional");
$desc_complexo = get_field("complexo_desc");
$intro_txt_complexo = get_field("complexo_intro_txt");
$show_bcontato = get_field("show_barra_contato");
$img_complexo = get_field("complexo_img");
$count = 1;
if( have_rows('itens_do_complexo') ):
	while ( have_rows('itens_do_complexo') ) : the_row();
		$complexo_itens[$count]['titulo'] = get_sub_field("item_complexo_titulo");
		$complexo_itens[$count]['regiao'] = get_sub_field("item_complexo_regiao");
		$complexo_itens[$count]['desc'] = get_sub_field("item_complexo_desc");
		$complexo_itens[$count]['box'] = get_sub_field("item_complexo_box");
		$complexo_itens[$count]['chamada'] = get_sub_field("item_complexo_chamada_over");
		$complexo_itens[$count]['call'] = get_sub_field("item_complexo_txt_call");
		$complexo_itens[$count]['url'] = get_sub_field("item_complexo_url");
		$complexo_itens[$count]['icon_corretor'] = get_sub_field("item_complexo_icon_corretor");
		$complexo_itens[$count]['txt_corretor'] = get_sub_field("item_complexo_txt_corretor");
		$complexo_itens[$count]['status'] = get_sub_field("item_complexo_status");
		$complexo_itens[$count]['bg_status'] = get_sub_field("item_complexo_bg_color_status");
		$complexo_itens[$count]['imovel_id'] = get_sub_field("item_complexo_imovel_chat");
		$complexo_itens[$count]['img'] = get_sub_field("item_complexo_img");
		$count ++;
	endwhile;
endif;

// Captura informações do CMS para modal de chat online
$titulo_chat_modal = get_field("chat_modal_titulo",1661);
$txt_btn_fb = get_field("chat_modal_txt_fb",1661);
$icon_btn_fb = get_field("chat_modal_icon_fb",1661);
$txt_btn_google = get_field("chat_modal_txt_google",1661);
$icon_btn_google = get_field("chat_modal_icon_google",1661);
$intro_msg_chat = get_field("chat_modal_intro_msg",1661);
$label_nome_chat = get_field("chat_modal_label_nome",1661);
$label_email_chat = get_field("chat_modal_label_email",1661);
$label_tel_chat = get_field("chat_modal_label_telefone",1661);
$label_imovel_chat = get_field("chat_modal_label_imovel",1661);
$txt_obrigatorios_chat = get_field("chat_modal_txt_obrigatorios",1661);
$txt_news_chat = get_field("chat_modal_txt_news",1661);
$txt_btn_chat = get_field("chat_modal_btn_iniciar",1661);
?>

<div class="container-fluid wrapper-imovel p-0">

	<header class="wrapper-banner">
		<?php
		// Monta cabeçalho de banner
		get_template_part( 'template-parts/header/banner', 'page' );

		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>

	<section class="container wrapper-inner wrapper-imovel-content">

		<div class="row">
			<div class="col-12">
				<div class="section-content-header d-flex align-items-center flex-column">
					<p class="section-content-pre-title"><?php echo $status_complexo; ?></p>
					<h2 class="section-content-title text-center"><?php echo $titulo_complexo; ?></h2>
					<div class="section-content-title-separator"></div>
				</div>
			</div>
		</div>

		<div class="row imovel-imagem d-flex justify-content-center">
			<div class="col-sm-12 col-md-8">
				<img class="img-fluid" src="<?php echo wp_get_attachment_url($img_complexo); ?>" alt="<?php echo get_post_meta( $img_complexo, "_wp_attachment_image_alt", true) ?>">
			</div>
		</div>

		<div class="row imovel-logo d-flex justify-content-center">
			<div class="col-8 d-flex justify-content-center align-items-center">
				<img class="img-fluid" src="<?php echo wp_get_attachment_url($logo_complexo); ?>" alt="<?php echo get_post_meta( $logo_complexo, "_wp_attachment_image_alt", true) ?>">
			</div>
		</div>

		<div class="row imovel-info">
			<div class="col d-flex align-items-center justify-content-center">
				<?php echo $box_complexo; ?>
			</div>
			<?php
			if ($box_adicional_complexo !== "") {
				echo '
				<div class="col imovel-info-box-dividido d-flex align-items-center justify-content-center">
					' . $box_adicional_complexo . '
				</div>
				';
			}
			?>
		</div>

		<div class="row imovel-descricao">
			<div class="col-12">
				<p><?php echo $desc_complexo; ?></p>
			</div>
		</div>

		<div class="row imovel-introducao">
			<div class="col-12 text-center">
				<p><?php echo $intro_txt_complexo; ?></p>
			</div>
		</div>

		<div class="row imovel-item">
		<?php
		$conta_chat_ids = 1;
		foreach ($complexo_itens as $item) {
			$imovel_current_id = $item['imovel_id'];
			$shortcode_chat = '[mi_chat imovel_id="' . $item['imovel_id'] . '" chat_id="' . $conta_chat_ids . '"]';
			echo '
			<div class="col-12 col-md-6 col-lg-12">
				<a href="' . $item["url"] . '">
					<div class="row imovel-item-box ml-0 mr-0">
						<div class="imovel-item-imagem col-md-12 col-lg-6 p-0">
							<p class="imovel-item-imagem-status" style="background-color:' . $item["bg_status"] . ';">' . $item["status"] . '</p>
							<img class="img-fluid w-100" src="' . wp_get_attachment_url($item["img"]) . '" alt="' . get_post_meta( $item["img"], "_wp_attachment_image_alt", true) . '">
							<div class="imovel-item-imagem-over d-flex align-items-center">
								<div class="imovel-item-imagem-over-chamada" style="background-color:' . $item["bg_status"] . ';">' . $item["chamada"] . '</div>
							</div>
						</div>
						<div class="imovel-item-info col-md-12 col-lg-6 d-flex align-items-stretch flex-column">
							<div class="mb-auto imovel-item-info-descricao">
								<div class="row">
									<div class="col-12 text-center">
										<p class="imovel-item-info-descricao-regiao">' . $item["regiao"] . '</p>
										<p class="imovel-item-info-descricao-titulo">' . $item["titulo"] . '</p>
										<p class="imovel-item-info-descricao-text">' . $item["desc"] . '</p>
									</div>
								</div>
							</div>
							<div class="row imovel-item-info-status">
								<div class="col-12 text-center">
									' . $item["box"] . '
								</div>
							</div>
							<div class="row imovel-item-info-links">
								<div class="imovel-item-info-link-saiba-mais col-12 d-flex align-items-center justify-content-center">
									<div class="row">
										<div class="col-12 d-flex align-items-center justify-content-center" style="color:' . $item["bg_status"] . ';">
											' . $item["call"] . '
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			';
			$conta_chat_ids ++;
		}
		?>
		</div>

	</section>

</div>














