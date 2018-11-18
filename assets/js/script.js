
function arredondar(x){

    return x.toFixed(2);

}

function calculaPrecoSugerido(){
    let precos = $('.js-preco-custo');
    let markup = parseFloat($('#markup').val()) + 1;
    let result = 0;

    for(let i = 0; i < precos.length; i++){
        let value = parseFloat(precos[i].getAttribute('data-preco'));
        result += value;
    }

    result *= markup;
    result = arredondar(result);
    $('#precoSugerido').val('R$ ' + result);
}

function formatDate(date){
    let arrDate = date.split('/');
    let dateFormated = `${arrDate[2]}-${arrDate[1]}-${arrDate[0]}`;

    return dateFormated;
}

function escreveTabelaProduto() {
    $("#SearchTabela").html('<br><div class="align-center"><img src="../assets/images/launcher-loader.gif" width="100"></div>');

    var url = "loadProduct";
    var codigo = parseInt($("#codigos").val());
    $("#codigo").focus();

    $.ajax({
        type: 'POST',
        url: url,
        data: { sku: (codigo ? codigo : '')},
        success:function (retorno) {
            retorno = JSON.parse(retorno);
            var tabela = '<div class="col-md-12 align-left"> ' +
                '<div class="search-tabela">' +
                '<table class="table table-striped table-hover "> ' +
                '<thead> ' +
                '<th width="30%">Nome</th> ' +
                '<th width="60%">Preço de Custo</th> ' +
                '<th width="10%">Ações</th> ' +
                '</thead> ' +
                '<tbody> ';

            for (var i = 0; i < retorno.length; i++) {
                tabela = tabela +
                    '<tr class="pointer" onclick="definirProduto(\'' + retorno[i]['produto'].descricao + '\',\'' + arredondar(parseInt(retorno[i]['produto'].precoCusto)) + '\', \'' + retorno[i]['produto'].codigo + '\', \'' + $('#idComposto').val() +'\')"> ' +
                    '  <td>' + retorno[i]['produto'].descricao + '</td> ' +
                    '  <td>' + arredondar(parseInt(retorno[i]['produto'].precoCusto)) + '</td> ' +
                    '  <td><span title="Selecionar"><i class="fa fa-check-circle fa-fw" /></span></td> ' +
                    '</tr> ';
            }

            tabela = tabela +
                '</tbody> ' +
                '</table> ' +
                '</div> ' +
                '</div> ' +
                '</div>';

            swal.hideLoading();

            $("#SearchTabela").html(tabela);

        },
        error:function(msg){
            console.log(msg);
        }
    });


}

function definirProduto(nome, precoCusto, sku, id){

    $.ajax({
        type: 'POST',
        url: 'saveProduct',
        data: { nome: nome, precoCusto: precoCusto, sku: sku, id: id},
        success:function(retorno){
            $('.text-nores').fadeOut(300);
            $('.body-product').append('<tr><td>'+sku+'</td><td>'+nome+'</td><td>'+precoCusto+'</td><td><a href="#" id="'+id+'" class="delProd">Excluir</a></td></tr>');
            swal.close();
            location.reload();
        }
    })
}


