var custom = {

    createGallery: function (idElement, mode) {
        switch (mode) {

            case 'full':
                $(idElement).lightSlider({
                    gallery:true,
                    item:1,
                    loop:true,
                    slideMargin:0,
                    thumbItem:9,
                    enableDrag: false,
                    currentPagerPosition:'left',
                    onSliderLoad: function(el) {
                        el.lightGallery({
                            download: false,
                            hash: false,
                            share: false,
                            subHtmlSelectorRelative: true,
                            selector: idElement + ' .lslide'
                        });
                    }
                });
                break;

            case 'simple':
                $(idElement).lightSlider({
                    gallery:true,
                    item:1,
                    loop:true,
                    slideMargin:0,
                    thumbItem:9,
                    enableDrag: false,
                    currentPagerPosition:'left',
                });
                break;

            case 'no-thumb':
                $(idElement).lightSlider({
                    item:1,
                    loop:true,
                    slideMargin:0,
                    thumbItem:9,
                    enableDrag: false,
                    currentPagerPosition:'left'
                });
                break;

        }
    },
    submitForm: function (data, target, promisse) {
        console.log('data: ' + data);
        console.log('target: ' + target);
        var form = $("form[data-target='"+target+"']");
        var btnEnviar = form.find('#btnEnviar');
        var originalHtml = btnEnviar.html();
        switch (target) {

            case 'ws-faleconosco':
                var nomeEmpreendimento = form.find('#idEmpreendimento').find(":selected").text();
                dataLayer.push({
                    'event': 'contato_fale_conosco',
                    'nome_empreendimento': nomeEmpreendimento.replace('Selecione', '')
                });
                break;

            case 'ws-produto':
                dataLayer.push({
                    'event': 'form_produto'
                });
                target = 'ws-faleconosco';
                break;

            case 'ws-email':
                dataLayer.push({
                    'event': 'email'
                });
                target = 'ws-faleconosco';
                break;

            case 'ws-whatsapp':
                var nomeEmpreendimento = form.find('#idEmpreendimento').find(":selected").text();
                dataLayer.push({
                    'event': 'whatsapp',
                    'nome_empreendimento': nomeEmpreendimento.replace('Selecione', '')
                });
                break;

            case 'ws-newsLetter':
                var nomeEmpreendimento = form.find('#idEmpreendimento').find(":selected").text();
                dataLayer.push({
                    'event': 'cadastro_newsletter'
                });
                break;

            case 'ws-fornecedor':
                var nomeEmpreendimento = form.find('#idEmpreendimento').find(":selected").text();
                dataLayer.push({
                    'event': 'contato_fornecedor'
                });
                break;

            case 'ws-vendaSeuTerreno':
                var nomeEmpreendimento = form.find('#idEmpreendimento').find(":selected").text();
                dataLayer.push({
                    'event': 'contato_venda_seu_terreno'
                });
                break;

            case 'ws-trabalheConosco':
                var nomeEmpreendimento = form.find('#idEmpreendimento').find(":selected").text();
                dataLayer.push({
                    'event': 'contato_trabalhe_conosco'
                });
                break;

            case 'ws-sacEztec':
                var nomeEmpreendimento = form.find('#idEmpreendimento').find(":selected").text();
                dataLayer.push({
                    'event': 'contato_sac',
                    'nome_empreendimento': nomeEmpreendimento.replace('Selecione', '')
                });
                break;

        }
        btnEnviar.html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> Enviando');
        btnEnviar.attr('disabled', true);
        // setTimeout(
        //     function(){
        //         btnEnviar.html(originalHtml);
        //         btnEnviar.attr('disabled', false);
        //         form.trigger("reset");
        //         swal(
        //             'Mensagem enviada com sucesso!',
        //             '',
        //             'success'
        //         )
        //     }, 3000
        // )
        $.ajax({
            type: "POST",
            url: custom.getEnv() + "?t=" + target,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify(data),
            success: function (response) {
                promisse.resolve(response.msg);
                form.trigger("reset");
            },
            error: function (response) {
                promisse.resolve(response.msg);
            },
            complete: function () {
                btnEnviar.html(originalHtml);
                btnEnviar.attr('disabled', false);
            }
        });
        return false;
    },
    setFormMask: function () {
        $("input[alt='fone']").inputmask({
            mask: ["99999-9999", "9999-9999", {
                clearMaskOnLostFocus: true
            }],
            keepStatic: true,
        });
        $("input[alt='ddd']").inputmask({
            mask: ["99"],
            keepStatic: true,
        });
        $("input[alt='cep']").inputmask({
            mask: ["99.999-999"],
            keepStatic: true,
            clearMaskOnLostFocus: true
        });
        $("input[alt='cpf']").inputmask({
            mask: ["999.999.99-99"],
            keepStatic: true,
            clearMaskOnLostFocus: true
        });
        $("input[alt='money']").inputmask(
            'decimal', {
                'alias': 'numeric',
                'groupSeparator': '.',
                'autoGroup': true,
                'digits': 2,
                'radixPoint': ",",
                'digitsOptional': false,
                'allowMinus': false,
                'prefix': 'R$ ',
                'placeholder': ''
            })
        $("input[alt='metric']").inputmask(
            'decimal', {
                'alias': 'numeric',
                'groupSeparator': '.',
                'autoGroup': true,
                'digits': 2,
                'radixPoint': ",",
                'digitsOptional': false,
                'allowMinus': false,
                'placeholder': ''
            })
    },
    getBase64: function (file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onerror = function (error) {
            console.log('Error: ', error);
        };
        return reader.result;
    },
    validate: function (form) {
        //Regras do formulario
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg !== value;
        }, "Selecione um valor da lista");
        $.validator.addMethod("fileExtension", function (value, element) {
            var allowed = ["pdf", "doc", "docx", "odt", "ods", "docm", "wpd", "wps"]
            if (allowed.indexOf((value.split(".")[1])) == -1) return false;
            return true;
        }, "Selecione um arquivo com a extensão válida");
        $.validator.addMethod("cpf", function (value, element) {
            value = jQuery.trim(value);
            value = value.replace('.', '');
            value = value.replace('.', '');
            cpf = value.replace('-', '');
            while (cpf.length < 11) cpf = "0" + cpf;
            var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
            var retorno = true;
            if (cpf.match(expReg)) retorno = false;
            return retorno;
        }, "Informe um CPF válido");
        form.validate({
            rules: {
                nome: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                ddd: {
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                fone: {
                    required: true,
                    minlength: 8,
                    maxlength: 10,
                },
                ddd_celular: {
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                celular: {
                    required: true,
                    minlength: 8,
                    maxlength: 10,
                },
                idEmpreendimento: {
                    required: true,
                    valueNotEquals: "default"
                },
                endTerreno: {
                    required: true,
                    minlength: 4
                },
                siglaEstado: {
                    required: true,
                    valueNotEquals: "default"
                },
                cidade: {
                    required: true,
                    minlength: 3
                },
                numIptu: {
                    required: true,
                    minlength: 3
                },
                preco: {
                    required: true
                },
                areaTerreno: {
                    required: true
                },
                proposta: {
                    required: true
                },
                cpf: {
                    cpf: true,
                    required: true
                },
                curriculo: {
                    required: true,
                    fileExtension: true
                },
                mensagem: {
                    required: true
                }
            },
            messages: {
                nome: {
                    required: "Informe seu nome",
                    minlength: "Informe ao menos 2 caracteres"
                },
                email: {
                    required: "Por favor informe um email válido",
                    minlength: "Por favor informe um email válido",
                    email: "Por favor informe um email válido"
                },
                ddd: {
                    required: "Informe um número de DDD",
                    minlength: "Informe ao menos 2 numeros no DDD",
                    digits: "Informe somente números"
                },
                fone: {
                    required: "Informe um número de telefone",
                    minlength: "Informe ao menos 8 numeros no Telefone",
                    digits: "Informe somente números"
                },
                ddd_celular: {
                    required: "Informe um número de DDD",
                    minlength: "Informe ao menos 2 numeros no DDD",
                    digits: "Informe somente números"
                },
                celular: {
                    required: "Informe um número de telefone",
                    minlength: "Informe ao menos 8 numeros no Telefone",
                    digits: "Informe somente números"
                },
                idEmpreendimento: {
                    required: "Selecione um empreendimento na lista",
                    valueNotEquals: "Selecione um empreendimento na lista"
                },
                endTerreno: {
                    required: "Informe seu endereço",
                    minlength: "Informe um endereço válido"
                },
                siglaEstado: {
                    required: "Selecione um Estado na lista",
                    valueNotEquals: "Selecione um Estado na lista"
                },
                cidade: {
                    required: "Informe sua cidade",
                    minlength: "Informe uma cidade válida"
                },
                numIptu: {
                    required: "Informe seu numero do IPTU",
                    minlength: "Informe um numero válido"
                },
                preco: {
                    required: "Informe o preco do m² do terreno",
                    number: "Somente numeros"
                },
                areaTerreno: {
                    required: "Informe a area do terreno",
                    number: "Somente numeros",
                },
                proposta: {
                    required: "Informe uma proposta"
                },
                cpf: {
                    required: "Informe um CPF",
                    cpf: 'CPF inválido'
                },
                cep: {
                    cep: 'Informe um CEP válido'
                },
                curriculo: {
                    required: "Envie seu curriculo (doc, docx, pdf, odt, ods)",
                    extension: "Envie uma extensão de arquivo válida (doc, docx, pdf)"
                },
                mensagem: {
                    required: "Informe uma mensagem"
                }
            },
            submitHandler: function(form) {
                if ($(form).attr("id") == "chatForm") {
                    var nomeEmpreendimento = $('#chatForm').find('#idEmpreendimento').find(':selected').text();
                    dataLayer.push({
                        'event': 'chat_online',
                        'nome_empreendimento': nomeEmpreendimento
                    });
                    custom.postChat();
                } else {
                    var obj = {};
                    var target = $(form).data("target");
                    $(form).find("input[type!=button], textarea, select").each(function () {
                        obj[$(this).attr("name")] = $(this).val();
                        if ($(this).attr("type") == "checkbox") obj[$(this).attr("name")] = $(this).prop("checked");
                        if ($(this).attr("type") == "radio") obj[$(this).attr("name")] = $("input[name='" + $(this).attr("name") + "']:checked").val();
                        if ($(this).attr("type") == "file" && $(this).val() != "") {
                            var file = $(this)[0].files[0];
                            obj[$(this).attr("name") + "Base64"] = custom.getBase64(file);
                        }
                    });
                    obj.pagina = window.document.location.href;
                    obj.utm_source = custom.getCookie("v_source");
                    obj.utm_campaign = custom.getCookie("v_campaign");
                    obj.utm_content = custom.getCookie("v_content");
                    obj.utm_medium = custom.getCookie("v_medium");
                    var _q = $.Deferred();
                    $.when(_q).done(function (response) {
                        if($(".modal").is(":visible")) $('.modal').modal('hide');
                        swal(
                            response,
                            '',
                            'success'
                        )
                    
                    });
                    custom.submitForm(obj, target, _q);
                    return false;
                }
            },
        });
    },
    /**
     * postChat
     * Para enviar um post para um dominio diferente em uma nova janela foi necessario criar
     * um form virtual, abrir uma nova janela e submeter o form virtual com o target para
     * janela criada com um de seus campos preenchidos (virtual_obj) com o json que deve ser
     * lido na pagina de destino.
     * Essa medida foi necessaria somente para validação, uma vez que quando estiver em produção
     * o site estará no mesmo dominio do chat, e passar um json para uma nova janela nessa caso
     * poderia, e é recomendado, ser feito com window.localstorage.
     */
    postChat: function () {
        custom.openPopUpCenter("Chat Eztec", 581, 581);
        var obj = {};
        var $chatForm = $("#chatForm");
        $chatForm.find("input[type!='button'], select").each(function () {
            obj[$(this).attr("name")] = $(this).val();
            if ($(this).attr("type") == "checkbox") obj[$(this).attr("name")] = $(this).prop("checked");
            if ($(this).prop("tagName") === "SELECT") {
                obj.nomeEmpreendimento = $(this).find("option:selected").text();
                obj[$(this).attr("name")] = $(this).val();
            }
        });
        obj.utm_source = custom.getCookie("v_source");
        obj.utm_campaign = custom.getCookie("v_campaign");
        obj.utm_content = custom.getCookie("v_content");
        obj.utm_medium = custom.getCookie("v_medium");
        var $vForm = $("<form>");
        $vForm
            .attr("target", "Chat Eztec")
            .attr("action", $chatForm.attr("action")).attr("method", "POST");
        $vForm.append($("<input>")
            .attr("name", "virtual_obj").val(JSON.stringify(obj)));
        $("body").append($vForm);
        $vForm.submit();
        $vForm.remove();
        $('.modal').modal('hide');
    },
    openPopUpCenter: function (title, w, h) {
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open("about:blank", title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        if (window.focus) {
            newWindow.focus();
        }
    },
    getEnv: function () {
        var WSROOT = "";
        var domain = window.document.location.toString();
        if (domain.indexOf("www.") != -1)
            domain = domain.split("www.")[1];
        switch (domain) {
            case "ezprd.eztec.com.br":
                WSROOT = "https://sgc.eztec.com.br/CrmWeb/portalWS.do"
                break;
            case "eztec.com.br":
                WSROOT = "https://www.eztec.com.br/CrmWeb/portalWS.do"
                break;
            default:
                WSROOT = "https://sgc.eztec.com.br/CrmWeb/portalWS.do"
        }
        return WSROOT;
    },
    loadSocialSDK: function () {
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        window.fbAsyncInit = function() {
            FB.init({
                appId : '354015751773073',
                status : true,
                xfbml : true,
                version    : 'v2.12'
            });
        };
        gapi.load('auth2', function(){
        auth2 = gapi.auth2.init({
            client_id: '821272735514-k4ds4b3lsph2shj6t2dmpkn4v9ufcuhe.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin'
        });
            custom.loginGoogle($(".btn-social-connect-google")[0]);
        });
    },
    loadAPI: function (array,callback) {
        var loader = function(src,handler){
        var script = document.createElement("script");
        script.src = src;
        script.onload = script.onreadystatechange = function(){
            script.onreadystatechange = script.onload = null;
            handler();
        }
        var head = document.getElementsByTagName("head")[0];
        (head || document.body).appendChild( script );
        };
        (function run(){
            if(array.length!=0){
                loader(array.shift(), run);
            }else{
                callback && callback();
            }
        })();
    },
    loginFB: function () {
        FB.login( function(response) {
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    FB.api('/me', function(response) {
                        $("#chatForm > div.modal-body > div:nth-child(9) > div:nth-child(1) > a > p").text("Conectado com o Facebook");
                        $("input[name='idFacebook']").val(response.id);
                        $("input[name='nome']").val(response.name);
                        $("input[name='email']").val(response.email);
                        $("input[name='idGoogle']").val("");
                    });
                }
            });
        }, { scope: 'public_profile,email' });
    },
    loginGoogle: function (element) {
        auth2.attachClickHandler(element, {},
        function(googleUser) {
              $("#chatForm > div.modal-body > div:nth-child(9) > div:nth-child(2) > a > p").text("Conectado com o Google");
              $("input[name='idGoogle']").val(googleUser.getBasicProfile().getId()); // Do not send to your backend! Use an ID token instead.
              $("input[name='nome']").val(googleUser.getBasicProfile().getName());
              $("input[name='email']").val(googleUser.getBasicProfile().getEmail());
              $("input[name='idFacebook']").val("");
        }, function(error) {
            console.log(error);
        });
    },
    getCookie: function (cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

};

