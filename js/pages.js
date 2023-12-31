var contato = {
    fillChosenFileName: function(e, t) {
        $(e).change(function() {
            $(t).text(this.value.split("\\").pop());
        });
    }
};

$("document").ready(function() {
    contato.fillChosenFileName("#curriculo", ".custom-file-control");
}), $("document").ready(function() {
    custom.createGallery("#galeria-apartamentos", "full"), custom.createGallery("#galeria-lazer", "full"), 
    custom.createGallery("#galeria-plantas", "full"), custom.createGallery("#galeria-videos", "no-thumb"), 
    custom.createGallery("#galeria-tour", "full"), custom.createGallery("#galeria-obra", "simple"), 
    custom.createGallery("#galeria-duplex", "full"), custom.createGallery("#galeria-duplex-plantas", "full");
});

var videos = {
    openVideo: function(e) {
        $("#video-modal").attr("src", e), $("#modalVideo").modal("show");
    },
    searchVideo: function() {
        var t = "#videos-list", o = ".video-section-box-item-info-title", n = ".video-section-box-item-info-desc";
        $("#search-input").change(function() {
            var e = $(this).val();
            return e ? ($(t).find(n + ":not(:Contains(" + e + "))").parent().parent().hide(), 
            $(t).find(o + ":not(:Contains(" + e + "))").parent().parent().hide(), $(t).find(n + ":Contains(" + e + ")").parent().parent().show(), 
            $(t).find(o + ":Contains(" + e + ")").parent().parent().show()) : $(t).find(".video-section-box-item").show(), 
            $(t + " .videos-section").each(function() {
                var e = this, t = 0;
                $(e).find(".videos-section-box").find(".video-section-box-item").each(function() {
                    "none" !== $(this).css("display") && t++;
                }), 0 < t ? $(e).show() : $(e).hide();
            }), !1;
        }).keyup(function() {
            $(this).change();
        });
    }
};

$.expr[":"].Contains = function(e, t, o) {
    return 0 <= (e.textContent || e.innerText || "").toUpperCase().indexOf(o[3].toUpperCase());
}, $("document").ready(function() {
    videos.searchVideo();
});