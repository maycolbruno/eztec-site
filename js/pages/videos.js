/**
 * @class Videos
 */
var videos = {

    /**
     * Funcao que passa o "src" do
     * video para o modal e o abre
     */
    openVideo: function (urlVideo) {
        $('#video-modal').attr('src', urlVideo);
        $('#modalVideo').modal('show')
    },

    /**
     * Funcao responsavel pelo filtro
     * dos videos listados
     */
    searchVideo: function () {

        // Definindo todos os elementos que serao utilizados
        var searchInput = '#search-input';
        var videoList = '#videos-list';
        var videoSection = '.videos-section';
        var videoBox = '.videos-section-box';
        var videoItem = '.video-section-box-item';
        var videoTitle = '.video-section-box-item-info-title';
        var videoDesc = '.video-section-box-item-info-desc';

        // Listener do input para capturar quando algo e digitado
        $(searchInput)
		    .change( function () {

                // Procura o valor digitado nos elementos disponiveis
                var filter = $(this).val();
                if(filter) {
                    $(videoList).find(videoDesc + ":not(:Contains(" + filter + "))").parent().parent().hide();
                    $(videoList).find(videoTitle + ":not(:Contains(" + filter + "))").parent().parent().hide();
                    $(videoList).find(videoDesc + ":Contains(" + filter + ")").parent().parent().show();
                    $(videoList).find(videoTitle + ":Contains(" + filter + ")").parent().parent().show();
                } else {
                    $(videoList).find(".video-section-box-item").show();
                }

                // Exibe as secoes com elementos e oculta as vazias
                $(videoList + ' ' + videoSection).each(function(){
                    var currentSection = this;
                    var searchedVideos = 0;
                    $(currentSection).find(videoBox).find(videoItem).each(function(){
                        if ($(this).css('display') !== 'none') {
                            searchedVideos++;
                        }
                    })
                    if (searchedVideos > 0) {
                        $(currentSection).show();
                    } else {
                        $(currentSection).hide();
                    }
                })

                return false;
		    })
            .keyup( function () {
                $(this).change();
            });
    }
};

/**
 * Funcao customizada, utilizada para comparar
 * a string sem o 'case-sensitive'
 */
$.expr[":"].Contains = function(a,i,m) {
    return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
};

$('document').ready(function() {
    videos.searchVideo();
});