$(document).ready(function(){
    $("#subMenu1").on("click", function(){
        (".fa-plus").toggleClass("fa-minus");
    });


    $('#addProd').on('click',function () {

        swal({
            title: 'Produtos',
            width: 800,
            onBeforeOpen: function () {
                escreveTabelaProduto();
            },
            onOpen: function () {
                setTimeout(function () {

                    $("#codigos").on("keyup",
                        function () {
                            escreveTabelaProduto();
                        });
                }, 1000);
            },
            html:
                '<div class="form-group"> ' +
                    '<div class="col-md-12"> ' +
                    '<label class="control-label" for="Nome">Código do produto</label> ' +
                    '<input class="form-control" id="codigos" name="codigos" type="text" value=""> ' +
                    '</div> ' +
                    '<div id="SearchTabela" class="min-height-250 clear">' +
                    '</div>',
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            focusConfirm: false
        });

    });

    $('.moreOrder').on('click', function(e){
        e.preventDefault();

        let numero = $(this).attr('data-number');

        swal({
            title: 'Pedido',
            width: 800,
            onBeforeOpen: function(){
                tabelaPedidos(numero);
            },
            html: "<div class='col-md-12 row' id='ModalPedido'>"+
                  "</div>",
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            focusConfirm: false
        });

        tabelaPedidos(numero);
    });

    $('.moreOrderReport').on('click', function(e){
        e.preventDefault();

        let numero = $(this).attr('data-number');

        swal({
            title: 'Pedido',
            width: 800,
            onBeforeOpen: function(){
                tabelaPedidosRelatorio(numero);
            },
            html: "<div class='col-md-12 row' id='ModalPedido'>"+
                  "</div>",
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            focusConfirm: false
        });

        tabelaPedidosRelatorio(numero);
    });

    // $('.gerarPdfPedido').on('click', function(e){
    //     $e.preventDefault();
    //     let number = $(this).data('number');
    //     $.ajax({
    //         type: 'get',
    //         url: 'generatePdfOrder',
    //         data: { number : number},
    //         success: function(response){
    //             swal.close();
    //         },
    //         error: function(response){
    //             console.log(response);
    //             swal({
    //                 type: 'error',
    //                 title: 'Ooops...',
    //                 text: 'Algo deu errado, tente novamente.'
    //             });
    //         }
    //     });
    // });

    $('#addComp').on('click',function () {

        swal({
            title: 'Produtos Composto',
            width: 800,
            onBeforeOpen: function () {
                escreveTabelaComposto();
            },
            onOpen: function () {
                setTimeout(function () {

                    $("#codigos").on("keyup",
                        function () {
                            escreveTabelaComposto();
                        });
                }, 1000);
            },
            html:
                '<div class="form-group"> ' +
                    '<div class="col-md-12"> ' +
                    '<label class="control-label" for="Nome">Código do produto</label> ' +
                    '<input class="form-control" id="codigos" name="codigos" type="text" value=""> ' +
                    '</div> ' +
                    '<div id="SearchTabela" class="min-height-250 clear">' +
                    '</div>',
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            focusConfirm: false
        });

    });
})

function escreveTabelaComposto(){
    $("#SearchTabela").html('<br><div class="align-center"><img src="../assets/images/launcher-loader.gif" width="100"></div>');

    var url = "loadComposto";
    var codigo = $("#codigos").val();
    $("#codigos").focus();

    $.ajax({
        type: 'POST',
        url: url,
        data: { sku: (codigo ? codigo : '')},
        success:function (retorno) {
            retorno = JSON.parse(retorno);
            var tabela = '<div class="col-md-12 align-left"> ' +
                '<div class="search-tabela">' +
                '<table class="table table-striped table-hover "> ' +
                '<thead> ' +
                '<th width="30%">SKU</th> ' +
                '<th width="60%">Produto</th> ' +
                '<th width="10%">Quantidade</th> ' +
                '</thead> ' +
                '<tbody> ';

            for (var i = 0; i < retorno.length; i++) {
                tabela = tabela +
                    '<tr class="pointer" onclick="definirProducao(\'' + retorno[i]['codigo'] + '\',\'' + retorno[i]['nome'] + '\', \'' + $('#idControle').val() + '\')"> ' +
                    '  <td>' + retorno[i]['codigo'] + '</td> ' +
                    '  <td>' + retorno[i]['nome'] + '</td> ' +
                    '  <td><span title="Selecionar"><i class="fa fa-check-circle fa-fw" /></span></td> ' +
                    '</tr> ';
            }

            tabela = tabela +
                '</tbody> ' +
                '</table> ' +
                '</div> ' +
                '</div> ' +
                '</div>';

            swal.hideLoading();

            $("#SearchTabela").html(tabela);

        },
        error:function(msg){
            console.log(msg);
        }
    });
}

