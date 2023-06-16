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
$mostrar_apenas_comerciais = get_field("show_apenas_comerciais");


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
if(isset($_POST['baDoSearch'])) {
// indere meta query se veio de uma busca avançada.

    // DEBUG das informações que chegam da busca avançada por método POST
    // echo '<p class="col-12"><strong>Residencial: </strong>' . $_POST['baResidencial'][0] . '</p>';
    // echo '<p class="col-12"><strong>Comercial: </strong>' . $_POST['baComercial'][0] . '</p>';
    // echo '<p class="col-12"><strong>Status: </strong>' . $_POST['baStatus'] . '</p>';
    // echo '<p class="col-12"><strong>Região: </strong>' . $_POST['baRegiao'] . '</p>';
    // echo '<p class="col-12"><strong>Dorms: </strong>' . $_POST['baDorms'] . '</p>';
    // echo '<p class="col-12"><strong>Suítes: </strong>' . $_POST['baSuites'] . '</p>';
    // echo '<p class="col-12"><strong>Vagas: </strong>' . $_POST['baVagas'] . '</p>';
    // echo '<p class="col-12"><strong>Preço: </strong>' . $_POST['baFaixasPreco'] . '</p>';
    // echo '<p class="col-12"><strong>Metragem: </strong>' . $_POST['baMetragem'] . '</p>';

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
    $tipo_args = array(
        'key'       => 'imovel_tipo',
        'value'     => 'comercial',
        'compare'   => 'LIKE'
    );

    ////////////////////////// Fase do imóvel //////////////////////////
    if(isset($_POST['baStatus'])) {
        $fase = $_POST['baStatus'];
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
    if(isset($_POST['baDorms'])) {
        $dorms = $_POST['baDorms'];
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
    if(isset($_POST['baSuites'])) {
        $suites = $_POST['baSuites'];
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
    if(isset($_POST['baVagas'])) {
        $vagas = $_POST['baVagas'];
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
    if(isset($_POST['baRegiao'])) {
        $regiao = $_POST['baRegiao'];
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
    }

    ////////////////////////// Preços do Imóvel //////////////////////////
    if(isset($_POST['baFaixasPreco'])) {
        $preco = $_POST['baFaixasPreco'];
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
    if(isset($_POST['baMetragem'])) {
    $metragem = $_POST['baMetragem'];
    $metros = explode(",", $metragem);
    $met_min = $metros[0];
    $met_max = $metros[1];
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

    // Configura paginação
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    // Args para query de busca avançada
    $args = array(
        'post_status'       => 'publish',
        'posts_per_page'    => 8,
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
    $tipo_args = array(
        'key'       => 'imovel_tipo',
        'value'     => 'comercial',
        'compare'   => 'LIKE'
    );

// remove meta query se não veio de uma busca avançada.
    if($regiao_usada == "nenhuma"){
        $args = array(
            'post_status'       => 'publish',
            'posts_per_page'    => 8,
            'paged'             => $paged,
            'post_type'         => 'imovel',
            'numberposts'       => -1,
            'meta_key'          => 'imovel_status',
            'orderby'           => 'meta_value_num',
            'order'             => 'ASC',
            'meta_query'        => $tipo_args,
        );
        // args para contagem sem paginar.
        $args_no_paginate = array(
            'post_status'       => 'publish',
            'post_type'         => 'imovel',
            'numberposts'       => -1,
            'posts_per_page'    => -1,
            'meta_query'        => $tipo_args,
        );
    }
    else{ // página de comerciais que não veio de busca
        $args = array(
            'post_status'       => 'publish',
            'posts_per_page'    => 8,
            'paged'             => $paged,
            'post_type'         => 'imovel',
            'numberposts'       => -1,
            'meta_key'          => 'imovel_status',
            'orderby'           => 'meta_value_num',
            'order'             => 'ASC',
            'meta_query'        => $tipo_args,
        );
        // args para contagem sem paginar.
        $args_no_paginate = array(
            'post_status'       => 'publish',
            'post_type'         => 'imovel',
            'numberposts'       => -1,
            'posts_per_page'    => -1,
            'meta_query'        => $tipo_args,
        );
    }
}

// Faz a pesquisa para contagem de residenciais e comerciais
$query = new WP_Query( $args_no_paginate );

// Conta os comerciais e residenciais
$imoveis_res = 0;
$imoveis_com = 0;
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
    }
}
// Reseta WP_query
wp_reset_postdata();


// Faz a pesquisa geral
$query = new WP_Query( $args );

?>
<div class="container-fluid wrapper-imovel wrapper-page-imoveis p-0">

    <header class="wrapper-banner">
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
            <div class="box-ba box-ba-resultados">
            ' . get_template_part( 'template-parts/header/busca-avancada', 'page' ) . '
            </div>
            ';
        }
        ?>

        <div class="row imovel-resulta-busca">
            <div class="col-12">
                <?php
                if ($imoveis_com == 0 && $imoveis_res == 0){
                    echo '<p class="imovel-resulta-busca-info text-center">' . $txt_resultados_nao_encontrados . '</p>';
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
                    $msg_encontrados = '<p class="imovel-resulta-busca-info text-center">Encontramos ' . $imoveis_com . $com_string . '</p>';
                    echo $msg_encontrados;
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
                                                <div class="col-12 d-flex align-items-center justify-content-center" style="color:' . $item_imovel_cor_tema . ';">
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
                    $conta_chat_ids ++;


                }
            }
            ?>
        </div>

        <div class="row imovel-paginacao paginacao-desktop d-none d-sm-none d-md-block">
            <div class="col-12 d-flex justify-content-center">
                <?php
                $big = 999999999; // need an unlikely integer
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination m-0">
                        <?php
                            echo eztec_paginate_links( array(
                                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format'        => '?paged=%#%',
                                'current'       => max( 1, get_query_var('paged') ),
                                'end_size'      => 3,
                                'mid_size'      => 1,
                                'prev_text'     => __('«'),
                                'next_text'     => __('»'),
                                'total' => $query->max_num_pages
                            ) );
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row imovel-paginacao paginacao-mobile d-block d-md-none d-sm-block">
            <div class="col-12 d-flex justify-content-center">
                <nav>
                    <ul class="list-unstyled list-inline m-0">
                        <li class="list-inline-item"><?php previous_posts_link( '&laquo; Anterior', $query->max_num_pages) ?></li>
                        <li class="list-inline-item"><?php next_posts_link( 'Próximo &raquo;', $query->max_num_pages) ?></li>
                    </ul>
                </nav>
            </div>
        </div>

        <?php
        // Reseta WP_query
        wp_reset_postdata();
        ?>

    </section>
</div>