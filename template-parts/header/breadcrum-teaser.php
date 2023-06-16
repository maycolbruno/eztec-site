<?php
$breads = get_field("breadcrumb_teaser");
?>
<div class="container wrapper-inner wrapper-breadcrumb">
	<ul class="breadcrumb">
		<?php
		$total_breads = count($breads);
		$conta_breads = 1;
		foreach ($breads as $bread){
			if ($conta_breads == $total_breads){
				echo '<li class="no-link-breadcrumb">' . get_the_title($bread) . '</li>';
			}
			else{
				echo '<li class="link-breadcrumb"><a href="' . get_permalink($bread) . '">' . get_the_title($bread) . '</a></li>';
				echo "<li class=\"separador-breadcrumb\"> / </li>";
			}
			$conta_breads ++;
		}
		?>
	</ul>
</div>