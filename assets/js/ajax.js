$(document).ready(function(){

    $('.alterarComposto').on('click', function(e){
        e.preventDefault();

        let id = this.id;
        let precoProducao = $('#precoProducao').val();
        let markup = $('#markup').val();

        $.ajax({
            type: 'POST',
            url: 'updateProduct',
            data: { precoProducao: precoProducao, markup: markup, id: id }
        }).done(function(response){
            swal({
                title: '',
                text: 'Ateração feita com sucesso',
                type: 'success'
            });
        }).fail(function(response){
            swal({
                title: 'Oooops...',
                text: 'Ocorreu um erro ao realizar a operação!',
                type: 'error'
            });
        });
    });

    $('.delCompos').on('click', function(e){

        e.preventDefault();
        var id = this.id;

        swal({
            title: "Tem certeza disso ?",
            text: "Você quer deletar esse produto composto ?",
            type: "question",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Excluir',
            cancleButtonText: 'Cancelar',
            showLoaderConfirm: true,
            preConfirm: function(){
                return new Promise(function(resolve){
                    $.ajax({
                        type: 'POST',
                        url: 'delete',
                        data: 'id='+id,
                        success:function(msg){
                            $('.js-'+id).fadeOut(300);
                        }
                    }).done(function(response){
                        swal({
                            title: '',
                            text: 'Produto excluído com sucesso!',
                            type: 'success'
                        });
                    }).fail(function(){
                        swal({
                            title: 'Oooops',
                            text: 'Ocorreu um erro na exclusão',
                            type: 'error'
                        });
                    })
                })
            }
        })

    });

    $('.delControl').on('click', function(e){

        e.preventDefault();
        var id = this.id;

        swal({
            title: 'Tem certeza disso?',
            text: 'Você quer deletar esse controle de produção ?',
            type: 'question',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Excluir',
            cancelButtonText: 'Cancelar',
            showLoadConfirm: true,
            preConfirm: function(){
                return new Promise(function(resolce){
                    $.ajax({
                        type: 'POST',
                        url: 'apagarControle',
                        data: 'id='+id
                    }).done(function(retorno){
                        $('.js-'+id).fadeOut(300);
                        swal({
                            title: '',
                            text: 'Controle excluído com sucesso',
                            type: 'success'
                        });
                    }).fail(function(e){
                        swal({
                            title: 'Ooooops',
                            text: 'Algo deu errado tente novamente.',
                            type: 'error'
                        });
                    })
                });
            }
        });
       
    })

    $('.delProd').on('click', function(e){

        e.preventDefault();
        var id = this.id;

        swal({
            title: "Tem certeza disso ?",
            text: "Você quer deletar esse produto da composição ?",
            type: "question",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Excluir',
            cancleButtonText: 'Cancelar',
            showLoaderConfirm: true,
            preConfirm: function(){
                return new Promise(function(resolve){
                    $.ajax({
                        type: 'POST',
                        url: 'deleteProd',
                        data: 'id='+id,
                        success:function(msg){
                            $('.js-'+id).fadeOut(300);              
                        }
                    }).done(function(response){
                        swal({
                            title: '',
                            text: 'Produto excluído da composição!',
                            type: 'success'
                        });
                    }).fail(function(){
                        swal({
                            title: 'Oooops',
                            text: 'Ocorreu um erro na exclusão',
                            type: 'error'
                        });
                    })
                })
            }
        })

    })

})