//Set 2 global variables
var scrollTopPosition = 0;
var lastKnownScrollTopPosition = 0;

$(document).ready(function() {

    /*--------------------------
    # Form
    --------------------------*/
    $("form[data-isintegrado]").each(function () {
        custom.setFormMask();
        var validator = custom.validate($(this));
    });

    /*--------------------------
    # Menu
    --------------------------*/
    var prev = 50;
    var $window = $(window);
    var nav = $('.menu-geral');

    $window.on('scroll', function(){
        var scrollTop = $window.scrollTop();
        nav.toggleClass('short', scrollTop > prev);
    });

    /*---------------------------------------
    # Galeria de Imagens
    ---------------------------------------*/
    custom.createGallery('#image-gallery', 'full');

    /*---------------------------------------
    # Top Back Button
    ---------------------------------------*/
    $('.btn-top-back').click(function() {
        $('html, body').stop().animate({scrollTop:0}, 900, 'swing');
    });

    $('.nav-menu-list').singlePageNav({
        currentClass: 'active',
        offset: 90,
        speed: 900,
        updateHash: true
    });

    $('.nav-menu-list-mobile').singlePageNav({
        currentClass: 'active',
        offset: 102.6,
        speed: 900,
        updateHash: true
    });

    //this only runs on the right platform -- this step is not necessary, it should work on all platforms
    if( (navigator.userAgent.match(/iPhone|iPod|iPad/i)) && (navigator.userAgent.match(/Safari/i)) ) {

        //There is some css below that applies here
        if ((navigator.userAgent.match(/iPhone|iPod/i))) {
            $('body').addClass('platform-ios-iphone');

        } else if ((navigator.userAgent.match(/iPad/i))) {
            $('body').addClass('platform-ios-ipad');
        }

        //As you scroll, record the scrolltop position in global variable
        $(window).scroll(function () {
            scrollTopPosition = $(document).scrollTop();
        });

        //when the modal displays, set the top of the (now fixed position) body to force it to the stay in the same place
        $('.modal').on('show.bs.modal', function () {
            //scroll position is position, but top is negative
            $('body').css('top', (scrollTopPosition * -1));
            //save this number for later
            lastKnownScrollTopPosition = scrollTopPosition;
            $('body').scrollTop(lastKnownScrollTopPosition);
        });

        //on modal hide
        $('.modal').on('hidden.bs.modal', function () {
            //force scroll the body back down to the right spot (you cannot just use scrollTopPosition, because it gets set to zero when the position of the body is changed by bootstrap
            $('body').scrollTop(lastKnownScrollTopPosition);
        });

    }

});