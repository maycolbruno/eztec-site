<?php

function appImoveis()
{
   error_reporting(E_ERROR);
   ini_set("display_errors", 1);

   header("Cache-Control: max-age=0");

   $paged = ($_GET['paged']) ? $_GET['paged'] : 1;
   $argsPost = array(
      'post_status' => 'publish',
      'post_type' => array(
         'imovel',
      ),
      'order_by' => (!isset($_GET['orderby']) ? 'post_date' : $_GET['orderby']),
      'order' => (!isset($_GET['order']) ? 'DESC' : $_GET['order'])
   );
   if ($_GET['perpage'] != '') {
      $argsPost['posts_per_page'] = ($_GET['perpage'] == '0' ? '-1' : $_GET['perpage']);
   }
   if ($_GET['paged'] != '') {
      $argsPost['paged'] = $paged;
   }


   if ($_GET['search'] != '') {
      $argsPost['s'] = $_GET['search'];
   }
   $wp_query = new WP_Query($argsPost);

   $arrReturn['total'] = $wp_query->found_posts;
   $arrReturn['totalpages'] = $wp_query->max_num_pages;
   //$arrReturn['posts'] = $wp_query->posts;

   $x = 1;
   while ($wp_query->have_posts()) : $wp_query->the_post();
      $post->ID = get_the_ID();
      $tags = get_the_category($post->ID);

      $arrReturn['imoveis'][$x]['id'] = $post->ID;
      $arrReturn['imoveis'][$x]['nome'] = get_the_title($post->ID);
      $arrReturn['imoveis'][$x]['foto_principal'] = wp_get_attachment_url(get_field('res_busca_img', $post->ID));
      $arrReturn['imoveis'][$x]['pre_titulo'] = get_field('imoveis_desc_caracteristicas', $post->ID);
      $arrReturn['imoveis'][$x]['descricao'] = get_field('res_busca_desc', $post->ID);
      $arrReturn['imoveis'][$x]['caracteristicas'] = get_field('imovel_chamada_caracteristicas', $post->ID);
      $arrReturn['imoveis'][$x]['gmaps'] = get_field('imoveis_map_regiao', $post->ID);
      $arrReturn['imoveis'][$x]['endereco'] = get_field('imoveis_txt_address_regiao', $post->ID);
      $arrReturn['imoveis'][$x]['descricao_regiao'] = get_field('imovel_regiao', $post->ID)[0]['label'];
      $arrReturn['imoveis'][$x]['tags'] = $tags;
      $arrReturn['imoveis'][$x]['dt_created'] = get_the_date("Y-m-d", $post->ID);
      $arrReturn['imoveis'][$x]['ficha_tecnica'] = get_field("imovel_ficha_carac_ficha", $post->ID);
      $arrReturn['imoveis'][$x]['empreendimento_id'] = get_field('imovel_id', $post->ID);
      $arrReturn['imoveis'][$x]['box_sub_title'] = get_field('imovel_box_produto_caracteristicas', $post->ID);
      $arrReturn['imoveis'][$x]['tipo_empreendimento'] = get_field('imovel_tipo',$post->ID);
      $dadosTour = array();
      $tour=get_field('imoveis_tours', $post->ID)[0];
      /* print_r($tour); */
      $dadosTour['description']=$tour['label_do_tour'];
      $dadosTour['url']=$tour['url_do_tour'];
   
      $arrReturn['imoveis'][$x]['tour'] = $dadosTour;

      $arrReturn['imoveis'][$x]['imovel_status']=get_field('imovel_status', $post->ID);

      //01 : Breve Lançamento
      //02 : Lançamento
      //03 : Obras Iniciadas
      //04 : Obras Aceleradas
      //05 : Pronto para morar
      //06 : Imóvel Pronto
      //07 : 100% Vendido


      /* switch (get_field('imovel_status', $post->ID)) {
         case '01':
            $arrReturn['imoveis'][$x]['imovel_status'] = 'Breve Lançamento';
            break;
         case '02':
            $arrReturn['imoveis'][$x]['imovel_status'] = 'Lançamento';
            break;
         case '03':
            $arrReturn['imoveis'][$x]['imovel_status'] = 'Obras Iniciadas';
            break;
         case '04':
            $arrReturn['imoveis'][$x]['imovel_status'] = 'Obras Aceleradas';
            break;
         case '05':
            $arrReturn['imoveis'][$x]['imovel_status'] = 'Pronto para morar';
            break;
         case '06':
            $arrReturn['imoveis'][$x]['imovel_status'] = 'Imóvel Pronto';
            break;
         case '07':
            $arrReturn['imoveis'][$x]['imovel_status'] = '100% Vendido';
            break;
         default:
            $arrReturn['imoveis'][$x]['imovel_status'] = 'Não definido';
            break; */
      
      $arrImages = array();
      $arrImages['apartamentos'] = array();
      $arrImages['planta'] = array();
      $arrImages['lazer'] = array();
      $arrImages['obra'] = array();
      $arrReturn['imoveis'][$x]['itenscaracteristicas'] = array();

      foreach (get_field('galeria_imovel_apto', $post->ID) as $apto) {
         /* array_push($arrImages['apartamentos'],wp_get_attachment_url($apto['img_big_imovel_aptos'])); */
         $arrayDados = array();
         /* print_r($apto); */
         $arrayDados['img'] = wp_get_attachment_url($apto['img_imovel_aptos']);
         $attachment = get_post($apto['img_imovel_aptos']);
         $arrayDados['descricao'] = $attachment->post_excerpt;
         array_push($arrImages['apartamentos'], $arrayDados);
      }
      foreach (get_field('galeria_imovel_plantas', $post->ID) as $planta) {
         /*          array_push($arrImages['planta'],wp_get_attachment_url($planta['img_big_imovel_plantas']));
 */
         $arrayDados = array();
         $arrayDados['img'] = wp_get_attachment_url($planta['img_big_imovel_plantas']);
         $attachment = get_post($planta['img_big_imovel_plantas']);
         $arrayDados['descricao'] = $attachment->post_excerpt;
         array_push($arrImages['planta'], $arrayDados);
      }
      foreach (get_field('galeria_imovel_lazer', $post->ID) as $lazer) {
         /*          array_push($arrImages['lazer'],wp_get_attachment_url($lazer['img_big_imovel_lazer']));
 */
         $arrayDados = array();
         $arrayDados['img'] = wp_get_attachment_url($lazer['img_big_imovel_lazer']);
         $attachment = get_post($lazer['img_big_imovel_lazer']);
         $arrayDados['descricao'] = $attachment->post_excerpt;
         array_push($arrImages['lazer'], $arrayDados);
      }
      foreach (get_field('galeria_imovel_obra', $post->ID) as $obra) {
         /*          print_r($obra);
 */
         $arrayDadosObra = array();
         $arrayDadosObra['img'] = wp_get_attachment_url($obra['img_imovel_obra']);
         $attachment = get_post($obra['img_imovel_obra']);

         $arrayDadosObra['descricao'] = $attachment->post_excerpt;
         array_push($arrImages['obra'], $arrayDadosObra);
      }
      $arrReturn['imoveis'][$x]['imagens'] = $arrImages;


      foreach (get_field('itens_de_caracteristicas',$post->ID) as $item) {
         $arrayDadosCaracteristicas = array();
         $arrayDadosCaracteristicas['icone'] = wp_get_attachment_url($item['icone_caracteristica']);
         $arrayDadosCaracteristicas['titulo'] = $item['titulo_caracteristica'];
         array_push($arrReturn['imoveis'][$x]['itenscaracteristicas'], $arrayDadosCaracteristicas);
      }

      /*
      $arrReturn['imovel'][$x]['geral']['imovel_id'] = get_field('imovel_id',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_tipo'] = get_field('imovel_tipo',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_fase'] = get_field('imovel_fase',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_status'] = get_field('imovel_status',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_dorms'] = get_field('imovel_dorms',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_suites'] = get_field('imovel_suites',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_vagas'] = get_field('imovel_vagas',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_preco'] = get_field('imovel_preco',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_regiao'] = get_field('imovel_regiao',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_bairro'] = get_field('imovel_bairro',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_metragem_min'] = get_field('imovel_metragem_min',$post->ID);
      $arrReturn['imovel'][$x]['geral']['imovel_metragem_max'] = get_field('imovel_metragem_max',$post->ID);
      
      $arrReturn['imovel'][$x]['caracteristicas']['exibir_caracteristicas'] = get_field('exibir_caracteristicas',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['exibir_menu_nav_carac'] = get_field('exibir_menu_nav_carac',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['txt_menu_nav_carac'] = get_field('txt_menu_nav_carac',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['imovel_chamada_caracteristicas'] = get_field('imovel_chamada_caracteristicas',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['imoveis_desc_caracteristicas'] = get_field('imoveis_desc_caracteristicas',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['imoveis_logo_caracteristicas_fl'] = get_field('imoveis_logo_caracteristicas_fl',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['imovel_box_produto_caracteristicas'] = get_field('imovel_box_produto_caracteristicas',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['mostrar_fachada'] = get_field('mostrar_fachada',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['usar_fachada_vertical'] = get_field('usar_fachada_vertical',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['fachada_vertical_xl'] = get_field('fachada_vertical_xl',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['usar_fachada_horizontal'] = get_field('usar_fachada_horizontal',$post->ID);
      $arrReturn['imovel'][$x]['caracteristicas']['fachada_horizontal_xl'] = get_field('fachada_horizontal_xl',$post->ID);;
      $arrReturn['imovel'][$x]['caracteristicas']['data_entrega'] = get_field('data_entrega',$post->ID);
      
      $arrReturn['imovel'][$x]['apartamentos']['exibir_apartamentos'] = get_field('exibir_apartamentos',$post->ID);
      $arrReturn['imovel'][$x]['apartamentos']['txt_menu_nav_aptos'] = get_field('txt_menu_nav_aptos',$post->ID);
      $arrReturn['imovel'][$x]['apartamentos']['imoveis_titulo_aptos'] = get_field('imoveis_titulo_aptos',$post->ID);
      $arrReturn['imovel'][$x]['apartamentos']['galeria_imovel_apto'] = get_field('galeria_imovel_apto',$post->ID);
      
      $arrReturn['imovel'][$x]['plantas']['exibir_plantas'] = get_field('exibir_plantas',$post->ID);
      $arrReturn['imovel'][$x]['plantas']['txt_menu_nav_plantas'] = get_field('txt_menu_nav_plantas',$post->ID);
      $arrReturn['imovel'][$x]['plantas']['imoveis_titulo_plantas'] = get_field('imoveis_titulo_plantas',$post->ID);
      $arrReturn['imovel'][$x]['plantas']['galeria_imovel_plantas'] = get_field('galeria_imovel_plantas',$post->ID);
      
      $arrReturn['imovel'][$x]['lazer']['exibir_lazer'] = get_field('exibir_lazer',$post->ID);
      $arrReturn['imovel'][$x]['lazer']['txt_menu_nav_lazer'] = get_field('txt_menu_nav_lazer',$post->ID);
      $arrReturn['imovel'][$x]['lazer']['imoveis_titulo_lazer'] = get_field('imoveis_titulo_lazer',$post->ID);
      $arrReturn['imovel'][$x]['lazer']['galeria_imovel_obra'] = get_field('galeria_imovel_lazer',$post->ID);
      $arrReturn['imovel'][$x]['lazer']['incluir_barra_contato_lazer'] = get_field('incluir_barra_contato_lazer',$post->ID);

      $arrReturn['imovel'][$x]['videos']['exibir_videos'] = get_field('exibir_videos',$post->ID);
      $arrReturn['imovel'][$x]['videos']['exibir_menu_nav_videos'] = get_field('exibir_menu_nav_videos',$post->ID);
      $arrReturn['imovel'][$x]['videos']['txt_menu_nav_videos'] = get_field('txt_menu_nav_videos',$post->ID);
      $arrReturn['imovel'][$x]['videos']['imoveis_titulo_videos'] = get_field('imoveis_titulo_videos',$post->ID);
      $arrReturn['imovel'][$x]['videos']['galeria_imovel_videos'] = get_field('galeria_imovel_videos',$post->ID);

      $arrReturn['imovel'][$x]['tour']['exibir_tour'] = get_field('exibir_tour',$post->ID);
      $arrReturn['imovel'][$x]['tour']['exibir_menu_nav_tour'] = get_field('exibir_menu_nav_tour',$post->ID);
      $arrReturn['imovel'][$x]['tour']['txt_menu_nav_tour'] = get_field('txt_menu_nav_tour',$post->ID);
      $arrReturn['imovel'][$x]['tour']['imoveis_titulo_tour'] = get_field('imoveis_titulo_tour',$post->ID);
      $arrReturn['imovel'][$x]['tour']['imoveis_desc_tour'] = get_field('imoveis_desc_tour',$post->ID);
      $arrReturn['imovel'][$x]['tour']['imoveis_tours'] = get_field('imoveis_tours',$post->ID);

      $arrReturn['imovel'][$x]['downloads']['exibir_downloads'] = get_field('exibir_downloads',$post->ID);
      $arrReturn['imovel'][$x]['downloads']['exibir_menu_nav_downloads'] = get_field('exibir_menu_nav_downloads',$post->ID);
      $arrReturn['imovel'][$x]['downloads']['txt_menu_nav_downloads'] = get_field('txt_menu_nav_downloads',$post->ID);
      $arrReturn['imovel'][$x]['downloads']['itens_de_download'] = get_field('itens_de_download',$post->ID);

      $arrReturn['imovel'][$x]['regiao']['exibir_regiao'] = get_field('exibir_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['exibir_menu_nav_regiao'] = get_field('exibir_menu_nav_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['txt_menu_nav_regiao'] = get_field('txt_menu_nav_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_titulo_regiao'] = get_field('imoveis_titulo_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_chamada_regiao'] = get_field('imoveis_chamada_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_icon_address_regiao'] = get_field('imoveis_icon_address_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_txt_address_regiao'] = get_field('imoveis_txt_address_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_map_regiao'] = get_field('imoveis_map_regiao',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_show_btn_app'] = get_field('imoveis_show_btn_app',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_regiao_app_titulo'] = get_field('imoveis_regiao_app_titulo',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_btn_app_waze'] = get_field('imoveis_btn_app_waze',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_btn_app_gmap'] = get_field('imoveis_btn_app_gmap',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_regiao_latitude'] = get_field('imoveis_regiao_latitude',$post->ID);
      $arrReturn['imovel'][$x]['regiao']['imoveis_regiao_longitude'] = get_field('imoveis_regiao_longitude',$post->ID);

      $arrReturn['imovel'][$x]['obra']['exibir_obra'] = get_field('exibir_obra',$post->ID);
      $arrReturn['imovel'][$x]['obra']['exibir_menu_nav_obra'] = get_field('exibir_menu_nav_obra',$post->ID);
      $arrReturn['imovel'][$x]['obra']['txt_menu_nav_obra'] = get_field('txt_menu_nav_obra',$post->ID);
      $arrReturn['imovel'][$x]['obra']['imovel_titulo_obra'] = get_field('imovel_titulo_obra',$post->ID);
      $arrReturn['imovel'][$x]['obra']['imovel_obra_url_galeria'] = get_field('imovel_obra_url_galeria',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_fundacao_fl'] = get_field('obra_percent_fundacao_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_estrutura_fl'] = get_field('obra_percent_estrutura_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_alvenaria_fl'] = get_field('obra_percent_alvenaria_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_instalacoes_fl'] = get_field('obra_percent_instalacoes_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_rev_interno_fl'] = get_field('obra_percent_rev_interno_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_rev_externo_fl'] = get_field('obra_percent_rev_externo_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_piso_fl'] = get_field('obra_percent_piso_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_pintura_fl'] = get_field('obra_percent_pintura_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['obra_percent_paisagismo_fl'] = get_field('obra_percent_paisagismo_fl',$post->ID);
      $arrReturn['imovel'][$x]['obra']['galeria_imovel_obra'] = get_field('galeria_imovel_obra',$post->ID);

      $arrReturn['imovel'][$x]['fichatecnica']['mostrar_ficha_tecnica'] = get_field('mostrar_ficha_tecnica',$post->ID);
      $arrReturn['imovel'][$x]['fichatecnica']['imovel_titulo_carac_ficha'] = get_field('imovel_titulo_carac_ficha',$post->ID);
      $arrReturn['imovel'][$x]['fichatecnica']['imovel_ficha_carac_ficha'] = get_field('imovel_ficha_carac_ficha',$post->ID);

      $arrReturn['imovel'][$x]['contato']['exibir_contato'] = get_field('exibir_contato',$post->ID);
      $arrReturn['imovel'][$x]['contato']['exibir_menu_nav_contato'] = get_field('exibir_menu_nav_contato',$post->ID);
      $arrReturn['imovel'][$x]['contato']['txt_menu_nav_contato'] = get_field('txt_menu_nav_contato',$post->ID);
      $arrReturn['imovel'][$x]['contato']['imoveis_bg_color_contato'] = get_field('imoveis_bg_color_contato',$post->ID);
      $arrReturn['imovel'][$x]['contato']['titulo_imovel_contato'] = get_field('titulo_imovel_contato',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_nome'] = get_field('label_nome',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_email'] = get_field('label_email',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_telefone'] = get_field('label_telefone',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_mensagem'] = get_field('label_mensagem',$post->ID);
      $arrReturn['imovel'][$x]['contato']['txt_aceitar_news'] = get_field('txt_aceitar_news',$post->ID);
      $arrReturn['imovel'][$x]['contato']['txt_aceitar_mala_direta'] = get_field('txt_aceitar_mala_direta',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_cep'] = get_field('label_cep',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_cidade'] = get_field('label_cidade',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_endereco'] = get_field('label_endereco',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_numero'] = get_field('label_numero',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_bairro'] = get_field('label_bairro',$post->ID);
      $arrReturn['imovel'][$x]['contato']['label_complemento'] = get_field('label_complemento',$post->ID);
      $arrReturn['imovel'][$x]['contato']['txt_btn_enviar'] = get_field('txt_btn_enviar',$post->ID);
      $arrReturn['imovel'][$x]['contato']['txt_obrigatorios'] = get_field('txt_obrigatorios',$post->ID);

      $arrReturn['imovel'][$x]['relacionados']['exibir_relacionados'] = get_field('exibir_relacionados',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['exibir_menu_nav_relacionados'] = get_field('exibir_menu_nav_relacionados',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['txt_menu_nav_relacionados'] = get_field('txt_menu_nav_relacionados',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['imovel_titulo_relacionados'] = get_field('imovel_titulo_relacionados',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['produtos_recomendados'] = get_field('produtos_recomendados',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['img_qdo_relacionado'] = get_field('img_qdo_relacionado',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['bairro_qdo_relacionado'] = get_field('bairro_qdo_relacionado',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['nome_qdo_relacionado'] = get_field('label_telefone',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['box_qdo_relacionado'] = get_field('box_qdo_relacionado',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['chamada_qdo_relacionado'] = get_field('chamada_qdo_relacionado',$post->ID);
      $arrReturn['imovel'][$x]['relacionados']['status_qdo_relacionado'] = get_field('status_qdo_relacionado',$post->ID);

      $arrReturn['imovel'][$x]['resultadobusca']['res_busca_titulo'] = get_field('res_busca_titulo',$post->ID);
      $arrReturn['imovel'][$x]['resultadobusca']['res_busca_regiao'] = get_field('res_busca_regiao',$post->ID);
      $arrReturn['imovel'][$x]['resultadobusca']['res_busca_desc'] = get_field('res_busca_desc',$post->ID);
      $arrReturn['imovel'][$x]['resultadobusca']['res_busca_box'] = get_field('res_busca_box',$post->ID);
      $arrReturn['imovel'][$x]['resultadobusca']['res_busca_txt_call'] = get_field('res_busca_txt_call',$post->ID);
      $arrReturn['imovel'][$x]['resultadobusca']['res_busca_img'] = get_field('res_busca_img',$post->ID);
   */

      $x++;
   endwhile;
   wp_reset_postdata();
   return $arrReturn;
}


