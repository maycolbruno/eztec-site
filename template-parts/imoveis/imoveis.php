<?php

// Página Imóveis

// Captura informações do CMS
$desc_imoveis_page = get_field("resultado_busca_desc_page");
$txt_resultados_start = get_field("resultado_busca_txt_start");
$txt_resultados_medium = get_field("resultado_busca_txt_medium");
$txt_resultados_final = get_field("resultado_busca_txt_final");
$txt_resultados_nao_encontrados = get_field("resultado_busca_txt_nao_encontrados");
$regiao_usada = get_field("regiao_usada");
$mostrar_ba = get_field("show_ba");
$show_apenas_comerciais = get_field("show_apenas_comerciais");


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


// all pega qualquer id de imóvel para buscar opções:
$args_qualquer = array(
'post_status'   => 'publish',
'post_type'     => 'imovel',
'numberposts'   => -1);
$qualquer = new WP_Query( $args_qualquer );
if ( $qualquer->have_posts() ) {
    while ( $qualquer->have_posts() ) {
        $qualquer->the_post();
        $qualquer_id = get_the_ID();
    }
}
wp_reset_postdata();

// Organiza as informações vindas da busca avançada
//
//

// Verifica se levamos cookies e informações sobre busca
global $veio_de_busca;
if($veio_de_busca == 'ativo') {
// insere meta query se veio de uma busca avançada.

    // INICIA ARGS
    $tipo_args = "";
    $fase_args = "";
    $suites_args = "";
    $dorms_args = "";
    $vagas_args = "";
    $regiao_args = "";
    $preco_args = "";
    $metragem_args = "";

    ////////////////////////// Tipo de Imóvel //////////////////////////
    $tipo_res = 0;
    $tipo_com = 0;
    $validaResidencialPost = (isset($_POST['baResidencial']) && ($_POST['baResidencial'][0] == "Residencial"));
    if(($validaResidencialPost)) {
        $tipo_res = 1;
    }
    $validaComercialPost = (isset($_POST['baComercial']) && ($_POST['baComercial'][0] == "Comercial"));
    if(($validaComercialPost)) {
        $tipo_com = 1;
    }

    // valida para página de Comerciais
    if ($show_apenas_comerciais == 1){
        $tipo_res = 0;
        $tipo_com = 1;
    }
    
    // Alimenta array para tipo args
    if($tipo_com === $tipo_res && $tipo_res === 1){
        $tipo_args = '';
    }
    if($tipo_com == 1 && $tipo_res == 0){
        $tipo_args = array(
            'key'       => 'imovel_tipo',
            'value'     => 'comercial',
            'compare'   => 'LIKE'
        );
    }
    if($tipo_com == 0 && $tipo_res == 1){
        $tipo_args = array(
            'key'       => 'imovel_tipo',
            'value'     => 'residencial',
            'compare'   => 'LIKE'
        );
    }

    ////////////////////////// Fase do imóvel //////////////////////////
    $fase = "";
    if( isset($_POST['baStatus']) ) {
        $fase = $_POST['baStatus'];
    }
    if ($fase !== ""){
        $key_fase = "imovel_fase";
        $field = get_field_object($key_fase,$qualquer_id);
        if( $field ){
            foreach( $field['choices'] as $k => $v ){
                if($fase !== ""){
                    if($fase == $k){
                        $fase_args = array(
                            'key'       => 'imovel_fase',
                            'value'     => $k,
                            'compare'   => 'LIKE'
                        );
                    }
                }
            }
        }
    }

    ////////////////////////// Dorms do Imóvel //////////////////////////
    $dorms = "";
    if(isset($_POST['baDorms'])) {
        $dorms = $_POST['baDorms'];
    }
    if($dorms !== ""){
        $key_dorms = "imovel_dorms";
        $field = get_field_object($key_dorms,$qualquer_id);
        if( $field ){
            foreach( $field['choices'] as $k => $v ){
                if($dorms !== ""){
                    if($dorms == $k){
                        $dorms_args = array(
                            'key'       => 'imovel_dorms',
                            'value'     => $k,
                            'compare'   => 'LIKE'
                        );
                    }
                }
            }
        }
    }

    ////////////////////////// Suítes do Imóvel //////////////////////////
    $suites = "";
    if(isset($_POST['baSuites'])) {
        $suites = $_POST['baSuites'];
    }
    if($suites !== ""){
        $key_suites = "imovel_suites";
        $field = get_field_object($key_suites,$qualquer_id);
        if( $field ){
            foreach( $field['choices'] as $k => $v ){
                if($suites !== ""){
                    if($suites == $k){
                        $suites_args = array(
                            'key'       => 'imovel_suites',
                            'value'     => $k,
                            'compare'   => 'LIKE'
                        );
                    }
                }
            }
        }
    }

    ////////////////////////// Vagas do Imóvel //////////////////////////
    $vagas = "";
    if(isset($_POST['baVagas'])) {
        $vagas = $_POST['baVagas'];
    }
    if($vagas !== ""){
        $key_vagas = "imovel_vagas";
        $field = get_field_object($key_vagas,$qualquer_id);
        if( $field ){
            foreach( $field['choices'] as $k => $v ){
                if($vagas !== ""){
                    if($vagas == $k){
                        $vagas_args = array(
                            'key'       => 'imovel_vagas',
                            'value'     => $k,
                            'compare'   => 'LIKE'
                        );
                    }
                }
            }
        }
    }

    ////////////////////////// Região do Imóvel //////////////////////////
    $regiao = "";
    if(isset($_POST['baRegiao'])) {
        $regiao = $_POST['baRegiao'];
    }
    if ($regiao !== ""){
        if($regiao_usada == "nenhuma"){
            $key_regiao = "imovel_regiao";
        }
        else{
            $key_regiao = "imovel_bairro";
        }
        $field = get_field_object($key_regiao,$qualquer_id);
        if( $field ){
            foreach( $field['choices'] as $k => $v ){
                if($regiao == $k){
                    $regiao_args = array(
                        'key'       => $key_regiao,
                        'value'     => $k,
                        'compare'   => 'LIKE'
                    );
                }
            }
        }
    }
    else{
        if($regiao_usada !== "nenhuma"){
            $regiao_args = array(
                'key'       => 'imovel_regiao',
                'value'     => $regiao_usada,
                'compare'   => 'LIKE'
            );
        }
    }

    ////////////////////////// Preços do Imóvel //////////////////////////
    $preco = "";
    if(isset($_POST['baFaixasPreco'])) {
        $preco = $_POST['baFaixasPreco'];
    }
    if($preco !== ""){
        $key_preco = "imovel_preco";
        $field = get_field_object($key_preco,$qualquer_id);
        if( $field ){
            foreach( $field['choices'] as $k => $v ){
                if($preco !== ""){
                    if($preco == $k){
                        $preco_args = array(
                            'key'       => 'imovel_preco',
                            'value'     => $k,
                            'compare'   => 'LIKE'
                        );
                    }
                }
            }
        }
    }

    ////////////////////////// Metragem do Imóvel //////////////////////////
    $metragem = "";
    if(isset($_POST['baMetragem'])) {
        $metragem = $_POST['baMetragem'];
        if( ($metros[0] == 0) && ($metros[1] == 200) ){
            $metragem = "";
        }
    }
    if($metragem !== ""){
        $metros = explode(",", $metragem);
        $met_min = $metros[0];
        $met_max = $metros[1];
        if( ($met_min !== 0) && ($met_max !== 200) ){
            $metragem_args = array(
                'relation' => 'OR',
                    array(
                        'key'       => 'imovel_metragem_min',
                        'value'     => array($met_min, $met_max),
                        'type'      => 'NUMERIC',
                        'compare'   => 'BETWEEN',
                    ),
                    array(
                        'key'       => 'imovel_metragem_max',
                        'value'     => array($met_min, $met_max),
                        'type'      => 'NUMERIC',
                        'compare'   => 'BETWEEN',
                    ),
            );
        }
    }

    // Args para query de busca avançada
    $args = array(
        'post_status'       => 'publish',
        'posts_per_page'    => -1,
        'paged'             => $paged,
        'post_type'         => 'imovel',
        'numberposts'       => -1,
        'meta_key'          => 'imovel_status',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
        'meta_query' => array(
            'relation'      => 'AND',
            $tipo_args,
            $fase_args,
            $suites_args,
            $dorms_args,
            $vagas_args,
            $regiao_args,
            $preco_args,
            $metragem_args,
        )
    );
    // args para contagem sem paginar.
    $args_no_paginate = array(
        'post_status'       => 'publish',
        'post_type'         => 'imovel',
        'numberposts'       => -1,
        'posts_per_page'    => -1,
        'meta_query' => array(
            'relation'      => 'AND',
            $tipo_args,
            $fase_args,
            $suites_args,
            $dorms_args,
            $vagas_args,
            $regiao_args,
            $preco_args,
            $metragem_args,
        )
    );
}

