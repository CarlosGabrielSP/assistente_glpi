<?php require_once 'header.php' ?>
<div class="box-main-home">
    <div class="box-login">
        <div id="form-login-home">
            <img class="ui tiny centered image circular animate__animated animate__rotateIn" src="/img/logo.png" alt="logo">
            <h3 class="header" style="color: white; text-align:center">UE - Suporte Tecnológico</h3>
            <?php if ($usuario = $_SESSION['user'] ?? false) { ?>
                <p style="color: white">Bem vindo, <strong><?= $usuario['firstname'] ?></strong></p>
                <a href="/logoff" class="ui inverted mini basic orange button">Sair</a>
            <?php } else { ?>
                <form class="ui form" method="POST" action="/login">
                    <div class="field">
                        <input type="text" id="nome-login" name="nome" placeholder="Usuário" value="<?= $_GET['usr'] ?? '' ?>" required>
                    </div>
                    <div class="field">
                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    </div>
                    <button type="submit" class="ui fluid large teal submit button">Login</button>
                </form>
            <?php } ?>
        </div>
    </div>
    <div class="box-dashboard">
        <h1 class="ui center aligned header">Do que você está precisando?</h1>
        <br>

        <div class="ui three cards">
            <a id="card-1" class="ui raised card" href="#">
                <span class="ui black medium right corner label">
                    <i class="save icon"></i>
                </span>
                <div class="content">
                    <span style="display: none">1</span>
                    <h3 class="header">Abrir um Chamado</h3>
                    <div class="description">
                        <p style="display: none">Solicitar abertura de chamado para assuntos diversos</p>
                    </div>

                </div>
            </a>

            <a id="card-2" class="ui raised card card-x" href="#">
                <span class="ui gray right corner label"></span>
                <div class="content">
                    <h3 class="header">Novo ponto de rede</h3>
                    <div class="description">
                        <p style="display: none">Solicito criação de novo ponto de rede</p>
                    </div>
                </div>
            </a>

            <a id="card-3" class="ui raised card card-x" href="#">
                <span class="ui green right corner label"></span>
                <div class="content">
                    <h3 class="header">Esqueci minha senha de e-mail</h3>
                    <div class="description">
                        <p style="display: none">Solicito redefinição da senha do meu e-mail</p>
                    </div>
                </div>
            </a>

            <a id="card-4" class="ui raised card card-x" href="#">
                <span class="ui red right corner label"></span>
                <div class="content">
                    <h3 class="header">Estou sem acesso à Internet</h3>
                    <div class="description">
                        <p style="display: none">Solicito suporte relacionado à internet</p>
                    </div>
                </div>
            </a>

            <a id="card-5" class="ui raised card card-x" href="#">
                <span class="ui orange right corner label"></span>
                <div class="content">
                    <h3 class="header">Acessar a pasta compartilhada</h3>
                    <div class="description">
                        <p style="display: none">Solicito permissão de acesso à pasta compartilhada</p>
                    </div>
                </div>
            </a>

            <a id="card-6" class="ui raised card card-x" href="#">
                <span class="ui blue right corner label"></span>
                <div class="content">
                    <h3 class="header">Nova conta de e-mail</h3>
                    <div class="description">
                        <p style="display: none">Solicito criação de nova conta de e-mail</p>
                    </div>
                </div>
            </a>

            <a id="card-7" class="ui raised card card-x" href="#">
                <span class="ui teal right corner label"></span>
                <div class="content">
                    <h3 class="header">Nova conta de usuário (Acesso ao computador)</h3>
                    <div class="description">
                        <p style="display: none">Solicito criação de nova conta de usuário</p>
                    </div>
                </div>
            </a>

            <a id="card-8" class="ui raised card card-x" href="#">
                <span class="ui black right corner label"></span>
                <div class="content">
                    <h3 class="header">Não consigo enviar/receber e-mails</h3>
                    <div class="description">
                        <p style="display: none">Solicito suporte relacionado à conta de e-mail</p>
                    </div>
                </div>
            </a>

            <a id="card-9" class="ui raised card card-x" href="#">
                <span class="ui violet right corner label"></span>
                <div class="content">
                    <h3 class="header">O Computador não liga</h3>
                    <div class="description">
                        <p style="display: none">Solicito reparo de um computador que não está ligando</p>
                    </div>
                </div>
            </a>

            <a id="card-10" class="ui raised card card-x" href="#">
                <span class="ui brown right corner label"></span>
                <div class="content">
                    <h3 class="header">Apareceu um aviso de vírus em meu computador</h3>
                    <div class="description">
                        <p style="display: none">Solicito varredura e remoção de vírus de computador</p>
                    </div>
                </div>
            </a>

            <a id="card-11" class="ui raised card card-x" href="#">
                <span class="ui pink right corner label"></span>
                <div class="content">
                    <h3 class="header">Impressora não está imprimindo</h3>
                    <div class="description">
                        <p style="display: none">Solicito suporte relacionao à impressora</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<div id="modal-b1" class="ui small first coupled modal piled segment">
    <i class="close icon"></i>
    <div class="header">
        <h3 id="assunto"></h3>
    </div>
    <div class="content">
        <div class="description">
            <p id="descricao"></p>
        </div>
        <br>
        <br>
        <form id="form-modal-b1" method="POST" action="/novoChamado" class="ui form">
            <input id="ipt-cod" name="cod" type="hidden">
            <input id="ipt-nomeUsuario" name="nomeUsuario" type="hidden">
            <div class="field">
                <label>Informações adicionais</label>
                <textarea name="infoAdc" id="infoAdc"></textarea>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cancelar
        </div>
        <div id="submit-formModal-b1" class="ui green button right labeled icon button">
            Enviar
            <i class="paper plane icon"></i>
        </div>
    </div>
