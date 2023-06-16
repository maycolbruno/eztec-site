<?php // RTB House iframes
	global $wp;
	if ( is_front_page() ) { ?>
	    <iframe src="//us.creativecdn.com/tags?id=pr_tCSAS4wYI5FdWBCdovLP_home" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>
	<?php
	}
	else{
		$p_type = get_post_type();
		if ($p_type == "imovel"){
			$produto_id = get_field("imovel_id");
			
			$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
			if (strpos($current_url, 'eztec.com.br?s=') == false) {
			    echo '<iframe src="//us.creativecdn.com/tags?id=pr_tCSAS4wYI5FdWBCdovLP_offer_' . $produto_id . '" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>';
			}
		}
		else{
			$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
			if (strpos($current_url, 'eztec.com.br?s=') == false) {
			    echo '<iframe src="//us.creativecdn.com/tags?id=pr_tCSAS4wYI5FdWBCdovLP&amp;ncm=1" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>';
			}
		}
	}