else{
// remove meta query se não veio de uma busca avançada.
    if($regiao_usada == "nenhuma"){
        $args = array(
            'post_status'       => 'publish',
            'posts_per_page'    => -1,
            'post_type'         => 'imovel',
            'numberposts'       => -1,
            'meta_key'          => 'imovel_status',
            'orderby'           => 'meta_value_num',
            'order'             => 'ASC',
        );
        // args para contagem sem paginar.
        $args_no_paginate = array(
            'post_status'       => 'publish',
            'post_type'         => 'imovel',
            'posts_per_page'    => -1,
            'numberposts'       => -1,
        );
    }
    else{ // página de região que não veio de busca
        $args = array(
            'post_status'       => 'publish',
            'posts_per_page'    => -1,
            'post_type'         => 'imovel',
            'numberposts'       => -1,
            'meta_key'          => 'imovel_status',
            'orderby'           => 'meta_value_num',
            'order'             => 'ASC',
            'meta_query' => array(
                'key'       => 'imovel_regiao',
                'value'     => $regiao_usada,
                'compare'   => 'LIKE'
            ),
        );
        // args para contagem sem paginar.
        $args_no_paginate = array(
            'post_status'       => 'publish',
            'post_type'         => 'imovel',
            'numberposts'       => -1,
            'posts_per_page'    => -1,
            'meta_query' => array(
                'relation'      => 'AND',
                array(
                        'key'       => 'imovel_regiao',
                        'value'     => $regiao_usada,
                        'compare'   => 'LIKE',
                    ),
            ),
        );
    }
}