</div>

<div id="modal-b2" class="ui mini coupled modal red segment">
    <div>
        <h4 class="ui header">
            <div class="content">
                <p><i class="red exclamation circle icon"></i>Você precisa informar ao menos seu Usuário</p>
                <p class="sub header">O seu <strong>Usuário</strong> é o mesmo utilizado para acessar os computadores da empresa, geralmente seu <strong>DRT</strong> ou <strong>RG</strong></p>
            </div>
        </h4>
        <div class="description">
            <div class="ui form">
                <div class="ui fluid icon input">
                    <input type="text" id="nome-usuario" name="nome" placeholder="Usuário" value="<?= $_GET['usr'] ?? '' ?>" required>
                    <i class="icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui tiny grey button">
            Voltar
        </div>
        <div id="btn-submit-ok" class="ui tiny green button disabled">
            OK
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('.card-x').click(function() {
            var titulo = $(this).find('.header').text();
            var descricao = $(this).find('.description p').text();
            var cod = $(this).attr('id').slice(5);

            $('#modal-b1 #assunto').text('Assunto: ' + titulo);
            $('#modal-b1 #descricao').text('Descrição: ' + descricao);
            $('#ipt-cod').val(cod);

            $('#modal-b1').modal({
                allowMultiple: true,
                transition: 'horizontal flip'
            }).modal('show');
        });

        $('#submit-formModal-b1').click(function() {
            <?php if (isset($_SESSION['user'])) { ?>
                // console.log('Chamado Criado');
                $('#form-modal-b1').submit();
            <?php } else { ?>
                $('#modal-b2').modal({
                    allowMultiple: true,
                    transition: 'shake in',
                }).modal('show');
            <?php } ?>
        });

        $('#modal-b2 .grey.button').click(function() {
            $('#modal-b2').modal({
                transition: 'horizontal flip',
            }).modal('hide');
        });

        $('#nome-usuario').on('input', function() {
            var usuario = $(this).val();
            var icone = $('#modal-b2 .ui.form .icon');
            var loading = $('#modal-b2 .ui.form .input');
            var btnOK = $('#btn-submit-ok');

            loading.addClass('loading');
            btnOK.addClass('disabled');

            $.ajax({
                url: '/usuarios',
                method: 'POST',
                data: {
                    usuario: usuario
                },
                success: function(response) {
                    console.log(response);
                    if(response == 1) {
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
                error: function(xhr, status, error) {
                    console.log('Ocorreu um erro:', error);
                }
            });

            btnOK.click(function() {
                var nomeUsuario = $("#nome-usuario").val();
                $('#ipt-nomeUsuario').val(nomeUsuario);
                // console.log(nomeUsuario);
                $('#form-modal-b1').submit();
            });
        });

    });








































    // $(document).ready(function() {

    //     $('.card-x').click(function() {
    //         var titulo = $(this).find('.header').text();
    //         var descricao = $(this).find('.description p').text();
    //         var cod = $(this).attr('id').slice(5);
    //         $('#modal-b1 #assunto').text('Assunto: ' + titulo);
    //         $('#modal-b1 #descricao').text('Descrição: ' + descricao);
    //         $('#ipt-titulo').val(cod);
    //         $('#ipt-titulo').val(titulo);
    //         $('#ipt-descricao').val(descricao);
    //         $('#modal-b1').modal({
    //             allowMultiple: true,
    //             transition: 'horizontal flip'
    //         }).modal('show');
    //     });

    // });
</script>

<?php require_once 'footer.php' ?>