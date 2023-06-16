<?php
$breads = get_field("breadcrumb",1977);
$txt_final_bread = get_field("txt_final_bread",1977);
?>
<div class="container wrapper-inner wrapper-breadcrumb">
	<ul class="breadcrumb">
		<?php
		$total_breads = count($breads);
		$conta_breads = 1;
		foreach ($breads as $bread){
			echo '<li class="link-breadcrumb"><a href="' . get_permalink($bread) . '">' . get_the_title($bread) . '</a></li>';
			echo "<li class=\"separador-breadcrumb\"> / </li>";
			$conta_breads ++;
		}
		?>
		<li class="no-link-breadcrumb"><?php echo $txt_final_bread; ?></li>
	</ul>
</div>