// Faz a pesquisa para contagem de residenciais e comerciais
$query = new WP_Query( $args_no_paginate );

// Conta os comerciais e residenciais
$imoveis_res = 0;
$imoveis_com = 0;
$imoveis_total = 0;
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $tipo_do_imovel = get_field("imovel_tipo");
        foreach ($tipo_do_imovel as $tipo){
            if($tipo == "comercial"){
                $imoveis_com ++;
            }
            if($tipo == "residencial"){
                $imoveis_res ++;
            }
        }
        $imoveis_total ++;
    }
}
// Reseta WP_query
wp_reset_postdata();


// Faz a pesquisa geral
$query = new WP_Query( $args );

?>
<div class="container-fluid wrapper-imovel wrapper-page-imoveis p-0">

    <header class="wrapper-banner banner-imovel">
        <?php
            // Monta cabeçalho de banner
            get_template_part( 'template-parts/header/banner', 'page' );

            // Monta breadcrumb
            get_template_part( 'template-parts/header/breadcrumb', 'page' );
        ?>
    </header>

    <section class="container wrapper-inner wrapper-imovel-content">

        <?php  // Busca Avançada
        if ($mostrar_ba == 1){
            echo '
            <div class="wrapper-geral wrapper-buscas">
                <div class="wrapper-inner">
                    <div class="wrap-buscas">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="buscas-avancada col-12">
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
            ';
        }
        ?>

        <div class="row imovel-resulta-busca">
            <div class="col-12">

                <?php
                $custom_field_sugestion = '';
                if ($imoveis_com == 0 && $imoveis_res == 0){
                    echo '<p class="imovel-resulta-busca-info text-center">' . $txt_resultados_nao_encontrados . '</p>';

                    // Mostra sugestões de produtos, caso não exista resultados

                    $titulo_section = get_field("titulo_secao");
                    if ($tipo_com == 1){
                        $custom_field_sugestion = 'itens_sugestao_comerciais';
                    }
                    else{
                        if($regiao == 'zs'){ $custom_field_sugestion = 'itens_sugestao_zs'; }
                        if($regiao == 'zl'){ $custom_field_sugestion = 'itens_sugestao_zl'; }
                        if($regiao == 'zo'){ $custom_field_sugestion = 'itens_sugestao_zo'; }
                        if($regiao == 'zn'){ $custom_field_sugestion = 'itens_sugestao_zn'; }
                        if($regiao == 'abc'){ $custom_field_sugestion = 'itens_sugestao_abc'; }
                        if($regiao == 'li'){ $custom_field_sugestion = 'itens_sugestao_li'; }
                        if($regiao == 'in'){ $custom_field_sugestion = 'itens_sugestao_in'; }
                        if($regiao == 'os'){ $custom_field_sugestion = 'itens_sugestao_os'; }
                        if($regiao == 'gu'){ $custom_field_sugestion = 'itens_sugestao_gu'; }
                        if($custom_field_sugestion == ''){ $custom_field_sugestion = 'itens_sugestao_geral'; }
                    }
                    if ($custom_field_sugestion !== ''){ ?>
                        <div class="row imovel-item">
                            <div class="col-12">
                                <div class="section-content-header d-flex align-items-center flex-column">
                                    <h2 class="section-content-title text-center"><?php echo $titulo_section; ?></h2>
                                    <div class="section-content-title-separator"></div>
                                </div>
                            </div>
                            <?php
                            $sugestoes = get_field($custom_field_sugestion);
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
                                $item_imovel_cor_tema = get_field("res_busca_cor_tema",$sugestao);
                                $item_imovel_chamada_over = get_field("res_busca_chamada_over",$sugestao);
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
                                                            <div class="col-12 d-flex align-items-center justify-content-center imovel-item-info-descricao-cta">
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
                    <?php }

                }
                else{
                    if($imoveis_com == 1){
                        $com_string = ' sala comercial';
                    }
                    else{
                        $com_string = ' salas comerciais';
                    }
                    if($imoveis_res == 1){
                        $res_string = ' apartamento';
                    }
                    else{
                        $res_string = ' apartamentos';
                    }
                    $msg_encontrados = '<p class="imovel-resulta-busca-info text-center">Encontramos ' . $imoveis_total . ' empreendimentos.' . '</p>';
                    if (strpos($_SERVER['REQUEST_URI'], '/page/') === false) {
                        echo $msg_encontrados;
                    }
                }

                if (strpos($_SERVER['REQUEST_URI'], '/page/') === false) {
                    if ($imoveis_com == 0 && $imoveis_res == 0){

                    }
                    else{
                        echo '<p class="imovel-resulta-busca-descricao">' . $desc_imoveis_page . '</p>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row imovel-item">
        <?php
        // The Loop
        $conta_produtos = 1;
        if ( $query->have_posts() ) {

            $conta_chat_ids = 1;
            while ( $query->have_posts() ) {
                $query->the_post();
                $item_imovel_id = get_the_ID();
                $item_imovel_img = get_field("res_busca_img");
                $item_imovel_status = get_field("imovel_status");
                $key_status = "imovel_status";
                $field = get_field_object($key_status);
                if( $field ){
                    foreach( $field['choices'] as $k => $v ){
                        if($item_imovel_status !== ""){
                            if($item_imovel_status == $k){
                                $item_imovel_status_txt = $v;
                            }
                        }
                    }
                }
                $item_imovel_cor_tema = get_field("res_busca_cor_tema");
                $item_imovel_chamada_over = get_field("res_busca_chamada_over");
                $item_imovel_regiao = get_field("res_busca_regiao");
                $item_imovel_titulo = get_field("res_busca_titulo");
                $item_imovel_desc = get_field("res_busca_desc");
                $item_imovel_box = get_field("res_busca_box");
                $item_imovel_txt_corretor = get_field("res_busca_txt_corretor");
                $item_imovel_call = get_field("res_busca_txt_call");
                $item_imovel_url = get_permalink();

                $shortcode_chat = '[mi_chat imovel_id="' . $item_imovel_id . '" chat_id="' . $conta_chat_ids . '"]';
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
                                            <div class="col-12 d-flex align-items-center justify-content-center imovel-item-info-descricao-cta">
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
                if($conta_produtos % 10 == 0){
                    if ($conta_produtos != $imoveis_total){
                        echo '
                        <div class="col-12" id="btn-mais-' . $conta_produtos . '">
                            <div class="wrap-btn-mais">
                                <div class="btn btn-primary btn-mais">CARREGAR MAIS</div>
                            </div>
                        </div>
                        </div>
                        <div class="row imovel-item d-none" id="imovel-item-' . $conta_produtos . '">
                        <script>
                            $(document).ready(function(){
                                $("#btn-mais-' . $conta_produtos . '").click(function(){
                                  $("#btn-mais-' . $conta_produtos . '").addClass("d-none");
                                  $("#imovel-item-' . $conta_produtos . '").removeClass("d-none");
                                });
                             });
                        </script>
                        ';
                    }
                }
                $conta_chat_ids ++;
                $conta_produtos ++;
            }
        }
        ?>
        </div>

        <script>

        </script>

        
        <?php
        // Reseta WP_query
        wp_reset_postdata();


        // Modal de campanha
        $modal_campanha_show = get_field("modal_campanha_show");
        if($modal_campanha_show == 1){
            $modal_campanha_img = get_field("modal_campanha_img");
            $modal_campanha_url = get_field("modal_campanha_url");
            $modal_campanha_url = get_permalink($modal_campanha_url);

            echo '
            <div class="modal fade modal-campanha" id="ModalCampanha" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <a href="' . $modal_campanha_url . '">
                        <img src="' . $modal_campanha_img . '">
                    </a>
                  </div>
                </div>
              </div>
            </div>

            
            ';
        }


        ?>
        <script>
            setTimeout(function() {
            $('#ModalCampanha').find('.item').first().addClass('active');
            $('#ModalCampanha').modal({
                backdrop: 'static',
                keyboard: false
            });
        }, 3000);
        </script>
        


    </section>

</div>