function definirProducao(sku, nome, id){

    swal({
        title: 'Quantidade',
        text: 'Informe a quantidade de produtos as entrarem na produção:',
        input: 'text',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        showConfirmButton: true,
        showCloseButton: false,
        showLoaderOnConfirm: false,
        inputValidator: (value) => {
            return new Promise((resolve) =>{
                if(value !== ''){
                    resolve();
                }else{
                    resolve('Informe a quantidade!!!');
                }
            });
        },
        preConfirm: (qtd) => {
            return new Promise(function (resolve){
                if(qtd === ''){
                    swal.showValidateError(
                        'Informe a quantidade!!!'
                    );
                }

                swal.showLoading();
                $.ajax({
                    type: 'POST',
                    url: 'saveProducao',
                    data: {
                        sku: sku,
                        nome: nome,
                        id: id,
                        qtd: qtd
                    }
                }).done(function(response){
                    $('.text-nores').fadeOut(300);
                    $('.body-product').append('<tr><td>'+sku+'</td><td>'+nome+'</td><td>'+qtd+'</td><td><a href="#" id="'+id+'" class="delProd">Excluir</a></td></tr>');
                    swal.close();
                    location.reload();
                })
            });
        },
    });
}

function tabelaPedidos(number){
    $("#ModalPedido").html('<br><div class="m-auto"><img src="../assets/images/launcher-loader.gif" width="100"></div>');

    $.ajax({
        type: 'GET',
        url: 'loadProductNumber',
        data: { number: number},
        success: function(retorno){
            retorno = JSON.parse(retorno);
            let retornoDireto = retorno[0]['pedido'];
            let retornoItens = retornoDireto.itens;
            let retornoCliente = retornoDireto['cliente'];


            let pedido = `<div class='col-md-12 text-left'>
            <ul>
            <li><strong>Nome: </strong>${retornoCliente['nome']}</li>
            <li><strong>CNPJ: </strong>${retornoCliente['cnpj']}</li>
            <li><strong>I.E.: </strong>${retornoCliente['ie']}</li>
            <li><strong>RG: </strong>${retornoCliente['rg']}</li>
            <li><strong>Endereço: </strong>${retornoCliente['endereco']}, ${retornoCliente['numero']}</li>
            <li><strong>Complemento: </strong>${retornoCliente['complemento']}</li>
            <li><strong>Cidade: </strong>${retornoCliente['cidade']}</li>
            <li><strong>Bairro: </strong>${retornoCliente['bairro']}</li>
            <li><strong>CEP: </strong>${retornoCliente['cep']}</li>
            <li><strong>UF: </strong>${retornoCliente['uf']}</li>
            <li><strong>E-mail: </strong>${retornoCliente['email']}</li>
            <li><strong>Celular: </strong>${retornoCliente['celular']}</li>
            <li><strong>Telefone: </strong>${retornoCliente['fone']}</li>
            <li><strong>Desconto: </strong>${retornoDireto['desconto']}</li>
            <li><strong>Observações: </strong>${retornoDireto['observacoes']}</li>
            <li><strong>Observação Interna: </strong>${retornoDireto['observacaointerna']}</li>
            <li><strong>Data: </strong> ${retornoDireto['data']}</li>
            <li><strong>Número: </strong>${retornoDireto['numero']}</li>
            <li><strong>Valor Frete: </strong>${retornoDireto['valorfrete']}</li>
            <li><strong>Total de Produtos: </strong>${retornoDireto['totalprodutos']}</li>
            <li><strong>Total Venda: </strong>${retornoDireto['totalvenda']}</li>
            <li><strong>Situação: </strong>${retornoDireto['situacao']}</li>
            <li><strong>Loja: </strong>${retornoDireto['loja']}</li>
            <li><strong>Numero de Pedido da Loja: </strong>${retornoDireto['numeroPedidoLoja']}</li>
            <li><strong>Tipo Integração: </strong>${retornoDireto['tipoIntegracao']}</li>`;

            for(let i = 0; i < retornoItens.length; i++){
                pedido = pedido +
                        `<li><strong>Item: </strong>${retornoItens[i]['item']['descricao']}</li>
                        <li><strong>Quantidade item: </strong>${retornoItens[i]['item']['quantidade']}</li>`;
            }
            pedido = pedido +
            `</ul>
            </div>`;
            pedido = pedido + 
            `<div class='col-sm-12 text-center'>
                <button class="btn btn-search btn-primary" onclick="gerarProducao('${retornoItens[0]['item']['descricao']}', ${retornoItens[0]['item']['quantidade']}, '${retornoItens[0]['item']['codigo']}')">Gerar Produção</button>
            </div>`;
            swal.hideLoading();
            $('#ModalPedido').html(pedido);
        }
    });

}

