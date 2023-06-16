<?php
// Formulário de busca básica
?>
<form role="search" method="get" class="form-inline my-2 my-md-0" action="<?php echo home_url( '/' ); ?>">
    <input type="search" class="form-control input-search" placeholder="<?php echo get_field('placeholder_busca_basica',311); ?>" value="" name="s" title="Buscar por:" aria-label="Buscar">
    <button type="submit" class="form-control btn-search d-none d-md-none d-lg-block" style="background-image:url(<?php echo wp_get_attachment_url(get_field('icon_busca_fl',311)); ?>)"></button>
    <button type="submit" class="form-control btn btn-primary btn-search-mobile d-block d-lg-none d-md-block">BUSCAR</button>
</form>
