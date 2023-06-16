var custom = {

    createGallery: function (idElement, mode) {
        switch (mode) {
            case 'full':
                $(idElement).lightSlider({
                    gallery: true,
                    item: 1,
                    loop: true,
                    slideMargin: 0,
                    thumbItem: 9,
                    enableDrag: false,
                    currentPagerPosition: 'left',
                    onSliderLoad: function (el) {
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
                    gallery: true,
                    item: 1,
                    loop: true,
                    slideMargin: 0,
                    thumbItem: 9,
                    enableDrag: false,
                    currentPagerPosition: 'left',
                });
                break;
            case 'no-thumb':
                $(idElement).lightSlider({
                    item: 1,
                    loop: true,
                    slideMargin: 0,
                    thumbItem: 9,
                    enableDrag: false,
                    currentPagerPosition: 'left'
                });
                break;
        }
    },
    briteverifyMail : function (email) {
        var a = custom.getEnv();
        var _r;
        $.ajax({
            url: a +"?t=ws-verifica-email&email=" + email, async: false,  method: "POST", success: function (result) {
                _r = JSON.parse(result).status;
            }
        });
        return (_r == "valid" || _r == "unknown" );
    },
    submitForm: function (data, target, promisse) {
        var targetGA = target;
        var form = $("form[data-target='" + target + "']");
        var nomeEmpreendimento = form.find('#nomeEmpreendimento').find(":selected").text();
        switch (target) {
            case 'ws-produto':
                target = 'ws-faleconosco';
                break;
            case 'ws-email':
                target = 'ws-faleconosco';
                break;
        }
        custom.triggerGA(targetGA);

        var btnEnviar = form.find('#btnEnviar');
        var originalHtml = btnEnviar.html();
        btnEnviar.html('Enviando');
        btnEnviar.attr('disabled', true);
        $.ajax({
            type: "POST",
            url: custom.getEnv() + "?t=" + target,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify(data),
            success: function (response) {
                switch (targetGA) {
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
                        break;
                    case 'ws-email':
                        dataLayer.push({
                            'event': 'email'
                        });
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
    triggerGA: function (targetGA) {
        switch (targetGA) {
            case 'ws-faleconosco':
                dataLayer.push({ 'event': 'contato_fale_conosco_pre_envio_bd' });
                break;
            case 'ws-whatsapp':
                dataLayer.push({ 'event': 'whatsapp_pre_envio_bd' });
                break;
            case 'ws-email':
                dataLayer.push({ 'event': 'email_pre_envio_bd' });
                break;
            case 'ws-produto':
                dataLayer.push({ 'event': 'form_produto_pre_envio_bd' });
                break;
        }
    },
    setFormMask: function () {
        $("input[alt='fone']").inputmask({
            mask: ["9999-9999", "99999-9999", {
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
            mask: ["999.999.999-99"],
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
        $.validator.addMethod("ddd", function (value, element) {
            value = value.replace("(", "");
            value = value.replace(")", "");
            value = value.replace("-", "");
            value = value.replace(" ", "").trim();
            if (value == '000') {
                return (this.optional(element) || false);
            }
            if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
                return (this.optional(element) || false);
            }
            return (this.optional(element) || true);
        }, "Informe um DDD válido");
        $.validator.addMethod("fone", function (value, element) {
            value = value.replace("(", "");
            value = value.replace(")", "");
            value = value.replace("-", "");
            value = value.replace(" ", "").trim();
            if (["0"].indexOf(value.substring(0, 1)) != -1) { //Caso o telefone comece com zero, é invalido
                return (this.optional(element) || false);
            }
            if (value.length > 8 && !(["9"].indexOf(value.substring(0, 1)) != -1)) { //celulares devem começar obrigatoriamente com 9
                return (this.optional(element) || false);
            }
            if (value.length == 8 && !(["2","3","4","5","7"].indexOf(value.substring(0, 1)) != -1 )) { //telefones fixos devem iniciar na faixa 2,3,4,5 e 7 (radio)
                return (this.optional(element) || false);
            }
            var expReg = /^(\d)\1{7,10}/;
            if (value.match(expReg)) return (this.optional(element) || false); //checa por todos digitos repetidos
            if (value.length < 8 || value.length > 9) {
                return (this.optional(element) || false);
            }
            return (this.optional(element) || true);
        }, "Informe um telefone válido");
        $.validator.addMethod("celular", function (value, element) {
            value = value.replace("(", "");
            value = value.replace(")", "");
            value = value.replace("-", "");
            value = value.replace(" ", "").trim();
            if (["00", "01", "02", "03", "04", "05","06", "07", "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
                return (this.optional(element) || false);
            }
            if (!(["9"].indexOf(value.substring(0, 1)) != -1)) {
                return (this.optional(element) || false);
            }
            var expReg = /^(\d)\1{7,10}/;
            if (value.match(expReg)) return (this.optional(element) || false);
            if (value.length != 9) {
                return (this.optional(element) || false);
            }
            return (this.optional(element) || true);
        }, "Informe um telefone celular válido");
        form.validate({
            rules: {
                nome: {
                    required: true,
                    minlength: 2
                },
                nomeStartup: {
                    required: true,
                    minlength: 2
                },
                descStartup: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true,
                },
                site: {
                    required: true,
                    url: true,
                },
                ddd: {
                    ddd: true,
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                fone: {
                    fone: true,
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
                    celular : true,
                    required: true,
                    minlength: 9,
                    maxlength: 10
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
                    minlength: 11,
                    maxlength: 14,
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
                nomeStartup: {
                    required: "Informe o nome de sua startup",
                    minlength: "Informe ao menos 2 caracteres"
                },
                descStartup: {
                    required: "Informe uma breve descricao",
                    minlength: "Informe ao menos 10 caracteres"
                },
                email: {
                    required: "Por favor informe um email válido",
                    minlength: "Por favor informe um email válido",
                    email: "Por favor informe um email válido",
                },
                site: {
                    required: "Por favor informe uma URL",
                    url: "Por favor informe uma URL válida (Ex: https://www.eztec.com.br)",
                },
                ddd: {
                    required: "Informe um número de DDD",
                    minlength: "Informe ao menos 2 numeros no DDD",
                    digits: "Informe somente números",
                    ddd: "Informe um DDD válido"
                },
                fone: {
                    required: "Informe um número de telefone",
                    minlength: "Informe ao menos 8 numeros no Telefone",
                    digits: "Informe somente números",
                    fone: "Informe um telefone válido"
                },
                ddd_celular: {
                    required: "Informe um número de DDD",
                    minlength: "Informe ao menos 2 numeros no DDD",
                    digits: "Informe somente números",
                    ddd: "Informe um DDD válido"
                },
                celular: {
                    required: "Informe um número de telefone",
                    minlength: "Informe ao menos 9 numeros no Telefone",
                    digits: "Informe somente números",
                    fone: "Informe um número de celular válido"
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
            submitHandler: function (form) {
                if ($(form).find("[name=email]").val().indexOf("teste") != -1 ||
                    custom.briteverifyMail($(form).find("[name=email]").val())) {

                    if ($(form).attr("id").indexOf("chatForm") != -1) {
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
                        //var midia = JSON.parse(window.localStorage.getItem("params"));
						var nParams = custom.getParams(window.location.href);
                        var midia = nParams != null? JSON.parse(JSON.stringify(nParams)):"HOT_SITE_LINDENBERG" ;
                        obj.pagina = window.document.location.href;
                        obj.utm_source = midia.utm_source != null && midia.utm_source != "" ?midia.utm_source : "DIRETO";
                        obj.utm_campaign =  midia.utm_campaign != null && midia.utm_campaign != "" ? midia.utm_campaign : "DIRETO";
                        obj.utm_content = midia.utm_content != null && midia.utm_content != "" ? midia.utm_content : "DIRETO";
                        obj.utm_medium = midia.utm_medium != null && midia.utm_medium != "" ? midia.utm_medium : "DIRETO";
                        obj.gaId = window.localStorage.getItem("GA_CUSTOM_ID");
                        var _q = $.Deferred();
                        $.when(_q).done(function (response) {
                            if ($(".modal").is(":visible")) $('.modal').modal('hide');
                            if((new Date().getTime() >= new Date(2022,11,22).getTime() && (new Date().getTime() <= new Date(2023,0,04).getTime()))){
                                response = "Agradecemos seu contato. Entre os dias 22/Dez e 04/Jan/2023 estaremos em recesso, o corretor associado fará o contato a partir de 05/Jan/2023.";
                            }
                            swal(
                                response,
                                '',
                                'success'
                            )
                        });
                        custom.submitForm(obj, target, _q);
                        return false;
                    }
                }else{
                    $(form).find("[name=email]").addClass("error");
                    var fo = $(form).find("[id=email-error]");
                    if(fo.length > 0) {
                        fo.text("Informe um endereço de email válido.").toggle();
                    } else {
                        $('<label id="email-error" class="error" for="email" style="">Por favor informe um email válido</label>').insertAfter($(form).find("[name=email]"));
                    }
                }
            },
        });
    },
    postChat: function () {
        custom.openPopUpCenter("Chat Eztec", 581, 581);
        var obj = {};
        var $chatForm = $("#chatForm");
        if ($("form[id^=chatForm]").length > 1) {
            $("form[id^=chatForm]").each(function () {
                if ($(this).find("input[name='nome']").val() != "")
                    $chatForm = $(this);
            });
        }else{
            $("form[id^=chatForm]").each(function () {
                    $chatForm = $(this);
            });
        }
        $chatForm.find("input[type!='button'], select").each(function () {
            obj[$(this).attr("name")] = $(this).val();
            if ($(this).attr("type") == "checkbox") obj[$(this).attr("name")] = $(this).prop("checked");
            if ($(this).prop("tagName") === "SELECT") {
                obj.nomeEmpreendimento = $(this).find("option:selected").text();
                obj[$(this).attr("name")] = $(this).val();
            }
        });
        dataLayer.push({
            'event': 'chat_online_pre_envio_bd',
            'nome_empreendimento': obj.nomeEmpreendimento
        });
        var midia = JSON.parse(window.localStorage.getItem("params"));
        obj.pagina = window.document.location.href;
        obj.utm_source = midia.utm_source;
        obj.utm_campaign =  midia.utm_campaign;
        obj.utm_content = midia.utm_content;
        obj.utm_medium = midia.utm_medium;
        obj.gaId = window.localStorage.getItem("GA_CUSTOM_ID");
        $("input[name='nome']").val(obj.nome);
        $("input[name='email']").val(obj.email);
        $("input[name='ddd']").val(obj.ddd);
        $("input[name='fone']").val(obj.fone);
        $.ajax({
            type: "POST",
            url: custom.getEnv() + "?t=ws-chat",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify(obj),
            success: function (response) {
                console.log(response);
            },
            error: function (response) {
                console.log(response);
            }
        });
        var $vForm = $("<form>");
        $vForm
            .attr("target", "Chat Eztec")
            .attr("action", $chatForm.attr("action")).attr("method", "POST");
        $vForm.append($("<input>")
            .attr("name", "virtual_obj").val(JSON.stringify(obj)));
        $("body").append($vForm);
        $vForm.submit();
        $("body").append('<iframe src="//us.creativecdn.com/tags?id=pr_tCSAS4wYI5FdWBCdovLP_orderstatus2_1_' + new Date().getTime() + '_' + $chatForm.find('#idEmpreendimento').find(":selected").val() + '&cd=default" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>');
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
        try {
            newWindow.focus();
        }
        catch (e) {
            sweetAlert("Por favor permita os popups desse site seu navegador para executar o chat.");
        }
    },
    getEnv: function () {
        var WSROOT = "";
        var domain = window.document.location.toString();
        if (domain.indexOf("ezhmg") != -1) {
            WSROOT = "https://ezhmg.eztec.com.br/CrmWeb/portalWS.do"
        } else {
            WSROOT = "https://www.eztec.com.br/CrmWeb/portalWS.do"
        }
        return WSROOT;
    },
    loadSocialSDK: function () {
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        window.fbAsyncInit = function () {
            FB.init({
                appId: '354015751773073',
                status: true,
                xfbml: true,
                version: 'v2.12'
            });
        };
        gapi.load('auth2', function () {
            auth2 = gapi.auth2.init({
                client_id: '821272735514-k4ds4b3lsph2shj6t2dmpkn4v9ufcuhe.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin'
            });
            custom.loginGoogle($(".btn-social-connect-google")[0]);
        });
    },
    loadAPI: function (array, callback) {
        var loader = function (src, handler) {
            var script = document.createElement("script");
            script.src = src;
            script.onload = script.onreadystatechange = function () {
                script.onreadystatechange = script.onload = null;
                handler();
            }
            var head = document.getElementsByTagName("head")[0];
            (head || document.body).appendChild(script);
        };
        (function run() {
            if (array.length != 0) {
                loader(array.shift(), run);
            } else {
                callback && callback();
            }
        })();
    },
    loginFB: function () {
        FB.login(function (response) {
            FB.getLoginStatus(function (response) {
                if (response.status === 'connected') {
                    FB.api('/me', function (response) {
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
            function (googleUser) {
                $("#chatForm > div.modal-body > div:nth-child(9) > div:nth-child(2) > a > p").text("Conectado com o Google");
                $("input[name='idGoogle']").val(googleUser.getBasicProfile().getId()); // Do not send to your backend! Use an ID token instead.
                $("input[name='nome']").val(googleUser.getBasicProfile().getName());
                $("input[name='email']").val(googleUser.getBasicProfile().getEmail());
                $("input[name='idFacebook']").val("");
            }, function (error) {
                console.log(error);
            });
    },
    getCookie: function (cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    },
    getParams: function (url) {
        var timestamp = new Date().getTime();
        var params = {};
        var parser = document.createElement('a');
        parser.href = url;
        var query = parser.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            params[pair[0]] = decodeURIComponent(pair[1]);
        }
        params["timestamp"] = timestamp;
        return params;
    },
    generateUserGUID: function () {
        if (window.localStorage.getItem("GA_CUSTOM_ID") == undefined || window.localStorage.getItem("GA_CUSTOM_ID") == "") {
            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            var _guid = s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
            dataLayer.push({ 'user_id': _guid });
            window.localStorage.setItem("GA_CUSTOM_ID", _guid);
            setTimeout(function () {
                ga('create', 'UA-3740325-1', { 'userId': _guid });
                ga('set', 'dimension1', _guid);
                ga('send', 'pageview');
            }, 5000);
        } else {
            dataLayer.push({ 'user_id': window.localStorage.getItem("GA_CUSTOM_ID") });
            setTimeout(function () {
                ga('create', 'UA-3740325-1', { 'userId': window.localStorage.getItem("GA_CUSTOM_ID") });
                ga('set', 'dimension1', window.localStorage.getItem("GA_CUSTOM_ID"));
                ga('send', 'pageview');
            }, 5000);
        }
    }

};

//Set 2 global variables
var scrollTopPosition = 0;
var lastKnownScrollTopPosition = 0;

$(document).ready(function () {
    /*------------------------
    # Generate User ID - GA
    -------------------------- */

    $(".btn-social-connect.btn-social-connect-facebook").click(function () {
        custom.loginFB();
    });

    //custom.generateUserGUID();

    /*----------------------------
    # TAG de conversao RTB
    ----------------------------*/
    $("[data-toggle='modal']").on("click", function () {
        $("body").append('<iframe src="https://us.creativecdn.com/tags?id=pr_tCSAS4wYI5FdWBCdovLP_startorder" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>');
    })

    /*--------------------------
    # URL Parameters
    --------------------------*/
    var _params = JSON.parse(window.localStorage.getItem("params"));
    var nParams = custom.getParams(window.location.href);
    if(_params){
        if((Math.abs(new Date(_params.timestamp) && new Date().getTime) / 365) >= 168)
            window.localStorage.removeItem("params");
        if(nParams.utm_source)
            window.localStorage.setItem("params", JSON.stringify(nParams));
    }else{
        window.localStorage.setItem("params", JSON.stringify(nParams));
    }
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

    $window.on('scroll', function () {
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
    $('.btn-top-back').click(function () {
        $('html, body').stop().animate({ scrollTop: 0 }, 900, 'swing');
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
    if ((navigator.userAgent.match(/iPhone|iPod|iPad/i)) && (navigator.userAgent.match(/Safari/i))) {

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