function tabelaPedidosRelatorio(number){
    $("#ModalPedido").html('<br><div class="m-auto"><img src="../assets/images/launcher-loader.gif" width="100"></div>');

    $.ajax({
        type: 'GET',
        url: 'loadProductNumber',
        data: { number: number},
        success: function(retorno){
            retorno = JSON.parse(retorno);
            let retornoDireto = retorno[0]['pedido'];
            let retornoItens = retornoDireto.itens;
            let retornoCliente = retornoDireto['cliente'];


            let pedido = `<div class='col-md-12 text-left'>
            <ul>
            <li><strong>Nome: </strong>${retornoCliente['nome']}</li>
            <li><strong>CNPJ: </strong>${retornoCliente['cnpj']}</li>
            <li><strong>I.E.: </strong>${retornoCliente['ie']}</li>
            <li><strong>RG: </strong>${retornoCliente['rg']}</li>
            <li><strong>Endereço: </strong>${retornoCliente['endereco']}, ${retornoCliente['numero']}</li>
            <li><strong>Complemento: </strong>${retornoCliente['complemento']}</li>
            <li><strong>Cidade: </strong>${retornoCliente['cidade']}</li>
            <li><strong>Bairro: </strong>${retornoCliente['bairro']}</li>
            <li><strong>CEP: </strong>${retornoCliente['cep']}</li>
            <li><strong>UF: </strong>${retornoCliente['uf']}</li>
            <li><strong>E-mail: </strong>${retornoCliente['email']}</li>
            <li><strong>Celular: </strong>${retornoCliente['celular']}</li>
            <li><strong>Telefone: </strong>${retornoCliente['fone']}</li>
            <li><strong>Desconto: </strong>${retornoDireto['desconto']}</li>
            <li><strong>Observações: </strong>${retornoDireto['observacoes']}</li>
            <li><strong>Observação Interna: </strong>${retornoDireto['observacaointerna']}</li>
            <li><strong>Data: </strong> ${retornoDireto['data']}</li>
            <li><strong>Número: </strong>${retornoDireto['numero']}</li>
            <li><strong>Valor Frete: </strong>${retornoDireto['valorfrete']}</li>
            <li><strong>Total de Produtos: </strong>${retornoDireto['totalprodutos']}</li>
            <li><strong>Total Venda: </strong>${retornoDireto['totalvenda']}</li>
            <li><strong>Situação: </strong>${retornoDireto['situacao']}</li>
            <li><strong>Loja: </strong>${retornoDireto['loja']}</li>
            <li><strong>Numero de Pedido da Loja: </strong>${retornoDireto['numeroPedidoLoja']}</li>
            <li><strong>Tipo Integração: </strong>${retornoDireto['tipoIntegracao']}</li>`;

            for(let i = 0; i < retornoItens.length; i++){
                pedido = pedido +
                        `<li><strong>Item: </strong>${retornoItens[i]['item']['descricao']}</li>
                        <li><strong>Quantidade item: </strong>${retornoItens[i]['item']['quantidade']}</li>`;
            }
            pedido = pedido +
            `</ul>
            </div>`;
            pedido = pedido + 
            `<div class='col-sm-12 text-center'>
                <button class="btn btn-search btn-primary" onclick="gerarRelatorio(${retornoDireto['numero']})">Gerar Relatório</button>
            </div>`;
            swal.hideLoading();
            $('#ModalPedido').html(pedido);
        }
    });

}

