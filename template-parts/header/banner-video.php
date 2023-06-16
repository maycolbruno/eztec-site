<?php
// Banner em Vídeo
//
//
// Captura informações do CMS

$video = get_field("url_video_header");
?>

<div class="container-fluid banner-video">
    <div class="container wrapper-inner">
        <div class="row banner-video-iframe-box embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $video ?>"></iframe>
        </div>
    </div>
</div>