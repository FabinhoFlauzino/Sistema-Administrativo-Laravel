let baseurl = window.location.origin; //definindo a origem de base pegando a URL de origin

$(document).ready(function() {
    $("#empresa-ajax").select2({ //buscando a empresa por id
        ajax: {
            url:  baseurl + "/empresas/buscar-por/nome", //caminho que vai chamar para obter a lista
            dataType: 'json', //tipo de requisição
            delay: 250, //deley para esperar um pouco quando digitar
            type: 'post', // tipo de metodo http
            data: function (params) { // parametro terá o termo de busca para filtrar peo que está sendo digitado
                return {
                    nome: params.term, // search term
                    tipo: $('#tipo').val()
                };
            },
            headers: { //buscando o campo token e pega o conteudo
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processResults: function (data) { //processando resultado retornado e passando dentro da data
                return {
                    results: data
                };
            },
            cache: true // permitindo cache 
        }
    });

    $("#produto-ajax").select2({
        ajax: {
            url:  baseurl + "/produtos/buscar-por/nome",
            dataType: 'json',
            delay: 250,
            type: 'post',
            data: function (params) {
                return {
                    nome: params.term // search term
                };
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
});