function gerarProducao(produto, quantidade, codigo){
    //VERIFICA SE HÁ UM PRODUTO COMPOSTO COM ESSE CODIGO
    $.ajax({
        type:'GET',
        url: 'getComposto',
        data: { codigo : codigo },
        success: function(response){
            if(response){
                //CASO HAJA O PRODUTO EXECUTA O SCRIPT DE CRIAÇÃO DE PRODUÇÃO
                swal.mixin({
                    input: 'text',
                    confirmButtonText: 'Próximo &rarr;',
                    showCancelButton: true,
                    progressSteps: ['1', '2', '3']
                }).queue([
                    {
                        title: 'Data da produção',
                        text: 'Ex: 10/11/2018',
                        inputValidator: (value) => {
                            return new Promise((resolve) =>{
                                if(value !== ''){
                                    resolve();
                                }else{
                                    resolve('Informe a data de produção!!!');
                                }
                            });
                        }
                    },
                    {
                        title: 'Turno',
                        text: 'Manhã, Tarde ou Noite',
                        inputValidator: (value) => {
                            return new Promise((resolve) =>{
                                if(value !== ''){
                                    resolve();
                                }else{
                                    resolve('Informe o turno de trabalho!!!');
                                }
                            });
                        }
                    },
                    {
                        title: 'Descrição',
                        text: 'Descrição da produção',
                        input: 'textarea',
                        inputValidator: (value) => {
                            return new Promise((resolve) =>{
                                if(value !== ''){
                                    resolve();
                                }else{
                                    resolve('Escreva uma descrição sobre a produção!!!');
                                }
                            });
                        }
                    }
                ]).then((result) => {
                    if(result.value){
                        $.ajax({
                            type: 'POST',
                            url: 'createProduction',
                            data: {
                                data: formatDate(result.value[0]),
                                turno: result.value[1],
                                descricao: result.value[2]
                            },
                            success: function(resolve){
                                $.ajax({
                                    type: 'POST',
                                    url: 'getControle',
                                    data: {},
                                    success: function(retorno){
                                        retorno = JSON.parse(retorno);
                                        $.ajax({
                                            type: 'POST',
                                            url: 'saveProduction',
                                            data: { 
                                                controle: retorno[0],
                                                codigo : codigo,
                                                quantidade : quantidade,
                                                produto: produto
                                             },
                                            success: function(resultado){
            
                                            },
                                            error: function(msg){
                                                swal('Oooops...', 'Algo deu errado na produção', 'error');
                                            }
                                        });
                                    },
                                    error: function(msg){
                                        swal('Ooooops...', 'Algo deu errado com seu controle', 'error');
                                    }
                                });
                            }
                        }).done(function(response){
                            swal({
                                title: 'Cadastro de produção',
                                type: 'success',
                                text: 'Produção cadastrada com sucesso!',
                                confirmButtonText: 'Fechar'
                            });
                        }).fail(function(e){
                            swal({
                                title: 'Oooops...',
                                text: 'Algo deu errado na operação, tente novamente',
                                type: 'error',
                                confirmButtonText: 'Sair'
                            });
                        });
                    }
                })

            }else{
                swal('Oooops...', 'O produto do pedido não está cadastrado.', 'error');
            }
        }
    });

}

function gerarRelatorio(number){

    swal({
        type: 'success',
        title: 'Clique no botão para fazer o download',
        showConfirmButton: true,
        showCancelButton: true
    }).then((result) => {
        if(result.value){
            $.ajax({
                type: 'get',
                url: 'generateCsvOrder',
                data: { number : number},
                success: function(response){
                    console.log(response);
                    //swal.close();
                },
                error: function(response){
                    console.log(response);
                    swal({
                        type: 'error',
                        title: 'Ooops...',
                        text: 'Algo deu errado, tente novamente.'
                    });
                }
            });
        }
    })
}

// function coresSituacao(situacao){
//     switch (situacao) {
//         case 'Em Aberto':
//             $(this).addClass('em-aberto');
//             break;
//         case 'Em Digitação':
//             $(this).addClass('em-digitacao');
//             break;
//         case 'Atendido':
//             $(this).addClass('atendido');
//             break;
//         case 'Venda Agenciada':
//             $(this).addClass('venda-agenciada');
//             break;
//         case 'Cancelado':
//             $(this).addClass('cancelado');
//             break;
//         case 'Em Andamento':
//             $(this).addClass('em-andamento');
//             break;
//     }
// }