function appImoveisBook()
{
   error_reporting(E_ERROR);
   ini_set("display_errors", 1);

   header("Cache-Control: max-age=0");

   $x = 1;
   $argsPost = array(
      'post_status' => 'publish',
      'post_type' => array('imovel'),
      'p' => $_GET['imovel']
   );
   $wp_query = new WP_Query($argsPost);
   while ($wp_query->have_posts()) : $wp_query->the_post();
      $post->ID = get_the_ID();
      $count = 1;
      if (have_rows('itens_de_download')) :
         while (have_rows('itens_de_download')) : the_row();
            $urlFile = get_sub_field("arquivo_download");
            $urlParts = pathinfo($urlFile);
            $extension = $urlParts['extension'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlFile);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $base64 = 'data:application/' . $extension . ';base64,' . base64_encode($response);

            $arrReturn['book'][$count]['title'] = get_sub_field("txt_btn_download");
            $arrReturn['book'][$count]['file'] = get_sub_field("arquivo_download");
            $arrReturn['book'][$count]['base64'] = $base64;
            $count++;
         endwhile;
      endif;

      $x++;
   endwhile;
   wp_reset_postdata();
   return $arrReturn;
}


add_action('rest_api_init', function () {
   register_rest_route('app/v1', '/imoveis', array(
      'methods'  => WP_REST_Server::READABLE,
      'callback' => 'appImoveis',
   ));
   register_rest_route('app/v1', '/imoveis/book', array(
      'methods'  => WP_REST_Server::READABLE,
      'callback' => 'appImoveisBook',
   ));
});

add_image_size('300x500', 300, 500, false);
add_image_size('800x800', 800, 800, false);
add_image_size('1080x1920', 1080, 1920, false);
add_image_size('600x1000', 600, 1000, false);
