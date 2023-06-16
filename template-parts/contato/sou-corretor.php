<?php
// Página Contato - Sou Corretor


// Captura informações do CMS
$titulo_secao = get_field("titulo_secao_contato");
$txt_intro = get_field("texto_introdutorio");

$form_corretor_homolog = '[contact-form-7 id="27983" title="Corretor"]';
$form_corretor_producao = '[contact-form-7 id="31087" title="Corretor"]';
$form_imobiliaria_homolog = '[contact-form-7 id="27986" title="Imobiliária"]';
$form_imobiliaria_producao = '[contact-form-7 id="31094" title="Imobiliária"]';
?>

<?php
// Seção Contato - Sou Corretor
?>
<style>
	.wpcf7-form-control.wpcf7-submit {
		background-color: #eb1c23;
		color: #fff;
		padding: 0 50px;
	}
</style>
<section class="container-fluid wrapper-contato">

	<header class="wrapper-banner">
		<?php
		// Monta cabeçalho de banner
		get_template_part( 'template-parts/header/banner-no-h', 'page' );
		// Monta breadcrumb
		get_template_part( 'template-parts/header/breadcrumb', 'page' );
		?>
	</header>
	<div class="container wrapper-inner wrapper-contato-body">
		<div class="wrapper-contato-content">
			<div class="contato-content-header">
				<div class="contato-content-title">
					<h1 class="contato-content-title-text">Sou um corretor parceiro ou imobiliária</h1>
				</div>
				<div class="contato-content-title-separator"></div>
				<p>Você, corretor, que queira entrar em contato com a nossa equipe de parcerias, envie sua mensagem.</p>
			</div>
			<?php
			$url_site = esc_url( home_url( '/' ) );
			if($url_site == "https://ezhmg.eztec.com.br/"){
				echo do_shortcode($form_corretor_homolog);
			}
			if($url_site == "https://www.eztec.com.br/"){
				echo do_shortcode($form_corretor_producao);
			}
			?>
		</div>
	</div>

	<div class="container wrapper-inner wrapper-contato-body">
		<div class="wrapper-contato-content">
			<div class="contato-content-header">
				<div class="contato-content-title">
					<h1 class="contato-content-title-text">Sou de uma Imobiliária</h1>
				</div>
				<div class="contato-content-title-separator"></div>
				<p>Você, corretor de uma imobiliária, que queira entrar em contato com a nossa equipe de parcerias, envie sua mensagem.</p>
			</div>
			<?php
			$url_site = esc_url( home_url( '/' ) );
			if($url_site == "https://ezhmg.eztec.com.br/"){
				echo do_shortcode($form_imobiliaria_homolog);
			}
			if($url_site == "https://www.eztec.com.br/"){
				echo do_shortcode($form_imobiliaria_producao);
			}
			?>
		</div>
	</div>
</section>













