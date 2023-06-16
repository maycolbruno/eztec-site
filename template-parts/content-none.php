<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eztec
 */

?>

<?php echo get_field("no-results",1947);
$titulo_section = get_field("titulo_secao",20) ?>

<div class="container wrapper-inner wrapper-imovel-content">
	<div class="row imovel-resulta-busca">
        <div class="col-12">

        	<div class="row imovel-item">

        		<div class="col-12">
                    <div class="section-content-header d-flex align-items-center flex-column">
                        <h2 class="section-content-title text-center"><?php echo $titulo_section; ?></h2>
                        <div class="section-content-title-separator"></div>
                    </div>
                </div>
                <?php
                $sugestoes = get_field("itens_sugestao_geral",20);
                foreach ($sugestoes as $sugestao){

                    $item_imovel_img = get_field("res_busca_img",$sugestao);
                    $item_imovel_status = get_field("imovel_status",$sugestao);
                    $key_status = "imovel_status";
                    $field = get_field_object($key_status,$sugestao);
                    if( $field ){
                        foreach( $field['choices'] as $k => $v ){
                            if($item_imovel_status !== ""){
                                if($item_imovel_status == $k){
                                    $item_imovel_status_txt = $v;
                                }
                            }
                        }
                    }
                    $item_imovel_regiao = get_field("res_busca_regiao",$sugestao);
                    $item_imovel_titulo = get_field("res_busca_titulo",$sugestao);
                    $item_imovel_desc = get_field("res_busca_desc",$sugestao);
                    $item_imovel_box = get_field("res_busca_box",$sugestao);
                    $item_imovel_txt_corretor = get_field("res_busca_txt_corretor",$sugestao);
                    $item_imovel_call = get_field("res_busca_txt_call",$sugestao);
                    $item_imovel_url = get_permalink($sugestao);

                    echo '
                    <div class="col-12 col-md-6 col-lg-12">
                        <a href="' . $item_imovel_url . '">
                            <div class="row imovel-item-box ml-0 mr-0">
                                <div class="imovel-item-imagem col-md-12 col-lg-6 p-0">
                                    <p class="imovel-item-imagem-status">' . $item_imovel_status_txt . '</p>
                                    <img class="img-fluid w-100" src="' . wp_get_attachment_url($item_imovel_img) . '" alt="' . get_post_meta( $item_imovel_img, "_wp_attachment_image_alt", true) . '">
                                </div>
                                <div class="imovel-item-info col-md-12 col-lg-6 d-flex align-items-stretch flex-column">
                                    <div class="mb-auto imovel-item-info-descricao">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <p class="imovel-item-info-descricao-regiao">' . $item_imovel_regiao . '</p>
                                                <p class="imovel-item-info-descricao-titulo">' . $item_imovel_titulo . '</p>
                                                <p class="imovel-item-info-descricao-text">' . $item_imovel_desc . '</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row imovel-item-info-status">
                                        <div class="col-12 text-center">
                                            ' . $item_imovel_box . '
                                        </div>
                                    </div>
                                    <div class="row imovel-item-info-links">
                                        <div class="imovel-item-info-link-saiba-mais col-12 d-flex align-items-center justify-content-center">
                                            <div class="row">
                                                <div class="col-12 d-flex align-items-center justify-content-center">
                                                    ' . $item_imovel_call . '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    ';
                }
                ?>
	        </div>
        </div>
    </div>
</div>
