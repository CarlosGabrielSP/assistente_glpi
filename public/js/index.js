
$(document).ready(function () {
    $('#card-1').click(function () {
        var cod = $(this).attr('id').slice(5);
        $('#ipt-cod-a1').val(cod);

        $('#modal-a1').modal({
            allowMultiple: true,
            transition: 'horizontal flip'
        }).modal('show');
    });

    $('#modal-a2 .grey.button').click(function () {
        $('#modal-a2').modal({
            transition: 'horizontal flip',
        }).modal('hide');
    });

    $('#nome-usuario-a2').on('input', function () {
        var usuario = $(this).val();
        var icone = $('#modal-a2 .ui.form .icon');
        var loading = $('#modal-a2 .ui.form .input');
        var btnOK = $('#btnOk-a2');
        loading.addClass('loading');
        btnOK.addClass('disabled');
        $.ajax({
            url: '/usuarios',
            method: 'POST',
            data: {
                usuario: usuario
            },
            success: function (response) {
                // console.log(response);
                if (response == 1) {
                    loading.removeClass('loading');
                    icone.removeClass('red').removeClass('times');
                    icone.addClass('green').addClass('check');
                    btnOK.removeClass('disabled');
                } else {
                    loading.removeClass('loading');
                    icone.removeClass('green').removeClass('check');
                    // icone.addClass('red').addClass('times');
                }
            },
            error: function (xhr, status, error) {
                console.log('Ocorreu um erro:', error);
            }
        });
        btnOK.click(function () {
            var nomeUsuario = $("#nome-usuario-a2").val();
            $('#ipt-nomeUsuario-a1').val(nomeUsuario);
            // console.log(nomeUsuario);
            $('#form-modal-a1').submit();
        });
    });

    $('.card-x').click(function () {
        var titulo = $(this).find('.header').text();
        var descricao = $(this).find('.description p').text();
        var cod = $(this).attr('id').slice(5);
        $('#modal-b1 #assunto-b1').text('Assunto: ' + titulo);
        $('#modal-b1 #descricao-b1').text('Descrição: ' + descricao);
        $('#ipt-cod-b1').val(cod);
        $('#modal-b1').modal({
            allowMultiple: true,
            transition: 'horizontal flip'
        }).modal('show');
    });

    $('#modal-b2 .grey.button').click(function () {
        $('#modal-b2').modal({
            transition: 'horizontal flip',
        }).modal('hide');
    });

    $('#nome-usuario-b2').on('input', function () {
        var usuario = $(this).val();
        var icone = $('#modal-b2 .ui.form .icon');
        var loading = $('#modal-b2 .ui.form .input');
        var btnOK = $('#btnOk-b2');
        loading.addClass('loading');
        btnOK.addClass('disabled');
        $.ajax({
            url: '/usuarios',
            method: 'POST',
            data: {
                usuario: usuario
            },
            success: function (response) {
                // console.log(response);
                if (response == 1) {
                    loading.removeClass('loading');
                    icone.removeClass('red').removeClass('times');
                    icone.addClass('green').addClass('check');
                    btnOK.removeClass('disabled');
                } else {
                    loading.removeClass('loading');
                    icone.removeClass('green').removeClass('check');
                    // icone.addClass('red').addClass('times');
                }
            },
            error: function (xhr, status, error) {
                console.log('Ocorreu um erro:', error);
            }
        });
        btnOK.click(function () {
            var nomeUsuario = $("#nome-usuario-b2").val();
            $('#ipt-nomeUsuario-b1').val(nomeUsuario);
            // console.log(nomeUsuario);
            $('#form-modal-b1').submit();
        });
    });
});