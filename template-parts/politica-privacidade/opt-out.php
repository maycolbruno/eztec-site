<?php
// PÁGINA OPT-OUT


// Captura informações do CMS
$conteudo = "";
$conteudo = get_field("conteudo");

?>

<div class="container-fluid wrapper-opt-out p-0">

	<section class="container wrapper-inner opt-out">
		<?php
		if($conteudo !== ""){
			echo '<div class="opt-out-content">' . $conteudo . '</div>';
		}
		?>
		<form method="post" action="http://www.pages03.net/eztec/opt-out-page/opt-out-jardins-do-brasil" pageId="10067074" siteId="395158" parentPageId="10067072" >
			<input style="color:#000;" class="input-email" type="email" name="Email" id="control_EMAIL" label="Email" class="textInput defaultText" placeholder="E-mail" required="required">
			<input class="input-button" type="submit" class="defaultText buttonStyle" value="Enviar">
			<input type="hidden" name="formSourceName" value="StandardForm">
			<input type="hidden" name="sp_exp" value="yes">
		</form>
	</section>

</div>