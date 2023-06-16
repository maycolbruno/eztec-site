/**
 * @class Contato
 */
var contato = {
    fillChosenFileName: function (fileElement, textField) {
        var input = $(fileElement).change(function(){
            $(textField).text(this.value.split("\\").pop());
        })
    }
};

$('document').ready(function() {
    contato.fillChosenFileName('#curriculo', '.custom-file-control');
});